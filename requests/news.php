
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
/**
 * Plugin Name: Simple Google News
 * Plugin URI: http://kidvolt.com/simple-google-news
 * Description: This plugin makes it easy to add Google News results to your posts, pages, or sidebars
 * Version: 2.1
 * Author: Kevin Spence
 * Author URI: http://kidvolt.com
 * License: GPL2
 */
 
 /*  Copyright 2013  Kevin Spence  (email : kevin@kidvolt.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//we need this include to parse the Google News feed with MagPie later on
include_once(ABSPATH.WPINC.'/rss.php');
//define the default values
DEFINE("default_limit", "5");
DEFINE("default_region", "us");
DEFINE("default_query", "");
DEFINE("default_topic", "");
DEFINE("default_images", "on");
DEFINE("default_length", "200");
DEFINE("default_sort", "r");
//register and enqueue our (very small) style sheet
function register_google_news_styles() {
	wp_register_style( 'google-news-style', plugins_url( '/css/style.css', __FILE__ ), array(), '20120208', 'all' ); 
	wp_enqueue_style( 'google-news-style' );
}
	
//register the shortcode
add_shortcode( 'google_news', 'init_google_news' );
function init_google_news($atts) {
	register_google_news_styles();
	
	//process the incoming values and assign defaults if they are undefined
	$atts=shortcode_atts(array(
		"limit" => default_limit,
		"region" => default_region,
		"query" => default_query,
		"topic" => default_topic,
		"images" => default_images,
		"length" => default_length,
		"sort" => default_sort
		
	), $atts);
	
	//now, let's run the function that does the meat of the work
	$output = get_news($atts);
	
	//send the output back to the post
	return $output;
}
//by default, the news descriptions are very long. This function will help us shorten them
function shortdesc($desc, $length){
	if($length == '') {
		$length = '50';
	}
     $desc = substr($desc,0,$length);
     $desc = substr($desc,0,strrpos($desc," "));
     return $desc;
}
//this function builds and returns the feed URL
function build_feed_url($atts) {
	$url = 'http://news.google.com/news?q=' . $atts['query'] . '&topic=' . $atts['topic'] . '&ned=' . $atts['region'] . '&scoring=' . $atts['sort'];
	return $url;
}
//this function calculates relative time
function time_ago($timestamp)    {
        if(!is_numeric($timestamp)){
        $timestamp = strtotime( $timestamp );
        if(!is_numeric($timestamp)){
            return "";
        }
    }
    $difference = time() - $timestamp;
    $periods = array( "second", "minute", "hour", "day", "week", "month", "years", "decade" );
    $lengths = array( "60","60","24","7","4.35","12","10");
    if ($difference > 0) { // this was in the past
        $ending = "ago";
    }else { // this was in the future
        $difference = -$difference;
        $ending = "to go";
    }
    for( $j=0; $difference>=$lengths[$j] and $j < 7; $j++ )
        $difference /= $lengths[$j];
    $difference = round($difference);
    if( $difference != 1 ){
        $periods[$j].= "s";
    }
    $text = "$difference $periods[$j] $ending";
    return $text;
}
//this function handles all the real work
function get_news($atts) {
	//if there are single quotes in the query, let's remove them. They'll break things, and they aren't necessary for performing a search
	$atts['query'] = str_replace("'", "", $atts['query']);
	//we also need to replace any spaces with proper word separators
	$atts['query'] = str_replace(" ", "+", $atts['query']);
	//call the build_feed_url function to construct the feed URL for us
	$newsUrl = build_feed_url($atts);
	
	//call the build_feed function to parse the feed and return the results to us
	$output = build_feed($atts, $newsUrl, $iswidget);
	
	return $output;
}
//this is the function that actually builds the output
function build_feed($atts, $newsUrl, $iswidget) {
	//we're using WordPress' built in MagPie support for parsing the Google News feed
	$feed = fetch_rss($newsUrl . '&output=rss');
	$items = array_slice($feed->items, 0, $atts['limit']);
	
	//if there are results, loop through them
	if(!empty($items)) {
		
		$output .= '<div id="googlenewscontainer">';		
		
		foreach ($items as $item) {
			//Google News adds the source to the title. I don't like the way that looks, so I'm getting rid of it. We'll add the source ourselves later on
			$title = explode(' - ', $item['title']);
			
			//calculate the relative time
			$relDate = time_ago($item['pubdate']);
			
			//by default, Google lumps in the image with the description. We're pull the image out.
			preg_match('~<img[^>]*src\s?=\s?[\'"]([^\'"]*)~i',$item['description'], $imageurl);
	
			$output .= '<div class="newsresult">';
			
			//$output .= $pubDate;
	
			//by default, the news descriptions are full of ugly markup including tables, font definitions, line breaks, and other things.
			//to make it look nice on any site, we're going to strip all the formatting from the news descriptions
			preg_match('@src="([^"]+)"@', $item['description'], $match);
	
			$description = explode('<font size="-1">', $item['description']);	
			$description = strip_tags($description[2]);
			$description = shortdesc($description, $atts['length']);
	
			//if there is a news image, let's show it. If there isn't one, we'll show a blank space there instead
			//this is done for consistent formatting
			if(strtolower($atts['images']) == 'on') {
				if($imageurl[0]!='') {
					$output .= '<a href="' . $item['link'] . '" class="google_news_title" rel="nofollow" target="_blank"><div class="newsimage"><img src="' . $imageurl[1] . '" /></a></div>';
				}
			}
			
			$output .= '<a href="' . $item['link'] . '" class="google_news_title" rel="nofollow" target="_blank">' . $title[0] . '</a>';
			$output .= '<p><span class="smallattribution">' . $title[1] .' - ' . $relDate . '</span><br />' . $description . '...</p>';
			//this attribution is required by the Google News terms of use
			$output .= '</div>';
			
		}
	
	//we need to add a link to Google's search results to comply with their terms of use
	if($atts['query'] != '') {
		$output .= '<p class="googleattribution">News via Google. <a href="' . $newsUrl . '">See more news matching \'' . str_replace("+", " ", $atts['query']) . '\'</a></p>';
	}
	else {
		$output .= '<p class="googleattribution">News via Google. <a href="' . $newsUrl . '">See more news like this</a></p>';
	}
	
	$output .= '<div class="clear"></div>';
	$output .= '</div>';
	
	return $output;
	}
}
//The widget code starts here
class google_news_widget extends WP_Widget {
	// constructor
	function google_news_widget() {
		parent::WP_Widget(false, $name = __('Google News Widget', 'wp_widget_plugin') );
	}
	// widget form creation
	function form($instance) {	
	// Check values
	
		$defaults = array('query' => '', 'limit' => '5', 'images' => 'On', 'sort' => 'Relevance', 'length' => '50', 'title' => '');
		$instance = wp_parse_args((array) $instance, $defaults);
?>
		<!-- Start widget title -->
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</p>
		

		<!-- Start query options -->
		<p>
		<label for="<?php echo $this->get_field_id('query'); ?>"><?php _e('Query (optional)', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('query'); ?>" name="<?php echo $this->get_field_name('query'); ?>" type="text" value="<?php echo $instance['query']; ?>" />
		</p>

		<!-- Start result limit -->
		<p>
		<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Result Limit', 'wp_widget_plugin'); ?></label>
		<select name="<?php echo $this->get_field_name('limit'); ?>" id="<?php echo $this->get_field_id('limit'); ?>" class="widefat">

		<?php
		$options = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
		foreach ($options as $option) { ?>
			<option <?php selected( $instance['limit'], $option ); ?> value="<?php echo $option; ?>"><?php echo $option; ?></option>
		<?php
		}
		?>
		</select>
		</p>

		<!-- Start length options -->
		<p>
		<label for="<?php echo $this->get_field_id('length'); ?>"><?php _e('Length', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('length'); ?>" name="<?php echo $this->get_field_name('length'); ?>" type="text" value="<?php echo $instance['length']; ?>" />
		</p>

		<!-- Start image options -->
		<p>
		<label for="<?php echo $this->get_field_id('images'); ?>"><?php _e('Images', 'wp_widget_plugin'); ?></label>
		<select name="<?php echo $this->get_field_name('images'); ?>" id="<?php echo $this->get_field_id('images'); ?>" class="widefat">

		<?php
		$options = array('On', 'Off');
		foreach ($options as $option) { ?>
			<option <?php selected( $instance['images'], $option ); ?> value="<?php echo $option; ?>"><?php echo $option; ?></option>
		<?php
		}
		?>
		</select>
		</p>

		<!-- Start Sort Options -->
		
		<p>
		<label for="<?php echo $this->get_field_id( 'sort' ); ?>"><?php _e( 'Sort Results By', 'wp_widget_plugin' ); ?>:</label>
					<select id="<?php echo $this->get_field_id( 'sort' ); ?>" name="<?php echo $this->get_field_name( 'sort' ); ?>">
						<option value="r" <?php selected( r, $instance['sort'] ); ?>><?php _e( 'Relevancy' ); ?></option>
						<option value="n" <?php selected( n, $instance['sort'] ); ?>><?php _e( 'Date' ); ?></option>
					</select>
		</p>

<?php
	}
	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['query'] = strip_tags($new_instance['query']);
		$instance['limit'] = strip_tags($new_instance['limit']);
		$instance['images'] = strip_tags($new_instance['images']);
		$instance['sort'] = strip_tags($new_instance['sort']);
		$instance['length'] = strip_tags($new_instance['length']);
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
	// widget display
	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		
		register_google_news_styles();
		
		$newsUrl = build_feed_url($instance);
		
		$iswidget = 'yes';
		$myfeed = build_feed($instance, $newsUrl, $iswidget);
		
		echo $myfeed;
		
   //echo $after_widget;
	}
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("google_news_widget");'))
?>
</body>
</html>
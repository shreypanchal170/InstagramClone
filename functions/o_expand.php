<?php

class Mat_Expand
{
	private $code = "";
	private $site = "";
	private $data = array(
		"small" => "",
		"medium" => "",
		"large" => "",
		"w" => -1,
		"h" => -1,
		"embed" => "",
		"iframe" => "",
		"url" => "",
		"site" => "",
		"title" => ""
		);
	private $default_size = array("w" => 345, "h" => 195);
	private $all_types = array(
		"youtube" => array(
			"link" => "/https?:\/\/[w\.]*youtube\.com\/watch\?v=([^&#]*)|https?:\/\/[w\.]*youtu\.be\/([^&#]*)/i",
			"embed" => '/https?:\/\/[w\.]*youtube\.com\/v\/([^?&#"\']*)/is',
			"iframe" => '/https?:\/\/[w\.]*youtube\.com\/embed\/([^?&#"\']*)/is'
		),
		"dailymotion" => array(
			"link" => '/https?:\/\/[w\.]*dailymotion\.[^\/]*\/([^?]*)/is',
		),
        "metacafe" => array(
			"link" => '/https?:\/\/[w\.]*metacafe\.com\/watch\/([^?&#"\']*)/is',
			"embed" => '/https?:\/\/[w\.]*metacafe\.com\/fplayer\/(.*).swf/is'
		),
		"videojug" => array(
			"link" => '/https?:\/\/[w\.]*videojug\.com\/film\/([^?]*)/is',
		),
		"blip" => array(
			"link" => '/https?:\/\/[w\.]*blip\.tv\/([^?]*)/is',
		),
		"screenr" => array(
			"link" => '/https?:\/\/[w\.]*screenr\.com\/([^?]*)/is',
		),
		"slideshare" => array(
			"link" => '/https?:\/\/[w\.]*slideshare\.net\/([^?]*)/is',
		),
		"flickr" => array(
			"link" => '/https?:\/\/[w\.]*flickr\.com\/photos\/([^?]*)/is',
		),
		"funnyordie" => array(
			"link" => '/https?:\/\/[w\.]*funnyordie\.com\/videos\/([^?]*)/is',
		),
		"deviantart" => array(
				"link" => '/https?:\/\/[^\/]*\.*deviantart\.[^\/]*\/([^?]*)/is',
		),
		"soundcloud" => array(
			"link" => '/https?:\/\/[w\.]*soundcloud\.[^\/]*\/([^?]*)/is',
		),
		"vimeo" => array(
			"link" => '/https?:\/\/[w\.]*vimeo\.[^\/]*\/([^?]*)/is',
		)
	);

	function __construct($input){
		foreach($this->all_types as $site => $types)
		{
			foreach($types as $type => $regexp)
			{
				preg_match($regexp, $input, $match);
				if(!empty($match))
				{
					/*echo "<p>".$site." ".$type."</p>";
					echo "<pre>";
					print_r($match);
					echo "</pre>";*/
					for($i = 1; $i < sizeof($match); $i++)
					{
						if($match[$i] != "")
						{
							$this->code = $match[$i];
							$this->site = $site;
							break;
						}
					}
					if($this->code != "")
					{
						break;
					}
				}
			}
			if($this->code != "")
			{
				break;
			}
		}
	}

	/**************************
	* PUBLIC FUNCTIONS
	**************************/

	public function get_thumb($size = "small"){
		if($this->site != "")
		{
			$size_types = array("small", "medium", "large");
			$size = strtolower($size);
			if(!in_array($size, $size_types))
			{
				$size = "small";
			}
			$this->prepare_data("thumb");
			return $this->data[$size];
		}
		else
		{
			return "";
		}
	}

	public function get_iframe($w = -1, $h = -1){
		$this->prepare_data("iframe");
		if($this->site != "" && $this->data["iframe"] != "")
		{

			if($w < 0 || $h < 0)
			{
				$w = (is_int($this->data["w"]) && $this->data["w"] > 0) ? $this->data["w"] : $this->default_size["w"];
				$h = (is_int($this->data["h"]) && $this->data["h"] > 0) ? $this->data["h"] : $this->default_size["h"];
			}
			$w='100%';
			return '<iframe class="new" width="'.$w.'" height="'.$h.'" src="'.$this->data["iframe"].'" frameborder="0" allowfullscreen></iframe>';
		}
		else
		{
			return "";
		}
	}

	public function get_embed($w = -1, $h = -1){
		$this->prepare_data("embed");
		if($this->site != "" && $this->data["embed"])
		{
			if($w < 0 || $h < 0)
			{
				$w = (is_int($this->data["w"]) && $this->data["w"] > 0) ? $this->data["w"] : $this->default_size["w"];
				$h = (is_int($this->data["h"]) && $this->data["h"] > 0) ? $this->data["h"] : $this->default_size["h"];
			}
			return '<object width="'.$w.'" height="'.$h.'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"><param name="movie" value="'.$this->data["embed"].'"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="'.$this->data["embed"].'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="'.$w.'" height="'.$h.'"></embed></object>';
		}
		else
		{
			return "";
		}
	}

	public function get_url(){
		if($this->site != "")
		{
			$this->prepare_data("url");
			return $this->data["url"];
		}
		else
		{
			return "";
		}
	}

	public function get_id(){
		return $this->code;
	}

	public function get_site(){
		$this->prepare_data("site");
		return $this->data["site"];
	}

	public function get_size(){
		$arr = array();
		$this->prepare_data("size");
		$arr["w"] = ($this->data["w"] < 0) ? $this->default_size["w"] : $this->data["w"];
		$arr["h"] = ($this->data["h"] < 0) ? $this->default_size["h"] : $this->data["h"];
		return $arr;
	}

	public function get_title(){
		$this->prepare_data("title");
		return $this->data["title"];
	}

	/**************************
	* PRIVATE FUNCTIONS
	**************************/


	private function get_data($url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
		$curlData = curl_exec($curl);
		curl_close($curl);
		return $curlData;
	}

	private function prepare_data($type){
		if($this->site != "")
		{
			$ready = false;
			switch($type)
			{
				case "size":
					if($this->data["w"] > 0 && $this->data["h"] > 0)
					{
						$ready = true;
					}
				break;
				case "thumb":
					if($this->data["small"] != "" && $this->data["medium"] != "" && $this->data["large"] != "")
					{
						$ready = true;
					}
				break;
				default:
				if($this->data[$type] != "")
				{
					$ready = true;
				}
			}
			//if information is not yet loaded
			if(!$ready)
			{
				$func = ($this->site)."_data";
				$arr = $this->$func();
				//check if information requires http request
				if(!$arr[$type])
				{
					//if not, just provide data
					$func = ($this->site)."_".$type;
					$this->aggregate($this->$func(), $type);
				}
				else
				{
					//else if it needs http request we may as well load all other data
					//so we won't need to request it again
					$req = ($this->site)."_req";
					$res = $this->get_data($this->$req());
					foreach($arr as $key => $val)
					{
						$func = ($this->site)."_".$key;
						if($val)
						{
							$this->aggregate($this->$func($res), $key);
						}
						else
						{
							$this->aggregate($this->$func($res), $key);
						}
					}
				}
			}
		}
	}

	private function aggregate($data, $type){
		if(is_array($data))
		{
			foreach($data as $key => $val)
			{
				$this->data[$key] = $val;
			}
		}
		else
		{
			$this->data[$type] = $data;
		}
	}

	/**************************
	* SOME STANDARDS
	**************************/
	//oembed functions
	private function oembed_size($res){
		$arr = array();
		$res = json_decode($res, true);
		if(is_array($res) && !empty($res) && isset($res["width"]) && isset($res["height"]))
		{
			$arr["w"] = (int)$res["width"];
			$arr["h"] = (int)$res["height"];
		}
		return $arr;
	}

	private function oembed_title($res){
		$title = "";
		$res = json_decode($res, true);
		if(is_array($res) && !empty($res) && isset($res["title"]))
		{
			$title = $res["title"];
		}
		return $title;
	}

	//og functions
	private function og_size($res){
		$arr = array();
		preg_match( '/property="og:video:width"\s*content="([\d]*)/i', $res, $match);
		if(!empty($match))
		{
			$arr["w"] = (int)$match[1];
		}
		preg_match( '/property="og:video:height"\s*content="([\d]*)/i', $res, $match);
		if(!empty($match))
		{
			$arr["h"] = (int)$match[1];
		}
		return $arr;
	}

	private function og_title($res){
		$ret = "";
		preg_match( '/property="og:title"\s*content="([^"]*)"/i', $res, $match);
		if(!empty($match))
		{
			$ret = $match[1];
		}
		return $ret;
	}

	private function og_video($res){
		$code = "";
		preg_match( '/<meta\s*property="og:video"\s*content="([^"]*)"/i', $res, $match);
		if(!empty($match))
		{
			$code = $match[1];
		}
		return $code;
	}

	//others
	private function link2title(){
		$title = "";
		$parts = explode("/", $this->code);
		if(isset($parts[1]))
		{
			$parts = explode("_", $parts[1]);
			foreach($parts as $key => $val)
			{
				$parts[$key] = ucfirst($val);
			}
			$title = implode(" ", $parts);
		}
		return $title;
	}
	/**************************
	* YOUTUBE FUNCTIONS
	**************************/

	//which data needs additional http request
	private function youtube_data(){
		return  array(
			"thumb" => false,
			"size" => true,
			"embed" => false,
			"iframe" => false,
			"url" => false,
			"site" => false,
			"title" => true
		);
	}
	//return http request url where to get data
	private function youtube_req(){
		return $this->youtube_url();
	}
	//return thumbnails
	private function youtube_thumb(){
		$size_types = array("small" => "default", "medium" => "hqdefault", "large" => "hqdefault");
		$arr = array();
		foreach($size_types as $key => $val)
		{
			$arr[$key] = "http://i.ytimg.com/vi/".($this->code)."/".$val.".jpg";
		}
		return $arr;
	}
	//return size
	private function youtube_size($res){
		return $this->og_size($res);
	}
	//return iframe url
	private function youtube_iframe(){
		return "https://www.youtube.com/embed/".($this->code);
	}
	//return embed url
	private function youtube_embed(){
		return "https://www.youtube.com/v/".($this->code);
	}
	//return canonical url
	private function youtube_url(){
		return "https://www.youtube.com/watch?v=".($this->code);
	}
	//return website url
	private function youtube_site(){
		return "https://www.youtube.com";
	}
	//return title
	private function youtube_title($res){
		return $this->og_title($res);
	}
	/**************************
	* deviantart FUNCTIONS
	**************************/
	private function deviantart_data(){
		return array(
			"thumb" => true,
			"size" => false,
			"embed" => false,
			"iframe" => false,
			"url" => false,
			"site" => false,
			"title" => false
		);
	}

	private function deviantart_thumb($res){
		$res = json_decode($res, true);
		$arr = array();
		if(is_array($res) && !empty($res))
		{
			//echo $res = current($res); exit;
			$arr['medium'] = $res['url'];
		}
		return $arr;
	}

	private function deviantart_req(){
		return "http://backend.deviantart.com/oembed?format=json&url=".$this->deviantart_url();
	}

	private function deviantart_url(){

		return "http://deviantart.com/".($this->code);
	}

	//return size
	private function deviantart_size($res){
		return $this->oembed_size($res);
	}
	//return iframe url
	private function deviantart_iframe(){
		return "";
	}
	//return embed url
	private function deviantart_embed(){
		return "";
	}

	//return website url
	private function deviantart_site(){
		return "http://www.deviantart.com";
	}
	//return title
	private function deviantart_title($res){
		return $this->oembed_title($res);
	}

	/**************************
	* VIMEO FUNCTIONS
	**************************/

	private function vimeo_data(){
		return array(
			"thumb" => false,
			"size" => false,
			"embed" => false,
			"iframe" => true,
			"url" => false,
			"site" => false,
			"title" => false
		);
	}

	private function vimeo_thumb($res){
		$res = json_decode($res, true);
		$arr = array();
		if(is_array($res) && !empty($res))
		{
			//echo $res = current($res); exit;
			$arr['medium'] = $res['thumbnail_url'];
		}
		return $arr;
	}

	private function vimeo_req(){

		return "http://vimeo.com/api/oembed.json?url=".$this->vimeo_url();
	}

	private function vimeo_embed(){
		return "";
	}


	private function vimeo_size($res){
		return array("w" => "100%");
	}

	private function vimeo_iframe($res){

		$data = json_decode($res);

		$array = array();
			preg_match( '/src="([^"]*)"/i', $data->html, $array ) ;

		return $array[1];
	}

	private function vimeo_site(){
		return "http://www.vimeo.com";
	}

	private function vimeo_url(){
		return "http://www.vimeo.com/".($this->code);
	}

	private function vimeo_title($res){
		return $this->oembed_title($res);
	}

	/**************************
	* DAILYMOTION FUNCTIONS
	**************************/
	private function dailymotion_data(){
		return array(
			"thumb" => false,
			"size" => false,
			"embed" => false,
			"iframe" => true,
			"url" => false,
			"site" => false,
			"title" => false
		);
	}

	private function dailymotion_thumb($res){
		$res = json_decode($res, true);
		$arr = array();
		if(is_array($res) && !empty($res))
		{
			//echo $res = current($res); exit;
			$arr['medium'] = $res['thumbnail_url'];
		}
		return $arr;
	}

	private function dailymotion_req(){

		return "http://www.dailymotion.com/api/oembed/?url=".$this->dailymotion_url();
	}

	private function dailymotion_embed(){
		return "";
	}


	private function dailymotion_size($res){
		return array("w" => "100%");
	}

	private function dailymotion_iframe($res){

		$data = json_decode($res);

		$array = array();
			preg_match( '/src="([^"]*)"/i', $data->html, $array ) ;

		return $array[1];
	}

	private function dailymotion_site(){
		return "http://www.dailymotion.com";
	}

	private function dailymotion_url(){
		return "http://www.dailymotion.com/".($this->code);
	}

	private function dailymotion_title($res){
		return $this->oembed_title($res);
	}



	/**************************
	* METACAFE FUNCTIONS
	**************************/
	//which data needs additional http request
	private function metacafe_data(){
		return array(
			"thumb" => false,
			"size" => false,
			"embed" => false,
			"iframe" => false,
			"url" => false,
			"site" => false,
			"title" => false
		);
	}
	//return http request url where to get data
	private function metacafe_req(){
		return "";
	}
	//return thumbnails
	private function metacafe_thumb(){
		$arr = array();
		$parts = explode("/", $this->code);
		$arr["medium"] = "http://s.mcstatic.com/thumb/".$parts[0].".jpg";
		$arr["large"] = "http://s.mcstatic.com/thumb/".$parts[0]."/0/4/videos/0/1/".$parts[1].".jpg";
		$arr["small"] = "http://s.mcstatic.com/thumb/".$parts[0]."/0/4/sidebar_16x9/0/1/".$parts[1].".jpg";
		return $arr;
	}
		//return size
	private function metacafe_size(){
		$arr = array();
		$arr["w"] = 345;
		$arr["h"] = 195;
		return $arr;
	}
	//return iframe url
	private function metacafe_iframe(){
		$code = ($this->code[strlen($this->code)-1] == "/") ? substr($this->code, 0, strlen($this->code)-1) : $this->code;
		return "http://www.metacafe.com/fplayer/".$code.".swf";
	}
	//return embed url
	private function metacafe_embed(){
		return $this->metacafe_iframe();
	}
	//return canonical url
	private function metacafe_url(){
		$code = ($this->code[strlen($this->code)-1] != "/") ? ($this->code)."/" : $this->code;
		return "http://www.metacafe.com/watch/".($code);
	}
	//return website url
	private function metacafe_site(){
		return "http://www.metacafe.com";
	}
	//return title
	private function metacafe_title(){
		return $this->link2title();
	}
	/**************************
	* VIDEOJUG FUNCTIONS
	**************************/

	private function videojug_data(){
		return array(
			"thumb" => false,
			"size" => false,
			"embed" => false,
			"iframe" => true,
			"url" => false,
			"site" => false,
			"title" => false
		);
	}

	private function videojug_thumb($res){
		$res = json_decode($res, true);
		$arr = array();
		if(is_array($res) && !empty($res))
		{
			//echo $res = current($res); exit;
			$arr['medium'] = $res['thumbnail_url'];
		}
		return $arr;
	}

	private function videojug_req(){

		return "http://www.videojug.com/oembed.json?url=".$this->videojug_url();
	}

	private function videojug_embed(){
		return "";
	}


	private function videojug_size($res){
		return array("w" => "100%");
	}

	private function videojug_iframe($res){

		$data = json_decode($res);

		$array = array();
			preg_match( '/src="([^"]*)"/i', $data->html, $array ) ;

		return $array[1];
	}

	private function videojug_site(){
		return "http://www.videojug.com";
	}

	private function videojug_url(){
		return "http://www.videojug.com/".($this->code);
	}

	private function videojug_title($res){
		return $this->oembed_title($res);
	}

	/**************************
	* BLIP FUNCTIONS
	**************************/
	private function blip_data(){
		return array(
			"thumb" => false,
			"size" => false,
			"embed" => false,
			"iframe" => true,
			"url" => false,
			"site" => false,
			"title" => false
		);
	}

	private function blip_thumb($res){
		$res = json_decode($res, true);
		$arr = array();
		if(is_array($res) && !empty($res))
		{
			//echo $res = current($res); exit;
			$arr['medium'] = $res['thumbnail_url'];
		}
		return $arr;
	}

	private function blip_req(){

		return "http://blip.tv/oembed/?url=".$this->blip_url();
	}

	private function blip_embed(){
		return "";
	}


	private function blip_size($res){
		return array("w" => "100%");
	}

	private function blip_iframe($res){

		$data = json_decode($res);

		$array = array();
			preg_match( '/src="([^"]*)"/i', $data->html, $array ) ;

		return $array[1];
	}

	private function blip_site(){
		return "http://blip.tv";
	}

	private function blip_url(){
		return "http://blip.tv/".($this->code);
	}

	private function blip_title($res){
		return $this->oembed_title($res);
	}



	/**************************
	* SCREENR FUNCTIONS
	**************************/
	//which data needs additional http request
	private function screenr_data(){
		return array(
	"thumb" => false,
	"size" => false,
	"embed" => false,
	"iframe" => true,
	"url" => false,
	"site" => false,
	"title" => false
		);
	}
	//return http request url where to get data
	private function screenr_req(){
		return "http://www.screenr.com/api/oembed.json?url=".$this->screenr_url();
	}
	//return thumbnails
	private function screenr_thumb($res){
		$arr = array();
		$res = json_decode($res, true);
		if(is_array($res) && !empty($res))
		{
			$arr["small"] = $res["thumbnail_url"];
			$arr["medium"] = $res["thumbnail_url"];
			$arr["large"] = str_replace("_thumb", "", $res["thumbnail_url"]);
		}
		return $arr;
	}
	//return size
	private function screenr_size($res){
		return $this->oembed_size($res);
	}
	//return iframe url
	private function screenr_iframe(){
		return "http://www.screenr.com/embed/".($this->code);
	}
	//return embed url
	private function screenr_embed(){
		return "";
	}
	//return canonical url
	private function screenr_url(){
		return "http://www.screenr.com/".($this->code);
	}
	//return website url
	private function screenr_site(){
		return "http://www.screenr.com";
	}
	//return title
	private function screenr_title($res){
		return $this->oembed_title($res);
	}

	/**************************
	* SLIDESHARE FUNCTIONS
	**************************/
	//which data needs additional http request
	private function slideshare_data(){
		return array(
		"thumb" => false,
		"size" => false,
		"embed" => false,
		"iframe" => true,
		"url" => false,
		"site" => false,
		"title" => false
		);
	}
	//return http request url where to get data
	private function slideshare_req(){
		return "http://www.slideshare.net/api/oembed/2?format=json&amp;url=".$this->slideshare_url();
	}
	//return thumbnails
	private function slideshare_thumb($res){
		$arr = array();
		$res = json_decode($res, true);
		if(is_array($res) && !empty($res))
		{
			$arr["small"] = $res["thumbnail"]."-2";
			$arr["medium"] = $res["thumbnail"];
			$arr["large"] = $res["thumbnail"];
		}
		return $arr;
	}
	//return size
	private function slideshare_size($res){
		return $this->oembed_size($res);
	}
	//return iframe url
	private function slideshare_iframe($res){
		$code = explode("-", $this->code);
		$json = json_decode($res);
		return "http://www.slideshare.net/slideshow/embed_code/".$json->slideshow_id;
	}
	//return embed url
	private function slideshare_embed(){
		return "";
	}
	//return canonical url
	private function slideshare_url(){
		return "http://www.slideshare.net/".($this->code);
	}
	//return website url
	private function slideshare_site(){
		return "http://www.slideshare.net";
	}
	//return title
	private function slideshare_title($res){
		return $this->oembed_title($res);
	}

	/**************************
	* FLICKR FUNCTIONS
	**************************/
	//which data needs additional http request
	private function flickr_data(){
		return array(
			"thumb" => true,
			"size" => false,
			"embed" => false,
			"iframe" => false,
			"url" => false,
			"site" => false,
			"title" => false
		);
	}
	//return http request url where to get data
	private function flickr_req(){
		return "https://www.flickr.com/services/oembed/?format=json&url=".$this->flickr_url();
	}
	//return thumbnails
	private function flickr_thumb($res){

		$arr = array();
		$res = json_decode($res, true);
		if(is_array($res) && !empty($res))
		{
			$arr["large"] = str_replace(".jpg", "_b.jpg", $res["url"]);
			$arr["medium"] = $res["url"];
			$arr["small"] = str_replace(".jpg", "_m.jpg", $res["url"]);
		}
		return $arr;
	}
	//return size
	private function flickr_size($res){
		return $this->oembed_size($res);
	}
	//return iframe url
	private function flickr_iframe(){
		return "";
	}
	//return embed url
	private function flickr_embed(){
		return "";
	}
	//return canonical url
	private function flickr_url(){
		return "http://www.flickr.com/photos/".($this->code);
	}
	//return website url
	private function flickr_site(){
		return "http://www.flickr.com";
	}
	//return title
	private function flickr_title($res){
		return $this->oembed_title($res);
	}

	/**************************
	* FUNNYORDIE FUNCTIONS
	**************************/
	private function funnyordie_decode(){
		$parts = explode("/", $this->code);
		return $parts[0];
	}
	//which data needs additional http request
	private function funnyordie_data(){
		return array(
			"thumb" => false,
			"size" => false,
			"embed" => false,
			"iframe" => true,
			"url" => false,
			"site" => false,
			"title" => false
		);
	}
	//return http request url where to get data
	private function funnyordie_req(){
		return "http://www.funnyordie.com/oembed?format=json&url=".$this->funnyordie_url();
	}
	//return thumbnails
	private function funnyordie_thumb(){
		$arr = array();
		$arr["large"] = "http://assets.ordienetworks.com/tmbs/".($this->funnyordie_decode())."/fullsize_11.jpg";
		$arr["medium"] = "http://assets.ordienetworks.com/tmbs/".($this->funnyordie_decode())."/large_11.jpg";
		$arr["small"] = "http://assets.ordienetworks.com/tmbs/".($this->funnyordie_decode())."/medium_11.jpg";
		return $arr;
	}
	//return size
	private function funnyordie_size($res){
		return $this->oembed_size($res);
	}
	//return iframe url
	private function funnyordie_iframe(){
		return "http://public0.ordienetworks.com/flash/fodplayer.swf?key=".$this->funnyordie_decode();
	}
	//return embed url
	private function funnyordie_embed(){
		return $this->funnyordie_iframe();
	}
	//return canonical url
	private function funnyordie_url(){
		return "http://www.funnyordie.com/videos/".($this->code);
	}
	//return website url
	private function funnyordie_site(){
		return "http://www.funnyordie.com";
	}
	//return title
	private function funnyordie_title($res){
		return $this->oembed_title($res);
	}
	/**************************
	* SOUNDCLOUD FUNCTIONS
	**************************/
	private function soundcloud_data(){
		return array(
			"thumb" => true, 
			"size" => true, 
			"embed" => false,
			"iframe" => true,
			"url" => true,
			"site" => false, 
			"title" => true
		);
	}
	
	private function soundcloud_thumb($res){
		$res = json_decode($res, true);
		$arr = array();
		if(is_array($res) && !empty($res))
		{
			//echo $res = current($res); exit;
			$arr['medium'] = $res['thumbnail_url'];
		}
		return $arr;
	}
	
	private function soundcloud_req(){		
		return "https://soundcloud.com/oembed?format=json&url=".$this->soundcloud_url();
	}
	
	private function soundcloud_embed(){
		return "";
	}
	
	private function soundcloud_size($res){
		return array("w" => "100%", "h" => 195);
	}
	
	private function soundcloud_iframe($res){
		$data = json_decode($res);
		$array = array();
    	preg_match( '/src="([^"]*)"/i', $data->html, $array ) ;
		return $array[1];
	}
	
	private function soundcloud_site(){
		return "https://www.soundcloud.com";
	}
	
	private function soundcloud_url(){
		return "https://soundcloud.com/".($this->code);
	}
	
	private function soundcloud_title($res){
		return $this->oembed_title($res);
	}
	
	

}
?>
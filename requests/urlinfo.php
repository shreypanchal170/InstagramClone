<?php   
date_default_timezone_set('UTC'); 
function curl_get_contents($url)
    {
      $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
   $html = curl_exec($ch);
   $data = curl_exec($ch);
   curl_close($ch);
   return $data;
    }
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $_POST["url"], $match)) {
	  $youtube_video = $match[1];
	  $api_request = curl_get_contents('https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v='.$youtube_video.'&format=json');
		if (!empty($api_request)) {
		   $json_decode = json_decode($api_request);
		   $title = $json_decode->title;  
		   $thumbnail = $json_decode->thumbnail_url;
		   $description = '';
		  
		  $output = array(
			  'title' => $title,
			  'images' => array(
				  $thumbnail
			  ),
			  'content' => $description,
			  'url' => $_POST["url"]
		  );
		  echo json_encode($output);
		  exit();
	  }
} else if  (isset($_POST['url']) && !empty($_POST['url'])) {
            $page_title = '';
            $image_urls = array();
            $page_body  = '';
            $get_url    = $_POST["url"];
			include_once 'html_code.php'; 
            include_once("UrlExtractor.php"); 
            if (@getimagesize($get_url)) {
                $image_urls[] = $get_url;
                $page_title   = 'Image';
            } else {
                $get_content = file_get_html($get_url);
                foreach ($get_content->find('title') as $element) {
                    @$page_title = $element->plaintext;
                }
                if (empty($page_title)) {
                    $page_title = '';
                }
                @$page_body = $get_content->find("meta[name='description']", 0)->content;
                $page_body = mb_substr($page_body, 0, 250, "utf-8");
                if ($page_body === false) {
                    $page_body = '';
                }
                if (empty($page_body)) {
                    @$page_body = $get_content->find("meta[property='og:description']", 0)->content;
                    $page_body = mb_substr($page_body, 0, 250, "utf-8");
                    if ($page_body === false) {
                        $page_body = '';
                    }
                }
                $image_urls = array();
                @$page_image = $get_content->find("meta[property='og:image']", 0)->content;
                if (!empty($page_image)) {
                    if (preg_match('/[\w\-]+\.(jpg|png|gif|jpeg)/', $page_image)) {
                        $image_urls[] = $page_image;
                    }
                } else {
                    foreach ($get_content->find('img') as $element) {
                        if (!preg_match('/blank.(.*)/i', $element->src)) {
                            if (preg_match('/[\w\-]+\.(jpg|png|gif|jpeg)/', $element->src)) {
                                $image_urls[] = $element->src;
                            }
                        }
                    }
                }
            }
            $output = array(
                'title' => htmlcode($page_title),
                'images' => $image_urls,
                'content' => htmlcode($page_body),
                'url' => $_POST["url"]
            );
            echo json_encode($output);
            exit();
        }

?>
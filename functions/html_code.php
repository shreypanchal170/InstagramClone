<?php 
function htmlcode($orimessage) { 
	// convert to unix new lines
	$message= preg_replace("/\r\n|\r|\n/", ' ', $orimessage);
	$s = array ("<", ">");
	$z = array ("&lt;","&gt;");
	$message = str_replace($s, $z, $message);
	$message=trim(str_replace("\\n", "<br/>", $message));

	// Collapse many <br> to one
	$message = preg_replace('/(<br\s*\/?\s*>\s*)*(<br\s*\/?\s*>)/', '<br>', $message); 
 
	return htmlspecialchars(stripslashes($message), ENT_QUOTES, "UTF-8");
}
 
function sanitize_output($buffer) {
    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );
    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );
    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

function cleanString($string) {
    $link_regex = '/(?:http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';
        $i          = 0;
        preg_match_all($link_regex, $string, $matches);
        foreach ($matches[0] as $match) {
            $match_url    = strip_tags($match);
            $syntax       = '<a href="#">' . urlencode($match_url) . '</a>';
            $string= str_replace($match, $syntax, $string);
        }
		 return  $string ;
}
function makeHashLink($orimessage, $base_url){
	$message = $orimessage;
   $regex = "/#+(\w+)/u";
   $message = preg_replace($regex, '<a href="'.$base_url.'hashtag/$1" class="hshCl">$0</a>', $message);
   return  $message ;
} 
function htmlcode_nolink($orimessage){
	// Remove link and other tags first
	$message = strip_tags($orimessage, '<br><br/>');
    // Convert the bad \\n to \n
    $message = str_replace("\\n","\n",$message);

	$message = preg_replace('/(<br\s*\/?\s*>\s*)*(<br\s*\/?\s*>)/', '<br>', $message); 

	return htmlspecialchars(stripslashes($message), ENT_QUOTES, "UTF-8");
}
function htmlcodecomment($orimessage,$base_url) { 
	// convert to unix new lines
	$message= preg_replace("/\r\n|\r|\n/", ' ', $orimessage);
	$s = array ("<", ">");
	$z = array ("&lt;","&gt;");
	$message = str_replace($s, $z, $message);
	$message=trim(str_replace("\\n", "<br/>", $message));
    
	// Collapse many <br> to one
	$message = preg_replace('/(<br\s*\/?\s*>\s*)*(<br\s*\/?\s*>)/', ' ', $message); 
	$regex_mention = "/@+([a-zA-Z0-9_]+)/";
    $message = preg_replace($regex_mention, '<a href="'.$base_url.'$1">$0</a>', $message);
	return htmlspecialchars(stripslashes($message), ENT_QUOTES, "UTF-8");
}
 function hashtag($orimessage){
  //filter the hastag
  preg_match_all('/#+(\w+)/u', $orimessage, $matched_hashtag); 
  $hashtag = '';
  //if hashtag found
  if(!empty($matched_hashtag[0])){
   //fetch hastag from the array
   foreach ($matched_hashtag[0] as $matched) {
    //append every hastag to a string
    //remove the # by preg_replace function
    $hashtag .= preg_replace('/[^\p{L}0-9\s]+/u', '', $matched).',';
    //append and , after every hashtag
   }
  }
  //remove , from the last hashtag
  return rtrim($hashtag, ',');
 }

 function mention($orimessage){
  //filter the mention
  preg_match_all('/(^|[^a-z0-9_])@([a-z0-9_]+)/i', $orimessage, $matched_mention);
  $p_mentions = '';
  //if mention found
  if(!empty($matched_mention[0])){
   //fetch mention from the array
   foreach ($matched_mention[0] as $p_mention) {
    //append every mention to a string
    //remove the @ by preg_replace function
    $p_mentions .= preg_replace('/[^a-z0-9]+/i', '', $p_mention).',';
    //append and , after every mention
   }
  }
  //remove , from the last mention
  return rtrim($p_mentions, ',');
 }
 
function fullnm($fullName) {
	$base_url='http://localhost:8888/';
	// convert to unix new lines
	$fullName= preg_replace("/\r\n|\r|\n/", ' ', $fullName);
	$s = array ("<", ">");
	$z = array ("&lt;","&gt;");
	$fullName = str_replace($s, $z, $fullName);
	$fullName=trim(str_replace("\\n", "<br/>", $fullName));

	// Collapse many <br> to one
	$fullName = preg_replace('/(<br\s*\/?\s*>\s*)*(<br\s*\/?\s*>)/', '<br>', $fullName); 

	// hashtag replacement is last
	$regex = "/#+([a-zA-ZÇŞĞÜÖİçşğüöı0-9-_]+)/";
	// mention replacement is last
	$regex_mention = "/@+([a-zA-Z0-9-_]+)/";
	// hashtag link
	$fullName = preg_replace($regex, '<a href="hashtag.php?tag=$1" class="hshCl">$0</a>', $fullName);
	// mention link
    $message = preg_replace($regex_mention, '<a href="'.$base_url.'$1" style="color:#000000 !important;">$0</a>', $fullName);
	return htmlspecialchars(stripslashes($fullName), ENT_QUOTES, "UTF-8");
}  
?>
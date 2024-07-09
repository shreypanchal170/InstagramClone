<?php 
function strip_unsafe($string, $img=false) {
    // Unsafe HTML tags that members may abuse
    $unsafe=array(
    '/<iframe(.*?)<\/iframe>/is',
    '/<title(.*?)<\/title>/is',
    '/<pre(.*?)<\/pre>/is',
    '/<frame(.*?)<\/frame>/is',
    '/<frameset(.*?)<\/frameset>/is',
    '/<object(.*?)<\/object>/is',
    '/<script(.*?)<\/script>/is',
    '/<embed(.*?)<\/embed>/is',
    '/<applet(.*?)<\/applet>/is',
    '/<meta(.*?)>/is',
    '/<!doctype(.*?)>/is',
    '/<link(.*?)>/is',
    '/<body(.*?)>/is',
    '/<\/body>/is',
    '/<head(.*?)>/is',
    '/<\/head>/is',
    '/onload="(.*?)"/is',
    '/onunload="(.*?)"/is',
    '/<html(.*?)>/is',
    '/<\/html>/is');

    // Remove graphic too if the user wants
    if ($img==true)
    {
        $unsafe[]='/<img(.*?)>/is';
    }

    // Remove these tags and all parameters within them
    $string=preg_replace($unsafe, "", $string);

    return $string;
}  
 
$styles = array ( '*' => 'strong', '_' => 'i', '~' => 'strike');
$stylesAnnounce = array ( '*' => 'strong', '_' => 'i', '~' => 'strike','!'=> 'mark', ':'=>'p', '|'=>'code');

function styletext($orimessage) {
   global $styles;
   return preg_replace_callback('/(?<!\w)([*~_])(.+?)\1(?!\w)/',
      function($m) use($styles) { 
         return '<'. $styles[$m[1]]. '>'. $m[2]. '</'. $styles[$m[1]]. '>';
      },
      $orimessage);
}

function styleAnnouncetext($orimessage) {
   global $stylesAnnounce;
   return preg_replace_callback('/(?<!\w)([*~_!:|])(.+?)\1(?!\w)/',
      function($m) use($stylesAnnounce) { 
         return '<'. $stylesAnnounce[$m[1]]. '>'. $m[2]. '</'. $stylesAnnounce[$m[1]]. '>';
      },
      $orimessage);
}

function get_domain_from_url( $string ) {
        return strtolower( parse_url( $string , PHP_URL_HOST ) );
}

function congract($text){ 
		$words = array("tebrikler","congratulations","felicitaciones","dans");
		$words = array_map('preg_quote', $words);
		$pattern = "/\b(" . implode('|', $words) . ")\b/i";
		$text = preg_replace($pattern, "<span class=\"c_btn\">$1</span>", $text); 
		return $text;
}
?>
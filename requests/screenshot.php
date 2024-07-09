<?php    
 include_once '../functions/control.php';
 include_once '../functions/inc.php';   
$sc = move_uploaded_file($_FILES['fileshot']['tmp_name'], $videoPath.$_FILES['fileshot']['name']);

echo $sc;
?>
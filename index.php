
<?php
include_once 'Template/header.php';
?>
<meta name="description" content="<?php echo OptionEx::GetValue("SiteDescription"); ?>"/>
<meta name="keywords" content="<?php echo OptionEx::GetValue("SiteKewords"); ?>"/>
<?php
include_once 'Template/menu.php';
include_once 'Template/search.php';
include_once 'Template/slides.php';
include_once 'Template/carousel.php';
include_once 'Template/services.php';
?>





<?php

//$test =parse_ini_file("Config/Connection.ini",FALSE);
//print_r(parse_ini_file("Config/Connection.ini",FALSE));
//echo $test['host'];
//include_once 'Template/thumbs.php';
include_once 'Template/footer.php';
//echo  $_SERVER['SERVER_NAME'];
?>


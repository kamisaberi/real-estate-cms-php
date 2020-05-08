<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if (!isset($_SESSION)) {
    session_start();
}


$tmp = json_decode(file_get_contents('Config/site.json'), true);
if ($tmp) {
    foreach ($tmp as $k => $v)
        define($k, $v);
} else
    die('Error parsing configuration');



require_once 'Classes/OptionEx.inc';
require_once 'Classes/Globals.inc';
?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>آی املاک </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="Styles/HomeStyle.css" rel="stylesheet" type="text/css" />
        <script src="Scripts/jquery-1.8.2.mins.js" type="text/javascript"></script>
        <script src="Scripts/jquery.bxslider.min.js" type="text/javascript"></script>
        <link href="Styles/jquery.bxslider.css" rel="stylesheet" type="text/css" />
        <script src="Scripts/TabControl.js" type="text/javascript"></script>
        <link href="Images/Theme/Estate.ico" rel="icon" />
        <script language="javascript" type="text/javascript">
            $(document).ready(function () {
                $('#slider').bxSlider({
                    auto: true,
                    adaptiveHeight: true,
                    speed: 2000,
                    captions: true,
                    slideWidth: 438,
                    mode: 'fade'

                });
                $('#carousel').bxSlider({
                    auto: true,
                    adaptiveHeight: true,
                    minSlides: 3,
                    maxSlides: 4,
                    slideWidth: 230,
                    slideMargin: 10,
                    captions: true,
                    moveSlides: 1,
                    speed: 2000,
                    /*     infiniteLoop:false,
                     hideControlOnEnd:true*/
                });
            });
        </script>
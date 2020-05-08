<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
require_once 'Classes/OptionEx.inc';
require_once 'Classes/Globals.inc';
?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo OptionEx::GetValue("SiteTitle"); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="iamlaak.com"/>
        <!--        <link href="Styles/Style.css" rel="stylesheet" type="text/css" />-->
        <link href="Styles/HomeStyle.css" rel="stylesheet" type="text/css" />
        <link href="Styles/wt-rotator.css" rel="stylesheet" type="text/css" />
        
        
        
        
        <script src="Scripts/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="Scripts/jquery.easing.1.3.min.js" type="text/javascript"></script>
        <script src="Scripts/jquery.wt-rotator.min.js" type="text/javascript"></script>
        <script src="Scripts/preview.js" type="text/javascript"></script>
        <link href="Images/Theme/Estate.ico" rel="icon" />


<!--        <link href="Styles/GeneralStyle.css" rel="stylesheet" type="text/css" />
        <link href="Styles/LightBox.css" rel="stylesheet" type="text/css" />
        <script src="Scripts/jquery-lightbox.js" type="text/javascript"></script>-->



        <script language="javascript" type="text/javascript">
            $(document).ready(function() {
                $('.Menu li').hover(function() {
                    $('ul', this).stop().SlideDown(100);
                }, function() {
                    $('ul', this).stop().SlideUp(100);
                });
            });
        </script>

        ﻿
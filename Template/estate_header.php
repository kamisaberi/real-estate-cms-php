<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
require_once 'Classes/OptionEx.inc';
require_once 'Classes/Globals.inc';
?>
﻿﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo OptionEx::GetValue("SiteTitle"); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--    <link href="<?php echo dirname(__FILE__) . "/"; ?>Styles/GeneralStyle.css" rel="stylesheet" type="text/css" />-->
        <?php
        if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
            ?>

            <link href="/RealEstates/Styles/GeneralStyle.css" rel="stylesheet" type="text/css" />
            <link href="/RealEstates/Styles/LightBox.css" rel="stylesheet" type="text/css" />
            <script src="/RealEstates/Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
            <script src="/RealEstates/Scripts/jquery-lightbox.js" type="text/javascript"></script>
            <link rel="icon" href="/RealEstates/Images/Theme/Estate.ico" />

            <?php
        } else {
            ?>


            <link href="/Styles/GeneralStyle.css" rel="stylesheet" type="text/css" />
            <link href="/Styles/LightBox.css" rel="stylesheet" type="text/css" />
            <script src="/Scripts/jquery-1.10.2.min.js" type="text/javascript"></script>
            <script src="/Scripts/jquery-lightbox.js" type="text/javascript"></script>
            <link rel="icon" href="/Images/Theme/Estate.ico" />



            <?php
        }
        ?>
<!--    <script src="Scripts/jquery-1.7.1.min.js" type="text/javascript"></script>-->
        <script language="javascript" type="text/javascript">
            $(document).ready(function() {
                $('#GalleryContainer a').lightBox();
            });
        </script>
</head>
<body>
    <div class="Main">
        <div class="Banner">
            <div class="Logo">
                <?php
                if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
                    ?>
                    <img src="/RealEstates/Images/Logo.png" alt="لوگو" width="278" height="96" />
                    <?php
                } else {
                    ?>
                    <img src="/Images/Logo.png" alt="لوگو" width="278" height="96" />
                    <?php
                }
                ?>
            </div>
            <!--<div class="TellNumbers">
                <img src="Images/Tell.png" width="250" height="75" alt="شماره تماس" /></div>-->
        </div>
        <div class="Menu">
            <ul>
                <li><a href="<?php echo Globals::ConvertURL("/index.php"); ?>">خانه</a></li>
                <li><a href="#">پیشنهاد </a></li>
                <li><a href="#">سفارش</a></li>
                <li><a href="#">گالری تصاویر</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
                <li><a href=" <?php echo Globals::ConvertURL("/Users/Index.php"); ?>">ورود</a></li>
            </ul>
        </div>

</head>
<body>
    <div class="Main">
        <div class="Banner">
            <div class="Logo">
                <img src="Images/Theme/Logo.png" alt="لوگو" width="176" height="53" />
            </div>
        </div>

        <div class="Menu">
            <ul class="Nav">
                <li><a href="Index.php">صفحه اصلی</a></li>
                <li><a href="#">ثبت اطلاعات </a>
                    <ul>
                        <?php
                        if ($_SESSION['UserType'] == "Admin" || $_SESSION['UserType'] == "Client") {
                            ?>
                            <li><a href="Brokers.php">بنگاه ها </a></li>
                            <?php
                        }
                        if ($_SESSION['UserType'] == "Admin" || $_SESSION['UserType'] == "Broker") {
                            ?>
                            <li><a href="BrokerUsers.php"> کاربران بنگاه ها </a></li>
                            <?php
                        }
                        ?>
                        <li><a href="Estates.php">املاک </a></li>
                        <?php
                        if ($_SESSION['UserType'] == "Admin") {
                            ?>

                            <li><a href="EstateTypes.php">نوع املاک </a></li>
<!--                            <li><a href="PriceTypes.php">انواع قیمت ها</a></li>-->
<!--                            <li><a href="PriceUnits.php">واحد مالی</a></li>-->
<!--                            <li><a href="AreaUnits.php">واحد مساحت</a></li>-->
                            <li><a href="EstatePropertyTypes.php">خاصیت های املاک</a></li>
                            <li><a href="EstateFacilityTypes.php">امکانات املاک</a></li>
                            <li><a href="BrokerPropertyTypes.php">خاصیت های بنگاه ها</a></li>
                            <li><a href="Documents.php">اسناد</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="clear">
                    </div>
                </li>
                <?php
                if ($_SESSION['UserType'] == "Admin") {
                    ?>
                    <li><a href = "#">تنظیمات سایت</a>
                        <ul>
                            <li><a href = "Options.php">تنظیمات</a></li>
                            <li><a href = "Backup.php">پشتیبان گیری</a></li>
                            <li><a href = "Restore.php">باز گرداندن اطلاعات</a></li>
                        </ul>
                        <div class = "clear">
                        </div>
                    </li>
                    <?php
                }
                ?>

                <!--                <li><a href="#">درباره مدرسه</a>
                    <ul>
                        <li><a href="#">معرفی مدرسه</a></li>
                        <li><a href="#">افتخارات مدرسه</a></li>
                        <li><a href="#">گالری تصاویر</a></li>
                        <li><a href="#">بانیان و موسسین</a></li>
                         <li><a href="#">معرفی پرسنل</a></li>
                        <li><a href="#">معرفی مدرسین</a></li>
                        <li><a href="#">پایه های تحصیلی</a></li>
                        <li><a href="#">شهرستان لنگرود</a></li>
                    </ul>
                    <div class="clear">
                    </div>
                </li>-->
                <li><a href="LogOff.php">خروج</a></li>
            </ul>
        </div>

        <div class="Main">
            <div class="Container">


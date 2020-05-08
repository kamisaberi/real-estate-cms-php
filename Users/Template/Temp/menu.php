</head>
<body>
    <div class="Main">
        <div class="Banner">
            <a href="../index.php" ><img src="../Images/Logo.png" width="449" height="140" alt="" /> </a>
            <input type="text" id="txtSearch" value="جستجو . . . " />
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
                            <li><a href="PriceTypes.php">انواع قیمت ها</a></li>
                            <li><a href="PriceUnits.php">واحد مالی</a></li>
                            <li><a href="AreaUnits.php">واحد مساحت</a></li>
                            <li><a href="EstatePropertyTypes.php">خاصیت های املاک</a></li>
                            <li><a href="EstateFacilityTypes.php">امکانات املاک</a></li>
                            <li><a href="BrokerPropertyTypes.php">خاصیت های بنگاه ها</a></li>
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
        <div class="Content">

            <?php /*
              if ($_SESSION['UserType'] == "Teacher") {
              ?>

              <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
              <tr>
              <td>
              <?php echo $name . " " . $family; ?>
              </td>
              </tr>
              </table>
              <?php
              } elseif ($_SESSION['UserType'] == "Client") {
              ?>
              <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
              <tr>
              <td>
              <?php echo $name . " " . $family; ?>
              </td>
              <td>
              <?php echo $codemelli; ?>
              </td>
              </tr>
              </table>
              <?php
              } */
            ?>





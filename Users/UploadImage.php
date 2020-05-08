<?php
//require_once '../Classes/StudentEx.inc';
require_once '../Classes/ResizeImage.inc';
?>
<?php
//include_once 'Template/header.php';
//include_once 'Template/menu.php';
$id = $_POST['id'];
//$s= $_POST['files'];
//echo $s;
?>
<?php
//$cm = $_POST['command'];
//echo $cm;
//$studentid= $_POST['file'];

$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPG", "JPEG", "PNG", "bmp", "BMP");
//echo '<br/> ' . $_FILES["files"]["name"] ;
$temp = explode(".",  strtolower($_FILES["files"]["name"]));
$extension = end($temp);
echo $_FILES["files"]["type"];
if ((($_FILES["files"]["type"] == "image/gif") || ($_FILES["files"]["type"] == "image/jpeg") || ($_FILES["files"]["type"] == "image/jpg") || ($_FILES["files"]["type"] == "image/JPG") || ($_FILES["files"]["type"] == "image/pjpeg") || ($_FILES["files"]["type"] == "image/x-png") || ($_FILES["files"]["type"] == "text/plain") || ($_FILES["files"]["type"] == "image/png")) && ($_FILES["files"]["size"] < 2000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["files"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        echo "Upload: " . $_FILES["files"]["name"] . "<br>";
        echo "Type: " . $_FILES["files"]["type"] . "<br>";
        echo "Size: " . ($_FILES["files"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $_FILES["files"]["tmp_name"] . "<br>";
        if (file_exists("upload/" . $_FILES["files"]["name"])) {
            echo $_FILES["files"]["name"] . " already exists. ";
        } else {
            $content = time() . $_FILES["files"]["name"];
            $content=strtolower($content);
            move_uploaded_file($_FILES["files"]["tmp_name"], "../Uploads/" . $content);

            $path = "/Uploads/Estates/" . $id . "/";
            $bpath = "/Uploads/Estates/" . $id . "/Big/";
            if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") {
                $fbpath = $_SERVER['DOCUMENT_ROOT'] . "/RealEstate" . $bpath;
                $bpath = "/RealEstate" . $bpath;
                $path = "/RealEstate" . $path;
            } else {
                $fbpath = $_SERVER['DOCUMENT_ROOT'] . $bpath;
            }
            $bfiles = preg_grep('~\.(jpeg|jpg|png|JPG|PNG|GIF)$~', scandir($fbpath));
            sort($bfiles,SORT_NUMERIC);

            if (count($bfiles) > 0) {
                //echo count($bfiles);
                $resize = new ResizeImage("../Uploads/" . strtolower($content));
                $resize->resizeTo(640, 480, 'exact');
                $resize->saveImage("../Uploads/Estates/" . $id . "/Big/" . ($bfiles[count($bfiles)-1]+1) . "." . $extension);
                $resize = new ResizeImage("../Uploads/" . $content);
                $resize->resizeTo(218, 163, 'exact');
                $resize->saveImage("../Uploads/Estates/" . $id . "/Small/" . ($bfiles[count($bfiles)-1]+1) . "." . $extension);
            }else
            {
                $resize = new ResizeImage("../Uploads/" . $content);
                $resize->resizeTo(640, 480, 'exact');
                $resize->saveImage("../Uploads/Estates/" . $id . "/Big/" . "1" . "." . $extension);
                $resize = new ResizeImage("../Uploads/" . $content);
                $resize->resizeTo(218, 163, 'exact');
                $resize->saveImage("../Uploads/Estates/" . $id . "/Small/" . "1" . "." . $extension);
                
                
            }
            

//            copy("../Uploads/" . $content, "../Uploads/Estates/" . $id . "/Big/" . (count($bfiles) + 1) . "." . $extension);
//            copy("../Uploads/" . $content, "../Uploads/Estates/" . $id . "/Small/" . (count($bfiles) + 1) . "." . $extension);
            //copy("../Uploads/" . $content, "../Uploads/Estates/" . $id . "/" . $content);

            echo "Stored in: " . "Uploads/" . $name;
        }
    }
} else {
    echo "Invalid file";
}
?>



<?php
//date_default_timezone_set('America/Los_Angeles');
//include_once '../Classes/PHPExcel/IOFactory.php';
//$inputFileName = '../Uploads/' . $content;
//echo $inputFileName;
//  Read your Excel workbook
//try {
//    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
//    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
//    $objPHPExcel = $objReader->load($inputFileName);
//} catch (Exception $e) {
//    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
//            . '": ' . $e->getMessage());
//}
//
////  Get worksheet dimensions
//$sheet = $objPHPExcel->getSheet(0);
//$highestRow = $sheet->getHighestRow();
//$highestColumn = $sheet->getHighestColumn();
//
////  Loop through each row of the worksheet in turn
//
?>
<!--<form method="post" id="form1" name="form1" action="UploadingStudentsDone.php" >
    <input type="hidden" name="filename" id="filename" value='//<?php echo $inputFileName; ?>' />
    <table  border="1" cellpadding="5" cellspacing="5"  class="ViewTable">
        <tr>
            <th>نوع عملیات</th>
            <th>انتخاب</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>کد ملی</th>
            <th>رمز عبور</th>
        </tr>

        //<?php
for ($row = 1; $row <= $highestRow; $row++) {
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    //foreach ($rowData[0] as $k => $v)
    //   echo "Row: " . $row . "- Col: " . ($k + 1) . " = " . $v . "<br />";
    //$string=implode(",",$rowData[0]);
    echo '<tr>';
    //echo $string . "<br />";
    if (StudentEx::CheckExists($rowData[0][2]) == TRUE) {
        echo '<td>' . 'ویرایش' . '</td>';
    } else {
        echo '<td>' . 'درج' . '</td>';
    }
    echo "<td><input type='checkbox' id='checked[]' name='checked[]' value='" . $row . "' checked='1' /></td>";
    echo "<td>" . $rowData[0][0] . "</td>";
    echo "<td>" . $rowData[0][1] . "</td>";
    echo "<td>" . $rowData[0][2] . "</td>";
    echo "<td>" . $rowData[0][3] . "</td>";
    echo "</tr>";
}
?>
        <tr>
            <td colspan="6" ><input type="submit" name="button" id="button" value="ثبت" /> </td>
        </tr>
    </table>
    
</form> -->




<?php
//if ($cm == 'edit') {
//    StudentEx::Update($student);
//} else {
//    StudentEx::Insert($student);
//}
//
header("Location: UploadEstateImages.php?id=" . $id);
?>


<?php
//include_once 'Template/footer.php';
?>


<?php
//require_once '../Classes/StudentEx.inc';
require_once '../Classes/ResizeImage.inc';
?>
<?php
//include_once 'Template/header.php';
//include_once 'Template/menu.php';
$id = $_POST['id'];
$files= $_POST['files'];

unlink("../Uploads/Estates/" . $id . "/Big/" . $files);
unlink("../Uploads/Estates/" . $id . "/Small/" . $files);

header("Location: UploadEstateImages.php?id=" . $id);
?>

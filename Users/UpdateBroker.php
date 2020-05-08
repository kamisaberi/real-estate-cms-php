
<?php

require_once '../Classes/BrokerEx.inc';


require_once '../Classes/LoggedinUserEx.inc';

if (LoggedinUserEx::CheckLoggedinUserIsAdminOrBroker($_COOKIE['User']) != 'Admin') {
    header("Location: Index.php");
    die();
}


$cm = $_POST['command'];
//echo $cm;
$teacherid = $_POST['brokerid'];
$name= $_POST['name'];
$address= $_POST['address'];

$broker = new Broker();
$broker->BrokerId = $teacherid;
$broker->Name = $name;
$broker->Address = $address;
if ($cm == 'edit') {
    BrokerEx::Update($broker);
} else {
    BrokerEx::Insert($broker);
}
//proc_open('C:/xampp/php/php ping.php&', $descriptorspec, $pipes);
//shell_exec('C:/xampp/php/php ping.php');

//// MAIN
            //exec("start /B C:/xampp/php/php ping.php");
///////

//file_put_contents('test.txt', 'asjgajsgdjsagjadgs');
header("Location: Brokers.php");




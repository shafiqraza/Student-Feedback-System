<?php
$db = [
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => '',
    'db_name'=>'sfs'
];

$connection = mysqli_connect($db['db_host'],$db['db_user'],$db['db_pass'],$db['db_name']);

//if($connection){
//    echo "CONNECTION IS DONE ";
//}else{
//    die("CONNET IS NOT DONE");
//}
?>
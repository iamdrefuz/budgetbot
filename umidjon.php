<?php

define("DB_SERVER","localhost"); 
define("DB_USERNAME","theyupiter_openbudget"); //login
define("DB_PASSWORD","OpenBudget"); //password
define("DB_NAME","theyupiter_openbudget");//login

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
mysqli_set_charset($db,"utf8mb4");
if($db){
echo 'ULANDI';
}else{
echo 'ULANMADI';
}

mysqli_query($db," CREATE TABLE users(
`id` int(20) auto_increment primary key,
`user_id` varchar(100),
`balance` varchar(100),
`status` varchar(100),
`referal` varchar(100),
`outing` varchar(100)
)");

?>
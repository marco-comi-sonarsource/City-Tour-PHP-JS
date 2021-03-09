<?php

$email = Yii::app()->request->getParam('email');
$emailSafe = mysql_escape_string($email);

if ($email === "test@test.com")
{
    $sql1 = "SELECT * FROM USERS WHERE email = '$email'";
}
else 
{
    $sql1 = "SELECT * FROM USERS_TEST WHERE email = '$email'";
}
$sql2 = "SELECT * FROM USERS WHERE email = '$emailSafe'";

mysql_query($sql1);
mysql_query($sql2);

$myCommand1 = Yii::app()->getDb()->createCommand($sql1);
$myCommand1->query();

$myCommand2 = Yii::app()->getDb()->createCommand($sql2);
$myCommand2->query();

?>

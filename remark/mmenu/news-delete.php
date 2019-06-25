<?php
include_once 'config.php';

$id = $_POST['id'];
$path = $_POST['path'];
unlink($path);
unlink(substr($path,0,-3)."txt");
$path1 = substr($path,0,strrpos($path,'/'));
if(rmdir($path1)){
}
$query = "delete from news where news_id=".$id;

$con->query($query);
header('Location: news-view.php');
?>
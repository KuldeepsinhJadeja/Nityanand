<?php
include_once 'config.php';

$query = "delete from news where id=".$_POST['id'].";

$con->query($query);
header(location:'news-view.php');
?>
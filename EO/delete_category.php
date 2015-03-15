<?php 
include_once('core/init.php');
if(! isset($_GET['id'])){
	hearder('Location:index.php');
	die();
}

delete('categories',$_GET['id']);

header('Location:category_list.php');
die();

?>
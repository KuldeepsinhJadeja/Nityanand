<?php
		include_once 'config.php';
		$title = $_REQUEST['title'];
		$category = $_REQUEST['category'];
		$desc = $_REQUEST['desc'];
		$content = $_REQUEST['content'];

		$path = "uploads/blog-images";

		$target_path = $path.'/'.$title;
		
		$file1 = basename($_FILES['file1']['name']);
		$target_file1 = $target_path.'/'.$file1;

		$file2 = basename($_FILES['file2']['name']);
		$target_file2 = $target_path.'/'.$file2;
		if(!file_exists($path.'/'.$title))
		{
			mkdir($path.'/'.$title);
		}
		move_uploaded_file($_FILES['file1']['tmp_name'],$target_file1);
		move_uploaded_file($_FILES['file2']['tmp_name'],$target_file2);
		$query = "insert into blog (blog_title,blog_category,blog_desc,image1_path,image2_path,content) 
				  values ('".$title."','".$category."','".$desc."','".$target_file1."','".$target_file2."','".$content."');";
		echo $query;
		$con->query($query);
		$con->close();
		header('Location: blog_view-blogs.php');
?>
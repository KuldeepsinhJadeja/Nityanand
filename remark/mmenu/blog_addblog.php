<?php
		include_once 'config.php';
		$title = $_REQUEST['title'];
		$category = $_REQUEST['category'];
		$desc = $_REQUEST['desc'];
		$content = $_REQUEST['content'];
		$url = $_REQUEST['url'];
		// $url2=array();
		$url2="hiii";
		if (strpos($url, 'watch?v=') !== false) { 
			// echo $key . ' not exists in the URL <br>'; 
			$url2 = str_replace("watch?v=","embed/",$url);
		} 
		else { 
			echo ' exists in the URL <br>'; 
		} 
		$path = "uploads/blog-images";

		$target_path = $path.'/'.$title;
		
		$filet = basename($_FILES['filet']['name']);
		if($filet=='' || $filet==null)
			$target_filet = null;
		else
			$target_filet = $target_path.'/'.$filet;

		$file1 = basename($_FILES['file1']['name']);
		if($file1=='' || $file1==null)
			$target_file1 = null;
		else
			$target_file1 = $target_path.'/'.$file1;

		$file2 = basename($_FILES['file2']['name']);
		if($file2=='' || $file2==null)
			$target_file2 = null;
		else
			$target_file2 = $target_path.'/'.$file2;
		
		if(!file_exists($path.'/'.$title))
		{
			mkdir($path.'/'.$title);
		}
		move_uploaded_file($_FILES['filet']['tmp_name'],$target_filet);
		move_uploaded_file($_FILES['file1']['tmp_name'],$target_file1);
		move_uploaded_file($_FILES['file2']['tmp_name'],$target_file2);
		$query = "insert into blog (blog_title,blog_category,blog_desc,title_image_path,image1_path,image2_path,video_url,content) 
				  values ('".$title."','".$category."','".$desc."','".$target_filet."','".$target_file1."','".$target_file2."','".$url2."','".$content."');";
		// echo $query;
		$con->query($query);
		$con->close();
		header('Location: blog_view-blogs.php');
?>
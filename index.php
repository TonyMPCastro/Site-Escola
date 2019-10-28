<?php

			$url = (isset($_GET['url'])) ? $_GET['url']:'home.php';
			$url = array_filter(explode('/',$url));
			
			$file = $url[0].'.php';
			
			if(is_file($file)){
				include $file;
			}else{
				header('Location: 404');
			}
?>
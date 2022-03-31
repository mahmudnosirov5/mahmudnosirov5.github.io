<?php  

foreach (range(23, 58) as $id) {
	$data = file_get_contents("full_news.php");
	$file = fopen("news/news-$id.php", "w");

	$identifier = '<?php $id = ' .  $id . "; ?>\n\n"; 
	fwrite($file, $identifier);
	fclose($file);

	$file = fopen("news/news-$id.php", "a");
	fwrite($file, $data);
	fclose($file);
}

?>
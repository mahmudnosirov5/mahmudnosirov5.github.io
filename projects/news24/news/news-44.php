<?php $id = 44; ?>

<?php require_once "header.php" ?>

<?php  

$mysql = new mysqli("localhost", "root", "root", "news24");
$mysql->query('SET NAMES "utf8"');

$last_news_list = $mysql->query("SELECT * FROM news ORDER BY `ID` DESC LIMIT 10");
$image_direction = "../img/news";

$news = $mysql->query("SELECT * FROM news WHERE `ID` = $id");
$news = $news->fetch_assoc();

$news_category = $news['CATEGORY'];
$similar_news_list = $mysql->query("SELECT * FROM news WHERE `CATEGORY` = '$news_category' ORDER BY `ID` DESC LIMIT 8");

?>

<div class="main">
	<div class="left">
		<div class="categories">
			<div class="round"></div>
			<span>Последние новости</span>
		</div>

		<?php  foreach (range(1, 5) as $key){
			$last_news = $last_news_list->fetch_assoc(); ?>

			<?php echo "<a href='news-". $last_news['ID'] . ".php'>"?>
			<div class="last_news">
				<div class="time"><?php echo $last_news['DATE']; ?></div>
				<div class="heading"><?php echo $last_news['HEADING']; ?></div>
			</div></a>

		<?php } ?>

	</div>
	<div class="center">
		<div class="header">
			<div class="time"><?php echo $news['DATE']; ?></div>
			<div class="view"><?php echo mt_rand(1000, 10000); ?></div>
		</div>
		<div class="heading"><?php echo $news['HEADING']; ?></div>
		<div class="main-info"><?php echo $news['MAIN_INFO']; ?></div>
		<?php echo "<img src='" . "$image_direction/news-" . $news['ID'] . "." . $news['IMAGE_FORMAT'] . "'>"; ?>
		<div class="content"><?php echo preg_replace( "#\r?\n#", "<br />", $news['CONTENT']); ?></div>
	</div>
	<div class="right">
		<div class="categories">
			<div class="round"></div>
			<span>Советуем прочитать</span>
		</div>

		<?php  foreach (range(1, 5) as $key){
			$last_news = $last_news_list->fetch_assoc(); ?>

			<?php echo "<a href='news-". $last_news['ID'] . ".php'>"?>
			<div class="last_news">
				<div class="time"><?php echo $last_news['DATE']; ?></div>
				<div class="heading"><?php echo $last_news['HEADING']; ?></div>
			</div></a>

		<?php } ?>

	</div>
</div>

<div class="big_advertising big_add">
	<a href="#"><img src="../img/advertising-3.jpg" alt=""></a>
</div>

<div class="similar_news">
	<div class="categories">
		<div class="round"></div>
		<span>Новости по теме</span>
	</div>
	<div class="news_block">
		<div class="row-1">

			<?php foreach (range(1, 4) as $key) {
				$similar_news = $similar_news_list->fetch_assoc();
				echo "<a href='news-". $similar_news['ID'] . ".php'>"; ?>

				<div class="news">
					<?php echo "<img src='" . "$image_direction/news-" . $similar_news['ID'] . "." . $similar_news['IMAGE_FORMAT'] . "'>"; ?>
					<div class="time"><?php echo $similar_news['DATE']; ?></div>
					<div class="heading"><?php echo $similar_news['HEADING']; ?></div>
				</div></a>

			<?php } ?>

		</div>
		<div class="row-2">

			<?php foreach (range(1, 4) as $key) {
				$similar_news = $similar_news_list->fetch_assoc();
				echo "<a href='news-". $similar_news['ID'] . ".php'>"; ?>

				<div class="news">
					<?php echo "<img src='" . "$image_direction/news-" . $similar_news['ID'] . "." . $similar_news['IMAGE_FORMAT'] . "'>"; ?>
					<div class="time"><?php echo $similar_news['DATE']; ?></div>
					<div class="heading"><?php echo $similar_news['HEADING']; ?></div>
				</div></a>

			<?php } ?>

		</div>
	</div>
</div>

<?php require_once "footer.php" ?>
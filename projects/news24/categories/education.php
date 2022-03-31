<?php require_once "header.php" ?>

<?php 

$mysql = new mysqli("localhost", "root", "root", "news24");
$mysql->query('SET NAMES "utf8"');

$categories_education_count = $mysql->query("SELECT COUNT(*) FROM news WHERE `CATEGORY` = 'education'");
$categories_education_count = $categories_education_count->fetch_assoc();
$categories_education_count = $categories_education_count['COUNT(*)'];
$amount = floor(($categories_education_count - 5) / 4) + 5;

$categories_education = $mysql->query("SELECT * FROM news WHERE `CATEGORY` = 'education' ORDER BY `ID` DESC LIMIT $amount");
$last_news_list = $mysql->query("SELECT * FROM news ORDER BY `ID` DESC LIMIT 5");

$image_direction = "img/news";

?>

<div class="categories categories_page">
	<div class="round"></div>
	<span>ОСНОВНЫЕ НОВОСТИ В РУБРИКЕ ОБРАЗОВАНИЕ</span>
</div>

<div class="part-1">
	<div class="left">

		<?php $categories_education_big = $categories_education->fetch_assoc(); ?>

		<?php echo "<a href='../news/news-". $categories_education_big['ID'] . ".php'>"?>
		<div class="big">
			<?php echo "<img src='../" . "$image_direction/news-" . $categories_education_big['ID'] . "." . $categories_education_big['IMAGE_FORMAT'] . "'>"; ?>
			<div class="text">
				<div class="date">
				<img src="../img/calendar.png" alt="">
					<span><?php echo $categories_education_big['DATE']; ?></span>
				</div>
				<div class="heading"><?php echo $categories_education_big['HEADING']; ?></div>
				<div class="main-info"><?php echo $categories_education_big['MAIN_INFO']; ?></div>
			</div>
		</div></a>
		<div class="small_block">

		<?php foreach (range(1, 4) as $key) {
			$categories_education_small = $categories_education->fetch_assoc() ?>

			<?php echo "<a href='../news/news-". $categories_education_small['ID'] . ".php'>"?>
			<div class="small">
				<?php echo "<img src='../" . "$image_direction/news-" . $categories_education_small['ID'] . "." . $categories_education_small['IMAGE_FORMAT'] . "'>"; ?>
				<div class="text">
					<div class="date">
						<img src="../img/calendar.png" alt="">
						<span><?php echo $categories_education_small['DATE']; ?></span>
					</div>
					<div class="heading"><?php echo $categories_education_small['HEADING']; ?></div>
				</div>
			</div></a>

		<?php } ?>

		</div>
	</div>
	<div class="right">
		<div class="categories">
			<div class="round"></div>
			<span>Последние новости</span>
		</div>

		<?php  while($last_news = $last_news_list->fetch_assoc()){ ?>

			<div class="last_news">
				<?php echo "<a href='../news/news-". $last_news['ID'] . ".php'>"?>
				<div class="date">
					<img src="../img/calendar.png" alt="">
					<span><?php echo $last_news['DATE']; ?></span>
				</div>
				<div class="heading"><?php echo $last_news['HEADING']; ?></div>
				</a>
			</div>

		<?php } ?>

	</div>
</div>

<div class="part-2">
	<div class="small_news_block small_news_block_categories">

		<?php while($categories_education_small_news = $categories_education->fetch_assoc()){ ?>

			<?php echo "<a href='../news/news-". $categories_education_small_news['ID'] . ".php'>"?>
			<div class="small_news">
				<?php echo "<img src='../" . "$image_direction/news-" . $categories_education_small_news['ID'] . "." . $categories_education_small_news['IMAGE_FORMAT'] . "'>"; ?>
				<div class="heading"><?php echo $categories_education_small_news['HEADING']; ?></div>
			</div></a>

		<?php } ?>

	</div>
</div>

<?php require_once "footer.php" ?>
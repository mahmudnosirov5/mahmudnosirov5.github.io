<?php require_once "header.php" ?>

<?php 

$mysql = new mysqli("localhost", "root", "root", "news24");
$mysql->query('SET NAMES "utf8"');

$categories_world_count = $mysql->query("SELECT COUNT(*) FROM news WHERE `CATEGORY` = 'world'");
$categories_world_count = $categories_world_count->fetch_assoc();
$categories_world_count = $categories_world_count['COUNT(*)'];
$amount = floor(($categories_world_count - 5) / 4) + 5;

$categories_world = $mysql->query("SELECT * FROM news WHERE `CATEGORY` = 'world' ORDER BY `ID` DESC LIMIT $amount");
$last_news_list = $mysql->query("SELECT * FROM news ORDER BY `ID` DESC LIMIT 5");

$image_direction = "img/news";

?>

<div class="categories categories_page">
	<div class="round"></div>
	<span>ОСНОВНЫЕ НОВОСТИ В РУБРИКЕ МИР</span>
</div>

<div class="part-1">
	<div class="left">
	
		<?php $categories_world_big = $categories_world->fetch_assoc(); ?>

		<?php echo "<a href='../news/news-". $categories_world_big['ID'] . ".php'>"?>
		<div class="big">
			<?php echo "<img src='../" . "$image_direction/news-" . $categories_world_big['ID'] . "." . $categories_world_big['IMAGE_FORMAT'] . "'>"; ?>
			<div class="text">
				<div class="date">
				<img src="../img/calendar.png" alt="">
					<span><?php echo $categories_world_big['DATE']; ?></span>
				</div>
				<div class="heading"><?php echo $categories_world_big['HEADING']; ?></div>
				<div class="main-info"><?php echo $categories_world_big['MAIN_INFO']; ?></div>
			</div>
		</div></a>
		<div class="small_block">

		<?php foreach (range(1, 4) as $key) {
			$categories_world_small = $categories_world->fetch_assoc() ?>

			<?php echo "<a href='../news/news-". $categories_world_small['ID'] . ".php'>"?>
			<div class="small">
				<?php echo "<img src='../" . "$image_direction/news-" . $categories_world_small['ID'] . "." . $categories_world_small['IMAGE_FORMAT'] . "'>"; ?>
				<div class="text">
					<div class="date">
						<img src="../img/calendar.png" alt="">
						<span><?php echo $categories_world_small['DATE']; ?></span>
					</div>
					<div class="heading"><?php echo $categories_world_small['HEADING']; ?></div>
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

		<?php while($categories_world_small_news = $categories_world->fetch_assoc()){ ?>

		<?php echo "<a href='../news/news-". $categories_world_small_news['ID'] . ".php'>"?>
		<div class="small_news">
			<?php echo "<img src='../" . "$image_direction/news-" . $categories_world_small_news['ID'] . "." . $categories_world_small_news['IMAGE_FORMAT'] . "'>"; ?>
			<div class="heading"><?php echo $categories_world_small_news['HEADING']; ?></div>
		</div></a>

		<?php } ?>

	</div>
</div>

<?php require_once "footer.php" ?>
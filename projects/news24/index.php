<?php require_once "page/header.php" ?>

<?php  

$mysql = new mysqli("localhost", "root", "root", "news24");
$mysql->query('SET NAMES "utf8"');

$categories = array();

$categories['different'] = $mysql->query("SELECT * FROM news WHERE `CATEGORY` = 'different' ORDER BY `ID` DESC LIMIT 5");
$categories['uzbekistan'] = $mysql->query("SELECT * FROM news WHERE `CATEGORY` = 'uzbekistan' ORDER BY `ID` DESC LIMIT 6");
$categories['world'] = $mysql->query("SELECT * FROM news WHERE `CATEGORY` = 'world' ORDER BY `ID` DESC LIMIT 5");

$last_news_list = $mysql->query("SELECT * FROM news ORDER BY `ID` DESC LIMIT 5");

$image_direction = "img/news";

?>

<div class="part-1">
	<div class="left">

		<?php $categories_different_big = $categories['different']->fetch_assoc(); ?>

		<?php echo "<a href='news/news-". $categories_different_big['ID'] . ".php'>"?>
			<div class="big">
				<?php echo "<img src='" . "$image_direction/news-" . $categories_different_big['ID'] . "." . $categories_different_big['IMAGE_FORMAT'] . "'>"; ?>
				<div class="text">
					<div class="date">
					<img src="img/calendar.png" alt="">
						<span><?php echo $categories_different_big['DATE']; ?></span>
					</div>
					<div class="heading"><?php echo $categories_different_big['HEADING']; ?></div>
					<div class="main-info"><?php echo $categories_different_big['MAIN_INFO']; ?></div>
				</div>
			</div>
		</a>
		<div class="small_block">

		<?php while($categories_different_small = $categories['different']->fetch_assoc()){ ?>

		<?php echo "<a href='news/news-". $categories_different_small['ID'] . ".php'>"?>
			<div class="small">
				<?php echo "<img src='" . "$image_direction/news-" . $categories_different_small['ID'] . "." . $categories_different_small['IMAGE_FORMAT'] . "'>"; ?>
				<div class="text">
					<div class="date">
						<img src="img/calendar.png" alt="">
						<span><?php echo $categories_different_small['DATE']; ?></span>
					</div>
					<div class="heading"><?php echo $categories_different_small['HEADING']; ?></div>
				</div>
			</div>
			</a>

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
				<?php echo "<a href='news/news-". $last_news['ID'] . ".php'>"?>
					<div class="date">
						<img src="img/calendar.png" alt="">
						<span><?php echo $last_news['DATE']; ?></span>
					</div>
					<div class="heading"><?php echo $last_news['HEADING']; ?></div>
				</a>
			</div>

		<?php } ?>

	</div>
</div>

<div class="big_advertising">
	<a href="#"><img src="img/advertising-3.jpg" alt=""></a>
</div>

<div class="part-2">
	<a href="categories/uzbekistan.php">
		<div class="categories">
			<div class="round"></div>
			<span>Узбекистан</span>
		</div>
	</a>
	<div class="big_news_block">

		<?php foreach (range(1, 2) as $key) { 
			$categories_uzbekistan_big = $categories['uzbekistan']->fetch_assoc(); ?>
		
		<?php echo "<a href='news/news-". $categories_uzbekistan_big['ID'] . ".php'>"?>
		<div class="big_news">
			<?php echo "<img src='" . "$image_direction/news-" . $categories_uzbekistan_big['ID'] . "." . $categories_uzbekistan_big['IMAGE_FORMAT'] . "'>"; ?>
			<div class="text">
				<div class="heading"><?php echo $categories_uzbekistan_big['HEADING']; ?></div>
				<div class="main-info"><?php echo $categories_uzbekistan_big['MAIN_INFO']; ?></div>
			</div>
		</div>
		</a>
		
		<?php } ?>

	</div>
	<div class="small_news_block">

		<?php while($categories_uzbekistan_small = $categories['uzbekistan']->fetch_assoc()){ ?>
		
		<?php echo "<a href='news/news-". $categories_uzbekistan_small['ID'] . ".php'>"?>
		<div class="small_news">
			<?php echo "<img src='" . "$image_direction/news-" . $categories_uzbekistan_small['ID'] . "." . $categories_uzbekistan_small['IMAGE_FORMAT'] . "'>"; ?>
			<div class="heading"><?php echo $categories_uzbekistan_small['HEADING']; ?></div>
		</div>
		</a>

		<?php  } ?>

	</div>
</div>

<div class="big_advertising">
	<a href="#"><img src="img/advertising-5.jpg" alt=""></a>
</div>

<div class="part-3">
	<a href="categories/world.php">
		<div class="categories">
			<div class="round"></div>
			<span>Мир</span>
		</div>
	</a>
	<div class="news_block">
		
		<?php $categories_world_big = $categories['world']->fetch_assoc(); ?>

		<?php echo "<a href='news/news-". $categories_world_big['ID'] . ".php'>"?>
		<div class="big_news">
			<?php echo "<img src='" . "$image_direction/news-" . $categories_world_big['ID'] . "." . $categories_world_big['IMAGE_FORMAT'] . "'>"; ?>
			<div class="text">
				<div class="heading"><?php echo $categories_world_big['HEADING']; ?></div>
				<div class="main-info"><?php echo $categories_world_big['MAIN_INFO']; ?></div>
			</div>
		</div>
		</a>
		
		<div class="small_news_block">

			<?php while($categories_world_small = $categories['world']->fetch_assoc()){ ?>
			
				<?php echo "<a href='news/news-". $categories_world_small['ID'] . ".php'>"?>
				<div class="small_news">
					<?php echo "<img src='" . "$image_direction/news-" . $categories_world_small['ID'] . "." . $categories_world_small['IMAGE_FORMAT'] . "'>"; ?>
					<div class="heading"><?php echo $categories_world_small['HEADING']; ?></div>
				</div>
				</a>
			
			<?php } ?>

		</div>
	</div>
</div>

<?php require_once "page/footer.php" ?>
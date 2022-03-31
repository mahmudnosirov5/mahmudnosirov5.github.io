<?php require_once "page/header.php" ?>

<div class="main">
	<div class="left">
		<div class="categories">
			<div class="round"></div>
			<span>Последние новости</span>
		</div>
		<div class="last_news">
			<div class="time">17:00</div>
			<div class="heading">В Новосибирске взорвалась АЗС. Пострадали 30 человек</div>
		</div>
		<div class="last_news">
			<div class="time">16:15</div>
			<div class="heading">Путин ответил на вопрос о приказе убить Навального</div>
		</div>
		<div class="last_news">
			<div class="time">13:25</div>
			<div class="heading">На лайнере, где все были привиты от COVID-19, выявили случаи заражения</div>
		</div>
		<div class="last_news">
			<div class="time">12:50</div>
			<div class="heading">Названы отличительные симптомы индийского штамма коронавируса</div>
		</div>
		<div class="last_news">
			<div class="time">08:10</div>
			<div class="heading">Метро строят – щепки летят. Не погибнут ли деревья, пересаженные в летний зной</div>
		</div>
		<div class="last_news">
			<div class="time">05:25</div>
			<div class="heading">В МНО объявили график и порядок проведения госэкзаменов</div>
		</div>
		<div class="last_news">
			<div class="time">01:05</div>
			<div class="heading">Появились фотографии первого легкого бронетранспортера узбекского производства</div>
		</div>
	</div>
	<div class="center">
		<form action="add_news.php" method="post" enctype="multipart/form-data">
			<div class="add_news_heading">Добавление новости</div>
			<input type="text" name="new_news_heading" class="new_news_heading" placeholder="Заголовок">
			<textarea name="new_news_main-info" class="new_news_main-info" placeholder="Главная информация"></textarea>
			<input type="file" name="new_news_image" class="new_news_image">
			<textarea name="new_news_content" class="new_news_content" placeholder="Содержимое"></textarea>
			<div class="choose_category">
				<div class="text">Выберите категорию</div>
				<div class="category_block">
					<div class="category">
						<input type="radio" name="category" value="uzbekistan" id="Uzbekistan">
						<label for="Uzbekistan">Узбекистан</label>
					</div>
					<div class="category">
						<input type="radio" name="category" value="world" id="World">
						<label for="World">Мир</label>
					</div>
					<div class="category">
						<input type="radio" name="category" value="society" id="Society">
						<label for="Society">Общество</label>
					</div>
					<div class="category">
						<input type="radio" name="category" value="education" id="Education">
						<label for="Education">Образование</label>
					</div>
					<div class="category">
						<input type="radio" name="category" value="different" id="Different">
						<label for="Different">Разное</label>
					</div>
				</div>	
			</div>
			<input type="submit" class="submit" value="Добавить" name="doUpload">
		</form>
	</div>
	<div class="right">
		<div class="categories">
			<div class="round"></div>
			<span>Советуем прочитать</span>
		</div>
		<div class="last_news">
			<div class="time">17:00 / 14.06.2021</div>
			<div class="heading">В Новосибирске взорвалась АЗС. Пострадали 30 человек</div>
		</div>
		<div class="last_news">
			<div class="time">16:15 / 14.06.2021</div>
			<div class="heading">Путин ответил на вопрос о приказе убить Навального</div>
		</div>
		<div class="last_news">
			<div class="time">13:25 / 12.06.2021</div>
			<div class="heading">На лайнере, где все были привиты от COVID-19, выявили случаи заражения</div>
		</div>
		<div class="last_news">
			<div class="time">12:50 / 10.06.2021</div>
			<div class="heading">Названы отличительные симптомы индийского штамма коронавируса</div>
		</div>
		<div class="last_news">
			<div class="time">08:10 / 10.06.2021</div>
			<div class="heading">Метро строят – щепки летят. Не погибнут ли деревья, пересаженные в летний зной</div>
		</div>
		<div class="last_news">
			<div class="time">05:25 / 07.06.2021</div>
			<div class="heading">В МНО объявили график и порядок проведения госэкзаменов</div>
		</div>
		<div class="last_news">
			<div class="time">01:05 / 05.06.2021</div>
			<div class="heading">Появились фотографии первого легкого бронетранспортера узбекского производства</div>
		</div>
	</div>
</div>

<?php 

function image_format(){
	$data = $_FILES['new_news_image'];
    $image = $data['tmp_name'];
    
    if (file_exists($image)) {
        $info = getimagesize($_FILES['new_news_image']['tmp_name']);
        preg_match('{image/(.*)}is', $info['mime'], $format);
	}
	
	return $format[1];
}

$heading = $_POST['new_news_heading'];
$main_info = $_POST['new_news_main-info'];
$content = $_POST['new_news_content'];
$category = $_POST['category'];
$image_format = image_format();

$date = new DateTime("", new DateTimeZone("Asia/Tashkent"));
$date = $date->format("H:i / d.m.Y");

function save_image($id){
    $img_direction = "img/news"; 

    if (!file_exists($img_direction))
        mkdir($img_direction, 0777); 
 
    $data = $_FILES['new_news_image'];
    $image = $data['tmp_name'];
 
    if (file_exists($image)) {
        $info = getimagesize($_FILES['new_news_image']['tmp_name']);

        if (preg_match('{image/(.*)}is', $info['mime'], $format)) {
            
            $direction = "$img_direction/news-$id.". $format[1];
            move_uploaded_file($image, $direction);

        } else { echo "<h2>Попытка добавить файл недопустимого формата!</h2>"; }
    } else { echo "<h2>Ошибка закачки #{$data['error']}!</h2>"; }
}

if(isset($_REQUEST['doUpload'])){
	if($heading and $main_info and $content){
		$mysql = new mysqli("localhost", "root", "root", "news24");
		$mysql->query('SET NAMES "utf8"');
		$mysql->query("INSERT INTO news (`HEADING`,`MAIN_INFO`,`CONTENT`,`DATE`,`CATEGORY`, `IMAGE_FORMAT`) VALUES ('$heading','$main_info','$content','$date','$category', '$image_format')");

		$id = $mysql->query("SELECT max(`ID`) FROM news");
		$id = $id->fetch_assoc();
		$id = $id["max(`ID`)"];
		save_image($id);
	}
}

$data = file_get_contents("full_news.php");
$file = fopen("news/news-$id.php", "w");

$identifier = '<?php $id = ' .  $id . "; ?>\n\n"; 
fwrite($file, $identifier);
fclose($file);

$file = fopen("news/news-$id.php", "a");
fwrite($file, $data);
fclose($file);
	
?>

<?php require_once "page/footer.php" ?>
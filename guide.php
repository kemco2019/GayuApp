<?php
$select = $_POST["select"];
if(!$_POST["select"]){
	header('Location: index.html');
}
$host = "mysql57.kemco.sakura.ne.jp";
$dbName = "kemco_gayu";
$username = "kemco";
$password = "h76-id_z";

$dsn = "mysql:host={$host};dbname={$dbName};charser=utf8";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    $sql = 'SELECT * FROM gayu_iine';
    $stmt = $dbh->prepare($sql);
    //$stmt->bindValue(':id', 7, PDO::PARAM_INT);
try {
    $stmt->execute();
} catch (PDOException $e) {
    echo $e->getMessage();
}
    $iines = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = count($iines);
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/works.css">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/remix.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">



    <!-- script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>
    <script src="js/changeLang.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="js/audio1.js"></script>
	<script src="js/scroll.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="js/jquery.layerBoard.js"></script>
	<script type="text/javascript" src="piece_ajax.js"></script>
    <script>
        $(function(){
            $('#layer_board_area').layerBoard({alpha:0});
        })
    </script>
</head>


<body>	
<!-- Common Contents -->
<div class="main">
	<div class="commonContent">
		<img src="images/kemco_logo.png" id="kemlogo">
	</div>
	<div class="select_sec">
		<div class="level_tab_<?php echo $select; ?>">
			<!--<?php if ($select == "easy"){ ?>
				<img src="images/easy_tab.png" id="bg">
			<?php } else if ($select =="hard"){ ?>
				<img src="images/hard_tab.png" id="bg">
			<?php } ?>--->
			<a href="index.html"><img src="images/homeback.png" id="botton"></a>
		</div>
		<div class="select_tab">
			<a href="#chapter01Link"><img src="images/tab1.png" alt="I." id="select"></a>
			<a href="#chapter03Link"><img src="images/tab3.png" alt="III." id="select"></a>
			<a href="#chapter04Link"><img src="images/tab4.png" alt="III." id="select"></a>
			<a href="iine_rank.php" target="_blank"><img src="images/iine.png" alt="III." id="select"></a>
		</div>
	</div>
<!-- end Common Contents -->
<?php 
	for($j=1 ; $j<=4 ; $j++){
?>
<hr>
<!-- 各章 -->
<?php
	if( $j == 1 | $j == 3 | $j == 4 ){
?>
<a id="chapter0<?php echo $j; ?>Link" class="anchorLink"></a>
<div class="bigTitle">
	<?php
		$file_title = 'csv/titles.csv';
		$lines_title = file($file_title);
        $line_title = $lines_title[$j-1];
		$data_title = explode(',', $line_title);
	?>
	<img src="images/<?php echo $data_title[1]; ?>" >
</div>
<?php
	}
?>

	<!-- 章タイトル -->
	<div class="titleBox">
		<?php
			$file = 'csv/sec'.$j.'_'.$select.'.csv';
			$lines = file($file);
    		$line = $lines[0];
			$data = explode(',', $line);
		?>
		<div id="session_name"><?php echo $data[1]; ?></div>
</div>
	<!-- 章タイトル終わり -->
	<!-- 章の説明 -->
	<div class="txtBox">
		<?php echo $data[4]; ?>
		
	</div>
	<!--章の説明終わり -->
	<details>
		<summary>作品一覧を見る</summary>
		<section id="about" class="s-about target-section large-3 medium-12">
			<?php
            	for($i=1; $i < count($lines); $i++){ 
        		$line = $lines[$i];
				$data = explode(',', $line);
			?>
			<!-- 作品説明 -->
			<div class="section-head">
				<!-- 作品タイトル -->
				<div class="midashi">
					<div id="midashi_num" class="section<?php echo $j; ?>">
						<?php echo $data[0];
						if($data[2] == "TRUE") {
							for ($k = 0 ; $k < $count ; $k ++){
								if ($iines[$k]['id'] == $data[0]){
									$worknum = $k;
									
								}
							}
							echo '<div class="piece_item">'; // iine
							echo '<div class="post" data-postid="' . $iines[$worknum]['id'] . '" data-imagenum="' . $count . '" data-inum="' . $iines[$worknum]['iine'] . '">';
							echo '<div class="btn-good" >'; ?>
							<i class="far fa-heart"></i>
							<?php echo '<span id="iineNum'.$iines[$worknum]['id'].'">'. $iines[$worknum]['iine'] . '</span>';
							echo '</div>';
							echo '</div>';
							echo '</div>'; //iine
						}
						?>
					</div>
					<div id="midashi_detail">
						<div id="txt_m">
							<?php echo $data[5]; ?>
						</div>
						<div id="txt_l">
							<?php echo $data[1]; ?>
						</div>
						<div id="txt_m">
							<?php echo $data[7]; ?>
						</div>
						<div id="txt_s">
							<?php echo $data[6]; ?>
						</div>
						<div id="txt_s">
							<?php echo $data[8]; ?>
						</div>
					</div>
				</div>
				<!-- 作品詳細 -->
				<?php if($data[2] == "TRUE"){ ?>
					<div class="slider-x">
						<img src="images/works/<?php echo $data[0]; ?>.jpg" >
					</div>
				<?php } ?> 
				<?php if ($data[3]=="TRUE"){ ?>
				<details>
				<summary>作品解説を読む</summary>
					<div class="work_txt">
						<?php echo $data[4]; ?>
					</div>
                </details>
				<?php } ?>
			</div> 
			<!-- 作品説明終わり -->
			<?php } ?>
		</section>
	</details>
	<!-- 各章終わり -->
		        
<?php } ?>
<footer>
    <hr>
    <div class="box">
    <p style="font-size:40px;"><a href="https://twitter.com/museum_commons"><i class="ri-twitter-line"></i></a></p>
    <p style="font-size:40px;"><a href="https://instagram.com/museum.commons?utm_medium=copy_link"><i class="ri-instagram-line"></i></a></p>
    <p style="font-size:40px;"><a href="https://www.facebook.com/museum.commons/"><i class="ri-facebook-box-line"></i></a></p>
    </div>
    <hr>
    <p class="text-center"> 慶應ミュージアム・コモンズ<br> © 2022-2023 Keio University
    
</footer>
</div>   

<!-- Java Script -->
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
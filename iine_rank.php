<?php
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

array_multisort(array_column($iines, 'iine'), SORT_DESC, $iines);
$workname=[
    "1"=>"浙翁如琰筆偈",
    "2"=>"環渓惟一筆偈",
    "3"=>"中峰明本筆尺牘",
    "4"=>"清拙正澄筆上堂語",
    "5"=>"羅漢像",
    "6"=>"釈迦三尊十六羅漢図",
    "7"=>"拾得図",
    "8"=>"拾得図",
    "9"=>"蝦蟇仙人・鉄拐仙人図",
    "10"=>"渡唐天神図",
    "11"=>"芦葉達磨図",
    "12"=>"楊柳観音図",
    "13"=>"弁財天図",
    "17"=>"雪景山水図",
    "18"=>"雪景山水図",
    "19"=>"楓橋夜泊図",
    "20"=>"山水図",
    "21"=>"海棠白頭翁図",
    "27"=>"水仙小禽図",
    "32"=>"蘭図",
    "35"=>"堆朱花食文彫刻筆",
    "36"=>"端渓箕様硯",
    "37"=>"松に鷹図屏風",
    "38"=>"月に兎図",
    "39"=>"猿猴図"
];

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
<div class="footer-fixed">
    <header>
        <div class="commonContent">
            <img src="images/kemco_logo.png" id="kemlogo">
        </div>
        
    
    </header>
    <div class="select_sec">
		<div class="rank_tab">
			<img src="images/works_back.png" onclick="window.close()">
		</div>
	</div>
    <?php for($i = 0 ; $i < 3 ; $i ++){ ?>
    <div class="ranknwork">
        <div class="rankiine">
            <div class="rank"><i class="fas fa-crown"></i><?php echo $i+1; ?>位</div>
            <div class="iine"><i class="fas fa-heart" style="color: red;"></i><?php echo $iines[$i]["iine"]; ?></div>
        </div>
        <div class="workinfo">
            <div class="workname">
                <p id="num">作品番号<?php echo $iines[$i]["id"]; ?></p>
                <p id="name"><?php echo $workname[$iines[$i]["id"]]; ?></p>
            </div>
            <img src="images/works/<?php echo $iines[$i]["id"]; ?>.jpg">
        </div>
    </div>
        
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
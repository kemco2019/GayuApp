<!DOCTYPE html>
<html class="no-js" lang="ja">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>KeMCo webapp</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/stamp.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script defer src="js/fontawesome/all.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready( function() {
            jQuery( "#zoom a").textresizer({
                target: "#contact",
                // type:   "fontSize",
                sizes:  [ "20px", "16px"]
            });
        });
    </script>
</head>


<body id="stamp">
    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- header
    ================================================== -->
    <header class="fix-header">
        <div class="zoom">
            <a class="btnL" href="#" style="font-size: 15px;">あ</a>　
            <a class="btnL" href="#" style="font-size: 25px;">あ</a>　
        </div>
        <div class="trans">
        <a href="#" data-stt-changelang="ja" data-stt-ignore>JP</a> 
        <a href="#" data-stt-changelang="en" data-stt-ignore>EN</a>
        </div>
    </header>
<div class="main_body">
    <!-- topimage
    ================================================== -->
    <div class="topimage">
        <p>キャンパス点在作品を巡る<br>スタンプラリー</p>
    </div> <!-- end s-header -->



    <!-- contact
    ================================================== -->
    <section id="contact" class="s-contact target-section s-dark">
        <div class="readme">
            点在作品の作品番号を入力する度に、スタンプが貯まります。すべてのスタンプを集めた方には、特製グッズをプレゼントします。ぜひご参加ください。<br>
            <div>
                <button class="favorite styled" type="button">
                    特製グッズについて
                </button>
            </div>
        </div>
        <div class="stamps">
            <img <?php if(!empty($_COOKIE['page1'])){echo 'src="images/stamp/1.jpeg"';} ?> class="stamp_img">
            <img <?php if(!empty($_COOKIE['page2'])){echo 'src="images/stamp/2.jpeg"';} ?> class="stamp_img">
            <img <?php if(!empty($_COOKIE['page3'])){echo 'src="images/stamp/3.jpeg"';} ?> class="stamp_img">
            <img <?php if(!empty($_COOKIE['page4'])){echo 'src="images/stamp/4.jpeg"';} ?> class="stamp_img">
            <img <?php if(!empty($_COOKIE['page5'])){echo 'src="images/stamp/5.jpeg"';} ?> class="stamp_img">
            <img <?php if(!empty($_COOKIE['page6'])){echo 'src="images/stamp/6.jpeg"';} ?> class="stamp_img">
            <img <?php if(!empty($_COOKIE['page7'])){echo 'src="images/stamp/7.jpeg"';} ?> class="stamp_img">
            <img <?php if(!empty($_COOKIE['page8'])){echo 'src="images/stamp/8.jpeg"';} ?> class="stamp_img">
            <img <?php if(!empty($_COOKIE['page9'])){echo 'src="images/stamp/9.jpeg"';} ?> class="stamp_img">
        </div>
        <br>
        <div class="attention">
            スタンプラリーをご利用いただくには、ご使用のブラウザが「Cookieを受け入れる」設定になっている必要がございます。<br>
            展覧会の開催期間中は、何度でもご参加いただけますが、特製グッズの受け渡しはお一人様につき、一つ限りとさせていただきます。<br>
            スタンプの蓄積にエラー等が生じた場合は、開館時間中に東会場（慶應義塾ミュージアム・コモンズ）1F受付までお越しください。担当スタッフが対応させていただきます。<br>
        </div>
    </section> <!-- end s-contact -->
</div>

    <!-- footer
================================================== -->
<footer class="footer">
    <div class="item-list">
        <a href="index.php">
        <div class="item home" id="icon">
            <i class="fas fa-home fa-2x"></i>
            <p class="title">ホーム</p>
        </div>
        </a>
        <a href="search.php">
        <div class="item serch">
            <i class="fas fa-search fa-2x"></i>
          <p class="title">サーチ</p>
        </div>
        </a>
        <a href="select.php">
        <div class="item map">
            <i class="fas fa-map-marked-alt fa-2x"></i>
          <p class="title">マップ</p>
        </div>
        </a>
        <a href="stamp.php">
        <div class="item stamp">
            <i class="fas fa-stamp fa-2x"></i>
            <p class="title">スタンプ</p>
        </div>
        </a>
    </div>
</footer>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
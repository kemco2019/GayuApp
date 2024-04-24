$(function() {
    /* クッキーをセットする
    -------------------------------------------------- */
    function setSiteviewCookie() {
        $('.trans a').bind('click', function() {　 //言語切り替えボタンを押下したときに発火
            $.cookie('siteview', $(this).data('siteview'), { path: '/' }); //siteviewという名前でcookieに値をセット
            console.log($.cookie('siteview'));
            if ($.cookie('siteview') == 'en') {
                //英語が選択されている場合(coockieの値にenが設定されている時)
                $('.content-en').css('display', 'block'); //英語を表示
                $('.content-jp').css('display', 'none');　 //日本語を非表示
                $('.trans .en').css('color', 'black');
                $('.trans .jp').css('color', 'gray');
                $('.trans .en').addClass('selected');　 //言語切り替えボタンにクラスを振る処理
                $('.trans .jp').removeClass('selected');
                console.log("siteview is " + $.cookie('siteview'));

            } else {
                $('.content-jp').css('display', 'block'); //日本語を表示
                $('.content-en').css('display', 'none');　 //英語を非表示
                $('.trans .jp').css('color', 'black');
                $('.trans .en').css('color', 'gray');
                $('.trans .jp').addClass('selected');
                $('.trans .en').removeClass('selected');
                console.log("siteview is " + $.cookie('siteview'));

            }
        });
        $('.zoom a').bind('click', function() {　 //言語切り替えボタンを押下したときに発火
            $.cookie('fontsize', $(this).data('fontsize'), { path: '/' }); //siteviewという名前でcookieに値をセット
            console.log($.cookie('fontsize'));
            if ($.cookie('fontsize') == 'fontM') {
                $('.main_body').addClass('fontM');
                $('.main_body').removeClass('fontS');
                $('.zoom .fontM').addClass('selected');
                $('.zoom .fontS').removeClass('selected');
                $('.zoom .fontM').css('color', 'black');
                $('.zoom .fontS').css('color', 'gray');
                console.log("fontsize is " + $.cookie('fontsize'));
            } else {
                $('.main_body').addClass('fontS');
                $('.main_body').removeClass('fontM');
                $('.zoom .fontS').addClass('selected');
                $('.zoom .fontM').removeClass('selected');
                $('.zoom .fontS').css('color', 'black');
                $('.zoom .fontM').css('color', 'gray');
                console.log("fontsize is " + $.cookie('fontsize'));

            }
        });

    }
    setSiteviewCookie();

    /* 日本語 or 英語を選んだ場合の処理
    -------------------------------------------------- */
    if ($.cookie('siteview') == 'en') {
        //英語が選択されている場合(coockieの値にenが設定されている時)
        $('.content-en').css('display', 'block'); //英語を表示
        $('.content-jp').css('display', 'none');　 //日本語を非表示
        $('.trans .en').addClass('selected');　 //言語切り替えボタンにクラスを振る処理
        $('.trans .en').css('color', 'black');
        $('.trans .jp').removeClass('selected');
        $('.trans .jp').css('color', 'gray');
        console.log("siteview is " + $.cookie('siteview'));
    } else {
        //日本語が選択されている場合
        $('.content-jp').css('display', 'block'); //日本語を表示
        $('.content-en').css('display', 'none');　 //英語を非表示
        $('.trans .jp').addClass('selected');
        $('.trans .jp').css('color', 'black');
        $('.trans .en').removeClass('selected');
        $('.trans .en').css('color', 'gray');
        console.log("siteview is " + $.cookie('siteview'));
    }

    if ($.cookie('fontsize') == 'fontM') {
        $('.main_body').addClass('fontM');
        $('.main_body').removeClass('fontS');
        $('.zoom .fontM').addClass('selected');
        $('.zoom .fontS').removeClass('selected');
        $('.zoom .fontM').css('color', 'black');
        $('.zoom .fontS').css('color', 'gray');
        console.log("fontsize is " + $.cookie('fontsize'));
    } else {
        $('.main_body').addClass('fontS');
        $('.main_body').removeClass('fontM');
        $('.zoom .fontS').addClass('selected');
        $('.zoom .fontM').removeClass('selected');
        $('.zoom .fontS').css('color', 'black');
        $('.zoom .fontM').css('color', 'gray');
        console.log("fontsize is " + $.cookie('fontsize'));
    }

});
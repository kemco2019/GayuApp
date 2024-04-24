$(function() {
    function setGif() {
        $('[type="number"]').on('focus', function() {  //テキストエリアを選択したときに発火
            //console.log("test");
            $('.animegif').css('display', 'block'); //表示
        })
    }
    setGif();
});
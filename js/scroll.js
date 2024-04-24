var _window = $(window),
    heroBottom;
 
_window.on('scroll',function(){     
    heroBottom = $('.top2').height() + $('.commonContent').height();
    if(_window.scrollTop() > heroBottom){
        $('.select_sec').addClass('fixed');   
    }
    else{
        $('.select_sec').removeClass('fixed');   
    }
});
 
_window.trigger('scroll');

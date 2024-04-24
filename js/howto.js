$(document).on("click", "#accordion", function(){   
    console.log("tap");
    $(this).children().eq(1).slideToggle(300);  
    $(this).children().eq(0).toggleClass("accordion-no-bar");
    $(this).siblings().find(".accordion-header").removeClass("accordion-gold");
    $(this).siblings().find(".accordion-header i").removeClass("rotate-fa");
    $(this).find(".accordion-header").toggleClass("accordion-gold");
    $(this).find(".fas").toggleClass("rotate-fa");
    $(".accordion-wrap .accordion-text").not($(this).children().eq(1)).slideUp(300);
});
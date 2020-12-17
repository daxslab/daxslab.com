$(function(){

    let $window = $(window);
    let $navbar = $('#main-navbar');

    $window.scroll(function(e){
        if($window.scrollTop() >= $navbar.height()){
            $navbar.removeClass('no-shadow bg-transparent');
            $navbar.addClass('bg-primary');
        }else{
            $navbar.removeClass('bg-primary');
            $navbar.addClass('no-shadow bg-transparent');
        }
    }).scroll();

    var shiftWindow = function() { scrollBy(0, -50) };
    if (location.hash) shiftWindow();
    window.addEventListener("hashchange", shiftWindow);

});

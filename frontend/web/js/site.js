$(function(){

    let $window = $(window);
    let $navbar = $('#main-navbar');

    $window.scroll(function(e){
        if($window.scrollTop() >= $navbar.height()){
            $navbar.removeClass('no-shadow navbar-dark bg-dark');
            $navbar.addClass('navbar-light bg-white');
        }else{
            $navbar.removeClass('navbar-light bg-white');
            $navbar.addClass('no-shadow navbar-dark bg-dark');
        }
    });

    var shiftWindow = function() { scrollBy(0, -50) };
    if (location.hash) shiftWindow();
    window.addEventListener("hashchange", shiftWindow);

});

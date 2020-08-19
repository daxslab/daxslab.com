$(function(){

    let $window = $(window);
    let $navbar = $('#main-navbar');

    $window.scroll(function(e){

        if($window.scrollTop() >= $navbar.height()){
            $navbar.removeClass('no-shadow');
        }else{
            $navbar.addClass('no-shadow');
        }

    });

});

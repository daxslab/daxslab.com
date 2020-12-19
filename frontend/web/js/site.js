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

    $('#modal-quote').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('service'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        $.get(button.data('url'), function(response){
            modal.find('.modal-body').html(response);
        });
    })

    var shiftWindow = function() { scrollBy(0, -50) };
    if (location.hash) shiftWindow();
    window.addEventListener("hashchange", shiftWindow);

});

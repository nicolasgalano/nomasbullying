(function(){

    //POPUPS

    $('.open-popup-button').click(function(){
        $('.full-opacity').show();
        $($(this).attr('aria-popup')).show();
    });
    $('.full-opacity').click(function(){
        $('.full-opacity').hide();
        $('.popup').hide();
    });
    $('.popup-close').click(function(){
        $('.full-opacity').hide();
        $(this).parent().hide();
    });


})();

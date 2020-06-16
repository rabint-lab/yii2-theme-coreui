$(function () {

    $(document).on('click','.block-minimize-btn',function(){
        if($(this).hasClass('extended')){
            $(this).parents('.block').find('.block-content').stop().slideUp();
            $(this).removeClass('extended');
            $(this).find('.btnicon').addClass('fa-chevron-down').removeClass('fa-chevron-up');
        }else{
            $(this).parents('.block').find('.block-content').stop().slideDown();
            $(this).addClass('extended');
            $(this).find('.btnicon').addClass('fa-chevron-up').removeClass('fa-chevron-down');
        }
    });

});

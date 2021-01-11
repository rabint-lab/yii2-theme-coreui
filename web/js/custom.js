$(function () {
    var CurrenyCookie = $.cookie('coreui_is_dark');
    if(CurrenyCookie=="no"){
        $('body').removeClass('c-dark-theme');
    }
    if(CurrenyCookie=="yes"){
        $('body').addClass('c-dark-theme');
    }
    $('.setDarkTheme').click(function () {
        let isDark = $('body').hasClass('c-dark-theme');
        console.log('isDark');
        console.log(isDark);
        if(isDark){
            $('body').removeClass('c-dark-theme');
            $.cookie('coreui_is_dark', 'no', { expires: 30,path: '/' });
        }else {
            $('body').addClass('c-dark-theme');
            $.cookie('coreui_is_dark', 'yes', { expires: 30 ,path: '/'});
        }
    });
});
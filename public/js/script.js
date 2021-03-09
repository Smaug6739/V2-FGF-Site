$(document).ready(function() {
    /*var distance = $('.navbar').offset().top;
    var windowWidth = $(window).width()

    $(window).scroll(function() {
        if ( $(this).scrollTop() >= distance ) {
            console.log('is in top');
            $('.container-fluid').css("padding-top", $('.navbar').css("height"))
            $('.navbar').css("position", "fixed")
            $('.navbar').css("top", "0")
            $('.navbar').css("z-index", "10")
        } else {
            console.log('is not in top');
            $('.navbar').css("position", "relative")
            $('.container-fluid').css("padding-top", "0")
        }
    });*/
    
    if(getMobileOperatingSystem() !== "") {
        $(".navbarSupportedContentRedac ul").css("flex-direction", "column")
        $(".navbarSupportedContentRedac ul").css("justify-content", "flex-start")
        $(".navbarSupportedContentRedac ul").css("align-items", "flex-start")
    }
    
    
})


function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;

    if (/windows phone/i.test(userAgent)) {
        return "winphone";
    }

    if (/android/i.test(userAgent)) {
        return "android";
    }

    if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
        return "ios";
    }

    return "";
}
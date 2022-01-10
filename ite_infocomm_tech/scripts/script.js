$(document).ready(function() {
    $(".content").fadeIn("slow")
    $(".content").css("marginTop", "+=100px")
    $(".content").animate({
        marginTop: '-=100px'
    }, 500, "swing")

    $(".banner-text").fadeIn("slow")
    setInterval(() => {
        if ($('.banner-image').attr('src') == "./media/ITE_College_Central.jpeg") {
            var next_src = "./media/banner-cc.jpg"
        } else {
            var next_src = "./media/ITE_College_Central.jpeg"
        }

        $(".banner-image").animate({
            opacity: 0
        }, 500)
        setTimeout(() => {
            $(".banner-image").attr("src", next_src);
        }, 500);
        $(".banner-image").animate({
            opacity: 1
        }, 500)
    }, 5000);

    $(".site-button").hover(function() {
        $(this).addClass("hover")
    }, function() {
        $(this).removeClass("hover")
    })
})

function toPage(page) {
    $(".content").animate({
        marginTop: '+=100px',
        opacity: 0
    }, 500, "swing")
    setTimeout(function() {
        window.location.href = page
        $(".content").animate({
            marginTop: '-=100px',
            opacity: 1
        }, 500, "swing")
    }, 500)
}
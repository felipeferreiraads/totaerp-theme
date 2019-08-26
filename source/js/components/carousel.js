import 'owl.carousel'

var sync1 = $('.carousel-modules-info')
var sync2 = $('.carousel-modules-cards')

if($(window).width() < 1024) {
    sync1.owlCarousel({
        items : 1,
        slideSpeed : 2000,
        loop: true,
        responsiveRefreshRate : 200,
        margin: 10
    })
}

sync2
.on('initialized.owl.carousel', function () {
    sync2.find(".owl-item.active").eq(0).addClass("current")
})
.owlCarousel({
    autoWidth: true,
    responsiveRefreshRate : 100,
    rtl: true,
    margin: 40,
    loop: true
}).on('changed.owl.carousel', syncPosition)

$('.modules .card-module').click(e => {
    const modulo = e.currentTarget.getAttribute('data-module')
    $('.card-module-info').hide()
    $(modulo).css('display', 'flex')
})

$('.prev-modules').click(function () {
    sync2.trigger('prev.owl.carousel')
})

$('.next-modules').click(function () {
    sync2.trigger('next.owl.carousel')
})

$('.prev-modules-info').click(function () {
    sync1.trigger('prev.owl.carousel')
})

$('.next-modules-info').click(function () {
    sync1.trigger('next.owl.carousel')
})

function syncPosition(el) {
    sync2
    .find(".owl-item")
    .removeClass("current")

    var current = sync2.find(".owl-item.active").eq(1)
    current.addClass("current")

    const modulo = $(current).children('.card-module').attr('data-module')
    console.log(modulo)
    $('.card-module-info').hide()
    $(modulo).css('display', 'flex')
}

const clients = $('.clients .grid')

clients.owlCarousel({
    center: true,
    loop: true,
    dots: true,
    responsive: {
        1024:  {
            items: 4
        },
        768:  {
            items: 2
        },
        0: {
            items: 1
        }
    }
})

$('.prev-clients').click(function () {
    clients.trigger('prev.owl.carousel')
})

$('.next-clients').click(function () {
    clients.trigger('next.owl.carousel')
})

const testmonials = $('.carousel-testmonials')

testmonials.owlCarousel({
    center: true,
    loop: true,
    dots: true,
    autoplay: true,
    items: 1,
    margin: 10
})

$('.prev-testmonials').click(function () {
    testmonials.trigger('prev.owl.carousel')
})

$('.next-testmonials').click(function () {
    testmonials.trigger('next.owl.carousel')
})
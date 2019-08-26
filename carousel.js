import 'owl.carousel'

var sync1 = $('.carousel-modules-info')
var sync2 = $('.carousel-modules-cards')
var syncedSecondary = true

sync1.owlCarousel({
    items : 1,
    slideSpeed : 2000,
    loop: true,
    responsiveRefreshRate : 200,
}).on('changed.owl.carousel', syncPosition)

sync2
.on('initialized.owl.carousel', function () {
    sync2.find(".owl-item").eq(0).addClass("current")
})
.owlCarousel({
    autoWidth: true,
    responsiveRefreshRate : 100,
    rtl: true,
    margin: 40
}).on('changed.owl.carousel', syncPosition2)

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
  var count = el.item.count-1
  var current = Math.round(el.item.index - (el.item.count/2) - .5)

    if(current < 0) {
        current = count
    }
    if(current > count) {
        current = 0
    }

    sync2
    .find(".owl-item")
    .removeClass("current")
    .eq(current)
    .addClass("current")

    var onscreen = sync2.find('.owl-item.active').length - 1
    var start = sync2.find('.owl-item.active').first().index()
    var end = sync2.find('.owl-item.active').last().index()

    if (current > end) {
        sync2.data('owl.carousel').to(current, 100, true)
    }
    if (current < start) {
        sync2.data('owl.carousel').to(current - onscreen, 100, true)
    }
}

function syncPosition2(el) {
    if(syncedSecondary) {
        var number = el.item.index
        sync1.data('owl.carousel').to(number, 100, true)
    }
}

sync2.on("click", ".owl-item", function(e){
    e.preventDefault()
    var number = $(this).index()
    sync1.data('owl.carousel').to(number, 300, true)
})

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
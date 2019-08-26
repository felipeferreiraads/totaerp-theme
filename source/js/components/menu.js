$('.open-menu').on('click', () => {
    if(!$('.menu-mobile').hasClass('open')) {
        $('.menu-mobile').css('right', 0).addClass('open')
        $('.overlay-menu').css('display', 'block')
    }
})

$('.close-menu, .overlay-menu').on('click', () => {
    $('.menu-mobile').css('right', -300).removeClass('open')
    $('.overlay-menu').css('display', 'none')
})
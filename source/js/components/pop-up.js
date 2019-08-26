$('#try-it, #try-it-top').on('submit', e => {
    e.preventDefault()
    const email = e.currentTarget.querySelector('input').value
    if(email) {
        $('.try-it-pop-up-form input[name=email]').val(email)
        $('.try-it-pop-up').css({
            display: 'block'
        }).animate({
            opacity: 1
        }, 300)
    }
})

$('a.try-it, button.try-it').on('click', e => {
    e.preventDefault()
    $('.try-it-pop-up').css({
        display: 'block'
    }).animate({
        opacity: 1
    }, 300)
})

$('.pop-up-close').on('click', () => {
    $('.pop-up').animate({
        opacity: 0
    }, 300, () => {
        $('.pop-up').css('display', 'none')
    })
})
import 'waypoints/lib/jquery.waypoints'
import 'jquery.animate-number/jquery.animateNumber'
import 'tooltipster/dist/js/tooltipster.bundle'

$(window).scroll(() => {
    if($(window).scrollTop() > 0) {
        if(!$('header').hasClass('scrolled')) {
            $('header .logo img').attr('src', TEMPLATE_URL + '/assets/img/logo-blue.svg')

            $('header').animate({
                height: 70
            }, 200).css({
                background: '#fff',
                boxShadow: '0 0 3px rgba(0,0,0,0.2)'
            }).addClass('scrolled')

            $('.open-menu').css('color', '#1a293f')
        }
    } else {
        if($('header').hasClass('scrolled')) {
            $('header .logo img').attr('src', TEMPLATE_URL + '/assets/img/logo.svg')

            $('header').animate({
                height: 100
            }, 200).css({
                background: 'transparent',
                boxShadow: 'none'
            }).removeClass('scrolled')

            $('.open-menu').css('color', '#fff')
        }
    }


    if($('.form-sticky').length && $(window).width() >= 1024) {
        const scroll = $(window).scrollTop()
        const top = $('.banner-landing').offset().top
        const bottom = $('.benefits-landing').offset().top + 100

        if((scroll >  top && scroll < bottom) || scroll <= 100) {
            $('.form-sticky').css({
                'position': 'fixed',
                'top': 100
            })
        } else {
            $('.form-sticky').css({
                'position': 'absolute',
                'top': bottom
            })
        }
    }
})

if(window.location.pathname == '/') {
    const benefits = $('.benefits li').waypoint(direction => {
        $('.benefits li').css('visibility', 'visible').addClass('animated slideInRight')
    }, {
        offset: '95%'
    })
}

if(window.location.pathname == '/') {
    const numbers = $('.stats').waypoint(direction => {
        const cards = document.getElementsByClassName('value-stat')
        const cardsArr =  Array.from(cards)
        cardsArr.forEach(e => {
            const number = e.getAttribute('value')
            $(e).animateNumber({ number }, 800)
        })

    }, {
        offset: '80%'
    })
}

$('.tooltip').tooltipster({
    maxWidth: 250,
    theme: 'tooltipster-light',
    side: 'bottom',
    distance: -20,
    delay: 0
})

$('.change-plan').on('change', e => {
    if(e.target.checked) {
        $('.fidelity-plan').css('display', 'none')
        $('.mensal-plan').css('display', 'flex')
    } else {
        $('.fidelity-plan').css('display', 'flex')
        $('.mensal-plan').css('display', 'none')
    }
})
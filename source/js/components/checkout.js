import 'jquery-mask-plugin'

$('.checkout-form').on('submit', e => {
    e.preventDefault()
    let token = sessionStorage.getItem('token')

    if(token == null) {
        $.ajax({
            type: 'POST',
            url: 'http://api.totalerp.com.br/oauth/token',
            processData: false,
            data: 'grant_type=client_credentials',
            beforeSend: request => {
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
                request.setRequestHeader('Accept', 'application/json')
                request.setRequestHeader('Authorization', 'Basic YXBwbWFya2V0OmUxMGFkYzM5NDliYTU5YWJiZTU2ZTA1N2YyMGY4ODNl')
            }
        }).done(json => {
            sessionStorage.setItem('token', json.access_token)
            if(e.currentTarget.classList.contains('step-one')) {
                stepOne()
            } else {

            }
        })
    } else {
        if(e.currentTarget.classList.contains('step-one')) {
            stepOne()
        } else {
            stepTwo()
        }
    }

    function stepOne() {
        const cnpj = $('.cnpj').cleanVal()
        $.ajax({
            url: `http://api.totalerp.com.br/empresa/${cnpj}`,
            beforeSend: request => {
                request.setRequestHeader('Content-Type', 'application/json')
                request.setRequestHeader('Authorization', `Bearer ${sessionStorage.getItem('token')}`)
            }
        }).done(json => {
            console.log(json)
        }).fail(() => {
            $('.cnpj').val(cnpj)
            $('.step-one').css('display', 'none')
            $('.step-two').css('display', 'flex')
        })
    }

    function stepTwo() {
        $.ajax({
            url: 'http://api.totalerp.com.br/contrato/provisionar',
            beforeSend: request => {
                request.setRequestHeader('Content-Type', 'application/json')
                request.setRequestHeader('Authorization', `Bearer ${sessionStorage.getItem('token')}`)
            }
        }).done(json => {
            console.log(json)
        }).fail(() => {
            $('.cnpj').val(cnpj)
            $('.step-one').css('display', 'none')
            $('.step-two').css('display', 'flex')
        })
    }
})
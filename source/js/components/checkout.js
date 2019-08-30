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
            $('.checkout-message').html('Você já está cadastrado para utilizar os serviços da TotalERP. Entre em contato conosco.').show()
        }).fail(() => {
            $('.checkout-message').hide()
            $('.cnpj').val(cnpj)
            $('.step-one').css('display', 'none')
            $('.step-two').css('display', 'flex')
        })
    }

    function stepTwo() {
        $.ajax({
            type: 'POST',
            url: 'http://api.totalerp.com.br/contrato/provisionar',
            data: $(e.currentTarget).serialize(),
            beforeSend: request => {
                request.setRequestHeader('Content-Type', 'application/json')
                request.setRequestHeader('Authorization', `Bearer ${sessionStorage.getItem('token')}`)
            }
        }).done(data => {
            $('.checkout-message').html('Cadastrado com sucesso! Você receberá em seu e-mail as informações para os próximos passos.').show()
        }).fail(() => {
            $('.checkout-message').html('Falha ao enviar. Tente novamente.').show()
        })
    }
})

$('#estado').on('change', e  => {
    const uf = e.currentTarget.value
    $.ajax({
        url: `http://api.totalerp.com.br/municipio/${uf}`,
        beforeSend: request => {
            request.setRequestHeader('Content-Type', 'application/json')
            request.setRequestHeader('Authorization', `Bearer ${sessionStorage.getItem('token')}`)
        }
    }).done(json => {
        var cities = []
        json.map(item => {
            cities.push('<option value="'+ item.ibge + '">' + jsUcfirst(item.nome.toLowerCase()) + '</option>')
        })
        $('#cidade').html(cities.join())
    })
})

setInterval(() => {
    sessionStorage.removeItem('token')
}, 300000)

function jsUcfirst(string)  {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
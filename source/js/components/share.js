$('.share-link').on('click', e => {
    e.preventDefault()
    window.open(e.currentTarget.getAttribute('href'), '_blank', 'width=500, height=500')
})
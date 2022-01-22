const delivery = document.querySelector('#deliveryAddress')
const payment = document.querySelector('#paymentAddress')
const own = document.querySelector('#ownAddress')
const switchAddress = document.querySelector('#switch')

switchAddress.addEventListener('click', function() {
    let option = ''
    if (delivery.checked) {
        option = 'delivery'
    }
    if (payment.checked) {
        option = 'payment'
    }
    if (own.checked) {
        option = 'own'
    }

})
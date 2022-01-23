const delivery = document.querySelector('#deliveryAddress')
const payment = document.querySelector('#paymentAddress')
const switchAddress = document.querySelector('#switch')
const deliveryDiv = document.querySelector('#delivery')
const paymentDiv = document.querySelector('#payment')

switchAddress.addEventListener('click', function() {
    if (delivery.checked) {
        deliveryDiv.hidden = false
        paymentDiv.hidden = true
    }
    if (payment.checked) {
        deliveryDiv.hidden = true
        paymentDiv.hidden = false
    }


})
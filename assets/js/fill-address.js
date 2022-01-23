const delivery = document.querySelector('#deliveryAddress')
const payment = document.querySelector('#paymentAddress')
const switchAddress = document.querySelector('#switch')
const deliveryDiv = document.querySelector('#delivery')
const paymentDiv = document.querySelector('#payment')
const username = document.querySelector('#name')
const surname = document.querySelector('#surname')
const phone = document.querySelector('#phone')

const user = ORDER.user
const deliveryAddress = ORDER.deliveryAddress
const paymentAddress = ORDER.paymentAddress

if (user) {
    username.value = user.name
    surname.value = user.surname
    phone.value = user.phone
}

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
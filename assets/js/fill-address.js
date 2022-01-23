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
function fillDeliveryAddress(data){
    document.querySelector("#deliveryCity").value = data["town"]
    document.querySelector("#deliveryPostalCode").value = data["postalCode"]
    document.querySelector("#deliveryStreet").value = data["street"]
    document.querySelector("#deliveryBuilding").value = data["building"]
    document.querySelector("#deliveryApartment").value = data["apartament"]
}
function fillPaymentAddress(data){
    document.querySelector("#paymentCity").value = data["town"]
    document.querySelector("#paymentPostal").value = data["postalCode"]
    document.querySelector("#paymentStreet").value = data["street"]
    document.querySelector("#paymentBuilding").value = data["building"]
    document.querySelector("#paymentApartment").value = data["apartament"]
}
function clearDeliveryAddress(data){
    document.querySelector("#deliveryCity").value = ""
    document.querySelector("#deliveryPostal").value = ""
    document.querySelector("#deliveryStreet").value = ""
    document.querySelector("#deliveryBuilding").value = ""
    document.querySelector("#deliveryApartment").value = ""
}
function clearPaymentAddress(data){
    document.querySelector("#paymentCity").value = ""
    document.querySelector("#paymentPostalCode").value = ""
    document.querySelector("#paymentStreet").value = ""
    document.querySelector("#paymentBuilding").value = ""
    document.querySelector("#paymentApartment").value = ""
}
function blockInputs(parent){
    var list = parent.getElementsByTagName("input");
    for (let item of list) {
        // console.log(item);
        item.disabled = true;
    }
}
function enableInputs(parent){
    var list = parent.getElementsByTagName("input");
    for (let item of list) {
        // console.log(item);
        item.disabled = false;
    }
}
// apartament: "2"
// building: "12"
// id: 29
// postalCode: "12-121"
// street: "jana"
// town: "Warszawa"
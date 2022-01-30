const delivery = document.querySelector("#deliveryAddress");
const payment = document.querySelector("#paymentAddress");
const switchAddress = document.querySelector("#switch");
const deliveryDiv = document.querySelector("#delivery");
const paymentDiv = document.querySelector("#payment");
const username = document.querySelector("#name");
const surname = document.querySelector("#surname");
const phone = document.querySelector("#phone");
const checkboxes = document.querySelectorAll("input[type=checkbox]");
const select = document.querySelector("select[name=deliverer]");
const priceInput = document.querySelector("input[name=price]");
const productsPrice = document.querySelector("#productPrice");
const deliveryPrice = document.querySelector("#deliveryPrice");
const totalPrice = document.querySelector("#totalPrice");
const inputs = document.querySelectorAll('input')
const submit = document.querySelectorAll('input[type=submit]')[1]

let requiredFields = []
inputs.forEach(element => {
    if (element.required) {
        requiredFields.push(element)
    }
})

submit.addEventListener('click', function() {
    let message = 'Należy uzupełnić następujące pola: \n'
    requiredFields.forEach(element => {
        if (!requiredFields.value) {
            message += element.previousElementSibling.innerText
            if (element.closest('#delivery')) {
                message += " dostawy"
            }
            if (element.closest('#payment')) {
                message += " płatności"
            }
            message += '\n'
        }
    })
    if (message) {
        alert(message)
    }
})

const user = ORDER.user;
const deliveryAddress = ORDER.deliveryAddress;
const paymentAddress = ORDER.paymentAddress;



let index = select.selectedIndex;
let price = select.querySelectorAll("option")[index].dataset.price;

if (parseFloat(productsPrice.innerText).toFixed(2) > 100) {
    deliveryPrice.innerText = 0;
} else {
    deliveryPrice.innerText = price;
}

totalPrice.innerText = (
    parseInt(deliveryPrice.innerText) + parseFloat(productsPrice.innerText)
).toFixed(2);
priceInput.value = totalPrice.innerText;

select.addEventListener("change", function() {
    let index = this.selectedIndex;
    let price = this.querySelectorAll("option")[index].dataset.price;
    if (parseFloat(productsPrice.innerText).toFixed(2) > 100) {
        deliveryPrice.innerText = 0;
    } else {
        deliveryPrice.innerText = price;
    }
    totalPrice.innerText = (
        parseInt(deliveryPrice.innerText) + parseFloat(productsPrice.innerText)
    ).toFixed(2);
    priceInput.value = totalPrice.innerText;
});

if (user) {
    username.value = user.name;
    surname.value = user.surname;
    phone.value = user.phone;
}

switchAddress.addEventListener("click", function() {
    if (delivery.checked) {
        deliveryDiv.hidden = false;
        paymentDiv.hidden = true;
    }
    if (payment.checked) {
        deliveryDiv.hidden = true;
        paymentDiv.hidden = false;
    }
});

function fillDeliveryAddress(data) {
    document.querySelector("#deliveryCity").value = data["town"];
    document.querySelector("#deliveryPostalCode").value = data["postalCode"];
    document.querySelector("#deliveryStreet").value = data["street"];
    document.querySelector("#deliveryBuilding").value = data["building"];
    document.querySelector("#deliveryApartment").value = data["apartament"];
}

function fillPaymentAddress(data) {
    document.querySelector("#paymentCity").value = data["town"];
    document.querySelector("#paymentPostalCode").value = data["postalCode"];
    document.querySelector("#paymentStreet").value = data["street"];
    document.querySelector("#paymentBuilding").value = data["building"];
    document.querySelector("#paymentApartment").value = data["apartament"];
}

function clearDeliveryAddress(data) {
    document.querySelector("#deliveryCity").value = "";
    document.querySelector("#deliveryPostalCode").value = "";
    document.querySelector("#deliveryStreet").value = "";
    document.querySelector("#deliveryBuilding").value = "";
    document.querySelector("#deliveryApartment").value = "";
}

function clearPaymentAddress(data) {
    document.querySelector("#paymentCity").value = "";
    document.querySelector("#paymentPostalCode").value = "";
    document.querySelector("#paymentStreet").value = "";
    document.querySelector("#paymentBuilding").value = "";
    document.querySelector("#paymentApartment").value = "";
}

function blockInputs(parent) {
    var list = parent.getElementsByTagName("input");
    for (let item of list) {
        if (item.type == "checkbox") {
            continue;
        }
        item.disabled = true;
    }
}

function enableInputs(parent) {
    var list = parent.getElementsByTagName("input");
    for (let item of list) {
        // console.log(item);
        item.disabled = false;
    }
}

checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", function() {
        let div = this.closest(".form-row").parentElement;
        if (!this.checked) {
            if (div.id == "delivery") {
                clearDeliveryAddress();
            } else {
                clearPaymentAddress();
            }
            enableInputs(div);
        } else {
            if (div.id == "delivery") {
                fillDeliveryAddress(deliveryAddress);
            } else {
                fillPaymentAddress(paymentAddress);
            }
            blockInputs(div);
        }
    });
});
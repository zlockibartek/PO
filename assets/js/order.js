const productContainer = document.querySelector('#productContainer')
const totalPrice = document.querySelector('#totalPrice')
const totalWeight = document.querySelector('#totalWeight')
const summary = document.querySelector('#summary')
const form = document.querySelector('#orderForm')
const priceInput = document.querySelector('input[name=price]')
const weightInput = document.querySelector('input[name=weight]')
const productsInput = document.querySelector('input[name=products]')

jQuery(($) => {
    let products = JSON.parse(localStorage.getItem("quantity"));
    if (products && products != []) {
        $.ajax({
            type: "POST",
            url: "http://po.apache:8081/wp-admin/admin-ajax.php?action=orders",
            data: { products },
            success: function(result) {
                createOrders(result)
            },
        });
    }
});

function createOrders(products) {
    let sumPrice = 0
    let sumWeight = 0
    let href = '?order='
    products.forEach(element => {
        console.log(element)
        href += element.id + ',' + element.quantity + ';'
        sumPrice += element.quantity * element.price
        sumWeight += element.quantity * element.weight
        let row = document.createElement('row')
        row.setAttribute('class', 'row oneProduct')

        let imgDiv = document.createElement('div')
        let img = document.createElement('img')

        img.classList.add('img-responsive')
        imgDiv.setAttribute('class', 'col-12 col-sm-12 col-md-2 text-center')
        img.setAttribute('src', element.img)
        img.setAttribute('width', 120)
        img.setAttribute('height', 80)

        imgDiv.appendChild(img)

        let productDiv = document.createElement('div')
        let productName = document.createElement('h4')
        let productWeight = document.createElement('h4')

        productWeight.classList.add('weight')
        productName.classList.add('product-name')
        productDiv.setAttribute('class', 'col-12 text-sm-center col-sm-12 text-md-left col-md-6')
        productName.appendChild(document.createTextNode(element.name))
        productWeight.appendChild(document.createTextNode('Waga opakowania: ' + element.weight + 'g'))

        productDiv.appendChild(productName)
        productDiv.appendChild(productWeight)

        let detailsDiv = document.createElement('div')
        let priceDiv = document.createElement('div')
        let quantityDiv = document.createElement('div')
        let summaryDiv = document.createElement('div')
        let price = document.createElement('h6')

        detailsDiv.setAttribute('class', 'col-12 col-sm-12 text-sm-center col-md-4 text-md-right row ')
        summaryDiv.setAttribute('class', 'col-2 col-sm-2 col-md-2 text-right')
        priceDiv.setAttribute('class', 'col-3 col-sm-3 col-md-6 text-md-right')
        summaryDiv.appendChild(document.createTextNode(sumPrice))
        quantityDiv.appendChild(document.createTextNode(element.quantity))
        price.appendChild(document.createTextNode(element.price + ' zł'))

        priceDiv.appendChild(price)
        detailsDiv.appendChild(priceDiv)
        detailsDiv.appendChild(quantityDiv)

        row.appendChild(imgDiv)
        row.appendChild(productDiv)
        row.appendChild(detailsDiv)
        row.appendChild(document.createElement('hr'))

        productContainer.appendChild(row)
    })
    totalPrice.innerText = sumPrice.toFixed(2)
    totalWeight.innerText = sumWeight
    form.setAttribute('action', href)
    priceInput.value = sumPrice.toFixed(2)
    weightInput.value = sumWeight
    productsInput.value = href
}
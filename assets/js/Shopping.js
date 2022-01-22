class Shopping {
    appearCart() {
        document.getElementById("shopping").style.display = "block";
    }
    disappearCart() {
        document.getElementById("shopping").style.display = "none";
    }
    handleClear() {
        ROOT_SHOPPING.innerHTML = ""
    }
    init() {
        var productContainer = document.getElementById("productContainer")

        productContainer.innerHTML = this.cartProducts()
    }

    cartProducts() {
        var productHtml = ""
        const product = localStorageUtil.getProducts();
        PRODUCTS.Products.forEach(el => {
            if (product.includes(el.id.toString())) {
                productHtml += this.generateProdcuct(el.name, "", el.weight, el.price, el.img, el.id, el.quantity)
            }
        })

        return productHtml
    }
    generateProdcuct(ProductName, ProductDescription, ProductWeight, price, imgPath, id, quantity) {
        var html =
            `<div class="row oneProduct">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="${imgPath}" alt="prewiew" width="120"
                        height="80">
                </div>
                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <h4 class="product-name"><strong>${ProductName}</strong></h4>
                    <h4>
                        <small>${ProductDescription}</small>
                    </h4>
                    <h4>
                        <small class="weight">Waga: ${ProductWeight}</small>
                    </h4>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row ">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6><strong class="price">${price} zł <span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4">
                        <div class="quantity">
                            <input type="number" step="1" max="${quantity}" min="1" value="1" title="Qty" class="qty" size="4" onclick="shoppingPage.updatePriceAndWeight(); ">
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 text-right">
                        <button type="button" class="btn btn-outline-danger btn-xs" data-id="${id}" onclick="shoppingPage.remove(this, '${id}');">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            `
        return html
    }

    updatePriceAndWeight() {
        var products = document.getElementsByClassName("oneProduct")
        var sumPrice = 0;
        var sumWeight = 0;
        let quantity = [];
        for (let item of products) {
            let count = item.querySelector('[title="Qty"]').value;
            let price = item.getElementsByClassName("price")[0].innerText
            let w = item.querySelector(".weight").innerText.split(' ')[1]
            let id = item.querySelector('button').dataset.id
            sumPrice += count * parseFloat(price)
            sumWeight += count * parseFloat(w)
            quantity.push({ 'id': id, 'count': count })
        }
        localStorage.setItem('quantity', JSON.stringify(quantity))
        document.getElementById("totalPrice").innerText = sumPrice
        document.getElementById("totalWeight").innerText = sumWeight

    }
    remove(element, id) {
        localStorageUtil.putProducts(id)
        document.getElementById("productContainer").innerHTML = this.cartProducts()
        this.updatePriceAndWeight()
            // console.log(element.closest())   
    }

    render() {
        document.getElementById("productContainer").innerHTML = this.cartProducts()
        this.updatePriceAndWeight()
    }


}

const shoppingPage = new Shopping();
shoppingPage.init();
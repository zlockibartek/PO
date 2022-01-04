class Shopping {
    appearCart(){
        document.getElementById("shopping").style.display = "block";
    }
    disappearCart(){
        document.getElementById("shopping").style.display = "none";
    }
    handleClear() {
        ROOT_SHOPPING.innerHTML = ""

    }
    
    cartProducts() {
        var productHtml = ""
        product.forEach(el => {
            productHtml += generateProdcuct(el.name, "", 1, el.price, el.img)
        })
        return productHtml
    }
    generateProdcuct(ProductName, ProductDescription, ProductWeight, price, imgPath) {
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
                        <small class="weight"> Weight: ${ProductWeight}</small>
                    </h4>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row ">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6><strong class="price">${price} zł <span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4">
                        <div class="quantity">
                            <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                size="4">
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 text-right">
                        <button type="button" class="btn btn-outline-danger btn-xs">
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
        // console.log(products)
        for (let item of products) {
            let count = item.querySelector('[title="Qty"]').value;
            let price = item.getElementsByClassName("price")[0].innerText
            let w = item.getElementsByClassName("weight")[0].innerText.substring(8)
            sumPrice += count * parseFloat(price)
            sumWeight += count * parseFloat(w)
            console.log(count, price.split(" ")[0], w);
        }
        console.log("Price: ", sumPrice)
        document.getElementById("totalPrice").innerText = sumPrice
        document.getElementById("totalWeight").innerText = sumWeight

    }
    render() {
        const productsStore = localStorageUtil.getProducts();
        let htmlCatalog = '';
        // let sumCatalog = 0;

        CATALOG.forEach(({ id, name, price, img }) => {
            if (productsStore.indexOf(id) !== -1) {
                // htmlCatalog += `
                //     <tr>
                //         <td class="shopping-element__name">⚡️ ${name}</td>
                //         <td class="shopping-element__price">${price.toLocaleString()} zł</td>
                //     </tr>
                // `;
                htmlCatalog += this.generateProdcuct(name, "", 1, price, img)
                // sumCatalog += price;
            }
        });
        document.getElementById("productContainer").innerHTML = htmlCatalog
        this.updatePriceAndWeight()

        // const html = `
        //     <div class="shopping-container">
        //         <div class="shopping__close" onclick="shoppingPage.handleClear();"></div>
        //         <table>
        //             ${htmlCatalog}
        //             <tr>
        //                 <td class="shopping-element__name">💥 Summa:</td>
        //                 <td class="shopping-element__price">${sumCatalog.toLocaleString()} zł</td>
        //             </tr>
        //         </table>
        //     </div>
        // `;

    }
    init() {
        document.getElementById("updateCart").addEventListener("click", this.updatePriceAndWeight)
        // var a = document.getElementById("productContainer")
        // a.innerHTML = cartProducts()
        // updatePriceAndWeight()
    }
}

const shoppingPage = new Shopping();
shoppingPage.init();


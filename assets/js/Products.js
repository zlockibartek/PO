class Products {
    constructor() {
        this.classNameActive = "products-element__btn_active";
        this.labelAdd = "Dodać do koszyka";
        this.labelRemove = "Usuń z koszyka";
    }

    setActiveProducts() {
        var a = document.getElementsByClassName("products-element");
        for (var i = 0; i < a.length; i++) {
            if (localStorageUtil.getProducts().indexOf(a[i].dataset.id) > -1) {
                a[i].getElementsByTagName("button")[0].classList.add("products-element__btn_active");
                a[i].getElementsByTagName("button")[0].innerText = "Usuń z koszyka"
            }
        }
    }

    handleSetLocationStorage(element, id) {
        const { pushProduct, products } = localStorageUtil.putProducts(id);

        if (pushProduct) {
            element.classList.add(this.classNameActive);
            element.innerHTML = this.labelRemove;
        } else {
            element.classList.remove(this.classNameActive);
            element.innerHTML = this.labelAdd;
        }

        headerPage.render(products.length);
    }

    render() {
        const productsStore = localStorageUtil.getProducts();
        let htmlCatalog = "";

        PRODUCTS.Products.forEach(({ id, name, price, img }) => {
            let activeClass = "";
            let activeText = "";
            if (productsStore.indexOf(id) === -1) {
                activeText = this.labelAdd;
            } else {
                activeClass = " " + this.classNameActive;
                activeText = this.labelRemove;
            }

            htmlCatalog += `
                <li class="products-element" data-id="${id  }">
                    <span class="products-element__name">${name}</span>
                    <img class="products-element__img" src="${img}" />
                    <span class="products-element__price">
                         ${price.toLocaleString()} zł
                    </span>
                    <button class="products-element__btn${activeClass}" id="button-${id}" onclick="productsPage.handleSetLocationStorage(this, '${id}');">
                        ${activeText}
                    </button>
                </li>
            `;
        });

        const html = `
            <ul class="products-container">
                ${htmlCatalog}
            </ul>
        `;
        ROOT_PRODUCTS.innerHTML = html;
        let products = document.querySelectorAll('.products-element')
        products.forEach(element => {})
    }
}

const productsPage = new Products();
productsPage.render();
productsPage.setActiveProducts()
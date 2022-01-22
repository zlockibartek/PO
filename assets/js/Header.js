class Header {
    handlerOpenShoppingPage() {
        shoppingPage.render();
    }

    render(count) {

        const html = `
           <div class="header-container">
                <div class="header-counter" onclick="shoppingPage.appearCart();"">
                 Koszyk
                </div>
           </div>
        `;

        ROOT_HEADER.innerHTML = html;
        shoppingPage.render();
    }
}

const headerPage = new Header();

const productsStore = localStorageUtil.getProducts();
headerPage.render(productsStore.length);
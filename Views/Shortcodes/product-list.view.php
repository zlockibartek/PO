<body>
    <div id="header"></div>
    <div id="products"></div>
    <div id="shopping" style="display: none;">
        <div class="shopping-container">
            <div class="card shopping-cart">
                <div class="card-header bg-dark text-light">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Shipping cart
                    <div href="" class="btn btn-outline-info btn-sm pull-right" onclick="shoppingPage.disappearCart();">
                        Continiu shopping</div>
                    <div class="clearfix"></div>
                </div>
                <div id="productContainer" class="card-body">
                </div>
                <div class="card-body">
                    <div class="pull-right">
                        <div id="updateCart" class="btn btn-outline-secondary pull-right">
                            Update shopping cart
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                        <a href="" class="btn btn-success pull-right">Checkout</a>
                        <div class="pull-right" style="margin: 5px">
                            Total price: <b id="totalPrice"></b> zł
                        </div>

                    </div>
                    <div class="pull-left" style="margin: 5px">
                        Total weight: <b id="totalWeight"></b>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
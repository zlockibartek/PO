<body>
    <div id="header"></div>
    <div id="products"></div>
    <div id="shopping" style="display: none;">
        <div class="shopping-container">
            <div class="card shopping-cart">
                <div class="card-header bg-dark text-light">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Koszyk
                    <div href="" class="btn btn-outline-info btn-sm pull-right" onclick="shoppingPage.disappearCart();">
                        Kontynuuj zakupy
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="productContainer" class="card-body">
                </div>

                <div class="card-footer">
                    <div class="pull-right" style="margin: 10px">
                        <a href="http://po.apache:8081/zamowienie/" class="btn btn-success pull-right">Przejdź do kasy</a>
                        <div class="pull-right" style="margin: 5px">
                            Suma: <b id="totalPrice"></b> zł
                        </div>

                    </div>
                    <div class="pull-left" style="margin: 5px">
                        Łączna waga: <b id="totalWeight"></b>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
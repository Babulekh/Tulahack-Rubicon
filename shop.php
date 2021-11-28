<?php include './components/header.php'; ?>

<div class="section_main">
    <div class="wrapper_fixed container">
        <div class="store">
            <h2 class="text_main">Товары</h2>
            <div class="shop-container">
                <div class="store-item">
                    <div class="store-item__name">Мягкая игрушка</div>
                    <div class="store-item__price">
                        <div class="store-item__price__value">50</div>
                        <div class="store-item__price__name">рыбкоинов</div>
                    </div>
                    <form method="post" action="/components/buyItem.php">
                        <input type="submit" value="Купить" class="text_main">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<!-- блок товара для магазина -->
<style>
    .store-item {
        width: 300px;
    }
    .store-item__price {
        display: flex;
    }
</style>

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
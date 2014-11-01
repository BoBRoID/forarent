<link rel="stylesheet" href="/template/styles/productQuickView/reset.css">
<link rel="stylesheet" href="/template/styles/productQuickView/style.css">
<script src="/template/js/productQuickView/modernizr.js"></script>

<header>
    <h1>Product Quick View</h1>
</header>

<ul class="cd-items cd-container">
    <?php for($i = 0; $i <= 10; $i++){ ?>
    <li class="cd-item">
        <img src="/template/images/productQuickView/item-1.jpg" alt="Item Preview">
        <div class="cd-trigger">
            <a href="#0" class="cd-trigger">Quick View</a>
        </div>
    </li>
    <?php } ?>
</ul>

<div class="cd-quick-view">
    <div class="cd-slider-wrapper">
        <ul class="cd-slider">
            <li class="selected"><img src="/template/images/productQuickView/item-1.jpg" alt="Product 1"></li>
            <li><img src="/template/images/productQuickView/item-2.jpg" alt="Product 2"></li>
            <li><img src="/template/images/productQuickView/item-3.jpg" alt="Product 3"></li>
        </ul>

        <ul class="cd-slider-navigation">
            <li><a class="cd-next" href="#0">Prev</a></li>
            <li><a class="cd-prev" href="#0">Next</a></li>
        </ul>
    </div>

    <div class="cd-item-info">
        <h2>Produt Title 1</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, omnis illo iste ratione. Numquam eveniet quo, ullam itaque expedita impedit. Eveniet, asperiores amet iste repellendus similique reiciendis, maxime laborum praesentium.</p>

        <ul class="cd-item-action">
            <li><button class="add-to-cart">Add to cart</button></li>
            <li><a href="#0">Learn more</a></li>
        </ul>
    </div>
    <a href="#0" class="cd-close">Закрыть</a>
</div>
<script src="/template/js/productQuickView/jquery-2.1.1.js"></script>
<script src="/template/js/productQuickView/velocity.min.js"></script>
<script src="/template/js/productQuickView/main.js"></script>
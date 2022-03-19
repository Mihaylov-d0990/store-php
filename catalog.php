<?php 
    require_once "head.php";
    $dividingTitle = "Catalog";
    require_once "dividingTitle.php";
    
    $result = $connection->query("SELECT name, price, image FROM product");
    
?>
<div class="catalog">
    <div class="container">
        <div class="catalog__content">
            <div class="list">
                <?php 
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['name'];
                        $price = $row['price'];
                        $image = $row['image'];
                        echo '<div class="list__item">
                                <a href="$row" class="list__image">
                                    <img src="' . $image . '" alt="">
                                </a>
                                <div class="list__item-bottom">
                                    <div class="list__info">
                                        <div class="list__text">' . $name . '</div>
                                        <div class="list__price">' . $price .  '$ US</div>
                                        <div class="list__quantity quantity">
                                            <button class="quantity__button">+</button>
                                            <div class="quantity__value">1</div>
                                            <button class="quantity__button">-</button>
                                        </div>
                                    </div>
                                    <div class="list__cart">
                                        <div class="list__cart-image">
                                            <img src="images/cart.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    } 
                ?>    
            </div>
        </div>
    </div>
</div>
<?php require_once "foot.php"; ?>
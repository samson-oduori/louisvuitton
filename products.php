<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,
            initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Louis Vuitton Online Shopping</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <!-- custom css -->
    <link rel="stylesheet" type="" href="styles.css" />
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <div class="navbar-center">
            <span class="nav-icon">
                    <i class="fas fa-bars"></i>
                </span>
            <img class="louis" src="./images/louis_vuitton.png" alt="Louis
                    Vuitton" />
            <div style="color:red; margin-right:1px;">
                <a href="logout.php" style="text-decoration:none;
                        font-size:20px;">Logout</a>
            </div>
            <div class="cart-btn">
                <span class="nav-icon">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                <div class="cart-items">0</div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <h1 class="banner-title">louis vuitton</h1>
            <p>school shoes for both boys and girls</p>
            <button class="btn-primary" onclick="window.location.href=
                    'payments.php';">pay now</button>
        </div>
    </header>
    <!-- end of hero -->
    <!--products -->
    <section class="products">
        <div class="section-title">
            <h2>our products</h2>
        </div>
        <div class="products-center">
            <!-- single product -->
            <!-- <article class="product">
          <div class="img-container">
            <img src="./images/vuitton-bcg.jpeg" alt="men
              shoes" class="product-img" />
            <div class="price-top">
              <h6>$43</h6>
            </div>
            <a href="#" class="btn-primary shoe-link">description</a>
            <button class="bag-btn" data-id="1">
              <i class="fas fa-shopping-cart"></i>
              add to cart
            </button>
            <div>
              <p class="shoe-info">kings shoe</p>
            </div>
          </div>
        </article> -->
            <!-- end single product -->
        </div>
    </section>
    <!-- cart -->
    <div class="cart-overlay">
        <div class="cart">
            <span class="close-cart">
                    <i class="fas fa-window-close"></i>
                </span>
            <h2>cart</h2>
            <div class="cart-content">
                <!-- cart item -->
                <!-- <div class="cart-item">
            
          </div> -->
                <!-- end of cart item -->
            </div>
            <div class="cart-footer">
                <h3>total : $ <span class="cart-total">0</span></h3>
                <button class="clear-cart banner-btn">clear
                        cart</button>
            </div>
            <div class="cart-footer">
                <button class="clear-cart banner-btn" onclick="window.location.href=
                        'payments.php';">pay
                        now</button>
            </div>
        </div>
    </div>
    <!-- end of cart -->
    <!-- contentful -->
    <script src="https://cdn.jsdelivr.net/npm/contentful@latest/dist/contentful.browser.min.js"></script>
    <!-- app js -->
    <script src="app.js"></script>
    <!-- footer -->
    <div class="footer">
        <div class="footer-content">
            <div class="footer-section links">
                <h2>Delivery Info.</h2>
                <ul style="margin-top: 20px;">
                    <p>No free Delivery.</p>
                    <p>Goods Delivery shall be charged depending on the Quality</p>
                </ul>
            </div>
            <div class="footer-section links">
                <h2>Payment Info.</h2>
                <ul style="margin-top: 20px;">
                    <p>Payments are made online using M-pesa and/or PayPal.</p>
                    <p>No cash on Delivery shall be accepted
                    </p>
                </ul>
            </div>
            <div class="footer-section links">
                <h2>Order Info.</h2>
                <ul style="margin-top: 20px;">
                    <p>Orders are only made online..</p>
                    <p>Return any unexpected good within one week after delivery to be compensated
                    </p>
                </ul>
            </div>
            <div class="footer-section links">
                <h2>Returns And Refunds</h2>
                <ul style="margin-top: 20px;">
                    <p>Returns of damaged or unexpected goods shall be accepted within one week and customer refunded.
                    </p>
                </ul>
            </div>
        </div>

        <!-- end of footer -->
</body>

</html>
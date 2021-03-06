<?php ob_start(); ?>
<?php require_once("init.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="https://cdn.omise.co/card.js"></script>
</head>
<body>
<header class="header">
        <div class="container">
            <nav class="navigation-1">
                <div class="header--box">
                    <a href="index.php" class="header--logo"><h1>Online Shopping</h1></a>
                </div>
                <div class="search">
                    <form action="" method="POST">
                        <input type="text" class="search--input">
                        <button type="submit" class="search--button">
                            <svg class="icon icon-search">
                                <use xlink:href="img/sprite.svg#icon-search">
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="cart">
                    <a href="show_cart.php">
                        <svg class="icon icon-cart">
                            <use xlink:href="img/sprite.svg#icon-cart">
                        </svg>
                        <div class="cart--count">
                            <span id="cart--count--display"></span>
                        </div>
                    </a>
                </div>
                <div class="user">
                    <?php if(isset($_SESSION['username'])) {
                    ?>
                    <ul>
                        <li class="user--name"><a href="javascript:void(0)">
                        <svg class="icon icon-user">
                                <use xlink:href="img/sprite.svg#icon-user">
                            </svg>
                            <?php 
                                $user = User::find_user_by_id($_SESSION['id']);
                                echo $user->first_name;
                            ?></a>
                            <ul class="dropdown-list">
                                <?php 
                                if($_SESSION['role'] == 'user') {
                                ?>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="logout.php">Log out</a></li>
                                <?php } else { ?>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="admin/index.php">Admin</a></li>
                                    <li><a href="logout.php">Log out</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <?php
                    } else { ?>
                        <a href="register.php" class="user--register">สมัครสมาชิก</a>
                        <span>หรือ</span>
                        <a href="login.php" class="user--register">เข้าสู่ระบบ</a>
                    <?php } ?>
                </div>
            </nav>
        </div>
        <nav class="navigation-2">
            <div class="container">
                <ul class="category">
                    <?php 
                        $categories = Product::select_all_categories();
                        while($row = mysqli_fetch_assoc($categories)) {
                    ?>
                        <li class="category-item"><a href="index.php?cat_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
                    <?php
                        } 
                    ?>
                    <li class="category-item"><a href="order_payment.php">แจ้งการโอนเงิน</a></li>
                    <li class="category-item"><a href="order_history.php">ประวัติการสั่งซื้อ</a></li>
                </ul>
                <div class="delivery-orders">
                    <a href="show_delivery.php">
                        <svg class="icon icon-truck">
                            <use xlink:href="img/sprite.svg#icon-truck">
                        </svg>
                        <div class="delivery--count">
                            <span id="delivery--count--display"></span>
                        </div>
                    </a>
                </div>
                <a href="selling.php" class="sell-btn">อยากขาย</a>
            </div>
        </nav>
</header>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Авоська || Главная</title>
</head>

<body>
    <?php
    include 'header.php'
    ?>
    <main class="main">
        <h1 class="main_heading">Наш ассортимент</h1>
        <div class="cards">
            <?php
            require 'php/connect.php';
            $sql = "SELECT * FROM products WHERE page = '1'";
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die('Could not query the database: ' . mysqli_error($con));
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<form action="php/add_to_backet.php" class="Product" method="POST">';
                echo '<img src="' . $row['image'] . '" alt="">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p class="description">' . $row['description'] . '</p>';
                echo '<div class="add">';
                echo '<div class="Off-button">';
                echo '<button name="product_id" class="click" value="' . $row['product_id'] . '">
          <div class="plus"></div>
          </button>';
                echo '<p class="price">' . $row['price'] . '₽</p>';
                echo '</div>';
                echo "</div>";
                echo "</div>";
                echo '</form>';
            }
            ?>
        </div>
    </main>
    <footer class="header_footer">
        <div class="logo">
            <a href="">Авоська</a>
        </div>
        <div>
            <p>Адрес: г Москва улица Академика Янгеля д43 к1</p>
        </div>
        <div>
            <p>Телефон: 89671651255</p>
            <p>Email: avoska@mail.ru</p>
        </div>
    </footer>
</body>

</html>
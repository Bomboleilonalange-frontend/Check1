<?php
session_start();
require 'php/connect.php';

// Проверяем, есть ли user_id в сессии
if (!isset($_SESSION['user_id'])) {
    echo "Необходимо авторизоваться, чтобы воспользоваться корзиной!";
    exit();
}

$user_id = $_SESSION['user_id'];

// Получаем товары в корзине пользователя
$cart_items = mysqli_query($con, "SELECT product_id, quantity FROM cart WHERE user_id = $user_id") or die('Could not query the database: ' . mysqli_error($con));

// Получаем все продукты
$products = mysqli_query($con, "SELECT product_id, name, price, image FROM products") or die('Could not query the database: ' . mysqli_error($con));

$total = 0;
while ($item = mysqli_fetch_assoc($cart_items)) {
    while ($product = mysqli_fetch_assoc($products)) {
        if ($item['product_id'] == $product['product_id']) {
            $total += $product['price'] * $item['quantity'];
            echo '<div class="cart-item">';
            echo '<div class="cart-item-image"><img src="'. $product['image'] .'" alt="" width="108.1px" height="98px"></div>';
            echo '<div class="cart-item-name">' . $product['name'] .'</div>';
            echo '<div class="cart-item-quantity">' . $item['quantity'] . '</div>';
            echo '<div class="cart-item-price">' . $product['price'] .'</div>';
            echo '<a href="delete_cart_item (2).php?product_id=' . $product['product_id'] . '"><img src="img/Main-boxes/trash.svg" alt=""></a>';
            echo '</div>';
        }
    }
    mysqli_data_seek($products, 0);
}

echo '<tr>';
echo '<td colspan="3">Итого:</td>';
echo '<td>' . $total . '₽</td>';
echo '<td></td>';
echo '</tr>';
echo '</table>';

mysqli_close($con);
?>

<form action="php/clear_cart.php" method="POST">
    <button class="submit-btn" onclick="return confirm('Вы уверены, что хотите очистить корзину?');">Очистить корзину</button>
</form>
<form action="order.php" method="POST">
    <button>Оформить</button>
</form>

<?php
echo '</div>';
echo '</section>';
echo '</body>';
?>

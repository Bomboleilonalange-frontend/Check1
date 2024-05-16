<?php if (!empty($_SESSION['user_id'])) : ?>
    <header class="header_footer">
        <div class="logo">
            <a href="">Авоська</a>
        </div>
        <nav>
            <ul class="nav-list">
                <li><a href="index.php">Главная</a></li>
                <li><a href="cabinet.php">Личный кабинет</a></li>
            </ul>
        </nav>
        <div>
            <a class="backet_button" href="cart.php">Корзина</a>
        </div>
    </header>

<?php else : ?>
    <header class="header_footer">
        <div  class="logo">
            <a href="">Авоська</a>
        </div>
        <nav>
            <ul class="nav-list">
                <li><a href="index.php">Главная</a></li>
                <li><a href="reg.php">Регистрация</a></li>
                <li><a href="auth.php">Авторизация</a></li>
            </ul>
        </nav>
        <div>
            <p>Телефон: 89671651255</p>
            <p>Email: avoska@mail.ru</p>
        </div>
    </header>

<?php endif; ?>
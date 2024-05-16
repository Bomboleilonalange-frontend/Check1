-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 16 2024 г., 22:59
-- Версия сервера: 8.2.0
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ExamDemo3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `quantity`) VALUES
(19, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int NOT NULL,
  `order_id` int NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `order_id`, `method`, `address`, `cost`, `date`) VALUES
(18, 18, 'Курьерская служба', 'улица Макарова 9', '500.00', '3444-03-12'),
(19, 19, 'Курьерская служба', 'улица Макарова 9', '500.00', '3444-03-12'),
(20, 20, 'Курьерская служба', 'улица Макарова 9', '500.00', '3444-03-12'),
(21, 21, 'Курьерская служба', 'улица Макарова 9', '500.00', '3444-03-12'),
(22, 22, 'Курьерская служба', 'улица Макарова 9', '500.00', '3444-03-12'),
(23, 23, 'Курьерская служба', 'улица Макарова 9', '500.00', '3444-03-12'),
(24, 24, 'Курьерская служба', 'улица Макарова 9', '500.00', '3444-03-12'),
(25, 25, 'Курьерская служба', 'улица Макарова 9', '500.00', '3444-03-12'),
(26, 26, 'Самовывоз', '-', '0.00', '2234-02-12'),
(27, 27, 'Курьерская служба', 'улица Макарова 9', '500.00', '1111-11-11'),
(28, 28, 'Курьерская служба', 'улица Макарова 9', '500.00', '2345-02-11'),
(29, 29, 'Самовывоз', '-', '0.00', '2334-02-11');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `date`, `status`, `total`) VALUES
(16, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(17, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(18, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(19, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(20, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(21, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(22, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(23, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(24, 19, '3444-03-12', 'Заказ оформлен', '20000.00'),
(25, 19, '3444-03-12', 'Заказ подтверждён', '20000.00'),
(26, 19, '2234-02-12', 'Заказ подтверждён', '40000.00'),
(27, 19, '1111-11-11', 'Заказ подтверждён', '40000.00'),
(28, 19, '2345-02-11', 'Заказ подтверждён', '40000.00'),
(29, 19, '2334-02-11', 'Заказ подтверждён', '40000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(25, 1, 1, '20000.00'),
(26, 1, 2, '40000.00'),
(27, 1, 2, '40000.00'),
(28, 1, 2, '40000.00'),
(29, 1, 2, '40000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `image`, `type_id`, `category`, `page`) VALUES
(1, 'Авто 1', 'Цена указана за месяц', '20000', 'img/2.jpg', 'Меню', NULL, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FIO` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `Login`, `Password`, `FIO`, `Phone`, `Email`) VALUES
(19, 'ejrn', '$2y$10$YUrlVQZNHIZcqvNZxYZ/d.x3SVRb96.KTxp2AfwhP.l2heJR.pjRC', 'Ковалев Дмитрий Сергеевич', '+7(967)-165-12-33', 'dimask13082004@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

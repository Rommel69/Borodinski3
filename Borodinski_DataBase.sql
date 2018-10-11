-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 04 2018 г., 04:35
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Borodinski_DataBase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(64) NOT NULL,
  `description` varchar(355) DEFAULT NULL,
  `beard_type` varchar(32) NOT NULL,
  `date` varchar(25) NOT NULL,
  `add_service` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bids`
--

INSERT INTO `bids` (`id`, `last_name`, `first_name`, `middle_name`, `phone`, `email`, `description`, `beard_type`, `date`, `add_service`) VALUES
(8, 'Станок', 'Болеслав', 'Никитович', '83242343252', 's@mail.ru', 'ГОЛОВУ МНЕ ПОМОЙТЕ', 'Polarman', '25 Sep', 'Oтполировать лысину'),
(9, 'Бухарест', 'Владимир', 'Маслович', '0701488228', 'mak@mail.ru', 'Доп.информация для\r\nмастера.\r\n                   \r\n                    ', 'Polarman', '27 Sep', 'Убрать седину'),
(12, 'Лашпет', 'Еба', 'Васильевич', '06605313890', 'ska@gmail.com', 'Доп.информация\r\nдля\r\nмастера.\r\n         \r\n         \r\n         \r\n          ', 'Polarman', '30 Sep', 'Накрутить усы');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`group_id`, `name`, `description`) VALUES
(1, 'Administraitors', 'Администраторы сайта'),
(2, 'Users', 'Обычные пользователи');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `text` varchar(255) NOT NULL,
  `day` varchar(2) NOT NULL,
  `month` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `text`, `day`, `month`) VALUES
(13, '24 Sep', 'Клиенты сегодня скида 95% приходите!', '24', 'Sep'),
(15, '26 Sep', 'У нас новый сотрудник Борис Бритва, он профессионал своего дела, приходите.!', '26', 'Sep'),
(16, '29 Sep', 'У нас появился кофейный автомат! Теперь вы сможете насладится вкусным кофе не отходя от кассы!', '29', 'Sep'),
(17, '01 Oct', 'У нас на сайте появился магазин, теперь вы можете заказать средства для ухода и прочие товары прямо у нас на сайте!', '01', 'Oct');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` varchar(64) NOT NULL,
  `price` varchar(16) NOT NULL,
  `description` varchar(800) NOT NULL,
  `amount` varchar(12) NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `produced_by` varchar(64) NOT NULL,
  `product_image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `price`, `description`, `amount`, `in_stock`, `produced_by`, `product_image`) VALUES
(1, 'Шампунь American Crew', 'Средства для ухода', '450', 'Description', '250', 1, 'AMERICAN CREW', 'product_pics/default_product.png'),
(2, 'Набор для бритья MR NATTY', 'Бритвенные принадлежности', '3900', 'Description', '25', 1, 'MR NATTY', 'product_pics/default_product.png'),
(3, 'Бриолин', 'Средства для ухода', '290', '', '60', 1, 'MURRAYS', 'product_pics/default_product.pngpalit cu.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(32) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_surname` varchar(32) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_pick_path` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_name`, `user_surname`, `user_email`, `user_pick_path`) VALUES
(1, 'Admin', '2c1ff60471d675c0bb23259b71be81bf', 'Админ', 'Администратович', 'rommel66699@gmail.com', '../user_pics/2f7.jpg'),
(2, 'Жмых666', 'f88f444f6e7c015273e8aa0322da0623', 'Валерий', 'Жмышенко', 'asdasd@mail.ru', '../user_pics/glad.jpg'),
(3, 'Britva228', 'f88f444f6e7c015273e8aa0322da0623', 'Борис', 'Бритва', 'britva@rambler.com', '../user_pics/default_userpic.jpg'),
(4, 'bObama', '4a6ceb1626ff61c0fd663817570ec6ed', 'New', 'User', 'www.example@mail.com', '../user_pics/default_userpic.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_id`) VALUES
(1, 1),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(2, 2),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_reviews`
--

CREATE TABLE `user_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(20) DEFAULT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_reviews`
--

INSERT INTO `user_reviews` (`id`, `user_id`, `date`, `text`) VALUES
(1, 2, '2018-09-24 00:00:00', 'Вообще четкий барбершоп всего лишь 2000 рублей за стрижку!');

-- --------------------------------------------------------

--
-- Структура таблицы `user_reviews_key`
--

CREATE TABLE `user_reviews_key` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_reviews_key`
--

INSERT INTO `user_reviews_key` (`id`, `user_id`, `review_id`) VALUES
(1, 2, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_reviews`
--
ALTER TABLE `user_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_reviews_key`
--
ALTER TABLE `user_reviews_key`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user_reviews`
--
ALTER TABLE `user_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_reviews_key`
--
ALTER TABLE `user_reviews_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

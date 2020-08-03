-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 03 2020 г., 06:28
-- Версия сервера: 8.0.21-0ubuntu0.20.04.3
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Категории`
--

CREATE TABLE `Категории` (
  `id` int NOT NULL,
  `название` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Категории`
--

INSERT INTO `Категории` (`id`, `название`) VALUES
(1, 'Еда'),
(2, 'Вода'),
(3, 'СпортПит'),
(4, 'Алкоголь');

-- --------------------------------------------------------

--
-- Структура таблицы `Подкатегория_0`
--

CREATE TABLE `Подкатегория_0` (
  `id` int NOT NULL,
  `название` varchar(255) NOT NULL,
  `id_Категории` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Подкатегория_0`
--

INSERT INTO `Подкатегория_0` (`id`, `название`, `id_Категории`) VALUES
(1, 'Бакалея', 1),
(2, 'Горячие напитки ', 2),
(3, 'Протеин', 3),
(4, 'Протеин', 1),
(5, 'Крепкий', 4),
(6, 'Слабый', 4),
(7, 'Вода', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `Подкатегория_1`
--

CREATE TABLE `Подкатегория_1` (
  `id` int NOT NULL,
  `название` varchar(255) NOT NULL,
  `id_Подкатегории` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Подкатегория_1`
--

INSERT INTO `Подкатегория_1` (`id`, `название`, `id_Подкатегории`) VALUES
(1, 'Крупы', 1),
(2, 'Чай', 2),
(3, 'Протеин', 3),
(4, 'Протеин', 4),
(5, 'Пиво', 6),
(6, 'Коньяк', 5),
(7, 'Вода', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `Товар`
--

CREATE TABLE `Товар` (
  `id` int NOT NULL,
  `название` varchar(255) NOT NULL,
  `цена` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Товар`
--

INSERT INTO `Товар` (`id`, `название`, `цена`) VALUES
(1, 'Гречка', 40),
(2, 'Овсянка ', 30),
(3, 'Упаковка чая Гринфилд', 40),
(6, 'Протеин Rule 1 Whey Blend 2.27 кг Chocolate Fudge', 220),
(7, 'Упаковка пива Corona Extra светлое фильтрованное 4.2% 0.355 л x 24 шт', 600),
(8, 'Коньяк Remy Martin 1738 Accord Royal 0.7 л 40% в подарочной упаковке', 2000),
(9, 'Коньяк Hennessy VS 4 года выдержки 0.7 л 40% в подарочной упаковке', 900),
(10, 'Коньяк Gautier Gemaco VS 0.5 л 40%', 620),
(11, 'Рис', 20),
(12, 'Пшеничная ', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `Товар_Подкатегория_1`
--

CREATE TABLE `Товар_Подкатегория_1` (
  `id_Подкатегория_1` int NOT NULL,
  `id_Товар` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Товар_Подкатегория_1`
--

INSERT INTO `Товар_Подкатегория_1` (`id_Подкатегория_1`, `id_Товар`) VALUES
(1, 1),
(1, 2),
(2, 3),
(1, 1),
(2, 3),
(3, 6),
(4, 6),
(5, 7),
(6, 8),
(6, 10),
(6, 9),
(1, 11),
(1, 12),
(7, 10),
(7, 9),
(7, 8),
(7, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Категории`
--
ALTER TABLE `Категории`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Подкатегория_0`
--
ALTER TABLE `Подкатегория_0`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Категории` (`id_Категории`);

--
-- Индексы таблицы `Подкатегория_1`
--
ALTER TABLE `Подкатегория_1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Подкатегории` (`id_Подкатегории`);

--
-- Индексы таблицы `Товар`
--
ALTER TABLE `Товар`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Товар_Подкатегория_1`
--
ALTER TABLE `Товар_Подкатегория_1`
  ADD KEY `id_Подкатегория_1` (`id_Подкатегория_1`),
  ADD KEY `id_Товар` (`id_Товар`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Категории`
--
ALTER TABLE `Категории`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Подкатегория_0`
--
ALTER TABLE `Подкатегория_0`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `Подкатегория_1`
--
ALTER TABLE `Подкатегория_1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `Товар`
--
ALTER TABLE `Товар`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Подкатегория_0`
--
ALTER TABLE `Подкатегория_0`
  ADD CONSTRAINT `Подкатегория_0_ibfk_1` FOREIGN KEY (`id_Категории`) REFERENCES `Категории` (`id`);

--
-- Ограничения внешнего ключа таблицы `Подкатегория_1`
--
ALTER TABLE `Подкатегория_1`
  ADD CONSTRAINT `Подкатегория_1_ibfk_1` FOREIGN KEY (`id_Подкатегории`) REFERENCES `Подкатегория_0` (`id`);

--
-- Ограничения внешнего ключа таблицы `Товар_Подкатегория_1`
--
ALTER TABLE `Товар_Подкатегория_1`
  ADD CONSTRAINT `Товар_Подкатегория_1_ibfk_1` FOREIGN KEY (`id_Подкатегория_1`) REFERENCES `Подкатегория_1` (`id`),
  ADD CONSTRAINT `Товар_Подкатегория_1_ibfk_2` FOREIGN KEY (`id_Товар`) REFERENCES `Товар` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

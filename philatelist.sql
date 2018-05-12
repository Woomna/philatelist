-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 11 2018 г., 16:47
-- Версия сервера: 5.7.11-log
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phil`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'Флора'),
(2, 'Фауна'),
(3, 'Космос'),
(4, 'Архитектура'),
(5, 'Личности'),
(6, 'Победа');

-- --------------------------------------------------------

--
-- Структура таблицы `Country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id_country` int(11) NOT NULL,
  `country_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Country`
--

INSERT INTO `country` (`id_country`, `country_name`) VALUES
(1, 'Англия'),
(2, 'Бразилия'),
(3, 'Италия'),
(4, 'СССР'),
(5, 'Куба');

-- --------------------------------------------------------

--
-- Структура таблицы `Perforation`
--

CREATE TABLE IF NOT EXISTS `perforation` (
  `id_perforation` int(11) NOT NULL,
  `perforation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Perforation`
--

INSERT INTO `perforation` (`id_perforation`, `perforation`) VALUES
(1, '10-11'),
(2, '10-11 1/2'),
(3, '11-12'),
(4, '11-12 1/2'),
(5, '12-14');

-- --------------------------------------------------------

--
-- Структура таблицы `Stamp`
--

CREATE TABLE IF NOT EXISTS `stamp` (
  `id_stamp` int(11) NOT NULL,
  `id_country` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_perforation` int(11) DEFAULT NULL,
  `stamp_name` varchar(50) DEFAULT NULL,
  `stamp_year` smallint(6) DEFAULT '0',
  `stamp_picture` varchar(50) DEFAULT NULL,
  `stamp_history` text,
  `cost` double(10,2) DEFAULT NULL,
  `raritet` int(11) DEFAULT NULL,
  `counts_in_world` varchar(10) DEFAULT NULL,
  `dat_add` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Stamp`
--

INSERT INTO `stamp` (`id_stamp`, `id_country`, `id_category`, `id_perforation`, `stamp_name`, `stamp_year`, `stamp_picture`, `stamp_history`, `cost`, `raritet`, `counts_in_world`, `dat_add`) VALUES
(1, 4, 2, 1, 'Сова', 1961, '/img/ussr-marka-1990-owls-small.gif', 'Почтовые марки СССР 1961 год, охраняйте полезных животных В наборе 6 почтовых марок, серия "Охраняйте полезных животных". Художник почтовой миниатюры А. Комаров. Гребенчатая 12 ½ : 12 (6, 10к), гребенчатая 12 : 12½ (1к);', 200.00, 1, '10', '2018-03-08 00:00:00'),
(2, 4, 2, 1, 'Бобр', 1961, '\\img\\ussr-marka-1961-beaver.gif', 'Почтовые марки СССР 1961 год, охраняйте полезных животныхВ наборе 6 почтовых марок, серия', 200.00, 1, '<6', '2018-03-07 00:00:00'),
(3, 4, 2, 1, 'Белка', 1961, '/img/ussr-marka-1961-squirrel.gif', 'Почтовые марки СССР 1961 год, охраняйте полезных животных В наборе 6 почтовых марок, серия "Охраняйте полезных животных". Художник почтовой миниатюры А. Комаров. Гребенчатая 12 ½ : 12 (6, 10к), гребенчатая 12 : 12½ (1к);', 200.00, 1, '34', '2018-03-01 00:00:00'),
(4, 4, 2, 1, 'Кабан', 1961, '/img/ussr-marka-1988-boar.gif', 'Почтовые марки СССР 1961 год, охраняйте полезных животных\r\nВ наборе 6 почтовых марок, серия "Охраняйте полезных животных". Художник почтовой миниатюры А. Комаров. Гребенчатая 12 ½ : 12 (6, 10к), гребенчатая 12 : 12½ (1к)', 200.00, 1, '12', '2018-03-03 00:00:00'),
(5, 4, 2, 1, 'Рябчик', 1961, NULL, 'Почтовые марки СССР 1961 год, охраняйте полезных животных\r\nВ наборе 6 почтовых марок, серия "Охраняйте полезных животных". Художник почтовой миниатюры А. Комаров. Гребенчатая 12 ½ : 12 (6, 10к), гребенчатая 12 : 12½ (1к)', 200.00, 0, '>100', '2018-03-01 00:00:00'),
(10, NULL, NULL, NULL, 'bdbnnc', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 4, 1, 5, 'Лев', 2345, '/img/mongolia-marka-1979-lev.gif', 'qewrewrwer', 1.00, 0, '1', '2018-03-09 22:00:47'),
(14, 4, 1, 5, 'Волк', 2017, '/img/bolgar-stamps-1977-wolf.gif', 'куекрнекркно', 2.00, 0, '3', '2018-03-10 11:34:51');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `Country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Индексы таблицы `Perforation`
--
ALTER TABLE `perforation`
  ADD PRIMARY KEY (`id_perforation`);

--
-- Индексы таблицы `Stamp`
--
ALTER TABLE `stamp`
  ADD PRIMARY KEY (`id_stamp`);

--
-- Индексы таблицы `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `Country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `Perforation`
--
ALTER TABLE `perforation`
  MODIFY `id_perforation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `Stamp`
--
ALTER TABLE `stamp`
  MODIFY `id_stamp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

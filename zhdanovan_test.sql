-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2023 г., 11:29
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zhdanovan_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `phone3` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `email`, `company_name`, `position`, `phone1`, `phone2`, `phone3`) VALUES
(36, 'авпавп', 'апвпавп', 'artemcka@gmail.com', 'nobody', 'nobody', '12345', '', ''),
(37, 'kjhk', 'jhkhjk', 'artemcka@gmail.com', 'Google', 'nobody', '+79137990640', '', ''),
(40, 'sdsdadf', 'gfdgfdg', 'artemcka@gmail.com', 'Google', 'sdffds', '+79137990640', '', ''),
(41, 'sdfdsfcxvxcvv', 'dfsfsdfjfhgjhg', 'artemcka@gmail.com', 'Yandex', 'sdfsdfdsf', '+79137990640', '', ''),
(42, 'sdsd', 'sdsd', 'sddsd@gmail.com', 'Google', 'dsffsdf', '+79137990640', '', ''),
(43, 'fdsfsdf', 'sdfsdfds', 'artemcka@gmail.com', 'Yandex', 'dsfsdfs', '+79137990640', '', ''),
(44, 'sdfsdf', 'dsfdsfds', '11@yandex.ru', 'nobody', 'sdfdsf', '12345', '', ''),
(45, 'sdfdsfsd', 'dsfdsfsd', '11@yandex.ru', 'nobody', 'sdfsdf', '12345', '', ''),
(46, 'Артемий', 'dsfds', 'artemcka@gmail.com', 'nobody', '', '12345', '', ''),
(47, 'авпавп', 'dsfds', 'artemcka@gmail.com', 'nobody', '', '12345', '', ''),
(48, 'Артемий', 'Жданов', 'artemcka@gmail.com', 'Yandex', '', '+79137990640', '', ''),
(49, 'авпавп', 'dsfds', 'artemcka@gmail.com', 'nobody', '', '12345', '', ''),
(50, 'fdsfd', 'dsfdsf', 'artemcka@gmail.com', 'nobody', '', '12345', '', ''),
(51, 'err', 'errr', 'err@gmail.com', 'nobody', '', '12345', '', ''),
(52, 'err', 'errr', 'err@gmail.com', 'nobody', '', '12345', '', ''),
(53, 'err1', 'errr', 'err@gmail.com', 'nobody', '', '12345', '', ''),
(54, 'err1', 'errr', 'err@gmail.com', 'nobody', '', '12345', '', ''),
(57, 'valera', 'meladze', 'err@gmail.com', 'nobody', '', '12345', '', ''),
(59, 'test5', 'testov', 'testov@gmail.com', 'testcore', '', '', '', ''),
(60, 'err3', 'errr', 'err@gmail.com', 'nobody', '', '12345', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 28 2024 г., 22:12
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bol`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `about` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `about`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_specialties` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `phone`, `email`, `img`, `id_specialties`) VALUES
(1, 'Никольский Андрей Тимурович', '+7999999999', 'andreydoc@gmail.com', '1.jpg', 1),
(2, 'Новиков Кирилл Михайлович', '+7888888888', 'novikovcardio@gmail.com', '2.jpg', 2),
(3, 'Цветкова Камила Денисовна', '+7777777777', 'cvetkovakamila@gmail.com', '3.jpg', 4),
(4, 'Некрасова Василиса Олеговна', '+7666666666', 'nekrasovadoc@gmail.com', '4.jpg', 1),
(5, 'Чистяков Артём Миронович', '+7555555555', 'artemmironchdoc@gmail.com', '5.jpg', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `entry`
--

CREATE TABLE `entry` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_doctor` int NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `entry`
--

INSERT INTO `entry` (`id`, `id_user`, `id_doctor`, `time`, `date`) VALUES
(1, 1, 1, '00:00:00', '2024-05-21'),
(2, 1, 1, '16:44:00', '2024-05-22'),
(3, 1, 1, '16:45:00', '2024-05-23'),
(4, 1, 1, '01:23:00', '2024-05-23'),
(5, 1, 1, '15:22:00', '2024-05-30'),
(6, 1, 1, '15:22:00', '2024-05-30'),
(7, 1, 1, '15:22:00', '2024-05-30');

-- --------------------------------------------------------

--
-- Структура таблицы `gender`
--

CREATE TABLE `gender` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `gender`
--

INSERT INTO `gender` (`id`, `name`, `icon`) VALUES
(1, 'Мужской', 'male.png'),
(2, 'Женский', 'woman.png');

-- --------------------------------------------------------

--
-- Структура таблицы `specialties`
--

CREATE TABLE `specialties` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `specialties`
--

INSERT INTO `specialties` (`id`, `name`, `img`) VALUES
(1, 'Педиатрия', 'pediatria.jpg'),
(2, 'Кардиология', 'cardio.jpg'),
(3, 'Ортопедия', 'ortoped.jpg'),
(4, 'Гинекология', 'vulva.jpg'),
(5, 'Неврология', 'nevro.jpg'),
(6, 'Психиатрия', 'brain.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int DEFAULT NULL,
  `id_gender` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `address`, `email`, `password`, `admin`, `id_gender`) VALUES
(1, 'Павлов Константин Фёдорович', '99999999999', '123', '123@1', '202cb962ac59075b964b07152d234b70', 0, 1),
(2, 'admin', '0', '0', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_specialties` (`id_specialties`);

--
-- Индексы таблицы `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `entry`
--
ALTER TABLE `entry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id_specialties`) REFERENCES `specialties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `entry_ibfk_1` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entry_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

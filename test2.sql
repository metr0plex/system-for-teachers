-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 22 2023 г., 13:35
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `number_group`
--

CREATE TABLE `number_group` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `number_group`
--

INSERT INTO `number_group` (`id`, `number`, `id_user`, `status`) VALUES
(2, 482, 67, 2),
(3, 474, 67, 1),
(4, 472, 67, 1),
(5, 444, 72, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `id_number_group` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `name`, `surname`, `patronymic`, `age`, `id_number_group`, `image`) VALUES
(5, 'Вова', 'Семочкен', 'Максимович', 12, 5, ''),
(6, 'Денис', 'Денис', 'Денис', 15, 5, ''),
(14, 'Виталий', 'Асанов', 'Николаевич', 111, 5, 'promocode.png'),
(16, 'Данил', 'Мамонтов', 'Валерьевич', 13, 5, 'Untitled Diagram (7).png'),
(19, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 123, 2, 'sss.jpg'),
(20, 'dd', 'ad', 'aaa', 123, 3, 'sss.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `study_event`
--

CREATE TABLE `study_event` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `type_of_competition` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `study_event`
--

INSERT INTO `study_event` (`id`, `id_user`, `id_student`, `type_of_competition`, `location`, `date`, `place`) VALUES
(1, 4, 5, 'Робототехника', 'Школа 4', '2022-05-10', 1),
(2, 73, 16, 'Физика', 'Лицей номер 8 ', '2022-04-15', 2),
(3, 74, 14, 'Танцы', 'Школа 40', '2018-09-12', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher_performance`
--

CREATE TABLE `teacher_performance` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teacher_performance`
--

INSERT INTO `teacher_performance` (`id`, `id_user`, `type`, `topic`, `date`) VALUES
(6, 5, 'Доклад', '\"Окружающая среда\"', '2022-05-04'),
(7, 5, 'Научный доклад', '\"It в 2022 году\"', '2022-05-01'),
(8, 74, 'Доклад', '\"Психология\"', '2021-10-18'),
(9, 73, 'Доклад', '\"Литература\"', '2022-05-18');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `active` tinyint(10) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 0,
  `secret_key` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `surname`, `patronymic`, `password`, `active`, `role`, `secret_key`, `auth_key`) VALUES
(4, 'admin@mail.ru', 'Админ', 'Админ', 'Админ', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 'wg49jJlNlIE9TozAP0mFxWaJ9T91o-iv_1654217051', ''),

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `number_group`
--
ALTER TABLE `number_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_number_group` (`id_number_group`);

--
-- Индексы таблицы `study_event`
--
ALTER TABLE `study_event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_student` (`id_student`);

--
-- Индексы таблицы `teacher_performance`
--
ALTER TABLE `teacher_performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `number_group`
--
ALTER TABLE `number_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `study_event`
--
ALTER TABLE `study_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `teacher_performance`
--
ALTER TABLE `teacher_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `number_group`
--
ALTER TABLE `number_group`
  ADD CONSTRAINT `number_group_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`id_number_group`) REFERENCES `number_group` (`id`);

--
-- Ограничения внешнего ключа таблицы `study_event`
--
ALTER TABLE `study_event`
  ADD CONSTRAINT `study_event_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `study_event_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`);

--
-- Ограничения внешнего ключа таблицы `teacher_performance`
--
ALTER TABLE `teacher_performance`
  ADD CONSTRAINT `teacher_performance_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

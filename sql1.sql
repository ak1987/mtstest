-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 22 2018 г., 17:58
-- Версия сервера: 10.0.31-MariaDB-0ubuntu0.16.04.2
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mtstest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat_sessions`
--

CREATE TABLE `chat_sessions` (
  `id` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `chat_id` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat_sessions`
--

INSERT INTO `chat_sessions` (`id`, `user_id`, `chat_id`, `is_active`) VALUES
('-5In7lHFT7QNEhGYQKrav3SnEojEc1Zb', 5, 1, 1),
('-IKqyrxvub2kVaTE-UZRs4T4BpNZozYu', 5, 1, 1),
('00yT7Eymx9fDOR5b1H89VBKo43qNRvrk', 1, 0, 1),
('0JOS4_xcysY3pk-K4BU8jYb55PVC36v0', 5, 1, 1),
('0WxdX_UVj8HzJcjltANlCx8JJMTHeFmM', 5, 1, 1),
('0hHh5B7RqbIRQRw9wwa7lJ7L5_MpS7FY', 5, 1, 1),
('3WrpsEJalpBsFx9C7EYeA5RBNJif6BDN', 5, 1, 1),
('3aGVuub2sCqfHAiKEucvgJCEdwaHE5hy', 1, 0, 1),
('3lT9eeTgil9oPFivy2Iyb5WD6m_IErIo', 1, 0, 1),
('3yVGZBLkVZEcldwS6ztXflJm4Y7lY4-8', 5, 1, 1),
('498GkeN2rGay--5Vu3bUbcKZCNQnFDHQ', 5, 1, 1),
('4plHyGXEHeZHPEohFXcV2tAPmCk4EUJr', 5, 1, 1),
('5xhYrtILL8335M_TIXgSPzxZCahsu6cS', 5, 1, 1),
('6HcEcHRQUGHjeN4RDCeo4uUhXlLxVHYN', 1, 0, 1),
('6_jIyJdoQdvhvixgNuS8IIY6_ms4jOa-', 5, 1, 1),
('70xsV6thwnI78yHx9QBMUfaD0XVrnul9', 1, 0, 1),
('7LJHQ3AWwCwxbfpFlP894xBTNJrPFcb3', 5, 1, 1),
('8Af5NGMKGv7jvORnQeu0phI08pRQbCSR', 4, 2, 1),
('92gLaDbDROXl5UfRGqplF8y_SZmapEd6', 5, 1, 1),
('95M4v02nwXjakXJkM2kGKlqCPT6jntmH', 1, 0, 1),
('9E6XSNeEb9650xxckfLk2JbCIX5kFDlO', 5, 2, 1),
('Agrl80O5scMn-EBp6gKLNgBoBHEgP4Kx', 5, 2, 1),
('B2U-pfTn5QLMyx7wCtVdsmjsExRX0wRj', 4, 1, 1),
('B8J3LpsqCAhSTpyAOW3B_PLiO49z-76k', 4, 1, 1),
('BVnCXvAdRsikN2rW5i361vWREdgfK25L', 5, 1, 1),
('C3haYgmPnONP1hY909Sztjo-GFN5QydY', 4, 1, 1),
('CdOs_OeWk0UgqQb7pSKKIryi9XsKF3bh', 1, 0, 1),
('DunSCYYOqqFmOs-ViZAcxbu1O52L8era', 1, 0, 1),
('E25Uk3P6nCt0uwjZtMVli-GDW_dDA9jK', 4, 1, 1),
('EW-9aw1mR5uzrE8JPMeKsRDNXNu80GAZ', 5, 2, 1),
('FQQIddRV4fJQbprdoQiBvVzcDpAvBIE4', 4, 1, 1),
('Fw_WKMfgE-qBVg9TIMoiQwI0knOMhfIu', 1, 0, 1),
('FxJIlmAPVCu6qrm_YRtS2RbG0KHtRi-c', 1, 0, 1),
('G_hWnps5U8RVUNSSlhX2mAuSlRzeKtUs', 1, 0, 1),
('GtTsh5ZAjxSTSApvarAkh0CS8snDciOf', 5, 2, 1),
('Gtq6sUWXzSSKfxlMa1dxKjh9H1VSENvZ', 1, 0, 1),
('Hpe-NSq1q7CuLhiWwKSd016y-E6VaE0O', 1, 0, 1),
('IR031e45kZrWFyoOdFw51fkJgfXJioxa', 5, 1, 1),
('IRD_x21UoXrjt0ZLyr6cfuVXwIR8JRM0', 1, 0, 1),
('IqknigGJdV_v3AAHUyc5UYpi5x6JDZKa', 5, 2, 1),
('JTQ_NOprz-jEH4pw0Q8mu9kze480hTlM', 5, 2, 1),
('K3LO-IRp22z4boSHCuZcPTRwUVNT4syD', 1, 0, 1),
('K9-N7cvstN8QSKMyc5LOx5dP4h3kpKSe', 1, 0, 1),
('LDxpccdo2XE4SvfTc7WpelfTCBhRZ96T', 5, 1, 1),
('LLPMAoS_0M8L8-ciO7QEbS5kioeNnol-', 1, 0, 1),
('MO5YbErYReSshxjUAjOrBfmF-MgNxSkW', 4, 1, 1),
('MSxLluVOycV8dW4bDDt4kmZ7O0dedtiD', 1, 0, 1),
('MoD2yQ0MTfQPi0T9ETxBLWiGdTJvyYAl', 1, 0, 1),
('N2m7Z9GSTkKNEco2xulVemxN5hLLqkCR', 5, 1, 1),
('NrArrIQ_IYA_yvjZp8kokuKZEUaVkTX6', 1, 0, 1),
('NzU9RwPdLRF5O5lMPJm0t7zyt4NwOIP6', 5, 1, 1),
('OLpdg6yzY_efgsVnHoSnMvabQ35nVKEq', 1, 0, 1),
('OOdjMIUn4b6kBW5-U_QbvDVFTkPS762z', 5, 2, 1),
('OfteSTE3Er9A9-nSVaWNXtN5Tphr4QXJ', 5, 2, 1),
('OhI0s_BcQuYgl9zvmudbLeVAT1bsKu5V', 5, 1, 1),
('PDWQP7YXV2LJs95i9874_t11feJn9j-O', 4, 2, 1),
('PDZpwJn49EuC2UhItKPywtRPFatT8TMv', 5, 1, 1),
('PVlMCKoMiK7bYWZCABPklTKn6xfTGfVY', 4, 1, 1),
('Q11ZQNWVTGZUGTGkvYKyMplDmGs_yTsk', 4, 1, 1),
('QOflTteWd8AJbsaSgq52MRlzOmnl-U3g', 1, 0, 1),
('S1bGg6IFvEQ4t2cE3jL7V899HAd-W3CJ', 1, 0, 1),
('Sm6LuyjbgpMacAHeaOpxAA04OXYZmYRZ', 1, 0, 1),
('Ubc2-zfngAnSHRhI6A2wgGPJvUEKYTqR', 5, 1, 1),
('VjmZ1KqE80zKcUFrYiXjG0zq_yNawUZY', 5, 1, 1),
('W1SIT0z9qRcsbmMkKjRBKe0yITVSfGgj', 5, 1, 1),
('WlDC47rU6esnr_bZ88MWshSLnitsJpuv', 5, 1, 1),
('XVc_8Hd0Es89xnZqz6b_hA5Xmz45V7ye', 1, 0, 1),
('XlcicSa7g_u6dcbLfJhJlagQ8BByoOL5', 4, 2, 1),
('_1L86xK2RdsA70sAFK-u4iMUrfdaxM4s', 1, 0, 1),
('_FgARFls8k1YM48zBvsVQsNjkW9occOy', 1, 0, 1),
('aNCo6xmnPr86AvIZMH9AEHUlAZl17T-m', 1, 0, 1),
('aX7f5Id3EdTFdwdalLSiMFs7uoIDvocm', 1, 0, 1),
('aZhD5VAt1HK5-TcOtyI3Mm2spSY-yRXn', 5, 2, 1),
('b5N7XOYMYh9CKSV_kdUE4dKay5WaoUQ0', 4, 1, 1),
('bYcNTAloCse-00PIdpik0aTBOhEx8ZYO', 5, 1, 1),
('d1REhFgoyVUfBiXDbskP73mW1uvt58EL', 1, 0, 1),
('d1m8KTBk-m7dN48HhBFiK4NwiRgCfX4V', 5, 1, 1),
('dmjQ5_dEbUvntUS3siiBhdzJzgDkT1vd', 5, 1, 1),
('dnX7UR21MlV4UXJxb_8QjTHWwsktNkCv', 5, 1, 1),
('dz7wHXiG13LhH7AZ4AOidhIBPLYEtB8f', 4, 2, 1),
('e98JSd7Zdu7N_K8uU04sYg2Ilpzf8azB', 4, 1, 1),
('eCmtecIqkMyxLhWJ1RNwq68kxnokXO-C', 4, 1, 1),
('fescdtostOJwu7C64z206vhZNw1ib7bi', 5, 2, 1),
('gD9UfvmH_NqPXWRk2ZQp7FjnOdtotlVl', 4, 2, 1),
('gvQTSUTIVYfhn-YQvCvPcrqFd0UB759Q', 5, 2, 1),
('hTuZKQNm1ueqN-nMtd14cQyCQCCqVa7k', 5, 1, 1),
('himzpo0hfj4i9Tu3nL07q7yqGsBDqwoG', 1, 0, 1),
('hymxdYUlM9k3t24DQXvSbMFntRlvdf9M', 4, 1, 1),
('kN40ySNc4daqlWhbcX7xbE8WNU84F3B4', 5, 2, 1),
('lQrXR5S-wu8ALS8m3HAJauJSdTP7cnxI', 4, 2, 1),
('lzbBvV7jFSdoWe6W4kPGOF59ozRvORin', 1, 0, 1),
('mAQ3lheKyMugrJ2mOrmf4yTnqnwcaO2H', 5, 1, 1),
('mScStd1pmCuM06szzwBlz7_xhV1d2Jcw', 5, 1, 1),
('nLJCGzIzh-Ohq1j6p5v-zyvapqgneflE', 1, 0, 1),
('nNNbpF2-f7CQEEXCjd2bbYr_d5Ofn0yR', 5, 1, 1),
('nnt6OjA2A1XATkrnLmVNLV7uXR7pCAuv', 5, 1, 1),
('pEZGNMsLOcF-_dpTRHGPBhj1ZFysH7Gs', 4, 1, 1),
('pqLhdt79emdJslrLu3o23pmSgr5yYSo3', 5, 1, 1),
('qPlfhTDoBZLmvn_VDeuczhCAvke6wyK0', 4, 1, 1),
('r5jE0xAqPVLCCNURC7vgOEllOpgEMekp', 4, 1, 1),
('r_6rDGRjB8e6sN1GTJCEWV3tqYLzMHCs', 1, 0, 1),
('stRu9qw9wolp77O3cV5xZUziGPp4SVg0', 5, 1, 1),
('t3mXieDN2Ci2t91jr8KK1CpQa3hi-Prn', 1, 0, 1),
('v2YroS-SXV2WEKtmDwFEFXkKrWvdKG6a', 5, 1, 1),
('vXQGyXW4TfaJD4B_D1DakB-9IPCN0zXp', 4, 1, 1),
('vaQWuS_9FQcWbZSOB_-6FpTBtBCwbyZW', 4, 1, 1),
('waZYiXkWV3hF9-7eN2Hof10pxzw6PHfJ', 1, 0, 1),
('wxboXY4KYBqj6f-WGOFw1zBCvwD3gRpO', 5, 2, 1),
('xT3fVgy_QoKu07jk2iBoQ6SHXQFQH8SG', 4, 1, 1),
('xbWpCqyoNLtq55vrZ-v21HgEk01oCTfu', 1, 0, 1),
('yhdx40LZz9Z9321JlrDcv_bJkFBxrtb0', 4, 1, 1),
('ynKMqwJLwLDzI7tAlCQZcOeYyaZRPk4C', 5, 1, 1),
('z6hUkvp8sHdkMhTo2_YidSXoq3hj2mZZ', 4, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `chat_id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `chat_id`, `text`, `datetime`) VALUES
(1, 1, 1, '123', '2018-05-21 09:35:28'),
(2, 1, 2, '222', '2018-05-21 09:35:36'),
(3, 1, 1, 'sss', '2018-05-21 09:35:48'),
(4, 1, 1, 'ыыы', '2018-05-21 15:13:39'),
(5, 4, 1, '111', '2018-05-22 09:02:39'),
(6, 5, 1, '333', '2018-05-22 09:02:56'),
(7, 4, 1, '111', '2018-05-22 09:06:10'),
(8, 4, 1, '111', '2018-05-22 09:06:11'),
(9, 4, 1, '111', '2018-05-22 09:06:11'),
(10, 4, 1, '111', '2018-05-22 09:09:03'),
(11, 4, 1, '111', '2018-05-22 09:10:41'),
(12, 4, 1, '111', '2018-05-22 09:11:39'),
(13, 4, 1, '123', '2018-05-22 09:12:18'),
(14, 4, 1, '333', '2018-05-22 09:12:22'),
(15, 4, 1, '1', '2018-05-22 09:12:54'),
(16, 4, 1, '1', '2018-05-22 09:13:10'),
(17, 4, 1, '123', '2018-05-22 09:13:55'),
(18, 4, 1, ' 123', '2018-05-22 09:18:34'),
(19, 4, 1, '321', '2018-05-22 11:04:10'),
(20, 5, 1, '123', '2018-05-22 11:49:03'),
(21, 4, 1, '321', '2018-05-22 11:49:14'),
(22, 4, 2, '555', '2018-05-22 11:49:22'),
(23, 4, 2, '333', '2018-05-22 11:49:47'),
(24, 4, 1, '444', '2018-05-22 11:49:52');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `token` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `token`) VALUES
(1, 'admin', '123'),
(4, 'Петя', 'MgFNbQbY86_CfXy0hHYpUQj8SYTkJ6he'),
(5, 'Саша', 'LRc6hTvSuvYdXiZT57baXNiqufOVV2K-');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat_sessions`
--
ALTER TABLE `chat_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token` (`token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chat_sessions`
--
ALTER TABLE `chat_sessions`
  ADD CONSTRAINT `chat_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

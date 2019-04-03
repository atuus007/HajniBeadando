-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2019. Már 26. 14:36
-- Kiszolgáló verziója: 8.0.15
-- PHP verzió: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `test_db`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `arrived` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `comment`, `arrived`) VALUES
(1, '413241', 'john@example.com', 'fsadfasfdsafdsadfasdfas', '2019-03-25 00:00:00'),
(2, '432reeqwdf', 'john@example.com', 'fsadfasfdsafdsadfasdfas', '2019-03-25 00:00:00'),
(3, '1111111111111111112', '2523@1.com', 'fasafdasfdasdfasdfsadfs', '2019-03-25 00:00:00'),
(4, 'kamera', '2@2.cr', 'sfasd43qre123453245234523452', '2019-03-25 00:00:00'),
(5, 'rwqerqwe', '2@2.cr', 'sfasd43qre123453245234523452', '2019-03-25 13:52:16');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_login` date NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `last_login`, `active`) VALUES
(2, 'admin', 'Admin', 'Lajos', '21232f297a57a5a743894a0e4a801fc3', '2019-03-13', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

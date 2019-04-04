-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Mar 2019, 09:22
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sound_news`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `wykonawca_id` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `gatunek_id` int(11) NOT NULL,
  `data_wydania` date NOT NULL,
  `okladka` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `album`
--

INSERT INTO `album` (`id`, `wykonawca_id`, `nazwa`, `gatunek_id`, `data_wydania`, `okladka`) VALUES
(1, 6, 'Hydrograd', 6, '2017-06-30', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunek`
--

CREATE TABLE `gatunek` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gatunek`
--

INSERT INTO `gatunek` (`id`, `nazwa`) VALUES
(1, 'Heavy Metal'),
(2, 'Electro Rock'),
(3, 'Rap'),
(4, 'Dubstep'),
(5, 'Trap'),
(6, 'Rock'),
(7, 'Blues'),
(8, 'Pop'),
(9, 'Ambient'),
(10, 'Country'),
(11, 'Disco Polo'),
(12, 'Eurobeat'),
(13, 'Jazz'),
(14, 'Punk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recenzje`
--

CREATE TABLE `recenzje` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `tekst` text COLLATE utf8_polish_ci NOT NULL,
  `ocena` int(11) NOT NULL,
  `data` date NOT NULL,
  `is_up` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `recenzje`
--

INSERT INTO `recenzje` (`id`, `album_id`, `tekst`, `ocena`, `data`, `is_up`) VALUES
(1, 1, 'tak', 5, '2019-03-28', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'adminqwerty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wykonawca`
--

CREATE TABLE `wykonawca` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wykonawca`
--

INSERT INTO `wykonawca` (`id`, `nazwa`) VALUES
(1, '10 Years'),
(2, 'Bad Religion'),
(3, 'Dead Kennedys'),
(4, 'Groundbreaking'),
(5, 'Nine Inch Nails'),
(6, 'Stone Sour'),
(7, 'Slayer'),
(8, 'Pink Floyd'),
(9, 'Megadeth'),
(10, 'Ghostemane'),
(11, 'Scarlxrd'),
(12, 'Manuel'),
(13, 'Piękni i Młodzi'),
(14, 'After Party'),
(15, 'Bruno Mars'),
(16, 'Ed Sheeran'),
(17, 'Eminem'),
(18, 'Snoop Dogg'),
(19, 'Louis Armstrong'),
(20, 'Art Tatum'),
(21, 'Rick Astley'),
(22, 'ZZ Top'),
(23, 'Led Zeppelin'),
(24, 'DJ Spooky'),
(25, 'Shining'),
(26, 'Biosphere'),
(27, 'Skrillex'),
(28, 'The Beatles'),
(29, 'Datsik'),
(30, 'Tim McGraw'),
(31, 'Alabama');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gatunek_id` (`gatunek_id`),
  ADD KEY `wykonawca_id` (`wykonawca_id`);

--
-- Indeksy dla tabeli `gatunek`
--
ALTER TABLE `gatunek`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wykonawca`
--
ALTER TABLE `wykonawca`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `gatunek`
--
ALTER TABLE `gatunek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `wykonawca`
--
ALTER TABLE `wykonawca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`wykonawca_id`) REFERENCES `wykonawca` (`id`),
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`gatunek_id`) REFERENCES `gatunek` (`id`);

--
-- Ograniczenia dla tabeli `recenzje`
--
ALTER TABLE `recenzje`
  ADD CONSTRAINT `recenzje_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Kwi 2019, 20:42
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quiz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria_pytan`
--

CREATE TABLE `kategoria_pytan` (
  `id` int(11) NOT NULL,
  `kategoria` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria_pytan`
--

INSERT INTO `kategoria_pytan` (`id`, `kategoria`) VALUES
(1, 'css'),
(2, 'sql'),
(3, 'php');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `id` int(11) NOT NULL,
  `tresc` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `a` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `b` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `c` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `d` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `poprawna` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `kategoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`id`, `tresc`, `a`, `b`, `c`, `d`, `poprawna`, `kategoria`) VALUES
(3, 'W języku CSS wcięcie pierwszej linii akapitu na 30 pikseli uzyska się za pomocą zapisu', 'p {text-indent: 30px; }', 'p { text-spacing: 30px; }', 'p { line-height: 30px; }', 'p { line-indent: 30px; }', 'p {text-indent: 30px; }', 1),
(4, 'Polecenie języka SQL w postaci: ALTER TABLE \'miasta\'ADD \'kod\' text;', 'zamienia nazwę tabeli miasta na nazwę kod', 'dodaje do tabeli kolumnę o nazwie kod typu text', 'dodaje do tabeli dwie kolumny o nazwach: kod i text', 'w tabeli miasta zamienia nazwę kolumny kod na nazwę text', 'dodaje do tabeli kolumnę o nazwie kod typu text', 2),
(5, 'Aby ustawić czcionkę Verdana w kodzie CSS, należy wykorzystać właściwość', 'font-family: Verdana;', 'font-style: Verdana;', 'font-name: Verdana;', 'font-weight: Verdana;', 'font-family: Verdana;', 1),
(6, 'W zamieszczonym przykładzie pseudoklasa hover sprawi, że styl pogrubiony będzie przypisany.  a:hover{font-weight:bold;}', 'odnośnikowi, w momencie kiedy najechał na niego kursor myszy', 'wszystkim odnośnikom nieodwiedzonym', 'każdemu odnośnikowi niezależnie od aktualnego stanu', 'wszystkim odnośnikom odwiedzonym', 'odnośnikowi, w momencie kiedy najechał na niego kursor myszy', 1),
(7, 'Kolor zapisany w notacji heksadecymalnej #0000FF to', 'czarny', 'zielony', 'niebieski', 'czerwony', 'niebieski', 1),
(8, 'Aby w tworzonej w języku SQL tabeli praca dodać w kolumnie stawka warunek, że musi przyjmować rzeczywiste wartości dodatnie mniejsze od 50, należy użyć zapisu', 'stawka float CHECK(stawka IN (0, 50.00))', 'stawka float CHECK(stawka>0 OR stawka<50.00)', 'stawka float CHECK(stawka>0 AND stawka<50.00)', 'stawka float CHECK(stawka BETWEEN 0 AND 50.00)', 'stawka float CHECK(stawka>0 AND stawka<50.00)', 2),
(9, 'Za pomocą języka PHP nie jest możliwe', 'Przetwarzanie danych formularzy', 'Generowanie dynamicznej zawartości strony', 'Przetwarzanie danych zgromadzonych w bazie danych', 'Zmienianie dynamiczne zawartości strony HTML w przeglądarce', 'Zmienianie dynamiczne zawartości strony HTML w przeglądarce', 3),
(10, 'Wartość i typ zmiennej w języku PHP można sprawdzić za pomocą funkcji', 'readfile()', 'var_dump()', 'implode()', 'strlen()', 'var_dump()', 3),
(11, 'Kaskadowe arkusze stylów tworzy się w celu', 'ułatwienia użytkownikowi nawigacji', 'uzupełnienia strony internetowej o treści tekstowe', 'przyspieszenia wyświetlania grafiki na stronie internetowej', 'definiowania sposobu formatowania elementów strony internetowej', 'definiowania sposobu formatowania elementów strony internetowej', 1),
(12, 'Typ stało-znakowy w języku SQL to', 'char', 'text', 'time', 'bool', 'char', 2),
(13, 'Do poprawnego i spójnego działania bazy danych niezbędne jest umieszczenie w każdej tabeli', 'kluczy PRIMARY KEY i FOREIGN KEY', 'klucza FOREIGN KEY z wartością NOT NULL', 'klucza obcego z wartością NOT NULL i UNIQUE', 'klucza PRIMARY KEY z wartością NOT NULL i UNIQUE', 'klucza PRIMARY KEY z wartością NOT NULL i UNIQUE', 2),
(14, 'Które z poleceń naprawi uszkodzoną tabelę w języku SQL?', 'REGENERATE TABLE tbl_name', 'REPAIR TABLE tblname', 'OPTIMIZE TABLE tbl_name', 'ANALYZE TABLE tbl_name', 'REPAIR TABLE tblname', 2),
(15, 'Włączenie do kodu skryptu zawartości pliku egzamin.php, zawierającego kod PHP, wymaga dodania instrukcji', 'fgets(\"egzamin.php\");', 'fopen(\"egzamin.php\");', 'getfile(\"egzamin.php\");', 'include(\"egzamin.php\");', 'include(\"egzamin.php\");', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wynik_testu` int(11) DEFAULT '0',
  `ocena_testu` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `nazwa`, `haslo`, `wynik_testu`, `ocena_testu`) VALUES
(2, 'kacper', '$2y$10$hifa6EISmi5j38sXR4.loeX2gjeTaTC52vCI7OwLOdX2uC8qYXZ7K', 4, 6),
(3, 'janusz', '$2y$10$2wyj6lIi1gBQPrhRTQrpceOnRwoVk6hGp.p0ikhSjcukNyQrIBYeO', 0, 1),
(4, 'andrzej', '$2y$10$2FBVPuGSOxKUJFemMaicr.Xn7H/OnOodTo/glBPwk4ISJ1VTdD8NS', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategoria_pytan`
--
ALTER TABLE `kategoria_pytan`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria` (`kategoria`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategoria_pytan`
--
ALTER TABLE `kategoria_pytan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD CONSTRAINT `pytania_ibfk_1` FOREIGN KEY (`kategoria`) REFERENCES `kategoria_pytan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

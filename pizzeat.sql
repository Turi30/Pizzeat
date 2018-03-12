-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 17, 2017 alle 12:29
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeat`
--

CREATE DATABASE pizzeat;

-- --------------------------------------------------------

--
-- Struttura della tabella `account`
--

CREATE TABLE `account` (
  `IDAccount` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Indirizzo` varchar(100) DEFAULT NULL,
  `Civico` varchar(50) DEFAULT NULL,
  `Password` varchar(32) NOT NULL,
  `Admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `account`
--

INSERT INTO `account` (`IDAccount`, `Username`, `Nome`, `Cognome`, `Email`, `Telefono`, `Indirizzo`, `Civico`, `Password`, `Admin`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@a.a', '7896542587', '', '', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Lucab', 'Luca', 'Belluardo', 'aaa@it.i', '3325874568', '', '', '04703a9cdb6a13b411b351f32aad95b2', NULL),
(3, 'Carola', 'Carola', 'Bianca', 'diot.io@cec.it', '3336587458', '', '', '96be35715459112775cdd0f17f03d9aa', NULL),
(4, 'Peppe', 'Peppe', 'Peppe', 'pep@pep.pep', '0987515648', 'Via Pep', '15A', 'a7872f0adb3f728cc7da152d004cc0e9', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `menu`
--

CREATE TABLE `menu` (
  `IDMenu` int(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Ingredienti` varchar(100) NOT NULL,
  `Prezzo` double(10,2) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Pizzeria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `menu`
--

INSERT INTO `menu` (`IDMenu`, `Nome`, `Ingredienti`, `Prezzo`, `Categoria`, `Pizzeria`) VALUES
(1, '4 Formaggi', 'pomodoro, mozzarella, gorgonzola e formaggi misti', 6.00, 'Pizze', 5),
(2, 'Capricciosa', 'pomodoro, mozzarella, prosciutto cotto, olive, funghi, carciofi e melanzane', 6.50, 'Pizze', 5),
(3, 'Contadina', 'pomodoro, mozzarella, funghi, pinoli e speck', 6.50, 'Pizze', 5),
(4, 'Diavolo', 'pomodoro, mozzarella, salame piccante, salsiccia, salsa piccante, aglio e prezzemolo', 6.00, 'Pizze', 5),
(5, 'Margherita', 'pomodoro, mozzarella, origano e basilico', 4.50, 'Pizze', 5),
(6, 'Pancetta', 'pomodoro, mozzarella, pancetta e origano', 5.50, 'Pizze', 5),
(7, 'Focaccia Cecina', 'cecina, pepe e sale', 7.00, 'Focacce', 5),
(8, 'Focaccia Deliziosa', 'prosciutto crudo, mozzarella di bufala e mozzarella fiordilatte', 7.00, 'Focacce', 5),
(9, 'Focaccia Ottima', 'salsiccia, friarielli, scamorza e mozzarella fiordilatte', 6.50, 'Focacce', 5),
(10, 'Calzone Classico', 'prosciutto cotto e mozzarella', 5.50, 'Calzoni', 5),
(11, 'Calzone Napoli', 'prosciutto cotto, pomodoro, mozzarella e pepe', 5.50, 'Calzoni', 5),
(12, 'Calzone Spaziale', 'pomodoro, mozzarella fiordilatte, ricotta e prosciutto cotto', 6.00, 'Calzoni', 5),
(13, 'Acqua Naturale', '50cl', 1.00, 'Bevande', 5),
(14, 'Coca Cola', 'lattina', 1.50, 'Bevande', 5),
(15, 'Pepsi', 'lattina', 1.50, 'Bevande', 5),
(16, 'Margherita', 'pomodoro, mozzarella e olio d\'oliva', 5.20, 'Pizze', 1),
(17, 'Salamino', 'pomodoro, mozzarella, salamino piccante e olio d\'oliva', 6.20, 'Pizze', 1),
(18, 'Bufala', 'pomodoro, mozzarella di bufala campana e olio d\'oliva', 6.70, 'Pizze', 1),
(19, 'Pisana', 'pomodoro, acciughe, capperi, scaglie di grana in cottura e olio d\'oliva', 6.20, 'Pizze', 1),
(20, 'Spada', 'mozzarella, carpaccio di spada, rucola, pomodorini, stracciatella e olio d\'oliva', 9.00, 'Pizze', 1),
(21, 'Don Marco', 'pomodoro, mozzarella, peperoni, salsiccia e olio d\'oliva', 6.70, 'Pizze', 1),
(22, 'Primavera', 'mozzarella, prosciutto crudo, rucola, pomodorini, stracciatella e olio d\'oliva', 8.00, 'Pizze', 1),
(23, 'Focaccia Delicata', 'salsiccia e stracchino', 5.00, 'Focacce', 1),
(24, 'Focaccia Ischitana', 'scamorza, friarielli, salsiccia', 6.50, 'Focacce', 1),
(25, 'Focaccia Saporita', 'salsiccia, patate fritte e scamorza', 6.00, 'Focacce', 1),
(26, 'Focaccia Bomba', 'mozzarella, nduja, salsiccia, soppressata Calabra e patatine fritte', 7.00, 'Focacce', 1),
(27, 'Panuozzo Capri', 'mozzarella, pomodoro, prosciutto cotto e insalata', 6.00, 'Panuozzi', 1),
(28, 'Panuozzo Toscano', 'salame toscano e pecorino', 5.50, 'Panuozzi', 1),
(29, 'Panuozzo Mari e Monti', 'mozzarella, salame affumicato, olive, rucola e salsa rosa', 6.50, 'Panuozzi', 1),
(30, 'Panuozzo Spada', 'carpaccio di pesce spada, rucola, pomodorini, stracciatella e olio d\'oliva', 7.00, 'Panuozzi', 1),
(31, 'Acqua Naturale', '50cl', 1.00, 'Bevande', 1),
(32, 'Acqua Frizzante', '50cl', 1.00, 'Bevande', 1),
(33, 'Pepsi', 'lattina', 1.80, 'Bevande', 1),
(34, 'Moretti', '33cl', 2.00, 'Birre', 1),
(35, 'Ceres', '33cl', 2.50, 'Birre', 1),
(36, 'Panino Kebab Classico', 'kebab, patate fritte, insalata, pomodori, cipolla, cavolo cappuccio, carote, ketchup, maionese, sals', 3.50, 'Kebab', 2),
(37, 'Panino Kebab con Mozzarella e Patate Fritte', 'kebab, mozzarella, patate fritte, ketchup e maionese', 5.00, 'Kebab', 2),
(39, 'Piadina Kebab Tedesca', 'kebab, patate fritte, ketchup e maionese', 5.00, 'Kebab', 2),
(40, 'Piadina Kebab Classica', 'kebab, patate fritte, insalata, pomodori, cipolla, cavolo cappuccio, carote, ketchup, maionese, sals', 4.00, 'Kebab', 2),
(41, 'Piatto Kebab Maxi', '\r\nkebab, patate fritte, insalata, pomodori, cipolla, cavolo cappuccio, carote, ketchup, maionese, sa', 6.50, 'Kebab', 2),
(42, 'Piadina Falafel', 'falafel, patate fritte, insalata, pomodori, cipolla, cavolo cappuccio, carote, ketchup, maionese, sa', 3.50, 'Kebab', 2),
(44, 'Panino Cheeseburger', 'hamburger, cheddar, pomodori, insalata e maionese', 3.00, 'Hamburger', 2),
(45, 'Panino Triplo Hamburger Arabo', 'pane arabo con 3 hamburger, triplo cheddar, pomodori, patate fritte, insalata, ketchup e maionese', 6.00, 'Hamburger', 2),
(46, 'Panino Doppio Veggy Burger', 'con 2 hamburger vegetariani, doppio cheddar, pomodori, maionese e ketchup', 5.50, 'Hamburger', 2),
(47, 'Patate Fritte', 'media', 2.00, 'Fritti', 2),
(48, 'Crocchette di Patate', '6 pezzi', 2.00, 'Fritti', 2),
(49, 'Anelli di Cipolla', '8 pezzi', 2.00, 'Fritti', 2),
(50, 'Alette di Pollo', '6 pezzi', 4.00, 'Fritti', 2),
(51, 'Acqua Naturale', '1.5L', 1.50, 'Bevande', 2),
(52, 'Coca Cola', '33cl', 1.50, 'Bevande', 2),
(53, 'Pepsi', '33cl', 1.50, 'Bevande', 2),
(54, 'Salumi Misti con Formaggi', 'tagliere', 7.00, 'Antipasti', 3),
(55, 'Cecina con Stracchino e Pancetta', 'tagliere', 3.00, 'Antipasti', 3),
(56, 'Margherita', 'pomodoro, mozzarella e basilico fresco', 4.50, 'Pizze', 3),
(57, 'Prosciutto Cotto', 'pomodoro, mozzarella e prosciutto cotto', 5.00, 'Pizze', 3),
(58, '4 Stagioni', 'pomodoro, mozzarella, carciofi, funghi, olive e prosciutto cotto', 6.00, 'Pizze', 3),
(59, 'Vegetariana', 'pomodoro, mozzarella e verdure di stagione', 6.00, 'Pizze', 3),
(60, 'Hamburger di Carne di Manzo', 'formaggio, insalata, pomodori, ketchup e maionese', 3.50, 'Secondi', 3),
(61, 'Chicken burger', 'cotoletta di pollo, insalata, pomodoro, ketchup, maionese e sottiletta di formaggio', 3.50, 'Secondi', 3),
(62, 'Calzone Moderno', 'pomodoro, mozzarella, salame, prosciutto cotto e wurstel', 7.00, 'Calzoni', 3),
(63, 'Calzone Classico', 'mozzarella, prosciutto cotto e funghi', 6.50, 'Calzoni', 3),
(64, ' Calzone', 'mozzarella, prosciutto cotto e pomodoro', 6.50, 'Calzoni', 3),
(65, 'Pizza Dolce', 'mascarpone, nutella e noci', 6.00, 'Dolci', 3),
(66, 'Panino alla Nutella', 'nutella', 2.20, 'Dolci', 3),
(67, 'Coca Cola', 'lattina', 1.20, 'Bevande', 3),
(68, 'Fanta', 'lattina', 1.20, 'Bevande', 3),
(69, 'Sprite', 'lattina', 1.20, 'Bevande', 3),
(70, 'Margherita', 'pomodoro, mozzarella, basilico', 4.50, 'Pizze', 4),
(71, 'Veneziana', 'pomodoro, mozzarella, capperi', 5.50, 'Pizze', 4),
(72, 'Cotto', 'pomodoro, mozzarella, prosciutto cotto', 6.50, 'Pizze', 4),
(73, 'Ungherese', 'pomodoro, mozzarella, aglio e salsiccia', 6.50, 'Pizze', 4),
(74, 'Rodeo', 'pomodoro, mozzarella, fagioli, aglio, cipolla, salsiccia e salvia', 6.50, 'Pizze', 4),
(75, 'Penny', 'pomodoro, mozzarella, uovo e speck', 7.00, 'Pizze', 4),
(76, 'Tirolese', 'pomodoro, mozzarella, gorgonzola, funghi, salsiccia e speck', 7.50, 'Pizze', 4),
(77, 'Calzone Funghi', 'pomodoro, mozzarella, prosciutto, funghi', 7.00, 'Calzoni', 4),
(78, 'Calzone Capriccioso', 'pomodoro, mozzarella, cotto, funghi, salame piccante, carciofi', 7.00, 'Calzoni', 4),
(79, 'Calzone Uovo', 'mozzarella, cotto, uovo', 7.00, 'Calzoni', 4),
(80, 'Focaccia 4 Formaggi', 'emmenthal, mascarpone, gorgonzola, panna, mozzarella', 8.00, 'Focacce al Piatto', 4),
(81, 'Focaccia Mediterranea', 'mozzarella, tonno, cipolla, pomodorini', 7.50, 'Focacce al Piatto', 4),
(82, 'Focaccia Pane Arabo', 'mozzarella, funghi, pomodorini, insalata, crudo', 8.50, 'Focacce al Piatto', 4),
(83, 'Acqua Naturale', '1lt', 1.50, 'Bevande', 4),
(84, 'Acqua Frizzante', '1lt', 1.50, 'Bevande', 4),
(85, 'Coca Cola', '33cl', 2.00, 'Bevande', 4),
(86, 'Moretti', '33cl', 2.50, 'Bevande', 4),
(87, 'Marinara', 'pomodoro, origano, aglio e basilico', 5.50, 'Pizze', 6),
(88, 'Prosciutto Cotto', 'pomodoro, mozarella, prosciutto e basilico', 7.50, 'Pizze', 6),
(89, '4 Stagioni', 'pomodoro, mozzarella, prosciutto, funghi, carciofi, olive e basilico', 8.50, 'Pizze', 6),
(90, 'Vegetariana', 'pomodoro, mozzarella, zucchine, melanzane, rucola e basilico', 8.00, 'Pizze', 6),
(91, '4 Formaggi', 'pomodoro, mozzarella, fontina, gorgonzola, grana e basilico', 8.50, 'Pizze', 6),
(92, 'Tonno e Cipolla', 'pomodoro, mozzarella, tonno, cipolla e basilico', 8.50, 'Pizze', 6),
(93, 'Capricciosa', 'pomodoro, mozzarella, prosciutto cotto, funghi, carciofi, olive e basilico', 8.50, 'Pizze', 6),
(94, 'Delicata', 'mozzarella di bufala dop, prosciutto cotto, zucchine grigliate e pomodorini ciliegini', 10.00, 'Pizze', 6),
(95, 'Insalata Tonno', 'insalata mista, pomodorini, olive nere, bufala, mais e tonno', 7.00, 'Insalate', 6),
(96, 'Insalata Classica', 'insalata mista, pomodorini, olive nere e bufala', 6.00, 'Insalate', 6),
(97, 'Coca Cola', '33cl', 2.50, 'Bevande', 6),
(98, 'Fanta', '33cl', 2.50, 'Bevande', 6),
(99, 'Sprite', '33cl', 2.50, 'Bevande', 6),
(102, 'Hamburger', 'hamburger di manzo, pomodoro, lattuga e salse', 5.00, 'Panini', 7),
(103, 'Cheeseburger', 'hamburger di manzo, formaggio gouda, pomodoro, lattuga e salse', 5.50, 'Panini', 7),
(104, 'Cheese Bacon Burger', 'hamburger di manzo, pancetta croccante, formaggio gouda, pomodoro, lattuga e salse', 5.50, 'Panini', 7),
(105, 'Panino 1', 'filetti di pollo croccante, cuor di burrata e melanzane grigliate', 5.00, 'Panini', 7),
(106, 'Panino 2', 'pomodori secchi e tonno', 5.00, 'Panini', 7),
(107, 'Panino 3', 'chicken bacon cheese, filetti di pollo croccante, formaggio cheddar, bacon croccante, pomodoro, latt', 5.50, 'Panini', 7),
(108, 'Crepe 1', 'melanzane grigliate e philadelphia', 4.50, 'Crepes', 7),
(109, 'Crepe 2', 'prosciutto cotto e formaggio cheddar', 4.50, 'Crepes', 7),
(110, 'Crepe 3', 'spinaci, melanzane grigliate e battuto di verdure piccante', 4.50, 'Crepes', 7),
(111, 'Crepe 4', 'prosciutto crudo di Parma, crema di carciofi brindisini e cuor di burrata', 5.50, 'Crepes', 7),
(112, 'Acqua Naturale', '50cl', 1.00, 'Bevande', 7),
(113, 'Acqua Frizzante', '50cl', 1.00, 'Bevande', 7),
(114, 'Pepsi', 'lattina', 1.50, 'Bevande', 7),
(115, 'Tennent\'s', '33cl', 3.00, 'Birre', 7),
(116, 'Corona Extra', '33cl', 3.00, 'Birre', 7),
(117, 'Rossa', 'pomodoro, origano', 4.00, 'Pizze Rosse', 8),
(118, 'Rossa Funghi', 'pomodoro, mozzarella, funghi champignon', 6.00, 'Pizze Rosse', 8),
(119, 'Margherita', 'pomodoro, mozzarella', 5.50, 'Pizze Rosse', 8),
(120, 'Parmigiana', 'pomodoro, mozzarella, melanzane, parmigiano', 6.50, 'Pizze Rosse', 8),
(121, 'Bianca Salsiccia', 'mozzarella, salsiccia', 5.50, 'Pizze Bianche', 8),
(122, 'Bianca Vegetariana', 'mozzarella, verdure di stagione', 6.00, 'Pizze Bianche', 8),
(123, 'Bianca Speck e Gorgonzola', 'mozarella, speck, gorgonzola', 7.50, 'Pizze Bianche', 8),
(124, 'Bianca Porcini Provola e Patate', 'mozzarella, patate al forno, funghi porcini, provola', 7.50, 'Pizze Bianche', 8),
(125, 'SupplÃ¬', 'classico', 0.80, 'Fritti', 8),
(126, 'Crocchette di Patate', '1 pezzo', 0.80, 'Fritti', 8),
(127, 'Mozzarelline', '6 pezzi', 2.00, 'Fritti', 8),
(128, 'Acqua Naturale', '1.5L', 1.20, 'Bevande', 8),
(129, 'Coca Cola', 'lattina', 1.30, 'Bevande', 8),
(130, 'Sprite', 'lattina', 1.30, 'Bevande', 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `IDOrdine` int(11) NOT NULL,
  `Account` int(10) NOT NULL,
  `Prodotto` varchar(50) NOT NULL,
  `Prezzo` double(10,2) NOT NULL,
  `Quantita` int(10) NOT NULL,
  `Pizzeria` int(11) NOT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`IDOrdine`, `Account`, `Prodotto`, `Prezzo`, `Quantita`, `Pizzeria`, `Data`) VALUES
(1, 4, 'Pepsi', 1.50, 1, 5, '2017-07-07 12:14:21'),
(2, 4, 'Margherita', 4.50, 1, 5, '2017-07-07 12:14:21'),
(3, 4, 'Salamino', 6.20, 1, 1, '2017-07-09 11:33:23'),
(4, 4, 'Bufala', 6.70, 1, 1, '2017-07-09 11:33:23'),
(5, 4, 'Margherita', 5.20, 2, 1, '2017-07-09 11:33:23');

-- --------------------------------------------------------

--
-- Struttura della tabella `pizzeria`
--

CREATE TABLE `pizzeria` (
  `IDPizzeria` int(10) NOT NULL,
  `NomePizzeria` varchar(50) NOT NULL,
  `Immagine` varchar(100) DEFAULT NULL,
  `Indirizzo` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `CostoConsegna` double(10,2) NOT NULL,
  `MinimoConsegna` double(10,2) NOT NULL,
  `Citta` varchar(50) NOT NULL,
  `OraApertura` varchar(10) NOT NULL,
  `OraChiusura` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pizzeria`
--

INSERT INTO `pizzeria` (`IDPizzeria`, `NomePizzeria`, `Immagine`, `Indirizzo`, `Telefono`, `CostoConsegna`, `MinimoConsegna`, `Citta`, `OraApertura`, `OraChiusura`) VALUES
(1, 'Pizzeria Da Toni', 'pizzeriadatoni.gif', 'Via Crispi, 66', '3258798564', 0.00, 5.00, 'Pisa', '12:30', '23:00'),
(2, 'Mondo Doner Kebab', 'mondodonerkebab.gif', 'Viale Bonaini, 72', '365784587', 0.50, 5.00, 'Pisa', '12:00', '00:00'),
(3, 'Pizzeria Il Ponte', 'pizzeriailponte.gif', 'Lungarno Mediceo, 60', '325478985', 0.00, 5.00, 'Pisa', '17:15', '23:30'),
(4, 'Pizzeria Penny Forever', 'pizzeriapennyforever.gif', 'Via Carlo Cattaneo', '3254789652', 0.00, 4.50, 'Pisa', '18:20', '22:30'),
(5, 'Pizzeria San Michele', 'pizzeriasanmichele.gif', 'Via San Michele degli Scalzi', '3547856588', 0.00, 5.00, 'Pisa', '09:00', '18:00'),
(6, 'Mister Pizza', 'misterpizza.gif', 'Via Pietra Piana, 82/R', '3589741266', 2.00, 6.50, 'Firenze', '12:00', '02:30'),
(7, 'Panini d\'Autore di Pani Night', 'paninidautore.gif', 'Via Cappadocia, 6', '3256987412', 1.00, 15.00, 'Roma', '09:30', '23:30'),
(8, 'Pizzologia', 'pizzologia.gif', 'Via dei Sardi, 85/87', '3665687898', 2.00, 6.50, 'Roma', '12:00', '00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `valutazione`
--

CREATE TABLE `valutazione` (
  `IDValutazione` int(11) NOT NULL,
  `Account` int(10) NOT NULL,
  `Pizzeria` int(10) NOT NULL,
  `Voto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `valutazione`
--

INSERT INTO `valutazione` (`IDValutazione`, `Account`, `Pizzeria`, `Voto`) VALUES
(1, 1, 1, 4),
(2, 1, 2, 3),
(3, 4, 2, 5),
(4, 4, 5, 4),
(5, 4, 3, 3),
(6, 4, 4, 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`IDAccount`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indici per le tabelle `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IDMenu`),
  ADD KEY `Pizzeria` (`Pizzeria`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`IDOrdine`),
  ADD KEY `Account` (`Account`),
  ADD KEY `Pizzeria` (`Pizzeria`);

--
-- Indici per le tabelle `pizzeria`
--
ALTER TABLE `pizzeria`
  ADD PRIMARY KEY (`IDPizzeria`);

--
-- Indici per le tabelle `valutazione`
--
ALTER TABLE `valutazione`
  ADD PRIMARY KEY (`IDValutazione`),
  ADD KEY `Account` (`Account`),
  ADD KEY `Pizzeria` (`Pizzeria`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `account`
--
ALTER TABLE `account`
  MODIFY `IDAccount` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `menu`
--
ALTER TABLE `menu`
  MODIFY `IDMenu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `IDOrdine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `pizzeria`
--
ALTER TABLE `pizzeria`
  MODIFY `IDPizzeria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT per la tabella `valutazione`
--
ALTER TABLE `valutazione`
  MODIFY `IDValutazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`Pizzeria`) REFERENCES `pizzeria` (`IDPizzeria`) ON DELETE CASCADE;

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`Account`) REFERENCES `account` (`IDAccount`) ON DELETE CASCADE,
  ADD CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`Pizzeria`) REFERENCES `pizzeria` (`IDPizzeria`) ON DELETE NO ACTION;

--
-- Limiti per la tabella `valutazione`
--
ALTER TABLE `valutazione`
  ADD CONSTRAINT `valutazione_ibfk_1` FOREIGN KEY (`Account`) REFERENCES `account` (`IDAccount`),
  ADD CONSTRAINT `valutazione_ibfk_2` FOREIGN KEY (`Pizzeria`) REFERENCES `pizzeria` (`IDPizzeria`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

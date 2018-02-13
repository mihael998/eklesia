-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 13, 2018 alle 00:55
-- Versione del server: 10.1.28-MariaDB
-- Versione PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `province`
--

CREATE TABLE `province` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_regione` int(11) UNSIGNED NOT NULL,
  `codice_citta_metropolitana` int(11) UNSIGNED DEFAULT NULL,
  `nome` text NOT NULL,
  `sigla_automobilistica` varchar(2) NOT NULL,
  `latitudine` decimal(9,6) NOT NULL,
  `longitudine` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `province`
--

INSERT INTO `province` (`id`, `id_regione`, `codice_citta_metropolitana`, `nome`, `sigla_automobilistica`, `latitudine`, `longitudine`) VALUES
(1, 1, 201, 'Torino', 'TO', '45.063299', '7.669289'),
(2, 1, NULL, 'Vercelli', 'VC', '45.320220', '8.418508'),
(3, 1, NULL, 'Novara', 'NO', '45.548513', '8.515079'),
(4, 1, NULL, 'Cuneo', 'CN', '44.597031', '7.611422'),
(5, 1, NULL, 'Asti', 'AT', '44.900765', '8.206432'),
(6, 1, NULL, 'Alessandria', 'AL', '44.817559', '8.704663'),
(7, 2, NULL, 'Valle d\'Aosta/Vallée d\'Aoste', 'AO', '45.738888', '7.426187'),
(8, 7, NULL, 'Imperia', 'IM', '43.941866', '7.828637'),
(9, 7, NULL, 'Savona', 'SV', '44.288800', '8.265058'),
(10, 7, 210, 'Genova', 'GE', '44.446625', '9.145615'),
(11, 7, NULL, 'La Spezia', 'SP', '44.102450', '9.824083'),
(12, 3, NULL, 'Varese', 'VA', '45.799026', '8.730095'),
(13, 3, NULL, 'Como', 'CO', '45.808042', '9.085179'),
(14, 3, NULL, 'Sondrio', 'SO', '46.172764', '9.799492'),
(15, 3, 215, 'Milano', 'MI', '45.458626', '9.181873'),
(16, 3, NULL, 'Bergamo', 'BG', '45.857830', '9.881998'),
(17, 3, NULL, 'Brescia', 'BS', '45.659677', '10.385672'),
(18, 3, NULL, 'Pavia', 'PV', '45.321817', '8.846624'),
(19, 3, NULL, 'Cremona', 'CR', '45.201438', '9.983658'),
(20, 3, NULL, 'Mantova', 'MN', '45.156417', '10.791375'),
(21, 4, NULL, 'Bolzano/Bozen', 'BZ', '46.734096', '11.288802'),
(22, 4, NULL, 'Trento', 'TN', '46.051200', '11.117539'),
(23, 5, NULL, 'Verona', 'VR', '45.441850', '11.073532'),
(24, 5, NULL, 'Vicenza', 'VI', '45.545479', '11.535421'),
(25, 5, NULL, 'Belluno', 'BL', '46.249766', '12.196957'),
(26, 5, NULL, 'Treviso', 'TV', '45.666852', '12.243062'),
(27, 5, 227, 'Venezia', 'VE', '45.493048', '12.417700'),
(28, 5, NULL, 'Padova', 'PD', '45.366186', '11.820914'),
(29, 5, NULL, 'Rovigo', 'RO', '45.024182', '11.823816'),
(30, 6, NULL, 'Udine', 'UD', '46.140797', '13.166290'),
(31, 6, NULL, 'Gorizia', 'GO', '45.905390', '13.516373'),
(32, 6, NULL, 'Trieste', 'TS', '45.689482', '13.783307'),
(33, 8, NULL, 'Piacenza', 'PC', '44.826311', '9.529145'),
(34, 8, NULL, 'Parma', 'PR', '44.801532', '10.327935'),
(35, 8, NULL, 'Reggio nell\'Emilia', 'RE', '44.585658', '10.556474'),
(36, 8, NULL, 'Modena', 'MO', '44.551380', '10.918048'),
(37, 8, 237, 'Bologna', 'BO', '44.500510', '11.304784'),
(38, 8, NULL, 'Ferrara', 'FE', '44.766368', '11.764407'),
(39, 8, NULL, 'Ravenna', 'RA', '44.418444', '12.203600'),
(40, 8, NULL, 'Forlì-Cesena', 'FC', '44.222500', '12.040833'),
(41, 11, NULL, 'Pesaro e Urbino', 'PU', '43.613012', '12.713512'),
(42, 11, NULL, 'Ancona', 'AN', '43.549325', '13.266348'),
(43, 11, NULL, 'Macerata', 'MC', '43.245932', '13.266348'),
(44, 11, NULL, 'Ascoli Piceno', 'AP', '42.863893', '13.589973'),
(45, 9, NULL, 'Massa-Carrara', 'MS', '44.079325', '10.097677'),
(46, 9, NULL, 'Lucca', 'LU', '43.837674', '10.495053'),
(47, 9, NULL, 'Pistoia', 'PT', '43.954373', '10.890310'),
(48, 9, 248, 'Firenze', 'FI', '43.767918', '11.252379'),
(49, 9, NULL, 'Livorno', 'LI', '43.023985', '10.664710'),
(50, 9, NULL, 'Pisa', 'PI', '43.722832', '10.401719'),
(51, 9, NULL, 'Arezzo', 'AR', '43.466896', '11.882360'),
(52, 9, NULL, 'Siena', 'SI', '43.293773', '11.433915'),
(53, 9, NULL, 'Grosseto', 'GR', '42.851801', '11.252379'),
(54, 10, NULL, 'Perugia', 'PG', '42.938004', '12.621621'),
(55, 10, NULL, 'Terni', 'TR', '42.563453', '12.529803'),
(56, 12, NULL, 'Viterbo', 'VT', '42.420677', '12.107669'),
(57, 12, NULL, 'Rieti', 'RI', '42.367441', '12.897510'),
(58, 12, 258, 'Roma', 'RM', '41.872411', '12.480225'),
(59, 12, NULL, 'Latina', 'LT', '41.408748', '13.081790'),
(60, 12, NULL, 'Frosinone', 'FR', '41.657653', '13.636272'),
(61, 15, NULL, 'Caserta', 'CE', '41.207835', '14.100133'),
(62, 15, NULL, 'Benevento', 'BN', '41.203509', '14.752094'),
(63, 15, 263, 'Napoli', 'NA', '40.901975', '14.332644'),
(64, 15, NULL, 'Avellino', 'AV', '40.996451', '15.125896'),
(65, 15, NULL, 'Salerno', 'SA', '40.428783', '15.219481'),
(66, 13, NULL, 'L\'Aquila', 'AQ', '42.349848', '13.399509'),
(67, 13, NULL, 'Teramo', 'TE', '42.589561', '13.636272'),
(68, 13, NULL, 'Pescara', 'PE', '42.357066', '13.960809'),
(69, 13, NULL, 'Chieti', 'CH', '42.033443', '14.379191'),
(70, 14, NULL, 'Campobasso', 'CB', '41.673887', '14.752094'),
(71, 16, NULL, 'Foggia', 'FG', '41.638448', '15.594339'),
(72, 16, 272, 'Bari', 'BA', '41.117123', '16.871976'),
(73, 16, NULL, 'Taranto', 'TA', '40.574090', '17.242998'),
(74, 16, NULL, 'Brindisi', 'BR', '40.611266', '17.763621'),
(75, 16, NULL, 'Lecce', 'LE', '40.234739', '18.142867'),
(76, 17, NULL, 'Potenza', 'PZ', '40.418219', '15.876004'),
(77, 17, NULL, 'Matera', 'MT', '40.666350', '16.604364'),
(78, 18, NULL, 'Cosenza', 'CS', '39.564411', '16.252214'),
(79, 18, NULL, 'Catanzaro', 'CZ', '38.889635', '16.440587'),
(80, 18, NULL, 'Reggio di Calabria', 'RC', '38.111301', '15.647291'),
(81, 19, NULL, 'Trapani', 'TP', '37.877740', '12.713512'),
(82, 19, NULL, 'Palermo', 'PA', '38.115621', '13.361318'),
(83, 19, NULL, 'Messina', 'ME', '38.063240', '14.985618'),
(84, 19, NULL, 'Agrigento', 'AG', '37.311090', '13.576548'),
(85, 19, NULL, 'Caltanissetta', 'CL', '37.490112', '14.062893'),
(86, 19, NULL, 'Enna', 'EN', '37.516481', '14.379191'),
(87, 19, NULL, 'Catania', 'CT', '37.612598', '14.938885'),
(88, 19, NULL, 'Ragusa', 'RG', '36.930622', '14.705431'),
(89, 19, NULL, 'Siracusa', 'SR', '37.075437', '15.286593'),
(90, 20, NULL, 'Sassari', 'SS', '40.796791', '8.575041'),
(91, 20, NULL, 'Nuoro', 'NU', '40.328690', '9.456155'),
(92, 20, NULL, 'Cagliari', 'CA', '39.223763', '9.121867'),
(93, 6, NULL, 'Pordenone', 'PN', '46.037886', '12.710835'),
(94, 14, NULL, 'Isernia', 'IS', '41.589156', '14.193092'),
(95, 20, NULL, 'Oristano', 'OR', '40.059907', '8.748117'),
(96, 1, NULL, 'Biella', 'BI', '45.562818', '8.058272'),
(97, 3, NULL, 'Lecco', 'LC', '45.938294', '9.385729'),
(98, 3, NULL, 'Lodi', 'LO', '45.240504', '9.529251'),
(99, 8, NULL, 'Rimini', 'RN', '43.967605', '12.575703'),
(100, 9, NULL, 'Prato', 'PO', '44.045390', '11.116445'),
(101, 18, NULL, 'Crotone', 'KR', '39.130986', '17.006703'),
(102, 18, NULL, 'Vibo Valentia', 'VV', '38.637857', '16.205148'),
(103, 1, NULL, 'Verbano-Cusio-Ossola', 'VB', '46.139969', '8.272465'),
(104, 20, NULL, 'Olbia-Tempio', 'OT', '40.826838', '9.278558'),
(105, 20, NULL, 'Ogliastra', 'OG', '39.841054', '9.456155'),
(106, 20, NULL, 'Medio Campidano', 'VS', '39.531739', '8.704075'),
(107, 20, NULL, 'Carbonia-Iglesias', 'CI', '39.253466', '8.572102'),
(108, 3, NULL, 'Monza e della Brianza', 'MB', '45.623599', '9.258802'),
(109, 11, NULL, 'Fermo', 'FM', '43.093137', '13.589973'),
(110, 16, NULL, 'Barletta-Andria-Trani', 'BT', '41.200454', '16.205148');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_regione` (`id_regione`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`id_regione`) REFERENCES `regioni` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

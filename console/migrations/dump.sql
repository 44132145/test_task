

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных nas_broker
CREATE DATABASE IF NOT EXISTS `nas_broker` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `nas_broker`;


-- Дамп структуры для таблица nas_broker.currency
CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `digital_code` int(3) NOT NULL,
  `letter_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `currencyRU` double DEFAULT NULL,
  `currencyUA` double DEFAULT NULL,
  `currDiff` double DEFAULT NULL,
  `currency_name_RU` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_name_UA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы nas_broker.currency: ~70 rows (приблизительно)
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` (`id`, `digital_code`, `letter_code`, `currencyRU`, `currencyUA`, `currDiff`, `currency_name_RU`, `currency_name_UA`, `source_date`) VALUES
	(1, 36, 'AUD', 46, 14.9536, -0.34837534985517216, 'Австралийский доллар', 'Австралійський долар', '2015-10-04'),
	(2, 944, 'AZN', 62, 20.1748, -0.34237019004109565, 'Азербайджанский манат', 'Азербайджанський манат', '2015-10-04'),
	(3, 826, 'GBP', 99, 32.0243, -0.3339043716986004, 'Фунт стерлингов Соединенного королевства', 'Англійський фунт стерлінгів', '2015-10-04'),
	(4, 51, 'AMD', 0.13, NULL, NULL, 'Армянских драмов', NULL, '2015-10-04'),
	(5, 974, 'BYR', 0.0037, 0.001, 0.0002705408110813516, 'Белорусских рублей', 'Бiлоруський рубль', '2015-10-04'),
	(6, 975, 'BGN', 37, NULL, NULL, 'Болгарский лев', NULL, '2015-10-04'),
	(7, 986, 'BRL', 16, NULL, NULL, 'Бразильский реал', NULL, '2015-10-04'),
	(8, 348, 'HUF', 0.23, 0.07542, 0.02674857961358718, 'Венгерских форинтов', 'Угорський форинт', '2015-10-04'),
	(9, 208, 'DKK', 9.8, 3.1623, -0.4719153589290315, 'Датских крон', 'Данська крона', '2015-10-04'),
	(10, 840, 'USD', 65, 21.1533, -0.3415833794656268, 'Доллар США', 'Долар США', '2015-10-04'),
	(11, 978, 'EUR', 73, 23.5923, -0.33748716257975886, 'Евро', 'Євро', '2015-10-04'),
	(12, 356, 'INR', 1, NULL, NULL, 'Индийских рупий', NULL, '2015-10-04'),
	(13, 398, 'KZT', 0.24, 0.0781, 0.027568111147268325, 'Казахстанских тенге', 'Казахстанський теньге', '2015-10-04'),
	(14, 124, 'CAD', 49, 15.9418, -0.34711686409937226, 'Канадский доллар', 'Канадський долар', '2015-10-04'),
	(15, 417, 'KGS', 0.95, NULL, NULL, 'Киргизских сомов', NULL, '2015-10-04'),
	(16, 156, 'CNY', 10, 3.3275, -0.4757145542427498, 'Китайский юань', 'Юань Женьмiньбi', '2015-10-04'),
	(17, 498, 'MDL', 3.2, 1.0531, -6.526716160546153, 'Молдавских леев', 'Молдовський лей', '2015-10-04'),
	(18, 578, 'NOK', 7.7, 2.4948, -0.5407514048702168, 'Норвежских крон', 'Норвезька крона', '2015-10-04'),
	(19, 985, 'PLN', 17, 5.5565, -0.39858627623111137, 'Польский злотый', 'Польський злотий', '2015-10-04'),
	(20, 946, 'RON', 16, NULL, NULL, 'Румынский лей', NULL, '2015-10-04'),
	(21, 960, 'XDR', 92, 29.6211, -0.3332178180228238, 'СДР (специальные права заимствования)', 'Спецiальнi права запозичення', '2015-10-04'),
	(22, 702, 'SGD', 46, 14.823, -0.3455509390461392, 'Сингапурский доллар', 'Сінгапурський долар', '2015-10-04'),
	(23, 972, 'TJS', 10, NULL, NULL, 'Таджикский сомони', NULL, '2015-10-04'),
	(24, 949, 'TRY', 21, 6.9808, -0.38800008153073967, 'Турецкая лира', 'Турецька ліра', '2015-10-04'),
	(25, 934, 'TMT', 18, 6.0438, -0.402336845235735, 'Новый туркменский манат', 'Туркменський манат', '2015-10-04'),
	(26, 860, 'UZS', 0.025, 0.0081, 0.002645831232987196, 'Узбекских сумов', 'Узбецький сум', '2015-10-04'),
	(27, 980, 'UAH', 3.1, NULL, NULL, 'Украинских гривен', NULL, '2015-10-04'),
	(28, 203, 'CZK', 2.7, 0.8682, 2.118167931208902, 'Чешских крон', 'Чеська крона', '2015-10-04'),
	(29, 752, 'SEK', 7.8, 2.5164, -0.5353662317634884, 'Шведских крон', 'Шведська крона', '2015-10-04'),
	(30, 756, 'CHF', 67, 21.6383, -0.3386082627351076, 'Швейцарский франк', 'Швейцарський франк', '2015-10-04'),
	(31, 710, 'ZAR', 4.7, NULL, NULL, 'Южноафриканских рэндов', NULL, '2015-10-04'),
	(32, 410, 'KRW', 0.055, NULL, NULL, 'Вон Республики Корея', NULL, '2015-10-04'),
	(33, 392, 'JPY', 0.54, 0.17664, 0.07017696592822903, 'Японских иен', 'Японська єна', '2015-10-04'),
	(34, 352, 'ISK', NULL, 0.1657, NULL, NULL, 'Ісландська крона', '2015-10-04'),
	(35, 643, 'RUB', NULL, 0.325, NULL, NULL, 'Російський рубль', '2015-10-04'),
	(36, 36, 'AUD', 46, 14.9536, -0.34837534985517216, 'Австралийский доллар', 'Австралійський долар', '2015-10-03'),
	(37, 944, 'AZN', 62, 20.1748, -0.34237019004109565, 'Азербайджанский манат', 'Азербайджанський манат', '2015-10-03'),
	(38, 826, 'GBP', 99, 32.0243, -0.3339043716986004, 'Фунт стерлингов Соединенного королевства', 'Англійський фунт стерлінгів', '2015-10-03'),
	(39, 51, 'AMD', 0.13, NULL, NULL, 'Армянских драмов', NULL, '2015-10-03'),
	(40, 974, 'BYR', 0.0037, 0.001, 0.0002705408110813516, 'Белорусских рублей', 'Бiлоруський рубль', '2015-10-03'),
	(41, 975, 'BGN', 37, NULL, NULL, 'Болгарский лев', NULL, '2015-10-03'),
	(42, 986, 'BRL', 16, NULL, NULL, 'Бразильский реал', NULL, '2015-10-03'),
	(43, 348, 'HUF', 0.23, 0.07542, 0.02674857961358718, 'Венгерских форинтов', 'Угорський форинт', '2015-10-03'),
	(44, 208, 'DKK', 9.8, 3.1623, -0.4719153589290315, 'Датских крон', 'Данська крона', '2015-10-03'),
	(45, 840, 'USD', 65, 21.1533, -0.3415833794656268, 'Доллар США', 'Долар США', '2015-10-03'),
	(46, 978, 'EUR', 73, 23.5923, -0.33748716257975886, 'Евро', 'Євро', '2015-10-03'),
	(47, 356, 'INR', 1, NULL, NULL, 'Индийских рупий', NULL, '2015-10-03'),
	(48, 398, 'KZT', 0.24, 0.0781, 0.027568111147268325, 'Казахстанских тенге', 'Казахстанський теньге', '2015-10-03'),
	(49, 124, 'CAD', 49, 15.9418, -0.34711686409937226, 'Канадский доллар', 'Канадський долар', '2015-10-03'),
	(50, 417, 'KGS', 0.95, NULL, NULL, 'Киргизских сомов', NULL, '2015-10-03'),
	(51, 156, 'CNY', 10, 3.3275, -0.4757145542427498, 'Китайский юань', 'Юань Женьмiньбi', '2015-10-03'),
	(52, 498, 'MDL', 3.2, 1.0531, -6.526716160546153, 'Молдавских леев', 'Молдовський лей', '2015-10-03'),
	(53, 578, 'NOK', 7.7, 2.4948, -0.5407514048702168, 'Норвежских крон', 'Норвезька крона', '2015-10-03'),
	(54, 985, 'PLN', 17, 5.5565, -0.39858627623111137, 'Польский злотый', 'Польський злотий', '2015-10-03'),
	(55, 946, 'RON', 16, NULL, NULL, 'Румынский лей', NULL, '2015-10-03'),
	(56, 960, 'XDR', 92, 29.6211, -0.3332178180228238, 'СДР (специальные права заимствования)', 'Спецiальнi права запозичення', '2015-10-03'),
	(57, 702, 'SGD', 46, 14.823, -0.3455509390461392, 'Сингапурский доллар', 'Сінгапурський долар', '2015-10-03'),
	(58, 972, 'TJS', 10, NULL, NULL, 'Таджикский сомони', NULL, '2015-10-03'),
	(59, 949, 'TRY', 21, 6.9808, -0.38800008153073967, 'Турецкая лира', 'Турецька ліра', '2015-10-03'),
	(60, 934, 'TMT', 18, 6.0438, -0.402336845235735, 'Новый туркменский манат', 'Туркменський манат', '2015-10-03'),
	(61, 860, 'UZS', 0.025, 0.0081, 0.002645831232987196, 'Узбекских сумов', 'Узбецький сум', '2015-10-03'),
	(62, 980, 'UAH', 3.1, NULL, NULL, 'Украинских гривен', NULL, '2015-10-03'),
	(63, 203, 'CZK', 2.7, 0.8682, 2.118167931208902, 'Чешских крон', 'Чеська крона', '2015-10-03'),
	(64, 752, 'SEK', 7.8, 2.5164, -0.5353662317634884, 'Шведских крон', 'Шведська крона', '2015-10-03'),
	(65, 756, 'CHF', 67, 21.6383, -0.3386082627351076, 'Швейцарский франк', 'Швейцарський франк', '2015-10-03'),
	(66, 710, 'ZAR', 4.7, NULL, NULL, 'Южноафриканских рэндов', NULL, '2015-10-03'),
	(67, 410, 'KRW', 0.055, NULL, NULL, 'Вон Республики Корея', NULL, '2015-10-03'),
	(68, 392, 'JPY', 0.54, 0.17664, 0.07017696592822903, 'Японских иен', 'Японська єна', '2015-10-03'),
	(69, 352, 'ISK', NULL, 0.1657, NULL, NULL, 'Ісландська крона', '2015-10-03'),
	(70, 643, 'RUB', NULL, 0.325, NULL, NULL, 'Російський рубль', '2015-10-03');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;


-- Дамп структуры для таблица nas_broker.curr_source
CREATE TABLE IF NOT EXISTS `curr_source` (
  `cs_id` int(11) NOT NULL AUTO_INCREMENT,
  `cs_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cs_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cs_method_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default',
  `cs_code` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cs_DateMask` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы nas_broker.curr_source: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `curr_source` DISABLE KEYS */;
INSERT INTO `curr_source` (`cs_id`, `cs_name`, `cs_url`, `cs_method_name`, `cs_code`, `cs_DateMask`) VALUES
	(1, 'НБУ', 'http://www.bank.gov.ua/control/uk/curmetal/currency/search?formType=searchFormDate&time_step=daily&date=dd.mm.YYYY&outer=xml', 'default', 'UA', 'dd.mm.YYYY'),
	(2, 'ЦБР', 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=dd/mm/YYYY', 'default', 'RU', 'dd/mm/YYYY');
/*!40000 ALTER TABLE `curr_source` ENABLE KEYS */;


-- Дамп структуры для таблица nas_broker.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Дамп данных таблицы nas_broker.migration: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1443693561),
	('m130524_201442_init', 1443702813),
	('m151001_105007_CurrSource', 1443697886),
	('m151001_111210_CurrTable', 1443702072),
	('m151001_124205_AddNewUser', 1443703867),
	('m151004_095100_AddDataMask', 1443953271);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Дамп структуры для таблица nas_broker.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы nas_broker.user: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 's_7U4F5ssBwr00hwOFi8-8LSYEkGgcCF', '$2y$13$P9huYGwZ931opk6gyhapGOzkZmBS2BO1VeX3k7PxIeTj8bSTHa4ia', NULL, 'testAdmin@local.com', 10, 1443703867, 1443703867);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

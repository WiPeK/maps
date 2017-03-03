-- Baza danych: `mapstest`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) CHARACTER SET utf8 NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Struktura tabeli dla tabeli `places`
--

CREATE TABLE IF NOT EXISTS `places` (
`id` int(11) unsigned NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lng` varchar(30) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `opis` text CHARACTER SET utf8,
  `ip` varchar(100) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(2) unsigned NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `last_login`) VALUES
(1, 'wipek', '*00A51F3F48415C7D4E8908980D443C29C69B60C9', '2015-09-27 20:09:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ustawienia`
--

CREATE TABLE IF NOT EXISTS `ustawienia` (
`id` int(2) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gmail_log` varchar(200) DEFAULT NULL,
  `gmail_pass` varchar(200) DEFAULT NULL,
  `description` varchar(200) NOT NULL DEFAULT '',
  `keywords` varchar(200) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `ustawienia`
--

INSERT INTO `ustawienia` (`id`, `name`, `gmail_log`, `gmail_pass`, `description`, `keywords`) VALUES
(1, 'WiPeK', 'fsdfsd', 'sdfsdfds', 'Witamy na stronie WiPeK. Zapraszamy do dodawania swoich miejsc na naszej mapie. Dziel się z innymi ciekawymi miejscami oraz poznawaj miejsca innych użytkowników.', 'fsfsd,fsdfds,abc,fwds,');

--sdf
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ustawienia`
--
ALTER TABLE `ustawienia`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `places`
--
ALTER TABLE `places`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(2) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `ustawienia`
--
ALTER TABLE `ustawienia`
MODIFY `id` int(2) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;--

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 25, 2022 alle 23:31
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progettostadi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `id` int(11) NOT NULL,
  `dataInizio` date DEFAULT NULL,
  `cittaPartenza` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `utente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tour` int(11) DEFAULT NULL,
  `stato` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id` int(11) NOT NULL,
  `voto` int(11) DEFAULT NULL,
  `commento` varchar(20000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `utente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stadio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `squadra`
--

CREATE TABLE `squadra` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stadio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `squadra`
--

INSERT INTO `squadra` (`id`, `nome`, `stadio`) VALUES
(1, 'Genoa', 5),
(2, 'Sampdoria', 5),
(3, 'Inter', 1),
(4, 'Milan', 1),
(5, 'Roma', 2),
(6, 'Lazio', 2),
(8, 'Juventus', 3),
(9, 'Fiorentina', 4),
(10, 'Bayern Monaco', 6),
(11, 'Liverpool', 7),
(12, 'PSG', 8),
(13, 'Barcellona', 9),
(14, 'Real Madrid', 10),
(15, 'Ajax', 11),
(16, 'Jong ajax', 11),
(17, 'Porto', 12),
(18, 'Fluminense', 13),
(19, 'Flamengo', 13),
(20, 'Johor Darul Ta\'zim', 14),
(21, 'Kaizer Chiefs', 15),
(22, 'Bidvest Wits', 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `stadio`
--

CREATE TABLE `stadio` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `citta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mappa` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `preview` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `descrizione` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `prezzo` int(25) NOT NULL,
  `orario` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `capienza` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `stadio`
--

INSERT INTO `stadio` (`id`, `nome`, `citta`, `mappa`, `preview`, `descrizione`, `prezzo`, `orario`, `capienza`, `img`) VALUES
(1, 'San siro', 'Milano', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2352.4806203137896!2d9.122258102670497!3d45.478129135905846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4786c193fa23f19d%3A0x9c7d30c7aeff312!2sStadio%20San%20Siro!5e0!3m2!1sit!2sit!4v1651744171222!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Entra nelle zone dello stadio normalmente riservate ai campioni e attraversa i luoghi che hanno fatto la storia del calcio godendo di una prospettiva unica. Con l\'esclusivo Stadium Tour puoi accedere al backstage di San Siro, scoprendo una nuova prospettiva sul tuo sport preferito. ', 'Acquistando il biglietto dello Stadium Tour avrai la possibilitï¿½ di vedere, oltre allo stadio, da vicino una selezione delle maglie storiche dei due club milanesi, F.C. Internazionale Milano e A.C. Milan, che sono di casa al Meazza. Non mancano inoltre tante altre maglie dei grandi campioni del presente e del passato che hanno giocato con le squadre italiane e straniere piï¿½ titolate al mondo.', 30, 'Tutti i giorni dalle 10:00 - 18:00 (partenza ultimo tour) Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 80018, 'img/stadio/sansiro.jpg'),
(2, 'Olimpico', 'Roma', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1764.8351701755928!2d12.45390436734444!3d41.933978939279115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f60bc3db30885%3A0x791c21ce91960617!2sStadio%20Olimpico!5e0!3m2!1sit!2sit!4v1651744216279!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Un percorso fortemente coinvolgente attraverso l’utilizzo di tecnologie innovative e all’avanguardia. Il Tour dello Stadio Olimpico è un progetto sviluppato in collaborazione con A.S. Roma S.p.A., S.S. Lazio S.p.A. e la Federazione Italiana Giuoco Calcio, che consente di rivivere i grandi eventi di questo impianto ed i loro protagonisti, permettendo ai visitatori di vivere un’esperienza unica ed indimenticabile.', 'Un viaggio che parte da un passato glorioso, rappresentato dalla sua inaugurazione nel 1953, per passare alle Olimpiadi del 1960, gli Europei ed i Mondiali di Atletica (rispettivamente nel 1974 e 1987), i Mondiali di calcio del 1990, le grandi vittorie dell’AS Roma e della SS Lazio e arriva al presente con la grande varietà di eventi, compresi i grandi concerti.\r\nUn grande progetto che intende aprire le porte dello Stadio Olimpico, così da vedere da vicino i suoi luoghi più segreti (dagli spogliatoi al campo di gioco), gli oggetti legati ai grandi protagonisti (dalle maglie ai trofei in versione olografica), nonché rivivere i grandi momenti in un ambiente fortemente esperienziale.\r\n', 15, 'Tutti i giorni dalle 10:00 - 18:00 (partenza ultimo tour). Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 72698, 'img/stadio/olimpico.jpg'),
(3, 'Juventus Stadium', 'Torino', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2815.8242120970394!2d7.639054415758086!3d45.10963136505248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47886c17f7814e37%3A0xe3be8084a88d8da5!2sAllianz%20Stadium!5e0!3m2!1sit!2sit!4v1651744250653!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Vieni a visitare lo Juventus Museum e ripercorri la storia e le vittorie del Club. Tecnologie, memorabilia e un\'atmosfera unica renderanno la tua esperienza indimenticabile.', 'Acquistando il biglietto del tour avrai la possibilità di abbinare allo Juventus Museum la visita dell’Allianz Stadium: entra nella casa della Juventus e visita gli spogliatoi, l’area media e le zone più esclusive con una nostra guida.', 15, 'Tutti i giorni dalle 10:30 - 19:00 tranne il martedi. Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 41507, 'img/stadio/juventusstadium.jpg'),
(4, 'Franchi', 'Firenze', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2880.6155482260365!2d11.280383015726!3d43.7808387521852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132a5469122cf6a9%3A0xa36643abdf3ba3e7!2sStadio%20Artemio%20Franchi!5e0!3m2!1sit!2sit!4v1651744299187!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Visita lo Lo Stadio Artemio Franchi è il principale stadio di calcio di Firenze, ed è la casa della Fiorentina. Si trova a pochi chilometri dal centro città, e la sua struttura è un esempio di razionalismo italiano, corrente architettonica che ebbe il suo apice negli anni ’20 del secolo scorso.', 'Lo stadio comunale “Artemio Franchi” è il più importante e capiente impianto calcistico di Firenze ed ospita le partite casalinghe della Fiorentina. Volete avere la possibilità di visitare luoghi normalmente inaccessibili al pubblico (spogliatoi, tribuna vip, tunnel d’entrata al campo dove passano i giocatori ed altre aree esclusive)? Non vi resta che prenotare questo tour inedito!', 15, 'Tutti i giorni dalle 10:30 - 19:00 tranne il giovedi. Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 43147, 'img/stadio/franchi.jpg'),
(5, 'Ferraris', 'Genova', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2849.8119603584655!2d8.950330315741263!3d44.41650421075434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d3438e73856db7%3A0x8982294f18d61675!2sStadio%20Luigi%20Ferraris!5e0!3m2!1sit!2sit!4v1651744351747!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Lo stadio Luigi Ferraris di Genova, noto anche col nome di Marassi dal quartiere in cui sorge, è il principale impianto sportivo di Genova. Ospita le partite del Genoa e della Sampdoria ed é il più antico stadio italiano ancora in uso, e per questo ha il soprannome di “Tempio del calcio”.', 'Lo stadio di Genova è il teatro delle partite casalinghe di due storiche Società di Calcio, il Genoa C.F.C. – il Club più antico d’Italia – e U.C. Sampdoria. Forse non tutti sanno che il Luigi Ferraris, il più antico stadio in Italia ancora in attività, è da considerarsi il primo impianto di proprietà di una società calcistica. Una storia affascinante che ha inizio nel 1911 ed arriva ai giorni nostri.', 10, 'Tutti i giorni dalle 10:00 - 18:00. Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 36599, 'img/stadio/ferraris.jpg'),
(6, 'Allianz', 'Monaco di Baviera', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2658.340840201123!2d11.622728315836723!3d48.21931110344341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479e7385128a251f%3A0xed4d60428e32c423!2sAllianz%20Arena!5e0!3m2!1sit!2sit!4v1651744376331!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Fate una visita dietro le quinte dell’Allianz Arena e godetevi l’atmosfera di questo stadio straordinario. Come ci si sente a seguire le orme dei tuoi idoli nel tunnel o ad entrare nei famosi spogliatoi? Com’è veramente una conferenza stampa post-partita?', 'È all‘FC Bayern Museum, situato all’interno dell‘Allianz Arena, che potrai davvero toccare con mano il mito FC Bayern. Su un’area di oltre 3.000 mq, le sue postazioni multimediali e interattive ti permetteranno di rivivere i momenti più belli della storia del nostro glorioso club e di scoprire come sia cresciuto e cambiato nel corso degli anni. Dalla sua fondazione nel 1900 fino agli ultimi grandi successi, l‘FC Bayern ti accompagnerà in un vero e proprio viaggio nel tempo. Un filmato esclusivo, le leggende Franz Beckenbauer e Gerd Müller nella „Hall of Fame“ e i giocatori della rosa attuale a grandezza naturale sono solo alcune delle attrazioni che ogni giorno rendono l’FC Bayern Museum meta del pellegrinaggio di innumerevoli tifosi. ', 12, 'Tutti i giorni dalle 10:00 - 18:00. Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 71137, 'img/stadio/allianz.jpg'),
(7, 'Anfield', 'Liverpool', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2377.1049065249845!2d-2.9653146649959217!3d53.430832512106335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487b21654b02538b%3A0x84576a57e21973ff!2sAnfield!5e0!3m2!1sit!2sit!4v1651744396138!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Visitate uno degli luoghi più emblematici del calcio europeo. Con questo tour dello stadio Anfield potrete conoscere la storia del leggendario Liverpool FC: un\'esperienza unica per gli appassionati di questo sport!', 'Sui muri dello stadio campeggia la scritta “You’ll never walk alone” (non sarete mai soli), che è anche il coro principale dei loro tifosi. Visitare Anfield, lo stadio del Liverpool, detentore della Champions League 2018-2019, e una delle grandi squadre inglesi che hanno avuto tra i suoi giocatori leggende quali Gerrard, Barnes, Rush, Shelton, Owen e molti altri, è una suggestione per ogni persona che si trova nella città di Liverpool.', 27, 'Tutti i giorni dalle 10:00 - 18:00.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 53394, 'img/stadio/anfield.jpg'),
(8, 'Parco dei Principi', 'Parigi', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.8793958960564!2d2.2508600158530805!3d48.84143910985388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67ac09948a18d%3A0xdd2450406cef2c5c!2sParco%20dei%20Principi!5e0!3m2!1sit!2sit!4v1651744419082!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Esplora il Parco dei Principi (Parc des Princes), lo stadio casa del Paris Saint-Germain. Percorri lo stesso terreno che hanno solcato leggende come Zlatan, Neymar, Mbappé e Buffon col tour con audioguida dei retroscena dello stadio parigino.', 'L\'impianto, con una capienza di circa quarantottomila posti, è uno degli stadi più belli e grandi di Francia, anche se nemmeno lontanamente comparabile ai circa ottantamila del vicino Stade de France a Saint-Denis. Dal 1974 è la casa del Paris Saint-Germain, club fondato nel 1970 a seguito della fusione tra lo Stade Saint-Germain e il Paris FC. Nel corso degli anni ha conquistato diversi trofei e sopratutto negli ultimi anni ha vinto più volte la Ligue 1, il massimo campionato professionistico francese di calcio. La sensazione generale però è che i suoi capitoli più importanti debba ancora scriverli e che la Tour Eiffel nel prossimo futuro possa illuminare i festeggiamenti di tante vittorie a livello internazionale.', 25, 'Tutti i giorni dalle 10:00 - 18:00.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 47929, 'img/stadio/parcodeiprincipi.jpg'),
(9, 'Camp nou', 'Barcellona', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.700830498291!2d2.1196754656703742!3d41.380584154379356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a498f576297baf%3A0x44f65330fe1b04b9!2sCamp%20Nou!5e0!3m2!1sit!2sit!4v1651744435985!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Lo Stadio Camp Nou di Barcellona è il tempio del Barcelona FC. Non si tratta di uno stadio di ultima generazione, ma vi stupirà per le sue dimensioni, il più grande d’Europa.', 'Il Barcellona Football Club vi offre l\'opportunità di visitare il suo mitico stadio: il Camp Nou. Dopo la Sagrada Familia, il Camp Nou è senza dubbio l\'altro tempio della città, il più grande stadio in Spagna e in Europa. \r\nLa visita dura tra un\'ora e mezza e due ore.\r\nScopriamo il museo del FC Barcelona e il suo mitico stadio, il Camp Nou\r\nIl tour vi porterà al campo, alla panchina dei giocatori e alle tribune, passando per gli spogliatoi, la cappella, l\'area stampa mista, ecc. Imparerete tutto sulla sua storia, la capacità dello stadio e anche sul futuro nuovo Camp Nou previsto per il 2025.\r\nQuesta visita si chiama \"Camp Nou Experience\" perché è una vera immersione nel mondo dei \"Blaugranas\". Una visita unica nella vita!\r\n', 28, 'Dal lunedi al venerdi dalle 10:00 - 19:00.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 99354, 'img/stadio/campnou.jpg'),
(10, 'Bernabeu', 'Madrid', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.0042564823957!2d-3.6905223843502553!3d40.453042761353615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228e23705d39f%3A0xa8fff6d26e2b1988!2sStadio%20Santiago%20Bernabeu!5e0!3m2!1sit!2sit!4v1651744472994!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Visita il leggendario stadio Santiago Bernabéu in questo tour dello stadio del Real Madrid con ingresso prioritario e scopri la storia della squadra e i numerosi trofei.', 'E\' il tempio del calcio spagnolo per eccellenza, la casa di uno dei club sportivi più importanti al Mondo. E\' dedicato ad uno dei personaggi chiave della storia del Real Madrid il Santiago Bernabeu, sede della blasonata squadra dei merengues, vera e propria Mecca per gli appassionati di questo straordinario sport.', 15, 'Tutti i giorni dalle 10:00 - 18:00.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi.  ', 81044, 'img/stadio/bernabeu.jpg'),
(11, 'Johan Cruijff Arena', 'Amsterdam', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2439.089713295654!2d4.939775415947456!3d52.31437455919959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c60b964b718393%3A0x7419d4c50fc7fcc3!2sAmsterdam%20ArenA!5e0!3m2!1sit!2sit!4v1651744488978!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Fai un tour della Johan Cruijf Arena e scopri la casa di fama mondiale dell\'Ajax Football Club. Visita lo spogliatoio, la sala riunioni e sorseggia un drink in uno skybox', ' La Johan Cruijff Arena (ex Amsterdam Arena) è lo stadio dell’Ajax, club di fama mondiale che ha annoverato tra le sue fila giocatori del calibro di Johan Cruijff e Marco Van Basten. Se siete appassionati di calcio, non perdetevi il tour che ripercorre la gloriosa storia dei campioni di Amsterdam.', 16, 'Tutti i giorni tranne la domenica dalle 10:00 - 20:00.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 36599, 'img/stadio/johancruijffarena.jpg'),
(12, 'Do dragao', 'Porto', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3003.751474755439!2d-8.585779684334504!3d41.16177401791349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246502a2a20bf7%3A0x1ad7c8d540f6cbe8!2zRXN0w6FkaW8gZG8gRHJhZ8Ojbw!5e0!3m2!1sit!2sit!4v1651744504898!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Esplora lo stadio di una delle più importanti squadre di calcio portoghesi per scoprirne le aree riservate agli addetti ai lavori, compresa la panchina, e scatta qualche foto foto a bordo campo.', 'Esplora la casa della squadra della Primeira Liga portoghese FC Porto con un biglietto di ingresso per il Museo dell\'FC Porto e lo Stadio Dragão. Ripercorri le gesta di campioni famosi e scopri i titoli collezionati dal club nella UEFA Champions League.', 15, 'Tutti i giorni dalle 10:00 - 20:00.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 50033, 'img/stadio/dodragao.jpg'),
(13, 'Maracana', 'Rio de Janeiro', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.0343470688526!2d-43.2323444844876!3d-22.912103943822242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997e5dba888b0d%3A0xf5f33188ee6274e5!2zTWFyYWNhbsOj!5e0!3m2!1sit!2sit!4v1651744530794!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Visita uno degli stadi più famosi al mondo.Il Maracana è uno dei simboli del calcio brasiliano nel mondo, un vero e proprio tempio dello sport più seguito a livello internazionale.', 'A Rio de Janeiro si trova uno dei simboli del calcio a livello mondiale: stiamo parlando del famoso Stadio Maracanà. Si tratta di uno dei must see di Rio, un vero e proprio tempio per lo sport più seguito al mondo. ', 10, 'Tutti i giorni dalle 8:30 - 16:30.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 78838, 'img/stadio//maracana.jpg'),
(14, 'Sultan Ibrahim Stadium', 'Johor', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1410.142088087349!2d103.61834400698295!3d1.4817733995560216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da75e68fece3eb%3A0x49ce93f90cac125!2sSultan%20Ibrahim%20Stadium!5e0!3m2!1sit!2sit!4v1651744576936!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Fate una visita all\'interno dello stadio di proprietà del Sultan Ibrahim e avrai la possibilità di ammirare la struttura, la storia e le coppe della squadra più famosa della malesia', 'Il Sultan Ibrahim Stadium è uno stadio di calcio situato a Iskandar Puteri, Johor, in Malesia. Prende il nome in onore dell\'attuale sovrano dello stato, Sultan Ibrahim ibni Almarhum Sultan Iskandar.', 8, 'Tutti i giorni tranne la domenica dalle 8:00 - 17:00.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 40000, 'img/stadio/sultanibrahimstadium.jpg'),
(15, 'Fnb', 'Johannesburg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.8287890916386!2d27.980466715575954!3d-26.234752071588584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e95090d44757ecb%3A0x12892e9b33f65a14!2sFnb%20Stadium!5e0!3m2!1sit!2sit!4v1651744594195!5m2!1sit!2sit\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Visita lo stadio FNB (First National Bank Stadium), conosciuto anche con il nome di Soccer City o Calabash, uno degli stadi più capienti al mondo.', 'Il Soccer City Stadium, noto anche come First National Bank Stadium, è uno degli stadi più grandi del mondo. Nonostante sia stato aperto nel 1986, molta espansione ha avuto luogo prima della Coppa del Mondo 2010. Con una capacità di poco meno di 100.000, Soccer City è la più grande del suo genere in Africa. Per la Coppa del Mondo avrebbe potuto ospitare solo 84.490 spettatori, ma la capienza massima è disponibile per le partite che coinvolgono la nazionale sudafricana e Kaizer Chiefs.', 15, 'Tutti i giorni dalle 10:00 - 20:00.  Gli orari delle visite dello stadio possono subire variazioni nei giorni di partite o di eventi. ', 94736, 'img/stadio/fnb.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `utente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `tour`
--

INSERT INTO `tour` (`id`, `nome`, `costo`, `utente`) VALUES
(1, 'mandolino', 70, 'admin'),
(2, 'star', 120, 'admin'),
(3, 'hero', 80, 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `tourhastadio`
--

CREATE TABLE `tourhastadio` (
  `tour` int(11) NOT NULL,
  `stadio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `tourhastadio`
--

INSERT INTO `tourhastadio` (`tour`, `stadio`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numTelefono` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `psw` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `nome`, `cognome`, `numTelefono`, `psw`) VALUES
('admin', 'Andrea', 'Di Blasi', '3295358554', 'admin'),
('dagrifo', 'Davide', 'Cornero', '5645545465', 'dagrifo03'),
('dibla5', 'Andrea', 'Di Blasi', '3295358554', 'andredibla5');

-- --------------------------------------------------------

--
-- Struttura della tabella `utentevisitastadio`
--

CREATE TABLE `utentevisitastadio` (
  `utente` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `stadio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utente` (`utente`),
  ADD KEY `tour` (`tour`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recensione_ibfk_1` (`utente`),
  ADD KEY `recensione_ibfk_2` (`stadio`);

--
-- Indici per le tabelle `squadra`
--
ALTER TABLE `squadra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stadio` (`stadio`);

--
-- Indici per le tabelle `stadio`
--
ALTER TABLE `stadio`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utente` (`utente`);

--
-- Indici per le tabelle `tourhastadio`
--
ALTER TABLE `tourhastadio`
  ADD PRIMARY KEY (`tour`,`stadio`),
  ADD KEY `stadio` (`stadio`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `utentevisitastadio`
--
ALTER TABLE `utentevisitastadio`
  ADD PRIMARY KEY (`utente`,`stadio`) USING BTREE,
  ADD KEY `stadio` (`stadio`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la tabella `stadio`
--
ALTER TABLE `stadio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `ordine_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`),
  ADD CONSTRAINT `ordine_ibfk_2` FOREIGN KEY (`tour`) REFERENCES `tour` (`id`);

--
-- Limiti per la tabella `recensione`
--
ALTER TABLE `recensione`
  ADD CONSTRAINT `recensione_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`),
  ADD CONSTRAINT `recensione_ibfk_2` FOREIGN KEY (`stadio`) REFERENCES `stadio` (`id`);

--
-- Limiti per la tabella `squadra`
--
ALTER TABLE `squadra`
  ADD CONSTRAINT `squadra_ibfk_1` FOREIGN KEY (`stadio`) REFERENCES `stadio` (`id`);

--
-- Limiti per la tabella `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`);

--
-- Limiti per la tabella `tourhastadio`
--
ALTER TABLE `tourhastadio`
  ADD CONSTRAINT `tourhastadio_ibfk_1` FOREIGN KEY (`tour`) REFERENCES `tour` (`id`),
  ADD CONSTRAINT `tourhastadio_ibfk_2` FOREIGN KEY (`stadio`) REFERENCES `stadio` (`id`);

--
-- Limiti per la tabella `utentevisitastadio`
--
ALTER TABLE `utentevisitastadio`
  ADD CONSTRAINT `utentevisitastadio_ibfk_1` FOREIGN KEY (`stadio`) REFERENCES `stadio` (`id`),
  ADD CONSTRAINT `utentevisitastadio_ibfk_2` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------
-- Host:                         185.81.1.20
-- Server version:               5.6.49-log - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for azivideo_dbpiat
CREATE DATABASE IF NOT EXISTS `azivideo_dbpiat` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;
USE `azivideo_dbpiat`;

-- Dumping structure for table azivideo_dbpiat.autore_video
CREATE TABLE IF NOT EXISTS `autore_video` (
  `id_autore` int(10) NOT NULL AUTO_INCREMENT,
  `nome_autore` varchar(50) NOT NULL,
  `cognome_autore` varchar(50) NOT NULL,
  `citta_autore` mediumtext NOT NULL,
  `desc_autore` longtext NOT NULL,
  `img_autore` varchar(50) NOT NULL DEFAULT '',
  `fb_autore` mediumtext NOT NULL,
  `linkedin_autore` mediumtext NOT NULL,
  `twitter_autore` mediumtext NOT NULL,
  `insta_autore` mediumtext NOT NULL,
  PRIMARY KEY (`id_autore`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table azivideo_dbpiat.autore_video: ~11 rows (approximately)
/*!40000 ALTER TABLE `autore_video` DISABLE KEYS */;
INSERT INTO `autore_video` (`id_autore`, `nome_autore`, `cognome_autore`, `citta_autore`, `desc_autore`, `img_autore`, `fb_autore`, `linkedin_autore`, `twitter_autore`, `insta_autore`) VALUES
	(11, 'Alberto', 'Bubbio', 'Milano', 'Laurea in Economia Aziendale presso l’Università Bocconi, perfezionamento degli studi presso  <br/>  la Harvard Business School (Cambridge, Massachusetts, USA) seguendo il corso Managing Corporate Controller and Planning. Professore associato di Economia Aziendale e responsabile del corso di Programmazione e Controllo, presso l’Università Cattaneo - LIUC (Castellanza, VA). È autore di libri e di numerosi articoli sui temi di Controllo di Gestione, Calcolo dei Costi e Pianificazione Strategica. Svolge inoltre attività di consulenza direzionale su temi di pianificazione strategica,controllo di gestione e finanza aziendale.', '1604490706.jpg', 'https://www.facebook.com/dimensionecontrollo', 'https://www.linkedin.com/company/managemind/', '#', 'https://www.linkedin.com/company/managemind/'),
	(12, 'Simone', 'Brancozzi', 'Fermo', 'Dal 1987 al 2012 è cultore della materia e coadiutore didattico presso la cattedra di “Ragioneria Generale Applicata ” e “Analisi di Bilancio” della Facoltà di Economia e Commercio dell’Università di Ancona tenuta dal Prof. Fiorenzo Lizza prima e dal Prof. Stefano Marasca poi.\r\nDal 1992 al 1996 è stato Segretario della sez. di Fermo del Sindacato Dottori Commercialisti delle Marche. In tale veste ha organizzato e coordinato diversi ed importanti convegni tra cui nel 1992 un convegno sul tema: “L’avvicendarsi delle generazioni alla guida delle imprese: aspetti aziendali, civilistici e fiscali.”; nel 1993 un convegno sul tema “Le crisi aziendali: aspetti aziendali, civilistici e fiscali”; nel 1994 un convegno sul tema “Le Borse locali: aspetti aziendali e professionalità; nel 1995 “L’Arbitrato” ed infine nel 1996 “L’Internazionalizzazione delle PMI”.\r\n\r\nAppena uscito dall’Università ha fatto parte dal 1988 al 1994 del gruppo di docenti a cui sono affidati i corsi di formazione post universitaria TODA presso i centri E.N.A.I.P. di Ancona, Fabriano, Fermo e Rimini.\r\n\r\nDal 2000 è stato Consigliere dell’Ordine dei Dottori Commercialisti di Fermo.\r\nDal 2005 dirige la rivista di cultura aziendale edita dal proprio studio.\r\nDal 2008 è presidente dell’ADC Marche (Associazione dei Dottori Commercialisti)\r\nDal 2010 è Dottore di Ricerca con una tesi sull’Economia Aziendale intitolata: “ANALISI E RIFLESSIONI SULLE PRINCIPALI CRITICITA’ E PROBLEMATICHE APPLICATIVE NELL’ADOZIONE DEI PRINCIPI IAS/IFRS”\r\n\r\nNel 2005 ha realizzato e pubblicato un modello di rating per la valutazione della consistenza economico finanziaria delle imprese anche ai fini della valutazione Basilea 2. Tale modello è utilizzabile anche come strumento di misurazione della performance aziendale.\r\n\r\nForte del suo background e delle sua figura carismatica, da oltre 30 anni porta il suo operato di consulente e tutor aziendale, con successo all’interno delle più svariate aziende in tutta Italia, effettuando consulenze di direzione aziendale, piani industriali, passaggi generazionali, analisi di bilancio, rating aziendali e risolvendo con brillantezza e pragmaticità i diversi problemi che affliggono il piccolo e medio imprenditore italiano.', '1605030046.jpg', 'https://www.facebook.com/ProfSimoneBrancozzi', 'https://www.linkedin.com/in/simonebrancozzi/', 'https://twitter.com/SimoneBrancozzi', 'https://www.instagram.com/sbrancozzi/'),
	(13, 'Dipak Raj', 'Pant', 'Milano', 'Fondatore dell\'\'Unità di studi interdisciplinari per l\'\'Economia sostenibile e Docente di Antropologia ed Economia\r\nIl Prof. Dipak R. Pant affianca le organizzazioni governative, non governative e aziendali per questioni politiche di economia sostenibile e di pianificazione strategica, legate allo sviluppo sostenibile. Instancabile esploratore del mondo, viene considerato il pioniere del "Programma delle Terre Impervie (Extreme Lands Program)", uno studio che comporta indagini etnografiche, economiche e la pianificazione dello sviluppo sociale ed economico nelle zone più marginali e difficili, storicamente abitate, del mondo. Il suo intervento nel dibattito sullo sviluppo internazionale è basato sulla convinzione che la sostenibilità sociale e ambientale sia elemento essenziale per ogni strategia per la competitività nel mercato globale.\r\n\r\nIl guru per lo sviluppo economico sostenibile', '1604912430.png', 'https://www.facebook.com/ProfDipakRajPant/', '#', '#', '#'),
	(14, 'Simon', 'Sinek', 'Usa', 'Simon Oliver Sinek (Londra, 9 ottobre 1973 ) è uno scrittore e saggista inglese naturalizzato statunitense. È autore di diversi libri sui temi della comunicazione e della leadership, fra cui i best-seller Start With Why e Leaders Eat Last.', '1604913768.jpg', 'https://www.facebook.com/simonsinek', 'https://www.linkedin.com/company/simon-sinek/', 'https://twitter.com/simonsinek', 'https://www.pinterest.it/officialsimonsinek/_created/'),
	(15, 'Seth', 'Godin', 'Hastings-on-Hudson', 'Nel 1979 si laurea in informatica e filosofia all\'Università Tufts e in seguito consegue il Master in business administration alla Stanford Graduate School of Business. Dal 1983 al 1986 lavora come brand manager di Spinnaker Software e per un certo tempo si sposta ogni settimana tra la California e Boston sia per il suo nuovo lavoro sia per completare il suo master.\r\n\r\nDopo aver lasciato Spinnaker Software nel 1986, Godin usa 20.000 dollari dei suoi risparmi per fondare in un monolocale di New York la Seth Godin Productions, una società che si occupa di packaging editoriale. È in quello stesso ufficio che Godin incontra Mark Hurst con il quale nel 1995 fonda Yoyodyne, in seguito acquisita da Yahoo!.\r\n\r\nDopo alcuni anni Godin vende la Seth Godin Productions ai dipendenti e concentra i suoi sforzi su Yoyodyne introducendo e sviluppando su Internet i concetti di permission marketing (i messaggi pubblicitari e le offerte commerciali sono inviati soltanto dopo il consenso dell\'utente), di viral marketing e di direct marketing. Per un certo periodo di tempo, Godin ha inoltre collaborato come editorialista per la rivista Fast Company', '1604914118.jpg', 'https://www.facebook.com/sethgodin/', 'https://www.linkedin.com/in/sethgodin/', 'https://twitter.com/ThisIsSethsBlog', 'https://www.instagram.com/sethgodin/'),
	(16, 'Mirko', 'Gasparotto', 'Vicenza', 'Mirco Gasparotto nasce in Svizzera il 24 febbraio del 1963.\r\n\r\nA 24 anni entra a far parte di Arroweld Italia, della quale, a partire dal 2005, sarà Presidente.\r\n\r\nArroweld Italia è leader nella penisola nella distribuzione industriale; sin dagli albori l’azienda si occupa della fornitura alle grandi industrie di strumentazioni tecnologiche nei settori della saldatura, della misurazione e del controllo, così come di gomme e attrezzature tecnoplastiche, utensileria professionale ed abbigliamento antinfortunistico.\r\n\r\nQuando, nel 1983, Mirco Gasparotto entra per la prima volta a contatto con il mondo di Arroweld Italia però è solo un fattorino.\r\n\r\nLa sua scalata nella piramide aziendale avviene molto velocemente, tanto da divenire presto il braccio destro del primo fondatore di Arroweld, l’imprenditore Antonio Fumagalli. Il prestigio acquisito in così breve tempo, consente a Mirco Gasparotto di ottenere, alla morte dell’imprenditore Antonio Fumagalli, avvenuta nel 1988, la carica di amministratore delegato del gruppo.\r\n\r\nDall’amministrazione di Arroweld Italia alla sua acquisizione il passo è breve: nel 1990 assieme agli amici Giometto Andrea, Brazzale Roberto e Lorenzin Gimmi, rileva, attraverso un’operazione di Management Buy out, il 90% del gruppo; la compagine societaria si amplia nel 1995, arricchendosi di altri 7 manager.\r\n\r\nDal 1995 al 2001, Arroweld Italia compie diverse acquisizioni che le consentono oggi di presentarsi sul mercato con un fatturato di gruppo consolidato e pari, nel 2016, a 100 milioni di euro.\r\n\r\nOggi Arroweld controlla 8 società, servendo i suoi clienti mediante 1.000 collaboratori e 22 siti distributivi che coprono 50.000 mq.\r\n\r\nMa Mirco Gasparotto non è solo questo.\r\n\r\nIl Presidente di Arroweld Italia ha deciso, infatti, di condividere la sua vita e la sua esperienza aziendale con i liberi professionisti gli imprenditori che intendono raggiungere il suo medesimo successo, trasformandosi nel mentore d’impresa e nel coach aziendale che ogni imprenditore di PMI vorrebbe avere al suo fianco.', '1604914432.jpg', 'https://www.facebook.com/official.mirco.gasparotto', 'https://www.linkedin.com/in/mirco-gasparotto-75261920', 'https://twitter.com/mircogasparotto', '#'),
	(17, 'Anthony', 'Smith', 'Bologna', 'Anthony è la rara combinazione tra un manager, un grande comunicatore e un atleta, avendo alle spalle una vasta esperienza come dirigente commerciale presso Nike e Levi Strauss, una grande padronanza nella conduzione di grandi eventi e una lunga carriera nel football universitario americano.\r\n\r\nOggi Anthony è Executive Business Coach e Personal Coach per imprenditori e dirigenti di diverse realtà industriali e commerciali ed i loro team di manager, opera inoltre come Mental e Personal Coach per allenatori professionisti nelle massime serie del calcio italiano ed è spesso interpellato per interventi motivazionali ed ispirazionali per convention aziendali rivolte a forze commerciali e manager.\r\n\r\nAlcune delle aziende che hanno affidato ad Anthony i propri progetti di crescita sono: AS Roma Calcio, Associazione Italiana Calciatori, Azimuth Yachts, Banca Fineco, Billabong, Bologna FC 1909, Case New Holland, Frosinone Calcio, Hera Comm, Lega Serie B, Louis Vuitton Italia, Mercedes Benz, Merkur-Win, Nespresso, Novartis, Office Depot, Pfizer Italia, Pinko, SNAI, Vicenza F.C.', '1604914704.jpg', 'https://www.facebook.com/anthonysmith.businesscoach', 'https://www.linkedin.com/in/anthony-lee-smith-6154123', 'https://twitter.com/AS_Biz_Coach', '#'),
	(18, 'Roberto', 'Re', 'Milano', 'Roberto Re è uno dei massimi esperti di crescita personale e motivazione in Italia.\r\n\r\nAutore di due bestseller - Leader di te stesso e Smettila di incasinarti! (Mondadori) - e di svariati dvd di formazione. \r\nHa migliorato le performance non solo di manager e aziende, atleti e squadre sportive, ma anche e soprattutto delle oltre centomila persone che hanno frequentato i suoi seminari in questi anni.\r\n\r\nFondatore, presidente e master coach nella HRD Training Group, società leader italiana e specializzata nella formazione manageriale e comportamentale, mette a disposizione di tutti i suoi training mirati (sul nostro sito è infatti possibile acquistare diversi dvd, oltre ai libri), per far emergere in ogni persona e in ogni azienda il massimo potenziale, spesso inespresso.\r\n\r\nRoberto Re, durante i suoi seminari e nei suoi libri, è in grado di trasmettere tanta energia positiva, oltre a far trasparire le sue eclettiche e profonde competenze.\r\n\r\nMolte sono le aziende che si sono rivolte alla sua maestria, ma sono tantissime anche le squadre sportive, e alcuni campioni di fama mondiale, che hanno appreso i suoi metodi infallibili. Tra gli altri ricordiamo Jessica Rossi, medaglia d’oro nel tiro a volo alle Olimpiadi di Londra 2012, e l’allenatore di calcio Roberto Mancini.\r\n\r\nCiò su cui insiste tanto il training di Roberto Re è il fatto che tutti abbiamo del potenziale, c’è solo bisogno che qualcuno ci aiuti a tirarlo fuori. I suoi insegnamenti mirano all’influenza emozionale, all’allenamento mentale, al potenziamento delle proprie prestazioni, il tutto al fine di raggiungere risultati fuori dal comune (come lui stesso li definisce).\r\n\r\nSpesso gli insuccessi, o semplicemente ciò che non si è realizzato, sono dovuti alla bassa autostima, alla paura di essere giudicati, al timore di un cambiamento e a moltissimi altri fattori psicologici. Liberarsi di tali limiti, però, equivale ad acquisire una nuova coscienza di sé e delle proprie possibilità. Una volta fissato un obiettivo, basta solo avere coraggio, perché per raggiungere qualsiasi meta è naturale dover abbandonare la propria zona di comfort e le proprie abitudini.\r\nPer quanto possa sembrare un discorso astratto e di difficile applicazione, grazie al coaching di Roberto Re ed alla lettura dei suoi libri, sono veramente numerosissime le persone e le aziende che hanno potuto beneficiare di cambiamenti positivi nel business o nella vita.', '1605085784.jpg', 'https://www.facebook.com/RobertoRePage', 'https://www.linkedin.com/in/roberto-re-7a21681', 'https://twitter.com/RobertoReHRD', 'https://www.instagram.com/robertorehrd/'),
	(19, 'Julio ', 'Velasco', 'Argentina', 'Julio Velasco (La Plata, 9 febbraio 1952) è un dirigente sportivo e allenatore di pallavolo argentino naturalizzato italiano, direttore tecnico del settore giovanile della FIPAV.\r\n\r\nHa legato la sua fama al ruolo di commissario tecnico della nazionale italiana di pallavolo maschile, incarico ricoperto da 1989 al 1996: sotto la sua gestione gli Azzurri, fin lì ai margini del volley mondiale, nel corso degli anni 90 del XX secolo si affermarono tra le formazioni più forti di tutti i tempi, in quella che è passata alla storia come l\'epopea della generazione di fenomeni.', '1605087704.jpg', '#', '#', '#', '#'),
	(20, 'Paolo', 'Ruggeri', 'Bologna', 'PAOLO RUGGERI Imprenditore, autore, spirito libero. Imprenditore che gestisce 11 aziende in 6 diversi paesi nel mondo. Paolo è socio fondatore di OSM. Paolo è uno speaker di caratura internazionale. Nel solo 2015 ha erogato presentazioni sul management a società Australiane, Americane, Canadesi, Brasiliane, Russe, Inglesi, Spagnole e Portoghesi.', '1605088629.jpg', 'https://www.facebook.com/PaoloRuggeriOsm', 'https://www.linkedin.com/in/paolo-ruggeri/', '#', '#'),
	(21, 'Marcello', 'Mancini', 'Macerata', 'Imprenditore, editore ed esperto di formazione, Marcello Mancini è fondatore e CEO di Roi Group, società che acquisisce, elabora e produce conoscenza attraverso l’editoria ed eventi formativi. Dal 2011, con Performance Strategies, porta in Italia i numeri uno al mondo nella formazione per il business. Dal 2016, con Life Strategies, seleziona scienziati, filosofi e psicologi tra i più illustri a livello internazionale come relatori per eventi formativi sui temi della crescita personale. Nel 2017 è entrato nel settore dell’editoria con Roi Edizioni, la casa editrice che pubblica le opere dei migliori autori internazionali sulla formazione e sulla crescita personale.', '1605284974.jpg', 'https://www.facebook.com/marcellomancini74', 'https://www.linkedin.com/in/mancinimarcello', 'https://twitter.com/mancinimarcello', 'https://www.instagram.com/marcellomancini');
/*!40000 ALTER TABLE `autore_video` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.prefiriti
CREATE TABLE IF NOT EXISTS `prefiriti` (
  `preferiti_id` int(11) NOT NULL AUTO_INCREMENT,
  `preferiti_video` int(11) DEFAULT NULL,
  `preferiti_userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`preferiti_id`),
  KEY `preferiti_userid` (`preferiti_userid`),
  KEY `preferiti_video` (`preferiti_video`),
  CONSTRAINT `FK_prefiriti_users` FOREIGN KEY (`preferiti_userid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_prefiriti_videos` FOREIGN KEY (`preferiti_video`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table azivideo_dbpiat.prefiriti: ~3 rows (approximately)
/*!40000 ALTER TABLE `prefiriti` DISABLE KEYS */;
INSERT INTO `prefiriti` (`preferiti_id`, `preferiti_video`, `preferiti_userid`) VALUES
	(1, 204, 27),
	(2, 205, 27),
	(7, 200, 2);
/*!40000 ALTER TABLE `prefiriti` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.serial
CREATE TABLE IF NOT EXISTS `serial` (
  `id_serial` int(11) NOT NULL AUTO_INCREMENT,
  `serial_name` varchar(50) DEFAULT NULL,
  `serial_thumbnail` varchar(50) DEFAULT NULL,
  `serial_season` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_serial`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table azivideo_dbpiat.serial: ~4 rows (approximately)
/*!40000 ALTER TABLE `serial` DISABLE KEYS */;
INSERT INTO `serial` (`id_serial`, `serial_name`, `serial_thumbnail`, `serial_season`) VALUES
	(7, 'Web DEVELOPER1', '1606488677.jpg', 31),
	(8, 'Web DEVELOPER1', '1606488856.jpg', 31),
	(9, 'Web DEVELOPER1', '1606488745.jpg', 31),
	(10, 'Web DEVELOPER1', '1606488901.png', 31);
/*!40000 ALTER TABLE `serial` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_surname` varchar(50) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_city` varchar(50) DEFAULT NULL,
  `user_province` varchar(50) DEFAULT NULL,
  `user_district` varchar(50) DEFAULT NULL,
  `user_livel` smallint(1) DEFAULT '1' COMMENT '1-user  / 2 - admin',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `user_username`, `user_password`, `user_email`, `user_phone`, `user_city`, `user_province`, `user_district`, `user_livel`) VALUES
	(2, 'Simone', 'Brancozzi', 'simonebrancozzi', 'simone2018', NULL, NULL, 'Italy', NULL, NULL, 2),
	(17, 'Leonardo', 'Cicchini', 'leonardocicchini', 'leonardo2020', 'leo@email.com', '0039325355', 'Italy', NULL, NULL, 2),
	(27, 'Leonardo', 'Cicchini', 'test', 'test', 'leo@email.com', '0039325355', 'Italy', NULL, NULL, 1),
	(49, 'Leonida', 'consulting', 'backup.leonida@gmail.com', NULL, 'backup.leonida@gmail.com', NULL, NULL, NULL, NULL, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `title_video` varchar(100) DEFAULT NULL,
  `description_video` longtext,
  `path_video` varchar(100) DEFAULT NULL,
  `path_trail_video` varchar(100) DEFAULT NULL,
  `photo_from_video` varchar(100) DEFAULT NULL,
  `url_youtube` varchar(150) DEFAULT NULL,
  `autore` int(11) DEFAULT NULL,
  `video_prize` float DEFAULT NULL,
  `tipologia_video` int(11) DEFAULT NULL COMMENT '1 free  / 2 paid',
  `data_creation` datetime DEFAULT NULL,
  `super_categorie` int(11) DEFAULT NULL COMMENT '1 video / 2 pocast  /  3 serial',
  `id_serial` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.videos: ~8 rows (approximately)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` (`id_video`, `title_video`, `description_video`, `path_video`, `path_trail_video`, `photo_from_video`, `url_youtube`, `autore`, `video_prize`, `tipologia_video`, `data_creation`, `super_categorie`, `id_serial`) VALUES
	(200, 'L\' ipercompetitività', 'test', '1604598666.mp4', '1604598666.', '1604598666.jpg', '', 11, 0, 1, '2020-11-05 18:51:06', 3, 7),
	(201, 'L\'art. 2409 - il 10% dei soci delle srl può chiedere la revoca degli amministratori ', 'In questo video vediamo come per via dell\'art. 2409 il 10% dei soci delle srl può chiedere la revoca degli amministratori ', '1604662902.mp4', '1604662902.', '1604662902.jpg', NULL, 12, 0, 1, '2020-11-06 12:41:42', 3, 7),
	(202, 'Facebook Developer Garage ', 'Seth Godin spiega come fare web marketing partendo da 0.', '1605029717.mp4', '1605029717.', '1605029717.jpg', NULL, 15, 0, 1, '2020-11-10 18:35:17', 3, 7),
	(203, 'Pesce Veloce mangia Pesce Grande', 'Dipak Pant e Eusebio Gualino si alternano in questo incontro di formazione alla Gessi Academy. Tra gli argomenti trattati in vista di una strategia aziendale vincente in questo momento, la destinazione, il mercato comparativo e competitivo, l\'intelligenza umana, il futuro, la positività, l\'importanza di distinguersi facendo crescere le persone a livello culturale, l\'innovazione e la necessità di essere più veloci e connessi.', '1605030421.mp4', '1605030421.', '1605030421.jpg', NULL, 13, 0, 1, '2020-11-10 18:47:01', 1, NULL),
	(204, 'Il Cerchio d\'oro', 'Simon Sinek ci spiega il cerchio d\'oro', '1605030668.mp4', '1605030668.', '1605030668.jpg', NULL, 14, 0, 1, '2020-11-10 18:51:08', 1, NULL),
	(205, 'Le Caratteristiche di un Leader a 360°', 'Leadership in Azienda: Le Caratteristiche di un Leader\r\nLeader 360: Percorso di Coaching Elementi:\r\n- Coaching Individuale\r\n- Coaching di Gruppo\r\n- Casi di Coaching Concreto in Diretta\r\n- Condivisione con Altri Manager ed Imprenditori\r\n- 4 Percorsi a Video Gratis:\r\n  * Strategic Leadership Roadmap\r\n  * Come Voglio Io!\r\n  *  i Segreti della Comunicazione\r\n  *  Le Chiavi della Motivazione', '1605085032.mp4', '1605085032.', '1605085032.jpg', NULL, 17, 0, 1, '2020-11-11 09:57:12', 1, NULL),
	(206, '5 steps per migliorare  la tua comunicazione', 'Non possiamo non comunicare!\r\nMa come lo fai? Pensaci un attimo...\r\nnessuno ti ha mai spiegato bene come fare...\r\n\r\necco alcune tecniche per diventare un buon comunicatore. \r\n\r\nRicorda che l\'efficacia della tua comunicazione in relazione con gli altri e in relazione con te stesso impatterà notevolmente sui tuoi risultati, quindi sulla qualità della TUA vita.', '1605085956.mp4', '1605085956.', '1605085956.jpg', NULL, 18, 0, 1, '2020-11-11 10:12:36', 1, NULL),
	(207, 'L\'atteggiamento mentale positivo è importantissimo per l\'Imprenditore!', 'L\'atteggiamento mentale positivo è importantissimo per l\'Imprenditore!', '1605086793.mp4', '1605086793.', '1605086793.jpg', NULL, 16, 0, 1, '2020-11-11 10:26:33', 1, NULL);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_buy
CREATE TABLE IF NOT EXISTS `video_buy` (
  `id_video_buy` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT '0',
  `subscription` int(1) DEFAULT NULL COMMENT '1-buy specific video\r\n2-premuim',
  `data_subscription_start` datetime DEFAULT NULL,
  `data_subscription_end` datetime DEFAULT NULL,
  PRIMARY KEY (`id_video_buy`) USING BTREE,
  KEY `FK_video_venduti_users` (`id_user`),
  CONSTRAINT `FK_video_venduti_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- Dumping data for table azivideo_dbpiat.video_buy: ~0 rows (approximately)
/*!40000 ALTER TABLE `video_buy` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_buy` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_buy_idVideos
CREATE TABLE IF NOT EXISTS `video_buy_idVideos` (
  `id_video_buy` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_video_buy`),
  KEY `FK_video_buy_idVideos_videos_2` (`id_video`),
  KEY `FK_video_buy_idVideos_users` (`id_user`),
  CONSTRAINT `FK_video_buy_idVideos_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_video_buy_idVideos_videos_2` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.video_buy_idVideos: ~0 rows (approximately)
/*!40000 ALTER TABLE `video_buy_idVideos` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_buy_idVideos` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_category
CREATE TABLE IF NOT EXISTS `video_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_video` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.video_category: ~31 rows (approximately)
/*!40000 ALTER TABLE `video_category` DISABLE KEYS */;
INSERT INTO `video_category` (`id_category`, `category_video`) VALUES
	(46, 'Cruscotto di controllo'),
	(47, 'Legale'),
	(48, 'Riforma crisi'),
	(49, 'Crisi e risanamento'),
	(50, 'Controllo di gestione'),
	(51, 'Continuità aziendale'),
	(52, 'Revisione'),
	(53, 'Finanza'),
	(54, 'Finanza agevolata'),
	(55, 'Finanza alternativa'),
	(56, 'Crowdfunding'),
	(57, 'Blockchain'),
	(58, 'Venture capital'),
	(59, 'Marketing'),
	(60, 'Web marketing'),
	(61, 'Diritto commerciale'),
	(62, 'Diritto societario'),
	(63, 'Diritto fallimentare'),
	(64, 'Diritto del lavoro'),
	(65, 'Welfare'),
	(66, 'Organizzazione studi professionali'),
	(67, 'Clima aziendale'),
	(68, 'Analisi di bilancio'),
	(69, 'Analisi dei costi'),
	(70, 'Budgeting'),
	(71, 'Margine di contribuzione'),
	(72, 'Balanced scorecard'),
	(73, 'Pianificazione strategica'),
	(74, 'leadership'),
	(75, 'Team Buiding'),
	(77, 'Adeguati assetti');
/*!40000 ALTER TABLE `video_category` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_comment
CREATE TABLE IF NOT EXISTS `video_comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(50) DEFAULT NULL,
  `date_comment` datetime DEFAULT NULL,
  `id_video` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.video_comment: ~4 rows (approximately)
/*!40000 ALTER TABLE `video_comment` DISABLE KEYS */;
INSERT INTO `video_comment` (`id_comment`, `comment`, `date_comment`, `id_video`, `user_id`) VALUES
	(85, 'dddd', '2020-11-24 15:50:38', 200, 27),
	(86, 'fff', '2020-11-24 15:52:37', 200, 27),
	(87, 'dddd', '2020-11-24 15:53:14', 206, 27),
	(88, 'testt', '2020-11-24 15:53:23', 206, 27);
/*!40000 ALTER TABLE `video_comment` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_con_category
CREATE TABLE IF NOT EXISTS `video_con_category` (
  `id_con` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) DEFAULT NULL,
  `id_video` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_con`),
  KEY `FK_video_con_category_videos` (`id_video`),
  KEY `FK_video_con_category_video_category` (`id_category`),
  CONSTRAINT `FK_video_con_category_video_category` FOREIGN KEY (`id_category`) REFERENCES `video_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_video_con_category_videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.video_con_category: ~33 rows (approximately)
/*!40000 ALTER TABLE `video_con_category` DISABLE KEYS */;
INSERT INTO `video_con_category` (`id_con`, `id_category`, `id_video`) VALUES
	(60, 46, 201),
	(68, 59, 202),
	(69, 60, 202),
	(70, 49, 203),
	(71, 50, 203),
	(72, 51, 203),
	(73, 65, 203),
	(74, 67, 203),
	(75, 73, 203),
	(76, 51, 204),
	(77, 66, 204),
	(78, 67, 204),
	(79, 74, 204),
	(80, 75, 204),
	(81, 49, 205),
	(82, 51, 205),
	(83, 66, 205),
	(84, 67, 205),
	(85, 74, 205),
	(86, 75, 205),
	(87, 48, 206),
	(88, 51, 206),
	(89, 66, 206),
	(90, 67, 206),
	(91, 74, 206),
	(92, 75, 206),
	(93, 49, 207),
	(94, 51, 207),
	(95, 66, 207),
	(96, 67, 207),
	(97, 74, 207),
	(98, 75, 207),
	(128, 49, 200);
/*!40000 ALTER TABLE `video_con_category` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_iniziati
CREATE TABLE IF NOT EXISTS `video_iniziati` (
  `iniziati_id` int(11) NOT NULL AUTO_INCREMENT,
  `iniziati_video` int(11) DEFAULT NULL,
  `iniziati_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`iniziati_id`),
  KEY `FK_video_iniziati_users` (`iniziati_user`),
  KEY `FK_video_iniziati_videos` (`iniziati_video`),
  CONSTRAINT `FK_video_iniziati_users` FOREIGN KEY (`iniziati_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_video_iniziati_videos` FOREIGN KEY (`iniziati_video`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table azivideo_dbpiat.video_iniziati: ~0 rows (approximately)
/*!40000 ALTER TABLE `video_iniziati` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_iniziati` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_rating
CREATE TABLE IF NOT EXISTS `video_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `FK_video_rating_videos` (`video_id`),
  KEY `FK_video_rating_users` (`user_id`),
  CONSTRAINT `FK_video_rating_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_video_rating_videos` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.video_rating: ~6 rows (approximately)
/*!40000 ALTER TABLE `video_rating` DISABLE KEYS */;
INSERT INTO `video_rating` (`rating_id`, `rating`, `video_id`, `user_id`) VALUES
	(52, 2, 200, 2),
	(53, 3, 200, 2),
	(54, 5, 204, 27),
	(55, 2, 201, 27),
	(57, 3, 203, 27),
	(58, 3, 200, 27);
/*!40000 ALTER TABLE `video_rating` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_slide
CREATE TABLE IF NOT EXISTS `video_slide` (
  `id_slide` int(11) NOT NULL AUTO_INCREMENT,
  `slide_position` int(11) DEFAULT NULL,
  `id_video` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_slide`),
  KEY `FK_video_slide_videos` (`id_video`),
  CONSTRAINT `FK_video_slide_videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.video_slide: ~4 rows (approximately)
/*!40000 ALTER TABLE `video_slide` DISABLE KEYS */;
INSERT INTO `video_slide` (`id_slide`, `slide_position`, `id_video`) VALUES
	(55, 1, 200),
	(56, 3, 201),
	(57, 4, 202),
	(60, 2, 207);
/*!40000 ALTER TABLE `video_slide` ENABLE KEYS */;

-- Dumping structure for table azivideo_dbpiat.video_views
CREATE TABLE IF NOT EXISTS `video_views` (
  `id_views` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_views`),
  KEY `FK__users_2` (`id_user`),
  KEY `FK__videos` (`id_video`),
  CONSTRAINT `FK__users_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id_video`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table azivideo_dbpiat.video_views: ~4 rows (approximately)
/*!40000 ALTER TABLE `video_views` DISABLE KEYS */;
INSERT INTO `video_views` (`id_views`, `id_video`, `id_user`) VALUES
	(28, 201, 17),
	(29, 200, 17),
	(30, 201, 27),
	(31, 200, 27);
/*!40000 ALTER TABLE `video_views` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

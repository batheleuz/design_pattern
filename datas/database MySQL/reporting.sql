-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Lun 03 Juillet 2017 à 13:35
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `reporting`
--

-- --------------------------------------------------------

--
-- Structure de la table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `signification` varchar(70) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `colonne` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `code`
--

INSERT INTO `code` (`id`, `code`, `signification`, `colonne`) VALUES
  (1, 'REOR', 'Réorienté', 'nd'),
  (2, 'REPA', 'Reparation / Reprise', 'nd'),
  (3, 'MUTP', 'Mutation d''une paire', 'nd'),
  (4, 'MUTE', 'Mutation d''un equipement', 'nd'),
  (5, 'CHGT', 'Changement', 'nd'),
  (6, 'PRIVE', 'Prive', 'nd'),
  (7, 'REPO', 'Repointage antenne', 'nd'),
  (8, 'RINIT', 'Reinitialisation', 'nd'),
  (9, 'RCONF', 'Reconfiguration', 'nd'),
  (10, 'ADC', 'Aucun défaut constaté', 'nd'),
  (11, 'FMA', 'Fausse Manoeuvre Abonné', 'nd'),
  (12, 'OBQP', 'Ouverture BPQ', 'nd'),
  (13, 'CLIO', 'Client oriente', 'nd'),
  (14, 'ANNU', 'Annulation drgt. pour mainten.', 'nd'),
  (15, 'APAC', 'Appareil SONATEL à changer', 'nd'),
  (16, 'ACAR', 'App. changé, à régulariser SCO', 'nd'),
  (17, 'CANO', 'Correction Anomalie COP/INS', 'nd'),
  (18, 'AAEN', 'Aucune Action Entreprise', 'nd'),
  (19, 'DEPO', 'DEPOUSSIERAGE', 'nd'),
  (20, 'APPR', 'Appui redressé', 'nd'),
  (21, 'APPC', 'Appui changé', 'nd'),
  (22, 'ELAG', 'Elagage', 'nd'),
  (23, 'REPJ', 'Reprise jarretière', 'nd'),
  (24, 'BAC', 'OT Bon Au Contrôle', 'nd'),
  (25, 'RICL', 'Refus Intervention Client', 'nd'),
  (26, 'CLBLK', 'RELEVE PAR UN DRGT COLLECTIF', 'nd'),
  (27, 'REALC', 'REMISE ALIMENTATION CENTRE', 'nd'),
  (28, 'REALD', 'REMISE ALIMENTATION DISTANT', 'nd'),
  (29, 'MUTR', 'MUTATION PORT', 'nd'),
  (30, 'RACC', 'Raccordement renvois', 'nd'),
  (31, 'RINIR', 'REINITIALISATION ROUTEUR', 'nd'),
  (32, 'CHGTC', 'CHANGEMENT CARTE', 'nd'),
  (33, 'RALIR', 'REALIMENTATION ROUTEUR', 'nd'),
  (34, 'RANR', 'REMISE à NIVEAU ROUTEUR', 'nd'),
  (35, 'RINIU', 'REINITIALISATION UR COMMUTATIO', 'nd'),
  (36, 'MUT', 'TRAVAUX MUTATION SUR UR', 'nd'),
  (37, 'RANU', 'REMISE à NIVEAU UR COMMUTATION', 'nd'),
  (38, 'MUTMI', 'TRAVAUX MUTATION SUR MIC TRANS', 'nd'),
  (39, 'RINIM', 'REINITIALISATION MIC TRANS', 'nd'),
  (40, 'RANM', 'REMISE à NIVEAU MIC TRANS', 'nd'),
  (41, 'RINID', 'REINITIALISATION DSLAM', 'nd'),
  (42, 'CHGTD', 'CHANGEMENT CARTE DSLAM', 'nd'),
  (43, 'RAND', 'REMISE à NIVEAU DSLAM', 'nd'),
  (44, 'RALID', 'REMISE ALIMENTATION DSLAM', 'nd'),
  (45, 'RALIS', 'REMISE ALIMENTATION SWITCH', 'nd'),
  (46, 'CHGTM', 'CHANGEMENT MODULE SWITCH', 'nd'),
  (47, 'RANS', 'REMISE à NIVEAU SWITCH', 'nd'),
  (48, 'RINSA', 'REINITIALISATION SERVER AUTHEN', 'nd'),
  (49, 'RMASA', 'REMISE ALIMENTATION SERVER AUT', 'nd'),
  (50, 'RMAUM', 'REMISE ALIMENTATION UMUX', 'nd'),
  (51, 'RINUM', 'REINITIALISATION UMUX', 'nd'),
  (52, 'CHGCU', 'CHANGEMENT CARTE UMUX', 'nd'),
  (53, 'RANUM', 'REMISE à NIVEAU UMUX', 'nd'),
  (54, 'CHMTV', 'CHANGEMENT MODEM TV', 'nd'),
  (55, 'MOCHG', 'MODEM CHANGE', 'nd'),
  (56, 'ALDEC', 'ALIMENATION DECODEUR', 'nd'),
  (57, 'CHCPL', 'BOITIER CPL CHANGE', 'nd'),
  (58, 'CFID', 'Confirmation ID', 'nd'),
  (59, 'BOUCL', 'DERANGEMENT BOUCLE AVEC CLIENT', 'nd'),
  (60, 'RCHTL', 'REFUS CHANGEMENT TERMINAL', 'nd'),
  (61, 'CMRIN', 'MODEM REINITIALISE/REINSTALLE', 'nd'),
  (62, 'CRSSE', 'REINITIALISATION DE SESSION', 'nd'),
  (63, 'CRESP', 'REINITIALISATION PORT', 'nd'),
  (64, 'RCPAC', 'Remise à niveau compte d''accés', 'nd'),
  (65, 'TRAG', 'Client orienté en AGENCE', 'nd'),
  (66, 'CXCFM', 'Configuration modem', 'nd'),
  (67, 'CXRIM', 'Réinstallation du modem', 'nd'),
  (68, 'RRXD', 'Remise à niveau côté réseau', 'nd'),
  (69, 'CXRBR', 'Reprise branchement lan client', 'nd'),
  (70, 'CXORC', 'Client orienté vers fournisseu', 'nd'),
  (71, 'ACTIV', 'Activation', 'nd'),
  (72, 'ASEL', 'Assistance en ligne', 'nd'),
  (73, 'RESIL', 'RESILIATION', 'nd'),
  (74, 'NVDAC', 'Désactivation de l''antivirus', 'nd'),
  (75, 'NVMAJ', 'Mise à jour', 'nd'),
  (76, 'NVINF', 'Informer le client', 'nd'),
  (77, 'NVRES', 'Restauration de la pile TCP/IP', 'nd'),
  (78, 'SUSP', 'SUSPENSION', 'nd'),
  (79, 'CLINJ', 'CLIENT INJOIGNABLE', 'nd'),
  (80, 'MPBE', 'MAINT PREV:BON AUX ESSAIS', 'nd'),
  (81, 'COPBE', 'CTRL OPER:BON AUX ESSAIS', 'nd'),
  (82, 'TEMP4', 'Template 4.0 Méga', 'nd'),
  (83, 'TEMP3', 'Template 3.5 Méga', 'nd'),
  (84, 'LIEN', 'Lenteur ste test av mire adsl', 'nd'),
  (85, 'DRDUR', 'Dérangement dur', 'nd'),
  (86, 'MCDMA', 'Migration CDMA', 'nd'),
  (87, 'RBMAI', 'REINITIALISATION BASE MAI ENCO', 'nd'),
  (88, 'AEL', 'Assistance en ligne', 'nd'),
  (89, 'FAUM', 'Fausse manouvre', 'nd'),
  (90, 'HBTS', 'Hors BTS', 'nd'),
  (91, 'CLIND', 'Client joint mais indisponible', 'nd'),
  (92, 'CHAC', 'CHANGEMENT CARTE VIA ACCESS', 'nd'),
  (93, 'MAC', 'Mauvais au controle', 'nd'),
  (94, 'INSPO', 'INDISPONIBLITE ENERGIE', 'nd'),
  (95, 'NETT', 'NETTOYAGE CARTE VIACCESS', 'nd'),
  (96, 'COAGE', 'client oriente agence', 'nd');

-- --------------------------------------------------------

--
-- Structure de la table `colonnes`
--

CREATE TABLE `colonnes` (
  `id` int(11) NOT NULL,
  `col_label` varchar(50) NOT NULL,
  `signification` varchar(100) NOT NULL,
  `codification` int(1) NOT NULL,
  `encours` int(1) NOT NULL,
  `releves` int(1) NOT NULL,
  `filterable` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `colonnes`
--

INSERT INTO `colonnes` (`id`, `col_label`, `signification`, `codification`, `encours`, `releves`, `filterable`) VALUES
  (1, 'nd', 'numéro de ligne du client', 1, 1, 1, 0),
  (2, 'nom_du_client', '', 0, 0, 0, 0),
  (3, 'nd_contact', '', 0, 0, 0, 0),
  (4, 'commentaire_contact', '', 0, 0, 0, 0),
  (5, 'segment', '', 0, 0, 0, 1),
  (6, 'categorie', '', 0, 0, 0, 1),
  (7, 'acces_reseau', '', 0, 0, 0, 1),
  (8, 'acces_adsl', '', 0, 0, 0, 1),
  (9, 'acces_tv', '', 0, 0, 0, 1),
  (10, 'etat', '', 0, 0, 0, 1),
  (11, 'origine', '', 0, 0, 0, 1),
  (12, 'csig', '', 0, 0, 0, 1),
  (13, 'commentaire_signalisation', '', 0, 0, 0, 1),
  (14, 'agent_sig', '', 0, 0, 0, 1),
  (16, 'hsi', '', 0, 0, 0, 0),
  (19, 'date_sig', '', 0, 0, 0, 0),
  (21, 'date_ess', '', 0, 0, 0, 0),
  (22, 'hes', '', 0, 0, 0, 0),
  (23, 'defaut', '', 0, 0, 0, 1),
  (24, 'commentaire_essai', '', 0, 0, 0, 0),
  (25, 'agent_ess', '', 0, 0, 0, 1),
  (26, 'date_ori', '', 0, 0, 0, 1),
  (27, 'hor', '', 0, 0, 0, 0),
  (28, 'agent_ori', '', 0, 0, 0, 1),
  (29, 'ui', '', 1, 0, 0, 1),
  (30, 'equipe', '', 0, 0, 0, 1),
  (31, 'date_plan', '', 0, 0, 0, 0),
  (32, 'hplan', 'heure planification', 0, 0, 0, 0),
  (33, 'date_rel', '', 0, 0, 0, 0),
  (34, 'hrel', '', 0, 0, 0, 0),
  (35, 'releve', '', 1, 0, 0, 1),
  (36, 'locali', '', 0, 0, 0, 1),
  (37, 'commentaire_releve', '', 0, 0, 0, 1),
  (38, 'cause', '', 0, 0, 0, 1),
  (39, 'agent_rel', '', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `drgt_encours`
--

CREATE TABLE `drgt_encours` (
  `id` int(11) NOT NULL,
  `nd` varchar(20) DEFAULT NULL,
  `nom_du_client` varchar(30) DEFAULT NULL,
  `nd_contact` varchar(20) DEFAULT NULL,
  `commentaire_contact` varchar(50) DEFAULT NULL,
  `segment` varchar(30) DEFAULT NULL,
  `categorie` varchar(30) DEFAULT NULL,
  `acces_reseau` varchar(30) DEFAULT NULL,
  `acces_adsl` varchar(30) DEFAULT NULL,
  `acces_tv` varchar(30) DEFAULT NULL,
  `etat` varchar(15) DEFAULT NULL,
  `origine` varchar(15) DEFAULT NULL,
  `csig` varchar(20) DEFAULT NULL,
  `commentaire_signalisation` varchar(50) DEFAULT NULL,
  `agent_sig` varchar(30) DEFAULT NULL,
  `date_sig` date DEFAULT NULL,
  `hsi` time DEFAULT NULL,
  `date_ess` date DEFAULT NULL,
  `hes` time DEFAULT NULL,
  `defaut` varchar(20) DEFAULT NULL,
  `commentaire_essai` varchar(50) DEFAULT NULL,
  `agent_ess` varchar(30) DEFAULT NULL,
  `date_ori` date DEFAULT NULL,
  `hor` time DEFAULT NULL,
  `agent_ori` varchar(30) DEFAULT NULL,
  `ui` varchar(20) DEFAULT NULL,
  `equipe` varchar(30) DEFAULT NULL,
  `date_plan` date DEFAULT NULL,
  `hplan` time DEFAULT NULL,
  `date_rel` date DEFAULT NULL,
  `hrel` time DEFAULT NULL,
  `releve` varchar(20) DEFAULT NULL,
  `locali` varchar(20) DEFAULT NULL,
  `commentaire_releve` varchar(50) DEFAULT NULL,
  `cause` varchar(20) NOT NULL,
  `agent_rel` varchar(30) DEFAULT NULL,
  `id_fichier` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `drgt_releves`
--

CREATE TABLE `drgt_releves` (
  `id` int(11) NOT NULL,
  `nd` varchar(20) DEFAULT NULL,
  `nom_du_client` varchar(30) DEFAULT NULL,
  `nd_contact` varchar(20) DEFAULT NULL,
  `commentaire_contact` varchar(50) DEFAULT NULL,
  `segment` varchar(30) DEFAULT NULL,
  `categorie` varchar(30) DEFAULT NULL,
  `acces_reseau` varchar(30) DEFAULT NULL,
  `acces_adsl` varchar(30) DEFAULT NULL,
  `acces_tv` varchar(30) DEFAULT NULL,
  `etat` varchar(15) DEFAULT NULL,
  `origine` varchar(15) DEFAULT NULL,
  `csig` varchar(20) DEFAULT NULL,
  `commentaire_signalisation` varchar(50) DEFAULT NULL,
  `agent_sig` varchar(30) DEFAULT NULL,
  `date_sig` date DEFAULT NULL,
  `h_date_sig` time DEFAULT NULL,
  `date_ess` date DEFAULT NULL,
  `h_date_ess` time DEFAULT NULL,
  `defaut` varchar(20) DEFAULT NULL,
  `commentaire_essai` varchar(50) DEFAULT NULL,
  `agent_ess` varchar(30) DEFAULT NULL,
  `date_ori` date DEFAULT NULL,
  `h_date_ori` time DEFAULT NULL,
  `agent_ori` varchar(30) DEFAULT NULL,
  `ui` varchar(20) DEFAULT NULL,
  `equipe` varchar(30) DEFAULT NULL,
  `date_plan` date DEFAULT NULL,
  `h_date_plan` time DEFAULT NULL,
  `date_rel` date DEFAULT NULL,
  `h_date_rel` time DEFAULT NULL,
  `releve` varchar(20) DEFAULT NULL,
  `locali` varchar(20) DEFAULT NULL,
  `commentaire_releve` varchar(50) DEFAULT NULL,
  `cause` varchar(20) NOT NULL,
  `agent_rel` varchar(30) DEFAULT NULL,
  `id_fichier` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `id` int(11) NOT NULL,
  `nom_fichier` varchar(30) NOT NULL,
  `date_ajout` date NOT NULL,
  `etat_fin` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fichier`
--

INSERT INTO `fichier` (`id`, `nom_fichier`, `date_ajout`, `etat_fin`) VALUES
  (7, '-$REQUETE _HPE_RELEVES ADSL DU', '2017-07-03', 0),
  (8, 'drgt releveÌs HPE .csv', '2017-07-03', 0),
  (9, 'drgt releves HPE S04.csv', '2017-07-03', 0),
  (10, 'drgt releves HPE S05.csv', '2017-07-03', 0),
  (11, 'drgt releveÌs HPE .csv', '2017-07-03', 0);

-- --------------------------------------------------------

--
-- Structure de la table `formVrByDir`
--

CREATE TABLE `formVrByDir` (
  `id` int(11) NOT NULL,
  `direction` varchar(30) NOT NULL,
  `col_start` varchar(60) NOT NULL,
  `col_end` varchar(60) NOT NULL,
  `byTime` set('HOUR','DAY') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formVrByDir`
--

INSERT INTO `formVrByDir` (`id`, `direction`, `col_start`, `col_end`, `byTime`) VALUES
  (1, 'DINT', 'date_ess', 'date_rel', 'DAY'),
  (2, 'DSC', 'date_sig', 'date_ori', 'DAY'),
  (3, 'SONATEL', 'date_sig', 'date_rel', 'DAY'),
  (4, 'SONATEL', 'CONCAT (date_sig ," ", h_date_sig)', 'CONCAT (date_rel ," ", h_date_rel)', 'HOUR'),
  (5, 'DINT', 'CONCAT (date_ess ," ", h_date_ess)', 'CONCAT (date_rel ," ", h_date_rel)', 'HOUR'),
  (6, 'DSC', 'CONCAT (date_sig ," ", h_date_sig)', 'CONCAT (date_ori ," ", h_date_ori)', 'HOUR');

-- --------------------------------------------------------

--
-- Structure de la table `groupe_intervention`
--

CREATE TABLE `groupe_intervention` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `is_modifiable` int(1) NOT NULL DEFAULT '1',
  `id_uis` text NOT NULL,
  `id_service` int(11) NOT NULL,
  `deleted` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe_intervention`
--

INSERT INTO `groupe_intervention` (`id`, `nom`, `categorie`, `is_modifiable`, `id_uis`, `id_service`, `deleted`) VALUES
  (1, 'DINT', 'direction', 0, '9;10;11;12;13;14;16;26;51', 0, 0),
  (2, 'DSC ', 'direction', 0, '', 0, 0),
  (3, 'MULTELEC', 'sous_traitant', 1, '23;25;26;59;60', 1, 0),
  (4, 'TADEX', 'sous_traitant', 1, '40;42;43;44;45;46;47;48', 1, 0),
  (5, 'ECOTEL', 'sous_traitant', 1, '15;16;17', 1, 0),
  (6, 'AFRITEL', 'sous_traitant', 1, '1;2;3;4;5;6;14', 2, 0),
  (7, 'HAUT DEBIT', 'autre', 1, '25;27;28;29;30;31;32;33;34;35;36;37;38;39;40;41', 2, 0),
  (8, 'PMT', 'autre', 1, '28;29;30;31;32;33;34;35;36;37;38;39;40;41', 1, 0),
  (9, 'DDE', 'direction', 1, '7;9;10;11;12;13;14;47;48;50', 2, 0),
  (10, 'PMT', 'autre', 1, '', 2, 1),
  (11, 'NEW', 'autre', 1, '1;2;3;4;6;62', 1, 1),
  (12, 'NEW', 'direction', 1, '1;2;3;4;5;6;9;10;11;12;13;14;15;16;17;43;44;45;46;47;48', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `indicateur`
--

CREATE TABLE `indicateur` (
  `id` int(11) NOT NULL,
  `nom_indicateur` varchar(100) NOT NULL,
  `abreviation` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `indicateur`
--

INSERT INTO `indicateur` (`id`, `nom_indicateur`, `abreviation`, `type`) VALUES
  (2, 'Pourcentage des dérangements <span class="type_drgt"></span> relevés dans les n jours', 'VRnJ', 'pourcentage'),
  (3, 'Pourcentage des dérangements <span class="type_drgt"></span> relevés dans les n Heures', 'VRnH', 'pourcentage'),
  (4, 'nombre total de dérangements  <span class="type_drgt"></span> relevés ', 'ND', 'total'),
  (5, 'Taux de signalisation  <span class="type_drgt"></span>. ', 'TX SI', 'taux'),
  (7, 'Global ', 'GLOBAL', 'origine'),
  (8, 'ADSL', 'ADSL', 'origine'),
  (9, 'TVO', 'TVO', 'origine'),
  (10, 'Bas Debit', 'BD', 'origine'),
  (11, 'L''age des en jour ', 'BacklognJ', 'pourcentage');

-- --------------------------------------------------------

--
-- Structure de la table `kpi`
--

CREATE TABLE `kpi` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `abreviation` varchar(20) NOT NULL,
  `type_kpi` enum('pourcentage','vr','pex','tx') NOT NULL,
  `id_indicateur` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `tc` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `kpi`
--

INSERT INTO `kpi` (`id`, `nom`, `abreviation`, `type_kpi`, `id_indicateur`, `id_service`, `tc`) VALUES
  (7, '', 'VR3J ADSL', 'pourcentage', 7, 2, 0),
  (8, '', 'VR24H ADSL', 'pourcentage', 8, 2, 0),
  (20, '', 'VR3J  ADSL', 'pourcentage', 20, 2, 0),
  (21, '', 'VR1J  ADSL', 'pourcentage', 21, 1, 0),
  (23, '', 'VR2J  ADSL', 'pourcentage', 23, 1, 0),
  (27, '', 'VR2J  ADSL', 'pourcentage', 27, 2, 0),
  (28, '', 'VR2J  TVO', 'pourcentage', 28, 2, 0),
  (29, '', 'VR24H  TVO', 'pourcentage', 29, 2, 0),
  (33, '', 'VR24H  ADSL', 'pourcentage', 33, 1, 0),
  (34, '', 'VR24H  TVO', 'pourcentage', 34, 1, 0),
  (35, '', 'VR ADSL', 'pourcentage', 36, 0, 1),
  (36, '', 'VR TVO', 'pourcentage', 35, 0, 1),
  (37, '', 'VR GLOBAL', 'pourcentage', 37, 0, 1),
  (39, '', 'VRPLUS ADSL', 'pourcentage', 36, 0, 1),
  (40, '', 'VRPLUS TVO', 'pourcentage', 35, 0, 1),
  (41, '', 'VRPLUS GLOBAL', 'pourcentage', 37, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `for_user` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `state` int(1) NOT NULL,
  `fa_icon` varchar(40) NOT NULL,
  `href` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`id`, `titre`, `contenu`, `for_user`, `id_service`, `state`, `fa_icon`, `href`) VALUES
  (88, 'Nouveau KPI', 'Le KPI <span class=''w3-text-teal''><b>Backlog2J GLOBAL</b></span> vient d''Ãªtre crÃ©Ã©', 1, 1, 1, 'plus-square', '#'),
  (89, 'Nouveau KPI', 'Le KPI <span class=''w3-text-teal''><b>Backlog2J GLOBAL</b></span> vient d''Ãªtre crÃ©Ã©', 2, 1, 0, 'plus-square', '#'),
  (90, 'Nouveau KPI', 'Le KPI <span class=''w3-text-teal''><b>Backlog2J GLOBAL</b></span> vient d''Ãªtre crÃ©Ã©', 5, 1, 0, 'plus-square', '#');

-- --------------------------------------------------------

--
-- Structure de la table `pourcentage`
--

CREATE TABLE `pourcentage` (
  `id` int(11) NOT NULL,
  `delai` int(11) NOT NULL,
  `type_drgt` enum('adsl','tvo','global','bd') NOT NULL,
  `delai_time` enum('DAY','HOUR') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pourcentage`
--

INSERT INTO `pourcentage` (`id`, `delai`, `type_drgt`, `delai_time`) VALUES
  (7, 3, 'adsl', 'DAY'),
  (8, 24, 'adsl', 'HOUR'),
  (20, 3, 'adsl', 'DAY'),
  (21, 1, 'adsl', 'DAY'),
  (23, 2, 'adsl', 'DAY'),
  (27, 2, 'adsl', 'DAY'),
  (28, 2, 'tvo', 'DAY'),
  (29, 24, 'tvo', 'HOUR'),
  (33, 24, 'adsl', 'HOUR'),
  (34, 24, 'tvo', 'HOUR'),
  (35, 0, 'tvo', 'DAY'),
  (36, 0, 'adsl', 'DAY'),
  (37, 0, 'global', 'DAY');

-- --------------------------------------------------------

--
-- Structure de la table `reporting_files`
--

CREATE TABLE `reporting_files` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `date_ajout` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `direction` varchar(30) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `nom`, `direction`, `id_admin`) VALUES
  (1, 'PMT', 'DINT', 1),
  (2, 'CAC', 'DINT', 6),
  (3, 'CAR', 'DINT', 0);

-- --------------------------------------------------------

--
-- Structure de la table `temps_de_cycle`
--

CREATE TABLE `temps_de_cycle` (
  `id` int(11) NOT NULL,
  `col_date_debut` varchar(30) NOT NULL,
  `col_date_fin` varchar(30) NOT NULL,
  `valeur_tc` int(11) NOT NULL,
  `direction` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `temps_de_cycle`
--

INSERT INTO `temps_de_cycle` (`id`, `col_date_debut`, `col_date_fin`, `valeur_tc`, `direction`) VALUES
  (1, 'date_ess', 'date_rel', 2, 'dint'),
  (2, 'date_sig', 'date_ori', 1, 'dsc'),
  (3, 'date_sig', 'date_rel', 2, 'sonatel');

-- --------------------------------------------------------

--
-- Structure de la table `ui`
--

CREATE TABLE `ui` (
  `id` int(11) NOT NULL,
  `nom` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ui`
--

INSERT INTO `ui` (`id`, `nom`) VALUES
  (1, 'AF_KL'),
  (2, 'AF_TB'),
  (3, 'AF_ZG'),
  (4, 'AFT P'),
  (5, 'AFT_M'),
  (6, 'AFT_T'),
  (7, 'CAM'),
  (8, 'CERT'),
  (9, 'CI-KF'),
  (10, 'CI-LG'),
  (11, 'CI-MT'),
  (12, 'CI-TB'),
  (13, 'CI-TH'),
  (14, 'CI-ZK'),
  (15, 'ECO-A'),
  (16, 'ECO-D'),
  (17, 'ECO-P'),
  (18, 'GDW'),
  (19, 'MCB'),
  (20, 'MCS'),
  (21, 'MCZ'),
  (22, 'MED'),
  (23, 'MLT-G'),
  (24, 'MPS'),
  (25, 'MU_LG'),
  (26, 'MUL-A'),
  (27, 'P-ACA'),
  (28, 'RAC-C'),
  (29, 'RAC-D'),
  (30, 'RAC-G'),
  (31, 'RACKL'),
  (32, 'RACLG'),
  (33, 'RAC-M'),
  (34, 'RACMT'),
  (35, 'RAC-O'),
  (36, 'RAC-P'),
  (37, 'RAC-R'),
  (38, 'RACSL'),
  (39, 'RACTB'),
  (40, 'RACTH'),
  (41, 'RACZG'),
  (42, 'SDF'),
  (43, 'TDX-C'),
  (44, 'TDX-D'),
  (45, 'TDX-G'),
  (46, 'TDX-M'),
  (47, 'TDX-R'),
  (48, 'TDX-S'),
  (49, 'UIOBS'),
  (50, 'UIPMP'),
  (51, 'CIE'),
  (52, 'MCE'),
  (59, 'MULT-KEB'),
  (60, 'MON UI'),
  (62, 'MON UI 2');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL DEFAULT 'passe',
  `icon` varchar(20) NOT NULL,
  `service` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `privileges` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `login`, `password`, `icon`, `service`, `email`, `privileges`) VALUES
  (1, 'Ndiaye', 'Mansour', 'login', 'passe', 'avatar3.png', 1, 'massamba.fall92@gmail.com', 3),
  (2, 'Dia', 'Fatou Diallo', 'fatou', 'passe', 'avatar4.png', 1, 'massamba.fall92@gmail.com', 2),
  (5, 'guisse', 'mame dirra', 'guisse_mame_dirra', 'passe', 'avatar6.png', 1, 'mamediarraguisse@gmail.com', 3),
  (6, 'Diakhate', 'Sokhna Momy', 'diakhate_sokhna_momy', 'passe', 'avatar6.png', 2, 'sokhnamomy@diakhate.com', 1),
  (7, 'ndiaye', 'modou', 'ndiaye_modou', 'passe', 'avatar3.png', 2, 'modouNdiaye@gmail.com', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `code`
--
ALTER TABLE `code`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colonnes`
--
ALTER TABLE `colonnes`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `drgt_encours`
--
ALTER TABLE `drgt_encours`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `drgt_releves`
--
ALTER TABLE `drgt_releves`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formVrByDir`
--
ALTER TABLE `formVrByDir`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe_intervention`
--
ALTER TABLE `groupe_intervention`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `indicateur`
--
ALTER TABLE `indicateur`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `kpi`
--
ALTER TABLE `kpi`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pourcentage`
--
ALTER TABLE `pourcentage`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reporting_files`
--
ALTER TABLE `reporting_files`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `temps_de_cycle`
--
ALTER TABLE `temps_de_cycle`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ui`
--
ALTER TABLE `ui`
ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `code`
--
ALTER TABLE `code`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT pour la table `colonnes`
--
ALTER TABLE `colonnes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `drgt_encours`
--
ALTER TABLE `drgt_encours`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `drgt_releves`
--
ALTER TABLE `drgt_releves`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `formVrByDir`
--
ALTER TABLE `formVrByDir`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `groupe_intervention`
--
ALTER TABLE `groupe_intervention`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `indicateur`
--
ALTER TABLE `indicateur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `kpi`
--
ALTER TABLE `kpi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT pour la table `pourcentage`
--
ALTER TABLE `pourcentage`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `reporting_files`
--
ALTER TABLE `reporting_files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `temps_de_cycle`
--
ALTER TABLE `temps_de_cycle`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `ui`
--
ALTER TABLE `ui`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
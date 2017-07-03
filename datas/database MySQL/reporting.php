<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 0.2b
 */

//
// Database `reporting`
//

// `reporting`.`code`
$code = array(
    array('id' => '1','code' => 'REOR','signification' => 'Réorienté','colonne' => 'nd'),
    array('id' => '2','code' => 'REPA','signification' => 'Reparation / Reprise','colonne' => 'nd'),
    array('id' => '3','code' => 'MUTP','signification' => 'Mutation d\'une paire','colonne' => 'nd'),
    array('id' => '4','code' => 'MUTE','signification' => 'Mutation d\'un equipement','colonne' => 'nd'),
    array('id' => '5','code' => 'CHGT','signification' => 'Changement','colonne' => 'nd'),
    array('id' => '6','code' => 'PRIVE','signification' => 'Prive','colonne' => 'nd'),
    array('id' => '7','code' => 'REPO','signification' => 'Repointage antenne','colonne' => 'nd'),
    array('id' => '8','code' => 'RINIT','signification' => 'Reinitialisation','colonne' => 'nd'),
    array('id' => '9','code' => 'RCONF','signification' => 'Reconfiguration','colonne' => 'nd'),
    array('id' => '10','code' => 'ADC','signification' => 'Aucun défaut constaté','colonne' => 'nd'),
    array('id' => '11','code' => 'FMA','signification' => 'Fausse Manoeuvre Abonné','colonne' => 'nd'),
    array('id' => '12','code' => 'OBQP','signification' => 'Ouverture BPQ','colonne' => 'nd'),
    array('id' => '13','code' => 'CLIO','signification' => 'Client oriente','colonne' => 'nd'),
    array('id' => '14','code' => 'ANNU','signification' => 'Annulation drgt. pour mainten.','colonne' => 'nd'),
    array('id' => '15','code' => 'APAC','signification' => 'Appareil SONATEL à changer','colonne' => 'nd'),
    array('id' => '16','code' => 'ACAR','signification' => 'App. changé, à régulariser SCO','colonne' => 'nd'),
    array('id' => '17','code' => 'CANO','signification' => 'Correction Anomalie COP/INS','colonne' => 'nd'),
    array('id' => '18','code' => 'AAEN','signification' => 'Aucune Action Entreprise','colonne' => 'nd'),
    array('id' => '19','code' => 'DEPO','signification' => 'DEPOUSSIERAGE','colonne' => 'nd'),
    array('id' => '20','code' => 'APPR','signification' => 'Appui redressé','colonne' => 'nd'),
    array('id' => '21','code' => 'APPC','signification' => 'Appui changé','colonne' => 'nd'),
    array('id' => '22','code' => 'ELAG','signification' => 'Elagage','colonne' => 'nd'),
    array('id' => '23','code' => 'REPJ','signification' => 'Reprise jarretière','colonne' => 'nd'),
    array('id' => '24','code' => 'BAC','signification' => 'OT Bon Au Contrôle','colonne' => 'nd'),
    array('id' => '25','code' => 'RICL','signification' => 'Refus Intervention Client','colonne' => 'nd'),
    array('id' => '26','code' => 'CLBLK','signification' => 'RELEVE PAR UN DRGT COLLECTIF','colonne' => 'nd'),
    array('id' => '27','code' => 'REALC','signification' => 'REMISE ALIMENTATION CENTRE','colonne' => 'nd'),
    array('id' => '28','code' => 'REALD','signification' => 'REMISE ALIMENTATION DISTANT','colonne' => 'nd'),
    array('id' => '29','code' => 'MUTR','signification' => 'MUTATION PORT','colonne' => 'nd'),
    array('id' => '30','code' => 'RACC','signification' => 'Raccordement renvois','colonne' => 'nd'),
    array('id' => '31','code' => 'RINIR','signification' => 'REINITIALISATION ROUTEUR','colonne' => 'nd'),
    array('id' => '32','code' => 'CHGTC','signification' => 'CHANGEMENT CARTE','colonne' => 'nd'),
    array('id' => '33','code' => 'RALIR','signification' => 'REALIMENTATION ROUTEUR','colonne' => 'nd'),
    array('id' => '34','code' => 'RANR','signification' => 'REMISE à NIVEAU ROUTEUR','colonne' => 'nd'),
    array('id' => '35','code' => 'RINIU','signification' => 'REINITIALISATION UR COMMUTATIO','colonne' => 'nd'),
    array('id' => '36','code' => 'MUT','signification' => 'TRAVAUX MUTATION SUR UR','colonne' => 'nd'),
    array('id' => '37','code' => 'RANU','signification' => 'REMISE à NIVEAU UR COMMUTATION','colonne' => 'nd'),
    array('id' => '38','code' => 'MUTMI','signification' => 'TRAVAUX MUTATION SUR MIC TRANS','colonne' => 'nd'),
    array('id' => '39','code' => 'RINIM','signification' => 'REINITIALISATION MIC TRANS','colonne' => 'nd'),
    array('id' => '40','code' => 'RANM','signification' => 'REMISE à NIVEAU MIC TRANS','colonne' => 'nd'),
    array('id' => '41','code' => 'RINID','signification' => 'REINITIALISATION DSLAM','colonne' => 'nd'),
    array('id' => '42','code' => 'CHGTD','signification' => 'CHANGEMENT CARTE DSLAM','colonne' => 'nd'),
    array('id' => '43','code' => 'RAND','signification' => 'REMISE à NIVEAU DSLAM','colonne' => 'nd'),
    array('id' => '44','code' => 'RALID','signification' => 'REMISE ALIMENTATION DSLAM','colonne' => 'nd'),
    array('id' => '45','code' => 'RALIS','signification' => 'REMISE ALIMENTATION SWITCH','colonne' => 'nd'),
    array('id' => '46','code' => 'CHGTM','signification' => 'CHANGEMENT MODULE SWITCH','colonne' => 'nd'),
    array('id' => '47','code' => 'RANS','signification' => 'REMISE à NIVEAU SWITCH','colonne' => 'nd'),
    array('id' => '48','code' => 'RINSA','signification' => 'REINITIALISATION SERVER AUTHEN','colonne' => 'nd'),
    array('id' => '49','code' => 'RMASA','signification' => 'REMISE ALIMENTATION SERVER AUT','colonne' => 'nd'),
    array('id' => '50','code' => 'RMAUM','signification' => 'REMISE ALIMENTATION UMUX','colonne' => 'nd'),
    array('id' => '51','code' => 'RINUM','signification' => 'REINITIALISATION UMUX','colonne' => 'nd'),
    array('id' => '52','code' => 'CHGCU','signification' => 'CHANGEMENT CARTE UMUX','colonne' => 'nd'),
    array('id' => '53','code' => 'RANUM','signification' => 'REMISE à NIVEAU UMUX','colonne' => 'nd'),
    array('id' => '54','code' => 'CHMTV','signification' => 'CHANGEMENT MODEM TV','colonne' => 'nd'),
    array('id' => '55','code' => 'MOCHG','signification' => 'MODEM CHANGE','colonne' => 'nd'),
    array('id' => '56','code' => 'ALDEC','signification' => 'ALIMENATION DECODEUR','colonne' => 'nd'),
    array('id' => '57','code' => 'CHCPL','signification' => 'BOITIER CPL CHANGE','colonne' => 'nd'),
    array('id' => '58','code' => 'CFID','signification' => 'Confirmation ID','colonne' => 'nd'),
    array('id' => '59','code' => 'BOUCL','signification' => 'DERANGEMENT BOUCLE AVEC CLIENT','colonne' => 'nd'),
    array('id' => '60','code' => 'RCHTL','signification' => 'REFUS CHANGEMENT TERMINAL','colonne' => 'nd'),
    array('id' => '61','code' => 'CMRIN','signification' => 'MODEM REINITIALISE/REINSTALLE','colonne' => 'nd'),
    array('id' => '62','code' => 'CRSSE','signification' => 'REINITIALISATION DE SESSION','colonne' => 'nd'),
    array('id' => '63','code' => 'CRESP','signification' => 'REINITIALISATION PORT','colonne' => 'nd'),
    array('id' => '64','code' => 'RCPAC','signification' => 'Remise à niveau compte d\'accés','colonne' => 'nd'),
    array('id' => '65','code' => 'TRAG','signification' => 'Client orienté en AGENCE','colonne' => 'nd'),
    array('id' => '66','code' => 'CXCFM','signification' => 'Configuration modem','colonne' => 'nd'),
    array('id' => '67','code' => 'CXRIM','signification' => 'Réinstallation du modem','colonne' => 'nd'),
    array('id' => '68','code' => 'RRXD','signification' => 'Remise à niveau côté réseau','colonne' => 'nd'),
    array('id' => '69','code' => 'CXRBR','signification' => 'Reprise branchement lan client','colonne' => 'nd'),
    array('id' => '70','code' => 'CXORC','signification' => 'Client orienté vers fournisseu','colonne' => 'nd'),
    array('id' => '71','code' => 'ACTIV','signification' => 'Activation','colonne' => 'nd'),
    array('id' => '72','code' => 'ASEL','signification' => 'Assistance en ligne','colonne' => 'nd'),
    array('id' => '73','code' => 'RESIL','signification' => 'RESILIATION','colonne' => 'nd'),
    array('id' => '74','code' => 'NVDAC','signification' => 'Désactivation de l\'antivirus','colonne' => 'nd'),
    array('id' => '75','code' => 'NVMAJ','signification' => 'Mise à jour','colonne' => 'nd'),
    array('id' => '76','code' => 'NVINF','signification' => 'Informer le client','colonne' => 'nd'),
    array('id' => '77','code' => 'NVRES','signification' => 'Restauration de la pile TCP/IP','colonne' => 'nd'),
    array('id' => '78','code' => 'SUSP','signification' => 'SUSPENSION','colonne' => 'nd'),
    array('id' => '79','code' => 'CLINJ','signification' => 'CLIENT INJOIGNABLE','colonne' => 'nd'),
    array('id' => '80','code' => 'MPBE','signification' => 'MAINT PREV:BON AUX ESSAIS','colonne' => 'nd'),
    array('id' => '81','code' => 'COPBE','signification' => 'CTRL OPER:BON AUX ESSAIS','colonne' => 'nd'),
    array('id' => '82','code' => 'TEMP4','signification' => 'Template 4.0 Méga','colonne' => 'nd'),
    array('id' => '83','code' => 'TEMP3','signification' => 'Template 3.5 Méga','colonne' => 'nd'),
    array('id' => '84','code' => 'LIEN','signification' => 'Lenteur ste test av mire adsl','colonne' => 'nd'),
    array('id' => '85','code' => 'DRDUR','signification' => 'Dérangement dur','colonne' => 'nd'),
    array('id' => '86','code' => 'MCDMA','signification' => 'Migration CDMA','colonne' => 'nd'),
    array('id' => '87','code' => 'RBMAI','signification' => 'REINITIALISATION BASE MAI ENCO','colonne' => 'nd'),
    array('id' => '88','code' => 'AEL','signification' => 'Assistance en ligne','colonne' => 'nd'),
    array('id' => '89','code' => 'FAUM','signification' => 'Fausse manouvre','colonne' => 'nd'),
    array('id' => '90','code' => 'HBTS','signification' => 'Hors BTS','colonne' => 'nd'),
    array('id' => '91','code' => 'CLIND','signification' => 'Client joint mais indisponible','colonne' => 'nd'),
    array('id' => '92','code' => 'CHAC','signification' => 'CHANGEMENT CARTE VIA ACCESS','colonne' => 'nd'),
    array('id' => '93','code' => 'MAC','signification' => 'Mauvais au controle','colonne' => 'nd'),
    array('id' => '94','code' => 'INSPO','signification' => 'INDISPONIBLITE ENERGIE','colonne' => 'nd'),
    array('id' => '95','code' => 'NETT','signification' => 'NETTOYAGE CARTE VIACCESS','colonne' => 'nd'),
    array('id' => '96','code' => 'COAGE','signification' => 'client oriente agence','colonne' => 'nd')
);

// `reporting`.`colonnes`
$colonnes = array(
    array('id' => '1','col_label' => 'nd','signification' => 'numéro de ligne du client','codification' => '1','encours' => '1','releves' => '1','filterable' => '0'),
    array('id' => '2','col_label' => 'nom_du_client','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '3','col_label' => 'nd_contact','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '4','col_label' => 'commentaire_contact','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '5','col_label' => 'segment','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '6','col_label' => 'categorie','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '7','col_label' => 'acces_reseau','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '8','col_label' => 'acces_adsl','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '9','col_label' => 'acces_tv','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '10','col_label' => 'etat','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '11','col_label' => 'origine','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '12','col_label' => 'csig','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '13','col_label' => 'commentaire_signalisation','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '14','col_label' => 'agent_sig','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '16','col_label' => 'hsi','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '19','col_label' => 'date_sig','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '21','col_label' => 'date_ess','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '22','col_label' => 'hes','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '23','col_label' => 'defaut','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '24','col_label' => 'commentaire_essai','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '25','col_label' => 'agent_ess','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '26','col_label' => 'date_ori','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '27','col_label' => 'hor','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '28','col_label' => 'agent_ori','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '29','col_label' => 'ui','signification' => '','codification' => '1','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '30','col_label' => 'equipe','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '31','col_label' => 'date_plan','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '32','col_label' => 'hplan','signification' => 'heure planification','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '33','col_label' => 'date_rel','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '34','col_label' => 'hrel','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '0'),
    array('id' => '35','col_label' => 'releve','signification' => '','codification' => '1','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '36','col_label' => 'locali','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '37','col_label' => 'commentaire_releve','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '38','col_label' => 'cause','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1'),
    array('id' => '39','col_label' => 'agent_rel','signification' => '','codification' => '0','encours' => '0','releves' => '0','filterable' => '1')
);

// `reporting`.`drgt_encours`
$drgt_encours = array(
);

// `reporting`.`drgt_releves`
$drgt_releves = array(
);

// `reporting`.`fichier`
$fichier = array(
    array('id' => '7','nom_fichier' => '-$REQUETE _HPE_RELEVES ADSL DU','date_ajout' => '2017-07-03','etat_fin' => '0'),
    array('id' => '8','nom_fichier' => 'drgt releveÌs HPE .csv','date_ajout' => '2017-07-03','etat_fin' => '0'),
    array('id' => '9','nom_fichier' => 'drgt releves HPE S04.csv','date_ajout' => '2017-07-03','etat_fin' => '0'),
    array('id' => '10','nom_fichier' => 'drgt releves HPE S05.csv','date_ajout' => '2017-07-03','etat_fin' => '0'),
    array('id' => '11','nom_fichier' => 'drgt releveÌs HPE .csv','date_ajout' => '2017-07-03','etat_fin' => '0')
);

// `reporting`.`formVrByDir`
$formVrByDir = array(
    array('id' => '1','direction' => 'DINT','col_start' => 'date_ess','col_end' => 'date_rel','byTime' => 'DAY'),
    array('id' => '2','direction' => 'DSC','col_start' => 'date_sig','col_end' => 'date_ori','byTime' => 'DAY'),
    array('id' => '3','direction' => 'SONATEL','col_start' => 'date_sig','col_end' => 'date_rel','byTime' => 'DAY'),
    array('id' => '4','direction' => 'SONATEL','col_start' => 'CONCAT (date_sig ," ", h_date_sig)','col_end' => 'CONCAT (date_rel ," ", h_date_rel)','byTime' => 'HOUR'),
    array('id' => '5','direction' => 'DINT','col_start' => 'CONCAT (date_ess ," ", h_date_ess)','col_end' => 'CONCAT (date_rel ," ", h_date_rel)','byTime' => 'HOUR'),
    array('id' => '6','direction' => 'DSC','col_start' => 'CONCAT (date_sig ," ", h_date_sig)','col_end' => 'CONCAT (date_ori ," ", h_date_ori)','byTime' => 'HOUR')
);

// `reporting`.`groupe_intervention`
$groupe_intervention = array(
    array('id' => '1','nom' => 'DINT','categorie' => 'direction','is_modifiable' => '0','id_uis' => '9;10;11;12;13;14;16;26;51','id_service' => '0','deleted' => '0'),
    array('id' => '2','nom' => 'DSC ','categorie' => 'direction','is_modifiable' => '0','id_uis' => '','id_service' => '0','deleted' => '0'),
    array('id' => '3','nom' => 'MULTELEC','categorie' => 'sous_traitant','is_modifiable' => '1','id_uis' => '23;25;26;59;60','id_service' => '1','deleted' => '0'),
    array('id' => '4','nom' => 'TADEX','categorie' => 'sous_traitant','is_modifiable' => '1','id_uis' => '40;42;43;44;45;46;47;48','id_service' => '1','deleted' => '0'),
    array('id' => '5','nom' => 'ECOTEL','categorie' => 'sous_traitant','is_modifiable' => '1','id_uis' => '15;16;17','id_service' => '1','deleted' => '0'),
    array('id' => '6','nom' => 'AFRITEL','categorie' => 'sous_traitant','is_modifiable' => '1','id_uis' => '1;2;3;4;5;6;14','id_service' => '2','deleted' => '0'),
    array('id' => '7','nom' => 'HAUT DEBIT','categorie' => 'autre','is_modifiable' => '1','id_uis' => '25;27;28;29;30;31;32;33;34;35;36;37;38;39;40;41','id_service' => '2','deleted' => '0'),
    array('id' => '8','nom' => 'PMT','categorie' => 'autre','is_modifiable' => '1','id_uis' => '28;29;30;31;32;33;34;35;36;37;38;39;40;41','id_service' => '1','deleted' => '0'),
    array('id' => '9','nom' => 'DDE','categorie' => 'direction','is_modifiable' => '1','id_uis' => '7;9;10;11;12;13;14;47;48;50','id_service' => '2','deleted' => '0'),
    array('id' => '10','nom' => 'PMT','categorie' => 'autre','is_modifiable' => '1','id_uis' => '','id_service' => '2','deleted' => '1'),
    array('id' => '11','nom' => 'NEW','categorie' => 'autre','is_modifiable' => '1','id_uis' => '1;2;3;4;6;62','id_service' => '1','deleted' => '1'),
    array('id' => '12','nom' => 'NEW','categorie' => 'direction','is_modifiable' => '1','id_uis' => '1;2;3;4;5;6;9;10;11;12;13;14;15;16;17;43;44;45;46;47;48','id_service' => '1','deleted' => '0')
);

// `reporting`.`indicateur`
$indicateur = array(
    array('id' => '2','nom_indicateur' => 'Pourcentage des dérangements <span class="type_drgt"></span> relevés dans les n jours','abreviation' => 'VRnJ','type' => 'pourcentage'),
    array('id' => '3','nom_indicateur' => 'Pourcentage des dérangements <span class="type_drgt"></span> relevés dans les n Heures','abreviation' => 'VRnH','type' => 'pourcentage'),
    array('id' => '4','nom_indicateur' => 'nombre total de dérangements  <span class="type_drgt"></span> relevés ','abreviation' => 'ND','type' => 'total'),
    array('id' => '5','nom_indicateur' => 'Taux de signalisation  <span class="type_drgt"></span>. ','abreviation' => 'TX SI','type' => 'taux'),
    array('id' => '7','nom_indicateur' => 'Global ','abreviation' => 'GLOBAL','type' => 'origine'),
    array('id' => '8','nom_indicateur' => 'ADSL','abreviation' => 'ADSL','type' => 'origine'),
    array('id' => '9','nom_indicateur' => 'TVO','abreviation' => 'TVO','type' => 'origine'),
    array('id' => '10','nom_indicateur' => 'Bas Debit','abreviation' => 'BD','type' => 'origine'),
    array('id' => '11','nom_indicateur' => 'L\'age des en jour ','abreviation' => 'BacklognJ','type' => 'pourcentage')
);

// `reporting`.`kpi`
$kpi = array(
    array('id' => '7','nom' => '','abreviation' => 'VR3J ADSL','type_kpi' => 'pourcentage','id_indicateur' => '7','id_service' => '2','tc' => '0'),
    array('id' => '8','nom' => '','abreviation' => 'VR24H ADSL','type_kpi' => 'pourcentage','id_indicateur' => '8','id_service' => '2','tc' => '0'),
    array('id' => '20','nom' => '','abreviation' => 'VR3J  ADSL','type_kpi' => 'pourcentage','id_indicateur' => '20','id_service' => '2','tc' => '0'),
    array('id' => '21','nom' => '','abreviation' => 'VR1J  ADSL','type_kpi' => 'pourcentage','id_indicateur' => '21','id_service' => '1','tc' => '0'),
    array('id' => '23','nom' => '','abreviation' => 'VR2J  ADSL','type_kpi' => 'pourcentage','id_indicateur' => '23','id_service' => '1','tc' => '0'),
    array('id' => '27','nom' => '','abreviation' => 'VR2J  ADSL','type_kpi' => 'pourcentage','id_indicateur' => '27','id_service' => '2','tc' => '0'),
    array('id' => '28','nom' => '','abreviation' => 'VR2J  TVO','type_kpi' => 'pourcentage','id_indicateur' => '28','id_service' => '2','tc' => '0'),
    array('id' => '29','nom' => '','abreviation' => 'VR24H  TVO','type_kpi' => 'pourcentage','id_indicateur' => '29','id_service' => '2','tc' => '0'),
    array('id' => '33','nom' => '','abreviation' => 'VR24H  ADSL','type_kpi' => 'pourcentage','id_indicateur' => '33','id_service' => '1','tc' => '0'),
    array('id' => '34','nom' => '','abreviation' => 'VR24H  TVO','type_kpi' => 'pourcentage','id_indicateur' => '34','id_service' => '1','tc' => '0'),
    array('id' => '35','nom' => '','abreviation' => 'VR ADSL','type_kpi' => 'pourcentage','id_indicateur' => '36','id_service' => '0','tc' => '1'),
    array('id' => '36','nom' => '','abreviation' => 'VR TVO','type_kpi' => 'pourcentage','id_indicateur' => '35','id_service' => '0','tc' => '1'),
    array('id' => '37','nom' => '','abreviation' => 'VR GLOBAL','type_kpi' => 'pourcentage','id_indicateur' => '37','id_service' => '0','tc' => '1'),
    array('id' => '39','nom' => '','abreviation' => 'VRPLUS ADSL','type_kpi' => 'pourcentage','id_indicateur' => '36','id_service' => '0','tc' => '1'),
    array('id' => '40','nom' => '','abreviation' => 'VRPLUS TVO','type_kpi' => 'pourcentage','id_indicateur' => '35','id_service' => '0','tc' => '1'),
    array('id' => '41','nom' => '','abreviation' => 'VRPLUS GLOBAL','type_kpi' => 'pourcentage','id_indicateur' => '37','id_service' => '0','tc' => '1')
);

// `reporting`.`notification`
$notification = array(
    array('id' => '88','titre' => 'Nouveau KPI','contenu' => 'Le KPI <span class=\'w3-text-teal\'><b>Backlog2J GLOBAL</b></span> vient d\'Ãªtre crÃ©Ã©','for_user' => '1','id_service' => '1','state' => '1','fa_icon' => 'plus-square','href' => '#'),
    array('id' => '89','titre' => 'Nouveau KPI','contenu' => 'Le KPI <span class=\'w3-text-teal\'><b>Backlog2J GLOBAL</b></span> vient d\'Ãªtre crÃ©Ã©','for_user' => '2','id_service' => '1','state' => '0','fa_icon' => 'plus-square','href' => '#'),
    array('id' => '90','titre' => 'Nouveau KPI','contenu' => 'Le KPI <span class=\'w3-text-teal\'><b>Backlog2J GLOBAL</b></span> vient d\'Ãªtre crÃ©Ã©','for_user' => '5','id_service' => '1','state' => '0','fa_icon' => 'plus-square','href' => '#')
);

// `reporting`.`pourcentage`
$pourcentage = array(
    array('id' => '7','delai' => '3','type_drgt' => 'adsl','delai_time' => 'DAY'),
    array('id' => '8','delai' => '24','type_drgt' => 'adsl','delai_time' => 'HOUR'),
    array('id' => '20','delai' => '3','type_drgt' => 'adsl','delai_time' => 'DAY'),
    array('id' => '21','delai' => '1','type_drgt' => 'adsl','delai_time' => 'DAY'),
    array('id' => '23','delai' => '2','type_drgt' => 'adsl','delai_time' => 'DAY'),
    array('id' => '27','delai' => '2','type_drgt' => 'adsl','delai_time' => 'DAY'),
    array('id' => '28','delai' => '2','type_drgt' => 'tvo','delai_time' => 'DAY'),
    array('id' => '29','delai' => '24','type_drgt' => 'tvo','delai_time' => 'HOUR'),
    array('id' => '33','delai' => '24','type_drgt' => 'adsl','delai_time' => 'HOUR'),
    array('id' => '34','delai' => '24','type_drgt' => 'tvo','delai_time' => 'HOUR'),
    array('id' => '35','delai' => '0','type_drgt' => 'tvo','delai_time' => 'DAY'),
    array('id' => '36','delai' => '0','type_drgt' => 'adsl','delai_time' => 'DAY'),
    array('id' => '37','delai' => '0','type_drgt' => 'global','delai_time' => 'DAY')
);

// `reporting`.`reporting_files`
$reporting_files = array(
);

// `reporting`.`service`
$service = array(
    array('id' => '1','nom' => 'PMT','direction' => 'DINT','id_admin' => '1'),
    array('id' => '2','nom' => 'CAC','direction' => 'DINT','id_admin' => '6'),
    array('id' => '3','nom' => 'CAR','direction' => 'DINT','id_admin' => '0')
);

// `reporting`.`temps_de_cycle`
$temps_de_cycle = array(
    array('id' => '1','col_date_debut' => 'date_ess','col_date_fin' => 'date_rel','valeur_tc' => '2','direction' => 'dint'),
    array('id' => '2','col_date_debut' => 'date_sig','col_date_fin' => 'date_ori','valeur_tc' => '1','direction' => 'dsc'),
    array('id' => '3','col_date_debut' => 'date_sig','col_date_fin' => 'date_rel','valeur_tc' => '2','direction' => 'sonatel')
);

// `reporting`.`ui`
$ui = array(
    array('id' => '1','nom' => 'AF_KL'),
    array('id' => '2','nom' => 'AF_TB'),
    array('id' => '3','nom' => 'AF_ZG'),
    array('id' => '4','nom' => 'AFT P'),
    array('id' => '5','nom' => 'AFT_M'),
    array('id' => '6','nom' => 'AFT_T'),
    array('id' => '7','nom' => 'CAM'),
    array('id' => '8','nom' => 'CERT'),
    array('id' => '9','nom' => 'CI-KF'),
    array('id' => '10','nom' => 'CI-LG'),
    array('id' => '11','nom' => 'CI-MT'),
    array('id' => '12','nom' => 'CI-TB'),
    array('id' => '13','nom' => 'CI-TH'),
    array('id' => '14','nom' => 'CI-ZK'),
    array('id' => '15','nom' => 'ECO-A'),
    array('id' => '16','nom' => 'ECO-D'),
    array('id' => '17','nom' => 'ECO-P'),
    array('id' => '18','nom' => 'GDW'),
    array('id' => '19','nom' => 'MCB'),
    array('id' => '20','nom' => 'MCS'),
    array('id' => '21','nom' => 'MCZ'),
    array('id' => '22','nom' => 'MED'),
    array('id' => '23','nom' => 'MLT-G'),
    array('id' => '24','nom' => 'MPS'),
    array('id' => '25','nom' => 'MU_LG'),
    array('id' => '26','nom' => 'MUL-A'),
    array('id' => '27','nom' => 'P-ACA'),
    array('id' => '28','nom' => 'RAC-C'),
    array('id' => '29','nom' => 'RAC-D'),
    array('id' => '30','nom' => 'RAC-G'),
    array('id' => '31','nom' => 'RACKL'),
    array('id' => '32','nom' => 'RACLG'),
    array('id' => '33','nom' => 'RAC-M'),
    array('id' => '34','nom' => 'RACMT'),
    array('id' => '35','nom' => 'RAC-O'),
    array('id' => '36','nom' => 'RAC-P'),
    array('id' => '37','nom' => 'RAC-R'),
    array('id' => '38','nom' => 'RACSL'),
    array('id' => '39','nom' => 'RACTB'),
    array('id' => '40','nom' => 'RACTH'),
    array('id' => '41','nom' => 'RACZG'),
    array('id' => '42','nom' => 'SDF'),
    array('id' => '43','nom' => 'TDX-C'),
    array('id' => '44','nom' => 'TDX-D'),
    array('id' => '45','nom' => 'TDX-G'),
    array('id' => '46','nom' => 'TDX-M'),
    array('id' => '47','nom' => 'TDX-R'),
    array('id' => '48','nom' => 'TDX-S'),
    array('id' => '49','nom' => 'UIOBS'),
    array('id' => '50','nom' => 'UIPMP'),
    array('id' => '51','nom' => 'CIE'),
    array('id' => '52','nom' => 'MCE'),
    array('id' => '59','nom' => 'MULT-KEB'),
    array('id' => '60','nom' => 'MON UI'),
    array('id' => '62','nom' => 'MON UI 2')
);

// `reporting`.`user`
$user = array(
    array('id' => '1','nom' => 'Ndiaye','prenom' => 'Mansour','login' => 'login','password' => 'passe','icon' => 'avatar3.png','service' => '1','email' => 'massamba.fall92@gmail.com','privileges' => '3'),
    array('id' => '2','nom' => 'Dia','prenom' => 'Fatou Diallo','login' => 'fatou','password' => 'passe','icon' => 'avatar4.png','service' => '1','email' => 'massamba.fall92@gmail.com','privileges' => '2'),
    array('id' => '5','nom' => 'guisse','prenom' => 'mame dirra','login' => 'guisse_mame_dirra','password' => 'passe','icon' => 'avatar6.png','service' => '1','email' => 'mamediarraguisse@gmail.com','privileges' => '3'),
    array('id' => '6','nom' => 'Diakhate','prenom' => 'Sokhna Momy','login' => 'diakhate_sokhna_momy','password' => 'passe','icon' => 'avatar6.png','service' => '2','email' => 'sokhnamomy@diakhate.com','privileges' => '1'),
    array('id' => '7','nom' => 'ndiaye','prenom' => 'modou','login' => 'ndiaye_modou','password' => 'passe','icon' => 'avatar3.png','service' => '2','email' => 'modouNdiaye@gmail.com','privileges' => '2')
);

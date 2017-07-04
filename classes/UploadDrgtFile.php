<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 16/02/2017
 * Time: 10:19
 */

require_once 'Database.php';

class UploadDrgtFile {

    public $fichier;
    private $table;
    private $nbre_doublon = 0; //  nombre de doublons
    private $nbre_enrg = 0;     //  nombre de lignes enregistrées
    private $id_fic;
    private $config;

    public function __construct($fichier, $table){

        $this->fichier = $fichier;
        $this->table = $table;

        $file= file_get_contents(PATH."/Datas/configFiles/".$table.".json");
        $this->config = json_decode( $file, true );

    }

    public function enrg($extension){

        ini_set("auto_detect_line_endings", true);

        $this->checkCode();

        if ($this->notExist() == true) {

            $this->id_fic = Database::getDb()->add("fichier", array('nom_fichier' => $this->fichier, 'date_ajout' => Date('Y-m-d'), 'etat_fin' => 0));

            $fx = "enrg" . $extension;

            $res = $this->$fx();

        } else
            $res = array('code' => 0, 'texte' => $this->fichier . " a déjà été enregistré.");

        return $res;
    }

    private function checkCode(){
    }

    private function notExist(){

        $rqt = " SELECT * FROM fichier WHERE nom_fichier='$this->fichier' AND etat_fin=1 ";
        $fic = Database::getDb()->rqt($rqt);
        if ($fic[0]['nom_fichier'] != $this->fichier)
            return true;
        else
            return false;

    }

    private function enrglis(){

        $handle = fopen("datas/uploads/drgt/" . $this->fichier, "r") or die("Impossible d'ouvrir le fichier ");

        if ($handle) {
            $row = $rowNum = 0;
            while (($buffer = fgets($handle, 1000)) !== false) {

                if (trim($buffer) == null )
                    continue;

                if (preg_match("/^[\ -]+$/", $buffer)) // Detection de la ligne
                    $rowNum = $row;

                $filesLine[] = $buffer;
                $row++;
            }
            fclose($handle);
        }

        $colonneNum = $filesLine[$rowNum];
        /*
        $numbers = explode(" ", trim($colonneNum));

        $start = 0;
        for ($i = 0; $i < count($numbers); $i++) {
            $pointer[] = array("start" => $start, "end" => (strlen($numbers[$i]) + 1));
            $start = $start + 1 + (int)strlen($numbers[$i]);
        }

        foreach ($this->config['pointer'] as $p) {
            $entete[] = strtolower(str_replace(" ", "_", trim(substr($filesLine[$rowNum - 1], $p['start'], $p['end']))));
        }
        */
        for ($i = 0 ; $i < count($filesLine); $i++) {

            $arr = null;

            foreach ($this->config['pointer'] as $p)
                $arr[] = substr($filesLine[$i], $p['start'], $p['end']);

            $this->add_drgt($this->config['entete'], $arr);
        }

        Database::getDb()->modif("fichier", "etat_fin", 0 , "id", $this->id_fic);
        return $this->feedback();
    }

    private function enrgcsv(){

        if (($handle = fopen("datas/uploads/drgt/" . $this->fichier, "r")) !== FALSE) {

            /*
            $data = fgetcsv($handle, 2048, "\n");
            $arr_entete = explode(";", $data[0]);
            */

            $entete = null;

            for ($i = 0; $i < count($this->config['entete']); $i++) {

                $champ = $this->config['entete'][$i];
                $entete[] = $champ ;

                if (preg_match("#^date_#", $champ))
                    $entete[] = "h_" . $this->config['entete'][$i];


            }
            while (($data = fgetcsv($handle, 2048, "\n")) !== FALSE) {

                $num = count($data);
                for ($c = 0; $c < $num; $c++) {
                    $data[$c] . "\n ";
                    $arr = explode(";", $data[$c]);
                    if ($arr[0] != "")
                        $this->add_drgt($entete, $arr);
                }
            }
            fclose($handle);

            Database::getDb()->modif("fichier", "etat_fin", 0, "id", $this->id_fic);
            return $this->feedback();

        } else
            $txt = " Impossible d'ouvrir le fichier ";

        $this->interrupt();
        return array('code' => 0, 'texte' => $txt);
    }

    private function add_drgt($entete, $line){

        for ($i = 0; $i < count($entete); $i++) {

            $valeurs[$entete[$i]] = trim($line[$i]);

        }


        if ($valeurs['nd'] != "ND") {

            if( $this->table == "drgt_releves" ){
                $valeurs['h_date_ess'] = $this->formate_hour($valeurs['h_date_ess'], $valeurs['date_ess']);
                $valeurs['h_date_sig'] = $this->formate_hour($valeurs['h_date_sig'], $valeurs['date_sig']);
                $valeurs['h_date_ori'] = $this->formate_hour($valeurs['h_date_ori'], $valeurs['date_ori']);
                $valeurs['h_date_plan'] = $this->formate_hour($valeurs['h_date_plan'], $valeurs['date_plan']);
                $valeurs['h_date_rel'] = $this->formate_hour($valeurs['h_date_rel'], $valeurs['date_rel']);
                $valeurs['date_ess'] = $this->formate_date($valeurs['date_ess']);
                $valeurs['date_sig'] = $this->formate_date($valeurs['date_sig']);
                $valeurs['date_ori'] = $this->formate_date($valeurs['date_ori']);
                $valeurs['date_plan'] = $this->formate_date($valeurs['date_plan']);
                $valeurs['date_rel'] = $this->formate_date($valeurs['date_rel']);
            }
            else if ($this->table == "drgt_encours"){
                $valeurs['date_sig'] = $this->formate_date($valeurs['date_sig']);
                $valeurs['date_ess'] = $this->formate_date($valeurs['date_ess']);
                $valeurs['date_ori'] = $this->formate_date($valeurs['date_ori']);
                $valeurs['date_plan'] = $this->formate_date($valeurs['date_plan']);
            }

            $valeurs['id_fichier'] = $this->id_fic;
            $valeurs['identite'] = sha1($valeurs['nd'].$valeurs['date_sig'].$valeurs['date_rel']);

            if (($this->check($valeurs) == 1) ){
                Database::getDb()->add($this->table, $valeurs );
                $this->nbre_enrg++;
            }else
                $this->nbre_doublon++;
        }

    }

    private function formate_hour($hour, $date){

        if ($hour == null)
            if (preg_match("#^([0-9]{2})/([0-9]{2})/([0-9]{4}) ([0-9:]+)$#", $date))
                return preg_replace("#^([0-9]{2})/([0-9]{2})/([0-9]{4}) ([0-9:]+)$#", "$4", $date);

        if (preg_match("#^([0-9]{2})/([0-9]{2})/([0-9]{2}) ([0-9:]+)$#", $date))
            return preg_replace("#^([0-9]{2})/([0-9]{2})/([0-9]{2}) ([0-9:]+)$#", "$4", $date);

        return $hour;
    }

    private function formate_date($date){

        if (preg_match("#^([0-9]{2})/([0-9]{2})/([0-9]{2})$#", $date))
            return preg_replace("#^([0-9]{2})/([0-9]{2})/([0-9]{2})$#", "20$3-$2-$1", $date);

        else if (preg_match("#^([0-9]{2})/([0-9]{2})/([0-9]+)$#", $date))
            return preg_replace("#^([0-9]{2})/([0-9]{2})/([0-9]+)$#", "$3-$2-$1", $date);

        else if (preg_match("#^([0-9]{2})/([0-9]{2})/([0-9]{2}) ([0-9:]+)$#", $date))
            return preg_replace("#^([0-9]{2})/([0-9]{2})/([0-9]{2}) ([0-9:]+)$#", "20$3-$2-$1", $date);

        else if (preg_match("#^([0-9]{2})/([0-9]{2})/([0-9]{4}) ([0-9:]+)$#", $date))
            return preg_replace("#^([0-9]{2})/([0-9]{2})/([0-9]{4}) ([0-9:]+)$#", "$3-$2-$1", $date);

        else
            return "0000-00-00";
    }

    private function check($valeurs){

        $rqt = " SELECT nd FROM drgt_releves WHERE nd='{$valeurs['nd']}' AND identite='{$valeurs['identite']}' ";

        $line = Database::getDb()->rqt($rqt);

        if (!empty($line[0]))
            return 0;

        return 1;
    }

    public function feedback(){

        if ($this->nbre_doublon != 0 || $this->nbre_enrg != 0){
            $txte = "Enregistrement du fichier " . $this->fichier . " réussi";
            EventEmitter::getInstance()->on("notifyToService");
        }
        else
            $txte = "Une erreur s'est produite lors de l'enregistrement.";

        return array('code' => 1, 'texte' => $txte, 'doublon' => $this->nbre_doublon, 'enrg' => $this->nbre_enrg );
    }

    private function interrupt(){

        Database::getDb()->suppr("fichier", "id", $this->id_fic);
        Database::getDb()->suppr($this->table, "id_fichier", $this->id_fic);

    }


}
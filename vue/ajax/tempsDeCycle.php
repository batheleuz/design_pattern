<?php function tc ($direction){
    $col_dates = Database::getDb()->rqt("SELECT col_label FROM colonnes WHERE col_label LIKE 'date%' ");
    $tc = Database::getDb()->all("temps_de_cycle" , "direction" , $direction );
    ?>
      <h5><i class="fa fa-arrow-right"></i> <?= $direction ?>  </h5>
    <form class="form" id="<?= $direction; ?>">
        <div class="w3-row">
            <div class="w3-quarter">
                <p> Colonne date début : </p>
            </div>
            <div class="w3-half">
                <p>
                    <select class="w3-input w3-border" name="col_date_debut">
                        <?php foreach ($col_dates as $col ){
                            $selected = ( $tc[0]['col_date_debut'] == $col['col_label'] ) ? "selected" : null ;
                            echo "<option $selected > {$col['col_label']} </option>";
                        } ?>
                    </select>
                </p>
            </div>
        </div>
        <div class="w3-row">
            <div class="w3-quarter">
                <p> Colonne date fin : </p>
            </div>
            <div class="w3-half">
                <p>
                    <select class="w3-input w3-border" name="col_date_fin">
                        <?php foreach ($col_dates as $col ){
                            $selected = ( $tc[0]['col_date_fin'] == $col['col_label'] ) ? "selected" : null ;
                            echo "<option $selected > {$col['col_label']} </option>";
                        } ?>
                    </select>
                </p>
            </div>
        </div>
        <div class="w3-row">
            <div class="w3-quarter">
                <p> Valeur Temps de Cycle: </p>
            </div>
            <div class="w3-half">
                <p>
                    <input type="number" class="w3-input w3-border" value="<?= $tc[0]['valeur_tc'] ?>" name="valeur_tc">
                </p>
            </div>
        </div>
        <input type="hidden" value="<?= $direction ?>" name="direction">
        <input type="hidden" value="updateTC" name="action">
        <div class="w3-row">
            <button type="submit" class="w3-btn w3-hover-deep-orange">Enregistrer</button>
            <span id="load_<?= $direction ?>"></span>
        </div>
    </form>
<?php } ?>

<div class="w3-container">
    <div class="w3-row">
        <div class="w3-threequarter">
            <h4>Direction</h4>
            <hr><?php  tc("sonatel") ?>
            <hr><?php  tc("dsc") ?>
            <hr><?php  tc("dint") ?>
        </div>
    </div>
    <hr>
</div>
<?php
  include PATH."/vue/ajax/tempsDeCycleScript.php";
?>
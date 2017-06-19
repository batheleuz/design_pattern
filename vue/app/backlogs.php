<div class="w3-container w3-border w3-white w3-card-4" style="padding:64px;min-height:700px;">
   <div id="page_index">
       <form action="" id="form_backlog">
           <div class="w3-row">
               <h1> <i class="fa fa-bars"></i> Backlogs Instance  <span class="w3-small"> dernier mis à jour : <?= $date_ajout_fr ?> </span> </h1>
               <hr>
           </div>
           <div class="w3-row w3-margin">
               <div class="w3-row-padding">
                   <div class="w3-col m2"><b>Direction de séjour: </b></div>
                   <div class="w3-col m4">
                       <select class="w3-border" name="direction" id="">
                           <option value="Sonatel">SONATEL</option>
                           <option value="dint">DINT </option>
                           <option value="dsc"> DSC </option>
                       </select>
                   </div>
                   <div class="w3-col m2"><b>Backlog </b></div>
                   <div class="w3-col m4">
                       <select type="number" name="backlog" class="w3-input w3-border">
                           <option value="1"> Backlog 1 J </option>
                           <option value="2"> Backlog 2 J</option>
                       </select>
                   </div>
               </div>
               <div class="w3-row w3-margin">
                   <div class="w3-col m2"> <span class="w3-padding"><b> Groupe d'Intervention: </b></span> </div>
                   <div class="w3-col m4">
                       <select name='groupe_intervention'  class="w3-input w3-border">
                           <option value="0" >-- Choisir --</option>
                           <?php
                           $rqt = "SELECT * FROM groupe_intervention WHERE id_service='{$_SESSION['service']['id']}' AND deleted = 0  ";
                           foreach( Database::getDb()->rqt( $rqt )  as $gi ): ?>
                               <option value="<?= $gi['id'] ?>"> <?= $gi['nom'] ?>  </option>
                           <?php endforeach; ?>
                       </select>
                   </div>
               </div>
           </div>
           <div class="w3-row w3-margin w3-center " style="display: none;">
               <button class="w3-btn"> <i class="fa fa-refresh"></i> rafraichir </button>
           </div>
       </form>
       <div class="w3-container w3-padding-jumbo">
           <div class="w3-row" id="table_backlog"></div>
       </div>
   </div>
   <div id="page_liste_backlog" style="display:none;" >
       <div class="w3-row">
            <div class="w3-col s1">
                <p><button class="w3-btn w3-btn-floating" onclick="switchPages('page_liste_backlog' , 'page_index' )"> <i class="fa fa-fw fa-arrow-left "></i> </button></p>
            </div>
           <div class="w3-col s11" id="backlog_liste_title"> Backlog 1 J SONATEL</div>
       </div>
       <hr>
       <div class="w3-row w3-responsive w3-animate-opacity"   id="backlog_liste_table"></div>
   </div>
</div>
<?php
CodeCompressor::importer(PATH . '/vue/app/backlogsScript.php', "js");
?>
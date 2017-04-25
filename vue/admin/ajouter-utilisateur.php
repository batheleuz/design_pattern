<div class="w3-container" style="padding:32px 128px">
    <div class="w3-row">
        <h3 class="w3-text-blue-gray"><i class="fa fa-asterisk"></i> Importer un Utilisateur </h3>
        <hr>
        <form  method="POST" class="w3-container w3-padding-16">
            <div class="w3-section">
                <label>Rechercher</label><br>
                <input class="w3-border w3-input w3-padding" type="text" name="cn" value="<?= $_POST['cn'] ?>" placeholder="Nom Prenom">
            </div>
            <button class="w3-button w3-theme-action"><i class="fa fa-search"></i> Rechercher </button>
        </form>
        <div class="w3-margin-top" id="resultat"></div>
    </div>
    <div class="w3-row w3-padding">
    <table class="w3-table-all">
        <thead>
            <th>Nom Complet</th> <th>Pseudo</th> <th>Service</th> <th>Email</th><th></th>
        </thead>
        <tbody>
            <?php
            if( !isset($results))  print "<tr> <td colspan='5'> Tapez le nom complet de l'utilisateur ... </td></tr>" ;
            else if( $results['count'] == 0 ) print "<tr> <td colspan='5'>Aucun utilisateur ne correspond </td></tr>" ;
                 else{
                     foreach ( $results as $user ):
                         if($user['cn'][0] != "" AND  $user['mail'][0] != "") {
                             ?>
                             <tr>
                                 <td><?= $user['cn'][0] ?></td>
                                 <td><?= $user['uid'][0] ?></td>
                                 <td><?= $user['ou'][0] ?></td>
                                 <td><?= $user['mail'][0] ?></td>
                                 <td>
                                     <button class="w3-button w3-btn-floating w3-hover-teal "><i class="fa fa-plus"></i></button>
                                 </td>
                             </tr>
                             <?php
                         }
                     endforeach;
                 }
            ?>
        </tbody>
    </table>
    </div>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 05/04/2017
 * Time: 11:49
 */
?>
<style>
    #selectable .ui-selecting { background: #FECA40; }
    #selectable .ui-selected { background: #F39814; color: white; opacity: 1; }
    #selectable { list-style-type: none; margin:0; padding: 0; width: 100% }
    #selectable li { margin: 3px; padding: 1px; text-align: center; cursor: pointer; opacity: 0.7; }
</style>
<h3 class="w3-padding-0 w3-text-grey"> <i class="fa fa-users"></i>
    UTILISATEURS DU SERVICE <?= $_SESSION['service']['nom']; ?> <hr style='border-top:solid 1px #ccc;'>
</h3>

<div class="w3-container w3-border w3-white w3-padding-0 ">
    <div class="w3-row">
        <div class="w3-quarter w3-padding-large">
            <h4 class="w3-center">Service: <?= $_SESSION['service']['direction']."/".$_SESSION['service']['nom'] ?> </h4>
            <hr style='border-top:solid 1px #ccc;'>
            <div class="w3-col m12 w3-margin-bottom ">
                <a class="   w3-text-teal w3-hover-text-blue  " style="cursor:pointer;" onclick="document.getElementById('modal_add_user').style.display='block'">
                    <i class='fa fa-plus-square'></i> utilisateur du service</a>
            </div>
        </div>
        <div class="w3-threequarter w3-responsive" style="border-left: 1px solid #ccc ;">
            <table class="w3-table-all w3-hoverable ">
                <thead class="w3-center"><th>Avatar</th><th>Nom</th><th>Prénom</th><th>Login</th> <th>Email</th> <th>Privilèges</th></thead>
                <tbody>
                   <?php  foreach ( Database::getDb()->all('user' , "service" , $_SESSION['service']['id'] ) as $user ): ?>
                    <tr style="cursor: pointer;">
                        <td><img src="<?= URL."/image/avatar/".$user['icon']; ?>" class="w3-circle" style="height:50px;"></td>
                        <td><?= $user['nom'];    ?></td>
                        <td><?= $user['prenom']; ?></td>
                        <td><?= $user['login'];  ?></td>
                        <td><?= $user['email'];  ?></td>
                        <td><?= privilege($user['privileges']); ?></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="w3-container">
    <div id="modal_add_user" class="w3-modal">
        <div class="w3-modal-content w3-card-8" style="width:600px;">
            <header class="w3-container w3-light-gray">
            <span onclick="document.getElementById('modal_add_user').style.display='none'"
                  class="w3-btn w3-light-gray w3-hover-black w3-display-topright"> x </span>
                <h3> NOUVEAU UTILISATEUR </h3>
            </header>
            <div class="w3-container">
                <div class="w3-section">
                    <div class="w3-row">
                        <div class="w3-quarter"> <p><label><b>AVATAR</b></label> </div>
                        <div class="w3-threequarter w3-padding-bottom">
                            <input type="text" name="avatar" >
                           <ol id="selectable">
                            <?php for($i = 1 ; $i <= 6 ; $i++  ): ?>
                              <li style="width:50px;height:50px;" class="w3-col ui-state-default w3-border" value ="<?= 'avatar'.$i.'.png'; ?>" >
                                  <img src="<?= URL.'image/avatar/avatar'.$i.'.png'?>"  class="w3-circle" style="height:100%;">
                              </li>
                            <?php endfor; ?>
                            </ol>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-quarter"> <p><label><b>NOM</b></label> </div>
                        <div class="w3-threequarter"><input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Entrer le nom" name="nom" required></div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-quarter"><p><label><b>PRENOM</b></label> </div>
                        <div class="w3-threequarter"><input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Entrer le prenom" name="prenom" required></div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-quarter"><p><label><b>EMAIL</b></label> </div>
                        <div class="w3-threequarter"><input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Entrer l'Email" name="email" required></div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-quarter"><p><label><b>LOGIN</b></label> </div>
                        <div class="w3-threequarter"><input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Login" name="login" required></div>
                    </div>
                </div>
            </div>
            <footer class="w3-container w3-light-gray">
                <p>Modal Footer</p>
            </footer>
        </div>
    </div>
</div>

<script>
    $(document).ready( function() {
        $( "#selectable" ).selectable({
            selected: function( event, ui ){
                $("input[name='avatar']").val($(ui.selected).attr("value"));
            }
        });
    });
</script>
<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 05/04/2017
 * Time: 11:49
 */
?>

<h3 class="w3-padding-0 w3-text-grey"> <i class="fa fa-users"></i>
    UTILISATEURS DU SERVICE <?= $_SESSION['service']['nom']; ?> <hr style='border-top:solid 1px #ccc;'>
</h3>

<div class="w3-container w3-border w3-white w3-padding-0 ">
    <div class="w3-row">
        <div class="w3-quarter w3-padding-large">
            bonjour
        </div>
        <div class="w3-threequarter" style="border-left: 1px solid #ccc ;">
            <table class="w3-table-all w3-hoverable ">
                <thead> <th>Avatar</th> <th>Prénom</th>  <th>Nom</th> <th>Login</th> <th> Email </th> <th>privilèges</th></thead>
                <tbody>
                   <?php  foreach ( Database::getDb()->all('user' , "service" , $_SESSION['service']['id'] ) as $user ): ?>
                    <tr style="cursor: pointer;">
                        <td><img src="<?= URL."/image/avatar/".$user['icon']; ?>" class="w3-circle" style="height:50px;"></td>
                        <td><?= $user['nom'];  ?></td>
                        <td><?= $user['prenom'];  ?></td>
                        <td><?= $user['login'];  ?></td>
                        <td><?= $user['email'];  ?></td>
                        <td><?= privilege($user['privileges']);  ?></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>


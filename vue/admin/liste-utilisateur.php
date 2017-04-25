<link rel="stylesheet" href="<?= ASSETS."css/dataTables/dataTables.jquery-ui.min.css" ?>">
<div class="w3-container" style="padding:32px 64px">
    <div class="w3-row">
        <h3 class="w3-text-blue-gray"><i class="fa fa-asterisk"></i> Listes des Utilisateurs </h3>
        <hr>

        <table class="w3-table-all table ">
            <thead>
                 <th>Nom Prenom</th> <th>Username</th> <th>service</th> <th>email</th> <th></th>
            </thead>
            <tbody>
            <?php foreach (Database::getDb()->all("user") as $user ): ?>
                <tr>
                    <td><?= getService ($user['service']) ?></td>
                    <td><?= $user['prenom']." ".$user['nom'] ?></td>
                    <td><?= $user['login'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td> <button class="w3-button w3-btn-floating w3-red"> <i class="fa fa-trash"></i> </button> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= ASSETS."js/dataTables.min.js" ?>"></script>
<script src="<?= ASSETS."js/dataTables.jquery-ui.min.js" ?>"></script>
<script src="<?= ASSETS."js/dt.js" ?>"></script>

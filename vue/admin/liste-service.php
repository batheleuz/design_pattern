<div class="w3-container" style="padding:32px 64px">
    <div class="w3-row">
        <h3 class="w3-text-blue-gray"><i class="fa fa-asterisk"></i> Listes des Services </h3>
        <hr>

        <table class="w3-table-all">
            <thead>
            <th>Service</th>
            <th>Direction</th>
            <th>Admin</th>
            <th>Action</th>
            </thead>
            <tbody>
            <?php foreach (Database::getDb()->all("service") as $service): ?>
                <tr>
                    <td> <?= $service['nom'] ?> </td>
                    <td> <?= $service['direction'] ?> </td>
                    <td> <?= getAdmin($service['id_admin']) ?> </td>
                    <td>
                        <button class="w3-button w3-round-large  w3-hover-text-blue  w3-theme-action ">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="w3-button w3-round-large w3-hover-text-red w3-theme-action ">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

--------------------------------- Test Evenement ----------------------------------<br>

<?php

$emiter = EventEmitter::getInstance();

$emiter->on("userCreated");

$emiter->emit("userCreated", "moussa ", "ndiaye");


?>
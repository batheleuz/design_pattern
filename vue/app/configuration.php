<?php
/**
 * Created by PhpStorm.
 * User: Daboss
 * Date: 06/02/2017
 * Time: 11:10
 */
ob_start();
?>

<h3 class="w3-padding-0 w3-text-grey"><i class="fa fa-cog"></i> CONFIGURATION </h3>
<hr style='border-top:solid 1px #ccc;'>
<div id="data"></div>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1"> KPI </a></li>
        <li><a href="<?= URL ?>ajax/config/organisation"> Groupe Intervention / UI </a></li>
        <li><a href="<?= URL ?>ajax/config/tempsDeCycle"> Temps de Cycle </a></li>
        <li><a href="<?= URL ?>ajax/config/codification"> Codification </a></li>
    </ul>
    <div id="tabs-1">
        <?php

        $html = ob_get_clean();
        echo CodeCompressor::compress_html($html);

        include PATH.'/vue/ajax/configKPI.php';

        ob_start();
        ?>
    </div>
</div>
<script type="text/javascript">
    <?php

    $html = ob_get_clean();
    echo CodeCompressor::compress_html($html);

  ?>
    $(function () {
        $("#tabs").tabs({
            beforeLoad: function (event, ui) {
                ui.jqXHR.fail(function () {
                    ui.panel.html("Chargement Impossible.");
                });
            }
        });
    });</script>
<?php function page()
{

    ob_start();

    ?>
    <link rel="stylesheet" href="<?=  ASSETS ?>jQuery-File-Upload/css/jquery.fileupload.css">
    <div id="content">
        <form class="form" id="form" method="post" enctype="multipart/form-data">
            <div class=" w3-card w3-white w3-padding-jumbo ">
                <header class="w3-container">
                    <h2><i class="fa fa-upload"></i> Chargement de fichier.</h2>
                    <hr class="w3-border w3-border-deep-orange">
                </header>
                <div class="w3-container w3-white" style="margin-top:25px;margin-bottom:40px;" >

                    <div class="w3-twothird">

                        <div class="w3-row ">
                            <div id="alert_rsl"></div>
                            <div class="w3-padding">
                                <label class="w3-panel w3-padding "><b> Choisir le fichier Relevés: </b> </label>
                            </div>
                            <div class="w3-padding">
                                <input type="file" id="fichier_releves" name="fichier_releves" value="" class="w3-input  w3-margin-left "
                                       accept=".csv , .lis "><br>
                            </div>
                        </div>
                        <div class="w3-row ">
                            <div class="w3-padding">
                                <label class="w3-panel w3-padding "><b> Choisir le fichier En cours: </b> </label>
                            </div>
                            <div class="w3-padding ">
                                <input type="file" id="fichier_encours" name="fichier_encours" value="" class="w3-input  w3-margin-left "
                                       accept=".csv, .lis"><br>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="w3-container" style="height:80px;">
                    <div class="w3-animate-zoom" id="upload_animation" style="display:none;" >
                        <div class="w3-light-grey w3-margin w3-border w3-border-orange ">
                            <div id="progress" class="w3-container w3-deep-orange w3-center"></div>
                        </div>
                        <div class="w3-text-orange w3-margin-left" id="chargement"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="feedback"></div>
    <script src="<?= ASSETS ?>jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="<?= ASSETS ?>jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
    <script src="<?= ASSETS ?>jQuery-File-Upload/js/jquery.fileupload.js"></script>
    <?php

    return ob_get_clean();

}

if ($_SESSION['user']['privileges'] >= 2):

    echo CodeCompressor::compress_html(page());

    CodeCompressor::importer(PATH . '/vue/app/uploadFormScript.php', "js");

else:

    echo "<div class='w3-container w3-padding-jumbo w3-white'> vous n'avez pas le privilège de charger des fichiers. </div>";

endif;
?>
<?php ob_start(); ?>

<!DOCTYPE html>
<html>
<title> REPORTING </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= ASSETS ?>css/w3css.min.css">
<link rel="stylesheet" href="<?= ASSETS ?>css/app.css">
<link rel="stylesheet" href="<?= ASSETS ?>js/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="<?= ASSETS ?>js/jquery-ui/jquery-ui.structure.min.css">
<link rel="stylesheet" href="<?= ASSETS ?>js/jquery-ui/jquery-ui.theme.min.css">
<link rel="stylesheet" href="<?= ASSETS ?>css/chosen.min.css">
<link rel="icon" type="image/png" sizes="192x192" href="<?= ASSETS ?>image/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= ASSETS ?>image/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?= ASSETS ?>image/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?= ASSETS ?>image/favicon/favicon-16x16.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?= ASSETS; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?= ASSETS; ?>js/app.js"></script>
<script type="text/javascript" src="<?= ASSETS; ?>js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= ASSETS; ?>js/jquery.table2excel.js"></script>
<script type="text/javascript" src="<?= ASSETS ?>js/chosen.jquery.min.js"></script>
<body class="w3-light-grey">
<div class="w3-container w3-top w3-black w3-large w3-padding" style="z-index:4">
    <button class="w3-btn w3-hide-large w3-padding-0 w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i> Menu
    </button>
    <span class="w3-left">
        <img src="<?= ASSETS ?>image/snt.png" height="30" alt="LOGO">
    </span>
    <span class="w3-right">
        <?php $notifs = getNotifications($_SESSION['user']['service'], $_SESSION['user']['id'] , 0 ); ?>
            <div class="w3-dropdown-hover w3-right">
                <button class="w3-btn w3-black " id="notifBtn" title="Notifications"> <i class="fa fa-bell"></i>
                    <?php if ( count($notifs) > 0  ): ?>
                        <span class="w3-badge w3-right w3-small w3-deep-orange" id="notifNumber"><?= count($notifs) ?></span>
                    <?php endif; ?>
                </button>
                <div class="w3-dropdown-content w3-bar-block w3-border" style="width:400px;max-height:400px;overflow-x:hidden;overflow-y:scroll;right:0">
                    <ul class="w3-ul w3-hoverable w3-card-4 w3-white notifications ">
                          <li>
                              <div class="w3-row-padding">
                                  <h2 style="padding-right:16px;"><i class="fa fa-pulse fa-spinner"></i></h2>
                              </div>
                          </li>
                    </ul>
                </div>
        </div>
    </span>

</div>
<nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidenav"><br>
    <div class="w3-container w3-row-margin">
        <div class="w3-col s4 w3-center"><img src="<?= ASSETS ?>image/avatar/<?= $_SESSION['user']['icon'] ?>" alt=""
                                              class="w3-circle" style="width:80%">
            <?php if ($_SESSION['service']['id_admin'] == $_SESSION['user']['id'] || $_SESSION['user']['privileges'] == 3)
                echo " <h6 class=' w3-text-red '> [ Admin ] </h6>";
            ?>
            <h6 class=" w3-tiny "><b><?= $_SESSION['service']['direction'] . "/" . $_SESSION['service']['nom']; ?> </b>
            </h6>

        </div>

        <div class="w3-col s8 w3-center">
            <hr style="margin:10px">
            <b><?= $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] ?> </b>
            <hr style="margin:10px">

            <?php if ($_SESSION['service']['id_admin'] == $_SESSION['user']['id'] || $_SESSION['user']['privileges'] == 3): ?>
                <a href="<?= URL ?>app/users"
                   class="w3-hover-none w3-hover-text-green w3-show-inline-block <?= $menu_conf_user ?>"><i
                        class="fa fa-2x fa-users"></i></a>
                <a href="<?= URL ?>app/config"
                   class="w3-hover-none w3-hover-text-blue w3-show-inline-block <?= $menu_conf ?> "><i
                        class="fa fa-2x fa-cogs"></i></a>
            <?php endif; ?>
        </div>
    </div>
    <hr class="w3-margin-0">
    <a href="#" class="w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">
        <i class="fa fa-remove fa-fw"></i>Fermer
    </a>
    <a class="w3-padding-16  w3-grey w3-margin-bottom "> Reporting </a>
    <a href="<?= URL ?>app/reporting/upload" class="w3-padding <?= $menu_up ?>"><i class="fa fa-upload fa-fw"></i>
        Charger Fichier </a>
    <a href="<?= URL ?>app/reporting/nouveau/global" class="w3-padding <?= $menu_ng ?>"><i
            class="fa fa-plus-circle fa-fw"></i> Reporting Global </a>
    <a href="<?= URL ?>app/reporting/nouveau/autre" class="w3-padding <?= $menu_na ?>"><i
            class="fa fa-plus-circle fa-fw"></i> Autre Reporting </a>
    <a href="<?= URL ?>app/reporting/liste/fichier" class="w3-padding <?= $menu_lf ?>"> <i
            class="fa fa-calendar fa-fw"></i> Mes reportings </a>
    <a href="#" class="w3-padding w3-hover-red" onclick="deconnexion()"> <i class="fa fa-sign-out fa-fw"></i>
        Déconnexion </a>
</nav>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
     title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:250px;margin-top:43px;">
    <div class="w3-container w3-padding-32">
        <div id='dialog-confirm'></div>
        <?php
        $buffer = ob_get_clean();
        echo CodeCompressor::compress_html($buffer);
        echo $content;
        ob_start();
        ?>
    </div>
    <footer class="w3-container w3-padding-16 w3-dark-grey"><h4></h4></footer>
</div>
<?php

$buffer = ob_get_clean();

echo CodeCompressor::compress_html($buffer);

ob_start();
?>
<script>

    mySidenav = document.getElementById("mySidenav"),
    overlayBg = document.getElementById("myOverlay"),
    notifications = $(".notifications"),
    notifNumber = <?= count($notifs) ?>;

    function w3_open() {
        if (mySidenav.style.display === 'block') {
            mySidenav.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidenav.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    function w3_close() {
        mySidenav.style.display = "none";
        overlayBg.style.display = "none";
    }

    function deconnexion() {
        $("#dialog-confirm").html("<h4 class='w3-center w3-text-red'>Voulez vrémment vous déconnecter ? </h4>");
        $("#dialog-confirm").dialog({
            resizable: false, modal: true, title: "Déconnexion",
            position: {my: "center top", at: "center top", of: $('body')},
            show: {effect: "fade", duration: 1000},
            buttons: {
                "Continuer": function () {
                    document.location.href = "<?= URL ?>dec/logout";
                },
                "Annuler": function () {
                    $(this).dialog("close");
                }
            }
        })
    }

    function notificationWrite( fa_icon , titre , contenu , id = 0 , href = "#"  ) {
        return  "<a style='cursor:pointer;' data-href='"+href+"' data-id='"+id+"' onclick='notificationRedirect(this)' >"  +
                "<li class='w3-padding-4'> " +
                "<div class='w3-row'> <div class='w3-col m2'>"+
                "<span class='w3-left w3-circle w3-margin-right w3-text-deep-orange'><i class='fa fa-2x fa-"+fa_icon+" '></i></span>" +
                "</div> <div class='w3-col m9'>" +
                "<span class='w3-text-deep-orange'><b>"+titre+"</b></span><hr class='w3-margin-0'>" +
                "<span class='w3-tiny w3-text-grey'> "+contenu+" </span> </div> </div></li></a>"
    }

    function notificationRedirect(that){
        var notifDatas =  $(that).data();
        if ( notifDatas.id !== 0 ){
            $(that).html("<h4 class='w3-text-deep-orange w3-margin'><i class='fa fa-refresh fa-spin'></i> Patientez ... </h4>");
            $.post("<?= URL ?>ajax/notifications" , {  action: "viewNotification", notifID : notifDatas.id })
                .done(function(data){
                    if(data == "1")
                        window.setTimeout(function(){
                            if(notifDatas.href != "#" ){
                                location.href=notifDatas.href;
                            }else{
                                $(that).fadeOut();
                            }
                        } , 1000 ) ;
                });
        }
    }

    function getNotifications(){
        $.post("<?= URL ?>ajax/notifications" , { action: "getNotifications" , user : "<?= $_SESSION['user']['id'] ?>" , notifNumber : notifNumber })
            .done( function(data ){
                if (data){
                    var notifs = $.parseJSON(data) ;
                    notifNumber = notifs.length;
                    notifications.html("");
                    $("#notifNumber").remove();
                    if( notifNumber == 0 ){
                        notifications.html(
                           notificationWrite("bell-o" , "Aucune notification" , "Vous n'avez pas de nouvelles notifications." )
                        );
                    }else if(notifNumber > 0 ){
                        $("#notifBtn").append(
                            "<span class='w3-badge w3-right w3-small w3-deep-orange w3-animate-left' id='notifNumber'>"+notifNumber+"</span>"
                        );
                        $.each( notifs , function(key , value){
                            notifications.prepend (
                                notificationWrite( value.fa_icon , value.titre , value.contenu , value.id  , value.href )
                            );
                        });
                    }
                }
            });
    }

    $(document).ready(function(){
        notifList = <?= json_encode($notifs) ?>;

        if ( notifList.length == 0 )
            notifications.html(notificationWrite("bell-o" , "Aucune notification" , "Vous n'avez pas de nouvelles notifications."  ) );

        else {
            notifications.html("");
            $.each( notifList , function(key , value ) {
                notifications.prepend( notificationWrite( value.fa_icon , value.titre , value.contenu , value.id , value.href ));
            });
        }

        window.setInterval( function(){
            getNotifications();
        } , 10*1000);
    });

</script>

<?php

$script = ob_get_clean();

echo CodeCompressor::compress_js($script);

?>
</body></html>

<?php

//EventEmitter::getInstance()->on("serviceNotify");

//EventEmitter::getInstance()->emit("serviceNotify"  , 2 , "bonjour "   ,  "bonjour tout le monde" );

?>
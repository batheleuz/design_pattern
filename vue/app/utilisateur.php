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
                <thead class="w3-center"><th>Avatar</th><th>Prénom Nom</th><th>Login</th><th>Privilèges</th> <th>action</th> </thead>
                <tbody>
                   <?php  foreach ( Database::getDb()->all('user' , "service" , $_SESSION['service']['id'] ) as $user ): ?>
                    <tr  id="<?= $user['id']; ?>" style="cursor: pointer;">
                        <td><img src="<?= URL."/image/avatar/".$user['icon']; ?>" class="w3-circle" style="height:50px;"></td>
                        <td><?= $user['prenom']." ".$user['nom']; ?></td>
                        <td><?= $user['login'];  ?></td>
                        <td><?= privilege($user['privileges']); ?></td>
                        <td>
                            <a class="w3-hover-text-blue modif w3-xlarge"> <i class="fa fa-edit"></i> </a>
                            <a class="w3-hover-text-red suppr w3-xlarge"> <i class="fa fa-trash"></i> </a>
                        </td>
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
            <div id="rsl"></div>
            <form action="" id="add_user" >
                 <div class="w3-container">
                    <div class="w3-section">
                        <div class="w3-row">
                            <div class="w3-quarter"> <p><label><b>AVATAR</b></label> </div>
                            <div class="w3-threequarter w3-padding-bottom">
                                <input type="hidden" name="avatar" >
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
                            <div class="w3-threequarter"><input onkeyup="generateLogin()" class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Entrer le nom" name="nom" required></div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-quarter"><p><label><b>PRENOM</b></label> </div>
                            <div class="w3-threequarter"><input onkeyup="generateLogin()" class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Entrer le prenom" name="prenom" required></div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-quarter"><p><label><b>EMAIL</b></label> </div>
                            <div class="w3-threequarter"><input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Entrer l'Email" name="email" required></div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-quarter"><p><label><b>LOGIN</b></label> </div>
                            <div class="w3-threequarter"><input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Login" name="login" required></div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-quarter"><p><label><b>PRIVILEGES</b></label> </div>
                            <div class="w3-threequarter">
                                <input type="hidden" name="privileges" value="0" >
                                <p><label for="checkbox-1"> reporting </label>
                                <input class="privileges" type="checkbox" value="1" id="checkbox-1" >
                                <label for="checkbox-2">fichier</label>
                                <input class="privileges" type="checkbox" value="2" id="checkbox-2" >
                                <label for="checkbox-3">admin</label>
                                <input class="privileges" type="checkbox" value="3" id="checkbox-3" >
                            </div>
                        </div>
                    </div>
            </div>
                 <footer class="w3-container w3-light-gray  w3-padding-bottom w3-padding-top ">
                <div class="w3-right">
                    <a class="w3-light-gray w3-padding-right w3-text-teal" id="chargement" style="display:none;"> <i class="fa fa-spinner fa-pulse"></i> </a>
                    <button class="w3-btn w3-teal"><i class="fa fa-plus-square"></i> ajouter </button>
                </div>
            </footer>
                 <input type="hidden" value="add_user" name="action" >
            </form>
        </div>
    </div>
</div>
<script>
    function verbose(color, txt ){
        return  "<div class='w3-panel w3-animate-fade "+color+" '> " +
                "<span class='w3-closebtn' onclick=\"this.parentElement.style.display='none'\"> x </span>"+
                "<p>"+txt+"</p></div>" ;
    }

    $(document).ready( function() {
        $( "#selectable" ).selectable({
            selected: function( event, ui ){
                $("input[name='avatar']").val($(ui.selected).attr("value"));
            }
        });
        $("input[type='checkbox']").checkboxradio();
        $(".privileges").on( "change" , handlePrivChange );
    });

    $("#add_user").submit( function ( event ){
        event.preventDefault();
        document.getElementById("chargement").style.display = "inline" ;
        $.ajax({
            url: '<?= URL ?>ajax/users',
            type: "POST", data: new FormData(this),
            contentType: false, cache: false, processData:false
        }).done(function( data ){
           if(parseInt(data) == 0)
               $("#rsl").html(verbose("w3-red" , "Cet utilisateur existe déjà." ));

           else if(parseInt(data) > 0)
               $("#rsl").html(verbose("w3-teal" , "Utilisateur ajouté avec succès." ));

           document.getElementById("chargement").style.display = "none" ;
        });
    });

    $(".modif").click(function () {
       var  id =  $(this).parents("tr").attr("id");
       /* $.ajax("<?= URL ?>ajax/users", { action:"modUser" , id:'id' })
            .done(function( data ){
            console.log(data);
        }); */
    });

    $(".suppr").click(function () {
        var dialogBox = $("#dialog-confirm") ;
        var  id =  $(this).parents("tr").attr("id");
        dialogBox.html("<h4 class='w3-center w3-text-red'>Voulez vrémment supprimer cet utilisateur?</h4>");
        dialogBox.dialog({
            resizable:false,modal:true , title: "Suppression",
            position: { my: "center center", at: "center center", of: $('body') },
            show: { effect: "fade", duration: 1000 },
            buttons: {
                "Supprimer": function () {
                    dialogBox.html("<h4 class='w3-center'><i class='fa fa-2w fa-spinner fa-pulse'></i></h4>");
                    $.post( "<?= URL ?>ajax/users", { action:"supprUser", id:id })
                        .done(function( data ){
                            console.log(data);
                           if( data == "1" ){
                               window.setTimeout(function () {
                                 dialogBox.html(verbose("w3-teal" , "Suppression réussi." ));
                               } , 1000 );
                           }else
                               dialogBox.html(verbose("w3-red" , "Suppression impossible." ));
                           
                        });
                } ,
                "Annuler" : function(){
                    $(this).dialog("close");
                }
            }
        })
    });

    function generateLogin(){
        var nom = $("input[name='nom']").val().toLowerCase() ,
            prenom = $("input[name='prenom']").val().toLowerCase();
        $("input[name='login']").val( nom.replace(/ /g, "_")+"_"+prenom.replace(/ /g, "_") );
    }

    function handlePrivChange( e ){

        var val = $("input[name='privileges']").val(),
            targetVal = e.target.value ;

        if( parseInt(targetVal) > parseInt(val) )
            $("input[name='privileges']").val(targetVal);
    }

</script>
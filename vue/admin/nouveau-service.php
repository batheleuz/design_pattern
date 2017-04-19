<div class="w3-container" style="padding:32px 128px">
    <div class="w3-row">
        <h3 class="w3-text-blue-gray"><i class="fa fa-asterisk"></i> Nouveau Service </h3>
        <hr>
        <form class="w3-container w3-border w3-padding-16">

            <div class="w3-section">
                <label>Nom</label><br>
                <input class="w3-border w3-padding" type="text" style="width:500px;" name="nom">
            </div>

            <div class="w3-section">
                <label>Direction</label><br>
                <select name="direction" class="w3-input uniq" id="">
                    <option value="SNT"> ---- Choisir ----</option>
                    <option value="DINT">DINT</option>
                    <option value="DSC"> DSC</option>
                </select>
            </div>
            <input type="hidden" name="action" value="addService">
            <button class="w3-button w3-section w3-teal w3-ripple w3-theme-action">
                <i class="fa fa-chevron-right"></i> Créer
            </button>
            <span id="chargement"></span>
        </form>
        <div class="w3-margin-top" id="resultat"></div>
    </div>

</div>
<script>
    $("form").submit(function (e) {
        e.preventDefault();
        var nom = $("input[name='nom']");
        $("span.w3-text-red").remove();
        if (nom.val() == "") {
            nom.addClass("w3-pale-red w3-border-red")
                .after("<span class='w3-text-red'> <i class='fa fa-remove'></i> Veillez renseigner ce champ. </span> ")
                .focus();
        } else {
            nom.switchClass("w3-pale-red w3-border-red", "w3-border-green", 300);
            $("#chargement").html(
                "<span class='w3-xlarge w3-text-teal'><i class='fa fa-spinner fa-pulse'></i> Création ...</span> "
            );

            $.ajax({
                url: '<?= URL ?>ajax/admin/services',
                type: "POST", data: new FormData(this),
                contentType: false, cache: false, processData: false
            }).done(function (data) {
                console.log(data);
                window.setTimeout(function () {
                    if (parseInt(data) > 0) {
                        $("#resultat").html(
                            "<div class='w3-container w3-padding-32 w3-pale-green'>" +
                            "<h5><u><b>Création Service:</b></u></h5>" +
                            "<p>Création du service réussi. <br> Pour créer  ou choisir un l'admin de ce service. " +
                            "<a href='<?= URL ?>admin/users' class='w3-button'>Cliquez ici</a>" +
                            "</div>"
                        );
                    } else {
                        $("#resultat").html(
                            "<div class='w3-container w3-padding-32 w3-pale-red'>" +
                            "<h5><u><b>Création Service:</b></u></h5><p>" + data + "</div>"
                        );
                    }
                    $("#chargement").html("");
                }, 1500);
            }).fail(function () {
                console.log("impossile");
            });
        }
    });

    $(document).ready(function () {
        $("select.uniq").selectmenu({width: 500}).selectmenu("menuWidget");
    });

</script>
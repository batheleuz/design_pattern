<script type="text/javascript">
    var numEnrg , numRej ,  texte ,
        loader = "<div class='loader'> <img src='<?= ASSETS; ?>image/squares.gif' class='w3-round img-loader' /></div>";

    function verbose(color, txt) {
        var rt = "<div class='w3-panel w3-round w3-leftbar w3-animate-opacity " + color + " '> " +
                 "<p>" + txt + "</p></div>";
        return rt;
    }

    var feedback = $("#feedback").dialog({
        modal: true, autoOpen: false,
        width: 600, height: 400,
        title: "Chargement de fichier",
        buttons: {
            Fermer: function () {
                $(this).dialog("close");
            }
        }
    });

    function openFeedbackDialog(){
        feedback.dialog("open");
    }

    $("body").append(loader);

    $(document).ready(function(){
        window.setTimeout(function () {
            $("div.loader").remove();
        }, 500);
    });

    $(function () {
        'use strict';
        $("#fichier_releves").fileupload({
            url: '<?= URL ?>ajax/uploader',
            dataType: 'json',
            maxChunkSize: 1000000,
            sequentialUploads : true,
            formData: function() {
                return [
                    {name: "fichier_releves", value: ""},
                    {name: "action" ,  value :"Enregistrer"}
                ];
            },
            start:function (e , data){
                $("body").append("<div class='loader'></div>");
                numEnrg = numRej  = 0 ;
                $("#upload_animation").css("display", "block");
                $("#chargement").html("<i class='fa fa-fw fa-pulse fa-spinner'></i> Chargement...");
                console.log("Upload starting ");
            },
            chunkdone : function (e , data ){
                numEnrg = numEnrg + data.result.r.enrg ;
                numRej = numRej + data.result.r.doublon;
                texte = data.result.r.texte;
            },
            done: function (e, data) {
                numEnrg = numEnrg + data.result.r.enrg ;
                numRej = numRej + data.result.r.doublon;
                texte = data.result.r.texte;
                window.setTimeout(function(){
                   $("#chargement").html(
                       "<a class='w3-text-teal w3-large' style='cursor:pointer;' onclick='openFeedbackDialog()' title='clicker pour voir le résultat.' >" +
                       "<i class='fa fa-fw fa-check'></i> Terminé </a>");
                    $(".loader").remove();
                } , 500 );
                console.log("Upload finished ");

                var txt = "<div class='w3-center'><h6 class='w3-teal w3-padding'>" + texte + "</h6></div>" +
                          "<table class='w3-table-all'><tr><td> Lignes rejetées : </td><td> " + numRej + "</td></tr>" +
                          "<tr><td> Lignes Enregistrées : </td><td> " + numEnrg + "</td></tr></table>";

                $("#feedback").append(txt);
                feedback.dialog("open");

            },
            progressall: function (e, data) {
                var progress = parseInt( data.loaded / data.total * 100, 10);
                $('#progress')
                    .css( 'width', progress + '%' )
                    .html(progress + '%');
            }
        });
    });

    $(function(){
       'use strict';
        $("#fichier_encours").fileupload({
            url: '<?= URL ?>ajax/uploader',
            dataType: 'json',
            maxChunkSize: 1000000,
            sequentialUploads : true,
            formData: function() {
                return [{name: "fichier_encours", value: ""},
                        {name: "action" ,  value :"Enregistrer"} ];
            },
            start:function (e , data){
                $("body").append("<div class='loader'></div>");
                numEnrg = numRej  = 0 ;
                $("#upload_animation").css("display", "block");
                $("#chargement").html("<i class='fa fa-fw fa-pulse fa-spinner'></i> Chargement...");
                console.log("Upload starting ");
            },
            chunkdone : function (e , data ){
                numEnrg = numEnrg + data.result.c.enrg ;
                numRej = numRej + data.result.c.doublon;
                texte = data.result.c.texte;
            },
            done: function (e, data) {
                numEnrg = numEnrg + data.result.c.enrg ;
                numRej = numRej + data.result.c.doublon;
                texte = data.result.c.texte;
                window.setTimeout(function(){
                    $("#chargement").html(
                        "<a class='w3-text-teal w3-large' style='cursor:pointer;' onclick='openFeedbackDialog()' title='clicker pour voir le résultat.' >" +
                        "<i class='fa fa-fw fa-check'></i> Terminé </a>");
                    $(".loader").remove();
                } , 500 );
                console.log("Upload finished ");

                var txt = "<div class='w3-center'><h6 class='w3-teal w3-padding'>" + texte + "</h6></div>" +
                    "<table class='w3-table-all'><tr><td> Lignes rejetées : </td><td> " + numRej + "</td></tr>" +
                    "<tr><td> Lignes Enregistrées : </td><td> " + numEnrg + "</td></tr></table>";

                $("#feedback").append(txt);
                feedback.dialog("open");
            },
            progressall: function (e, data) {
                var progress = parseInt( data.loaded / data.total * 100, 10);
                $('#progress')
                    .css( 'width', progress + '%' )
                    .html(progress + '%');
            }
        });
    });

    /*
    $(".form").submit(function (e) {

        e.preventDefault();

        var loader = "<div class='loader'><img src='<?= ASSETS ?>image/squares.gif' class='w3-round img-loader' /></div>";

        if ($("input[name='fichier_encours']").val().length === 0 && $("input[name='fichier_releves']").val().length === 0) {

            $("#data").html(verbose("w3-red", "Vous n'avez pas choisis de fihier "));
            $("input[name='fichier_releves']").click();

        } else {

            $("#upload_animation").css("display" , "block");


            $.ajax(
                {
                    url: '<?= URL ?>ajax/uploader',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false
                })
                .done(function (data) {
                    console.log(data);
                    var result = $.parseJSON(data);
                    $("#alert_rsl").html("");
                    $("#feedback").html("");
                    var openDialog = "close";

                    $.each(result, function (key, value) {
                        if (value.code == "0")
                            $("#alert_rsl").append(verbose("w3-red", value.texte));

                        else if (value.code == "1") {
                            openDialog = "open";

                            $("#alert_rsl").append(verbose("w3-teal", value.texte));

                            var txt = "<div class='w3-center'><h6 class='w3-teal w3-padding'>" + value.texte + "</h6></div>" +
                                "<table class='w3-table-all'><tr><td> Doublons rejetées : </td><td> " +
                                value.doublon + "</td></tr>" +
                                "<tr><td> Lignes Enregistrées : </td><td> " +
                                value.enrg + "</td></tr></table>";

                            $("#feedback").append(txt);

                            console.log(data);
                        }
                    });

                    feedback.dialog(openDialog);
                    window.setTimeout(function () {
                        $(".alert").fadeTo(2000, 500).slideUp(500, function () {
                            $(this).remove();
                        });
                    }, 1500);
                    window.setTimeout(function () {
                        $("div.loader").remove();
                    }, 500);

                    document.getElementById("form").reset();

                })
                .fail(function () {
                    alert("Impossible");
                });
        }
    });
    */
</script>

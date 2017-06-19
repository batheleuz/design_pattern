<script>
    function printBacklogTable(jsonDatas ){
        var table = $("#table_backlog");
        table.html("");
        table.html(
            "<table class='w3-table-all w3-large'>" +
            "<tbody class='w3-border-blue'>" +
            "<tr><th> Direction </th><td>"+jsonDatas.dir+"</td> <td></td> </tr>"+
            "<tr><th> Backlog </th> <td>"+jsonDatas.backlog+"</td><td></td> </tr>"+
            "<tr><th> Nombre </th> <td>"+jsonDatas.nbre+"</td><td> " +
            "<a class='fa-padding w3-hover-text-deep-orange' title='voir la liste' " +
            "onclick=\"getBacklogs()\" style='cursor:pointer;'>" +
            "<i class='fa fa-fw fa-list-ul'></i>" +
            "</a></td></tr>"+
            "<tr><th> Moyenne </th> <td>"+jsonDatas.moy+"</td> <td></td></tr>"+
            "</tbody></table>"
        );
    }

    function printBacklogList( jsonDatas ){

        var table = $("#backlog_liste_table") ,tbody ,thead;

        thead = "<thead><th> Age </th>";
        $.each( jsonDatas[0] , function( key ,val ){
            if( key != "id" && key != "id_fichier" )
                 thead = thead + "<th>"+key+"</th>";
        });
        thead = thead + "</thead>";

        tbody = "<tbody>";
        $.each( jsonDatas , function( key ,val ){
            tbody = tbody .concat("<tr>");
                tbody = tbody + "<td>" + val['age']+ "</td>" ;
                $.each( jsonDatas[key] , function( field ,value ){
                    if( field != "id" && field != "id_fichier" )
                        tbody = tbody.concat("<th>"+value+"</th>");
                });
            tbody = tbody.concat("</tr>");
        });
        tbody = tbody.concat("<tbody>");
        table.html(
            "<table class='w3-table-all'>" +
            "<thead> "+ thead +" </thead>" +
            "<tbody> "+ tbody +" </tbody>" +
            "</table>"
        );
    }

    function switchPages( id1 , id2 ){
        $("#"+id1).css("display" , "none");
        $("#"+id2).css("display" , "block");
    }

    function getBacklogs(){
        var formData = $("#form_backlog").serializeArray();
        $("#backlog_liste_title").html("<h2> DÉRANGEMENTS EN BACKLOG "+formData[1]['value'] +" J - " + formData[0]['value'] + "</h2>");
        $("#backlog_liste_table").html("<h2 class='w3-center'><i class='fa fa-fw fa-pulse fa-spinner'></i> Chargement </h2>");
        switchPages("page_index" , "page_liste_backlog") ;
        $.post("<?= URL ?>ajax/backlogs",
            {
            action : "getBacklogCases",
            direction: formData[0]['value'] ,
            nbre : formData[1]['value'],
            groupe_intervention : formData[2]['value']
             }
        ).done(function(data){
                var json = $.parseJSON(data);
                window.setTimeout( function () {
                    printBacklogList(json);
                } , 1000) ;
            });
    }

    function refreshBacklogTable(dir, nbreJrs , id_gi ){
        $("#table_backlog").html("<h6 class='w3-center'><i class='fa fa-fw fa-pulse fa-spinner'></i> Chargement </h6>");
        $.post( "<?= URL ?>ajax/backlogs", { action : "backlogNumbers", direction : dir, nbre : nbreJrs , groupe_intervention : id_gi })
        .done( function(data){
            var json = $.parseJSON(data);
            window.setTimeout( function () {
                printBacklogTable(json);
            } , 1000) ;
        }) ;
    }

    $(document).ready(function(){

        refreshBacklogTable("Sonatel" , 1 , 0 );

        $("select").selectmenu({
            change : function(event , ui ){
                $("#form_backlog").submit();
            }
        });


        $("#form_backlog").submit(function( e ){

            e.preventDefault();

            var formData = $(this).serializeArray();

            refreshBacklogTable(formData[0]['value'], formData[1]['value'] , formData[2]['value'] );


        });

    });

</script>
<script>
    $(document).ready(function(){

        $(".form").submit( function(e){
            e.preventDefault();

            var id = $(this).attr("id");

            $("#load_"+id).html("<i class='fa fa-fw fa-pulse fa-spinner'></i>") ;

            $.ajax({
                url: '<?= URL ?>ajax/config',
                type: "POST", data: new FormData(this),
                contentType: false, cache: false, processData: false
            }).done( function( data ){
                if(data == "1"){
                    window.setTimeout(function(){
                        $("#load_"+id).html("<i class='fa fa-fw fa-check w3-green'></i>");
                    } , 1000 );
                }else{
                    $("#load_"+id).html("<i class='fa fa-fw fa-remove w3-red'></i>");
                }
            });
        });
    });
</script>
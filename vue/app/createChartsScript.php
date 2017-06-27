<div id="container" style="width:800px; height:460px"></div>
<script>
    Highcharts.setOptions({
        lang: {
            loading: 'Chargement...',
            months: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
            weekdays: ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
            shortMonths: ['jan', 'fév', 'mar', 'avr', 'mai', 'juin', 'juil', 'aoû', 'sep', 'oct', 'nov', 'déc'],
            exportButtonTitle: "Exporter",
            printButtonTitle: "Imprimer",
            rangeSelectorFrom: "Du",
            rangeSelectorTo: "au",
            rangeSelectorZoom: "Période",
            downloadPNG: 'Télécharger en PNG',
            downloadJPEG: 'Télécharger en JPEG',
            downloadPDF: 'Télécharger en PDF',
            downloadSVG: 'Télécharger en SVG',
            resetZoom: "Réinitialiser le zoom",
            resetZoomTitle: "Réinitialiser le zoom",
            thousandsSep: " ",
            decimalPoint: ','
        }
    });

    Highcharts.chart('container', {
        data: {
            table: 'table_charts'
        },
        chart: {
            type: '<?= $type; ?>'
        },
        title: {
            text: '<?= $name . " " . $start . " " . $end;  ?>'
        },
        yAxis: {
            title: {
                text: 'Pourcentage %',
                max: 100
            }
        },
        <?= $options ?>
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        }
    });
</script>
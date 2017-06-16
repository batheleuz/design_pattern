<?php

if ($_GET['controller'] == "ajax.php") {

    extract($_POST);

    $_GLOBALS['vr'] = $_SESSION['vr'];
    $_GLOBALS['kpi'] = $_SESSION['kpi'];
    $_GLOBALS['ui'] =  $_SESSION['ui'];
    $_GLOBALS['service'] = $_SESSION['service'];
    $_GLOBALS['groupe_intervention'] =  $_SESSION['groupe_intervention'] ;

    $dates = ["start" => $start, "end" => $end];

    $repCharts = ReportingCRUD::getReportingByName($_SESSION['service']['nom'], $name);

    $repCharts['contenue'] = unserialize($repCharts['contenue']);

    $lr = $repCharts['contenue'];
    var_dump( $lr['groupe_intervention']) ;
    if ($repCharts['type'] == "ReportingGlobalBuilder")
        $reportingCharts = new ReportingGlobalBuilder($lr['name'], $lr['direction'], $lr['groupe_intervention'], $lr['column_kpi'], $dates, $lr['par'], $_GLOBALS);

    else if ($repCharts['type'] == "ReportingAutreBuilder")
        $reportingCharts = new ReportingAutreBuilder($lr['name'], $lr['direction'], $lr['column'], $lr['column_kpi'], $dates, $lr['par'], $_GLOBALS);

    $reportingCharts->tableForChart();

    if ($type == "area") {
        $options = "plotOptions:{
                            area: {
                                pointStart: 1940,
                                marker: {
                                    enabled: false,
                                    symbol: 'circle',
                                    radius: 2,
                                    states: {
                                        hover: {
                                            enabled: true
                                        }
                                    }
                                }
                            }
                       },";
    } else if ($type == "line") {
        $type = "spline";
        $options = "plotOptions: {
                        spline: {
                            marker: {
                                lineWidth: 10,
                            }
                        }
                    }, ";
    } else {
        $options = null;
    }

    include_once("vue/app/createChartsScript.php");

}

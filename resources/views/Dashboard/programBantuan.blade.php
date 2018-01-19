@extends('layouts.dashboard_template')

@section('content')

        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title or "Page Title" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="box">
        <div class="box-header with-border">

            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-sm-3">Kecamatan:</label>

                    <div class="col-sm-9">
                        <form>
                            <select class="form-control" id="kecamatan" name="kecamatan" onchange="addlist();">
                                <option value="5203090">Aikmel</option>
                                <option value="5203030">Terara</option>
                                <option value="5203070">Selong</option>
                                <option value="5203010">Keruak</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-sm-3 sm">Desa:</label>

                    <div class="col-sm-9">
                        <select class="form-control" id="desalist" name="desalist" onchange="addlistnd();">
                            <option value="ALL">ALL</option>
                            <option value="5203090001">Lenek Daya</option>
                            <option value="5203090002">Lenek</option>
                            <option value="5203090003">Lenek Lauq</option>
                            <option value="5203090004">Kalijaga</option>
                            <option value="5203090008">Kembang Kerang</option>
                            <option value="5203090009">Aikmel</option>
                            <option value="5203090010">Aikmel Utara</option>
                            <option value="5203090011">Kalijaga Selatan</option>
                            <option value="5203090012">Kalijaga Timur</option>
                            <option value="5203090013">Lenek Baru</option>
                            <option value="5203090014">Kembang Kerang Daya</option>
                            <option value="5203090015">Aikmel Barat</option>
                            <option value="5203090016">Lenek Pesiraman</option>
                            <option value="5203090017">Toya</option>
                            <option value="5203090018">Lenek Ramban Biak</option>
                            <option value="5203090019">Lenek Kali Bambang</option>
                            <option value="5203090020">KalijagaTengah</option>
                            <option value="5203090021">Bagik Nyaka Santri</option>
                            <option value="5203090022">Aik Prapa</option>
                            <option value="5203090023">Sukarema</option>
                            <option value="5203090024">Kalijaga Baru</option>
                            <option value="5203090025">Lenek Duren</option>
                            <option value="5203090026">Keroya</option>
                            <option value="5203090027">Aikmel Timur</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-sm-3">Tahun:</label>

                    <div class="col-sm-9">
                        <select class="form-control" id="listyear">
                            <option value="ALL">ALL</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <link rel="stylesheet" href="style.css" type="text/css">
            <script src="amcharts/amcharts.js" type="text/javascript"></script>
            <script src="amcharts/serial.js" type="text/javascript"></script>
            <script>
                // in order to set theme for a chart, all you need to include theme file
                // located in amcharts/themes folder and set theme property for the chart.

                chartData = [{
                    "year": "KIP",
                    "expenses": 33
                }, {
                    "year": "KIS",
                    "expenses": 22
                }, {
                    "year": "PKH",
                    "expenses": 23
                }, {
                    "year": "KKS",
                    "expenses": 3
                }, {
                    "year": "RASKIN",
                    "expenses": 2
                }];

                makeCharts("light", "#eebeb4", "", chartData);

                function makeCharts(theme, bgColor, bgImage, chartData) {
                    // background
                    if (document.body) {
                        document.body.style.backgroundColor = bgColor;
                        document.body.style.backgroundImage = "url(" + bgImage + ")";
                    }
                    // column chart
                    chart4 = AmCharts.makeChart("chartdiv4", {
                        type: "serial",
                        theme: theme,
                        dataProvider: chartData,
                        categoryField: "year",
                        startDuration: 1,

                        categoryAxis: {
                            gridPosition: "start",
                            gridThickness: 0
                        },
                        valueAxes: [{
                            title: "Persen (%)",
                            gridThickness: 0
                        }],
                        graphs: [{

                            type: "column",
                            title: "Program",
                            valueField: "expenses",
                            lineThickness: 1,
                            fillAlphas: 0.8,
                            lineAlpha: 1,
                            balloonText: "[[title]] in [[category]]:<b>[[value]]</b>"
                        }],
                        legend: {
                            useGraphSettings: true
                        }

                    });
                }

                $(function () {

                    var bar_data = {
                        data: [["2010", 1420], ["2011", 1663], ["2012", 1444], ["2013", 1331], ["2014", 1711], ["2015", 1900]],
                        color: "#3c8dbc"
                    };
                    $.plot("#bar-chart", [bar_data], {
                        grid: {
                            borderWidth: 1,
                            borderColor: "#f3f3f3",
                            tickColor: "#f3f3f3"
                        },
                        series: {
                            bars: {
                                show: true,
                                barWidth: 0.5,
                                align: "center"
                            }
                        },
                        xaxis: {
                            mode: "categories",
                            tickLength: 0
                        }
                    });
                    /* END BAR CHART */

                    /*
                     * DONUT CHART
                     * -----------
                     */

                    var donutData = [
                        {label: "PAUD", data: 15, color: "#3c8dbc"},
                        {label: "TK", data: 8, color: "#3c8dbc"},
                        {label: "SD", data: 20, color: "#00c0ef"},
                        {label: "SMP", data: 27, color: "#3cffbc"},
                        {label: "SMA", data: 20, color: "#0gt3b7"},
                        {label: "PT", data: 10, color: "#0ge0ef"}
                    ];
                    $.plot("#donut-chart", donutData, {
                        series: {
                            pie: {
                                show: true,
                                radius: 1,
                                innerRadius: 0.5,
                                label: {
                                    show: true,
                                    radius: 2 / 3,
                                    formatter: labelFormatter,
                                    threshold: 0.1
                                }

                            }
                        },
                        legend: {
                            show: false
                        }
                    });
                    /*
                     * END DONUT CHART
                     */

                });

                /*
                 * Custom Label formatter
                 * ----------------------
                 */
                function labelFormatter(label, series) {
                    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                            + label
                            + "<br>"
                            + Math.round(series.percent) + "%</div>";
                }
            </script>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Jenis Program Bantuan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div id="chartdiv4" style="width: 1050px; height: 400px; overflow: hidden; text-align: left;">
                    <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1050px; height: 352px; padding: 0px;"
                             class="amcharts-chart-div">
                            <svg version="1.1"
                                 style="position: absolute; width: 1050px; height: 352px; top: -0.100006px; left: 0px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g>
                                    <path cs="100,100" d="M0.5,0.5 L1049.5,0.5 L1049.5,351.5 L0.5,351.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0"></path>
                                    <path cs="100,100" d="M0.5,0.5 L962.5,0.5 L962.5,295.5 L0.5,295.5 L0.5,0.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(67,20)"></path>
                                </g>
                                <g>
                                    <g transform="translate(67,20)">
                                        <g>
                                            <path cs="100,100" d="M96.5,0.5 L96.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L0.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M289.5,0.5 L289.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M193.5,295.5 L193.5,295.5 L193.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M481.5,0.5 L481.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M385.5,295.5 L385.5,295.5 L385.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M673.5,0.5 L673.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M577.5,295.5 L577.5,295.5 L577.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M866.5,0.5 L866.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M770.5,295.5 L770.5,295.5 L770.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M962.5,295.5 L962.5,295.5 L962.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(67,20)" visibility="visible">
                                        <g>
                                            <path cs="100,100" d="M0.5,295.5 L6.5,295.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L962.5,295.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,253.5 L6.5,253.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,253.5 L0.5,253.5 L962.5,253.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,211.5 L6.5,211.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,211.5 L0.5,211.5 L962.5,211.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,169.5 L6.5,169.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,169.5 L0.5,169.5 L962.5,169.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,126.5 L6.5,126.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,126.5 L0.5,126.5 L962.5,126.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,84.5 L6.5,84.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,84.5 L0.5,84.5 L962.5,84.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,42.5 L6.5,42.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,42.5 L0.5,42.5 L962.5,42.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none" stroke-width="0"
                                                  stroke-opacity="0.3" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,0.5 L962.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.1" stroke="#000000"></path>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(67,20)">
                                        <g>
                                            <g transform="translate(19,295)" visibility="visible"
                                               aria-label="Program KIP 33">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-277.5 L154.5,-277.5 L154.5,0.5 L0.5,0.5 Z"
                                                      fill="#67b7dc" stroke="#67b7dc" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(212,295)" visibility="visible"
                                               aria-label="Program KIS 22">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-184.5 L154.5,-184.5 L154.5,0.5 L0.5,0.5 Z"
                                                      fill="#67b7dc" stroke="#67b7dc" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(404,295)" visibility="visible"
                                               aria-label="Program PKH 23">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-193.5 L154.5,-193.5 L154.5,0.5 L0.5,0.5 Z"
                                                      fill="#67b7dc" stroke="#67b7dc" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(596,295)" visibility="visible"
                                               aria-label="Program KKS 3">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-24.5 L154.5,-24.5 L154.5,0.5 L0.5,0.5 Z"
                                                      fill="#67b7dc" stroke="#67b7dc" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(789,295)" visibility="visible"
                                               aria-label="Program RASKIN 2">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-16.5 L154.5,-16.5 L154.5,0.5 L0.5,0.5 Z"
                                                      fill="#67b7dc" stroke="#67b7dc" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g>
                                    <path cs="100,100" d="M0.5,295.5 L962.5,295.5 L962.5,295.5" fill="none"
                                          stroke-width="1" stroke-opacity="0.2" stroke="#000000"
                                          transform="translate(67,20)"></path>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L962.5,0.5" fill="none" stroke-width="1"
                                              stroke-opacity="0.3" stroke="#000000"
                                              transform="translate(67,315)"></path>
                                    </g>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L0.5,295.5" fill="none" stroke-width="1"
                                              stroke-opacity="0.3" stroke="#000000" transform="translate(67,20)"
                                              visibility="visible"></path>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(67,20)"></g>
                                </g>
                                <g>
                                    <g></g>
                                </g>
                                <g>
                                    <g transform="translate(67,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(96.2,312.5)">
                                            <tspan y="6" x="0">KIP</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(289.2,312.5)">
                                            <tspan y="6" x="0">KIS</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(481.2,312.5)">
                                            <tspan y="6" x="0">PKH</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(673.2,312.5)">
                                            <tspan y="6" x="0">KKS</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(866.2,312.5)">
                                            <tspan y="6" x="0">RASKIN</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(67,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,293)">
                                            <tspan y="6" x="0">0</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,251)">
                                            <tspan y="6" x="0">5</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,209)">
                                            <tspan y="6" x="0">10</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,167)">
                                            <tspan y="6" x="0">15</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,124)">
                                            <tspan y="6" x="0">20</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,82)">
                                            <tspan y="6" x="0">25</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,40)">
                                            <tspan y="6" x="0">30</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,-2)">
                                            <tspan y="6" x="0">35</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="12px" opacity="1"
                                              font-weight="bold" text-anchor="middle"
                                              transform="translate(-45,148) rotate(-90)">
                                            <tspan y="6" x="0">Persen (%)</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g></g>
                                <g transform="translate(67,20)"></g>
                                <g></g>
                                <g></g>
                            </svg>
                            <a href="http://www.amcharts.com/javascript-charts/" title="JavaScript charts"
                               style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 72px; top: 25px;"></a>
                        </div>
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1050px; height: 48px;"
                             class="amChartsLegend amcharts-legend-div">
                            <svg version="1.1" style="position: absolute; width: 1050px; height: 48px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g transform="translate(67,0)">
                                    <path cs="100,100" d="M0.5,0.5 L962.5,0.5 L962.5,37.5 L0.5,37.5 Z" fill="#FFFFFF"
                                          stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path>
                                    <g transform="translate(0,11)">
                                        <g cursor="pointer" aria-label="Program" transform="translate(0,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#67b7dc" stroke="#67b7dc" fill-opacity="0.8" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Program</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(144,7)"></text>
                                            <rect x="32" y="0" width="112" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Jumlah Penduduk Miskin Berdasarkan Status Kesejahteraan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div id="chartdiv5"
                     style="width: 100%; height: 400px; background-color: rgb(255, 255, 255); overflow: hidden; text-align: left;">
                    <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 352px; padding: 0px; touch-action: auto;"
                             class="amcharts-chart-div">
                            <svg version="1.1"
                                 style="position: absolute; width: 1643px; height: 352px; top: 0.400024px; left: 0px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g>
                                    <path cs="100,100" d="M0.5,0.5 L1642.5,0.5 L1642.5,351.5 L0.5,351.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0"></path>
                                    <path cs="100,100" d="M0.5,0.5 L1296.5,0.5 L1296.5,160.5 L0.5,160.5 L0.5,0.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(326,20)"></path>
                                    <path cs="100,100" d="M0.5,0.5 L234.5,-134.5 L1530.5,-134.5 L1296.5,0.5 L0.5,0.5 Z"
                                          fill="#d9d9d9" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(92,315)"></path>
                                    <path cs="100,100" d="M0.5,0.5 L0.5,160.5 L234.5,25.5 L234.5,-134.5 L0.5,0.5 Z"
                                          fill="#d9d9d9" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(92,155)"></path>
                                </g>
                                <g>
                                    <g transform="translate(92,155)">
                                        <g>
                                            <path cs="100,100" d="M324.5,0.5 L324.5,5.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,160)"></path>
                                            <path cs="100,100" d="M0.5,160.5 L234.5,25.5 L234.5,-134.5" fill="none"
                                                  stroke-width="1" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M972.5,0.5 L972.5,5.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,160)"></path>
                                            <path cs="100,100" d="M648.5,160.5 L882.5,25.5 L882.5,-134.5" fill="none"
                                                  stroke-width="1" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1296.5,160.5 L1530.5,25.5 L1530.5,-134.5" fill="none"
                                                  stroke-width="1" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(92,155)" visibility="visible">
                                        <g>
                                            <path cs="100,100" d="M0.5,160.5 L6.5,160.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,160.5 L234.5,25.5 L1530.5,25.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,120.5 L6.5,120.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,120.5 L234.5,-14.5 L1530.5,-14.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,80.5 L6.5,80.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,80.5 L234.5,-54.5 L1530.5,-54.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,40.5 L6.5,40.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,40.5 L234.5,-94.5 L1530.5,-94.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,0.5 L234.5,-134.5 L1530.5,-134.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,155)">
                                        <g transform="translate(467,59)" visibility="visible"
                                           aria-label="Desil 4 Rumah Tangga 2,242" tabindex="0">
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#0a72a6" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#0D8ECF"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-8.5 L65.5,-8.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#0a72a6" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0" transform="translate(59,-34)"></path>
                                            <path cs="100,100" d="M59.5,-33.5 L59.5,-42.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#0D8ECF"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-8.5 L59.5,-42.5 L59.5,-33.5 L0.5,0.5 Z"
                                                  fill="#0a72a6" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100"
                                                  d="M65.5,0.5 L65.5,-8.5 L124.5,-42.5 L124.5,-33.5 L65.5,0.5 Z"
                                                  fill="#0a72a6" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M65.5,0.5 L124.5,-33.5 L124.5,-42.5 L65.5,-8.5"
                                                  fill="none" stroke-width="1" stroke-opacity="1"
                                                  stroke="#0D8ECF"></path>
                                            <path cs="100,100"
                                                  d="M0.5,-8.5 L59.5,-42.5 L124.5,-42.5 L65.5,-8.5 L0.5,-8.5 Z"
                                                  fill="#10aaf8" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,-8.5 L59.5,-42.5 L124.5,-42.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#0D8ECF"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-8.5 L65.5,-8.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#0D8ECF" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1"></path>
                                        </g>
                                        <g transform="translate(409,93)" visibility="visible"
                                           aria-label="Desil 3 Rumah Tangga 3,557" tabindex="0">
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#8db207" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#B0DE09"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-13.5 L65.5,-13.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#8db207" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0" transform="translate(59,-34)"></path>
                                            <path cs="100,100" d="M59.5,-33.5 L59.5,-47.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#B0DE09"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-13.5 L59.5,-47.5 L59.5,-33.5 L0.5,0.5 Z"
                                                  fill="#8db207" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100"
                                                  d="M65.5,0.5 L65.5,-13.5 L124.5,-47.5 L124.5,-33.5 L65.5,0.5 Z"
                                                  fill="#8db207" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M65.5,0.5 L124.5,-33.5 L124.5,-47.5 L65.5,-13.5"
                                                  fill="none" stroke-width="1" stroke-opacity="1"
                                                  stroke="#B0DE09"></path>
                                            <path cs="100,100"
                                                  d="M0.5,-13.5 L59.5,-47.5 L124.5,-47.5 L65.5,-13.5 L0.5,-13.5 Z"
                                                  fill="#d3ff0b" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,-13.5 L59.5,-47.5 L124.5,-47.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#B0DE09"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-13.5 L65.5,-13.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1"></path>
                                        </g>
                                        <g transform="translate(1115,59)" visibility="visible"
                                           aria-label="Desil 4 Individu 5,851" tabindex="0">
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#0a72a6" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#0D8ECF"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-22.5 L65.5,-22.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#0a72a6" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0" transform="translate(59,-34)"></path>
                                            <path cs="100,100" d="M59.5,-33.5 L59.5,-56.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#0D8ECF"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-22.5 L59.5,-56.5 L59.5,-33.5 L0.5,0.5 Z"
                                                  fill="#0a72a6" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100"
                                                  d="M65.5,0.5 L65.5,-22.5 L124.5,-56.5 L124.5,-33.5 L65.5,0.5 Z"
                                                  fill="#0a72a6" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M65.5,0.5 L124.5,-33.5 L124.5,-56.5 L65.5,-22.5"
                                                  fill="none" stroke-width="1" stroke-opacity="1"
                                                  stroke="#0D8ECF"></path>
                                            <path cs="100,100"
                                                  d="M0.5,-22.5 L59.5,-56.5 L124.5,-56.5 L65.5,-22.5 L0.5,-22.5 Z"
                                                  fill="#10aaf8" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,-22.5 L59.5,-56.5 L124.5,-56.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#0D8ECF"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-22.5 L65.5,-22.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#0D8ECF" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1"></path>
                                        </g>
                                        <g transform="translate(350,126)" visibility="visible"
                                           aria-label="Desil 2 Rumah Tangga 4,795">
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#caa802" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#FCD202"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-18.5 L65.5,-18.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#caa802" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0" transform="translate(59,-34)"></path>
                                            <path cs="100,100" d="M59.5,-33.5 L59.5,-52.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#FCD202"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-18.5 L59.5,-52.5 L59.5,-33.5 L0.5,0.5 Z"
                                                  fill="#caa802" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100"
                                                  d="M65.5,0.5 L65.5,-18.5 L124.5,-52.5 L124.5,-33.5 L65.5,0.5 Z"
                                                  fill="#caa802" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M65.5,0.5 L124.5,-33.5 L124.5,-52.5 L65.5,-18.5"
                                                  fill="none" stroke-width="1" stroke-opacity="1"
                                                  stroke="#FCD202"></path>
                                            <path cs="100,100"
                                                  d="M0.5,-18.5 L59.5,-52.5 L124.5,-52.5 L65.5,-18.5 L0.5,-18.5 Z"
                                                  fill="#fffc02" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,-18.5 L59.5,-52.5 L124.5,-52.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#FCD202"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-18.5 L65.5,-18.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1"></path>
                                        </g>
                                        <g transform="translate(292,160)" visibility="visible"
                                           aria-label="Desil 1 Rumah Tangga 10,095">
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#cc5200" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#FF6600"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-39.5 L65.5,-39.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#cc5200" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0" transform="translate(59,-34)"></path>
                                            <path cs="100,100" d="M59.5,-33.5 L59.5,-73.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#FF6600"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-39.5 L59.5,-73.5 L59.5,-33.5 L0.5,0.5 Z"
                                                  fill="#cc5200" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100"
                                                  d="M65.5,0.5 L65.5,-39.5 L124.5,-73.5 L124.5,-33.5 L65.5,0.5 Z"
                                                  fill="#cc5200" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M65.5,0.5 L124.5,-33.5 L124.5,-73.5 L65.5,-39.5"
                                                  fill="none" stroke-width="1" stroke-opacity="1"
                                                  stroke="#FF6600"></path>
                                            <path cs="100,100"
                                                  d="M0.5,-39.5 L59.5,-73.5 L124.5,-73.5 L65.5,-39.5 L0.5,-39.5 Z"
                                                  fill="#ff7a00" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,-39.5 L59.5,-73.5 L124.5,-73.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#FF6600"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-39.5 L65.5,-39.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1"></path>
                                        </g>
                                        <g transform="translate(1057,93)" visibility="visible"
                                           aria-label="Desil 3 Individu 8,804" tabindex="0">
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#8db207" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#B0DE09"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-34.5 L65.5,-34.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#8db207" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0" transform="translate(59,-34)"></path>
                                            <path cs="100,100" d="M59.5,-33.5 L59.5,-68.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#B0DE09"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-34.5 L59.5,-68.5 L59.5,-33.5 L0.5,0.5 Z"
                                                  fill="#8db207" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100"
                                                  d="M65.5,0.5 L65.5,-34.5 L124.5,-68.5 L124.5,-33.5 L65.5,0.5 Z"
                                                  fill="#8db207" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M65.5,0.5 L124.5,-33.5 L124.5,-68.5 L65.5,-34.5"
                                                  fill="none" stroke-width="1" stroke-opacity="1"
                                                  stroke="#B0DE09"></path>
                                            <path cs="100,100"
                                                  d="M0.5,-34.5 L59.5,-68.5 L124.5,-68.5 L65.5,-34.5 L0.5,-34.5 Z"
                                                  fill="#d3ff0b" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,-34.5 L59.5,-68.5 L124.5,-68.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#B0DE09"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-34.5 L65.5,-34.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1"></path>
                                        </g>
                                        <g transform="translate(998,126)" visibility="visible"
                                           aria-label="Desil 2 Individu 13,519">
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#caa802" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#FCD202"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-53.5 L65.5,-53.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#caa802" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0" transform="translate(59,-34)"></path>
                                            <path cs="100,100" d="M59.5,-33.5 L59.5,-87.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#FCD202"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-53.5 L59.5,-87.5 L59.5,-33.5 L0.5,0.5 Z"
                                                  fill="#caa802" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100"
                                                  d="M65.5,0.5 L65.5,-53.5 L124.5,-87.5 L124.5,-33.5 L65.5,0.5 Z"
                                                  fill="#caa802" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M65.5,0.5 L124.5,-33.5 L124.5,-87.5 L65.5,-53.5"
                                                  fill="none" stroke-width="1" stroke-opacity="1"
                                                  stroke="#FCD202"></path>
                                            <path cs="100,100"
                                                  d="M0.5,-53.5 L59.5,-87.5 L124.5,-87.5 L65.5,-53.5 L0.5,-53.5 Z"
                                                  fill="#fffc02" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,-53.5 L59.5,-87.5 L124.5,-87.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#FCD202"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,-53.5 L65.5,-53.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1"></path>
                                        </g>
                                        <g transform="translate(940,160)" visibility="visible"
                                           aria-label="Desil 1 Individu 38,202">
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#cc5200" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,0.5 L59.5,-33.5 L124.5,-33.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#FF6600"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-152.5 L65.5,-152.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#cc5200" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0" transform="translate(59,-34)"></path>
                                            <path cs="100,100" d="M59.5,-33.5 L59.5,-186.5" fill="none" stroke-width="1"
                                                  stroke-opacity="1" stroke="#FF6600"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-152.5 L59.5,-186.5 L59.5,-33.5 L0.5,0.5 Z"
                                                  fill="#cc5200" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100"
                                                  d="M65.5,0.5 L65.5,-152.5 L124.5,-186.5 L124.5,-33.5 L65.5,0.5 Z"
                                                  fill="#cc5200" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M65.5,0.5 L124.5,-33.5 L124.5,-186.5 L65.5,-152.5"
                                                  fill="none" stroke-width="1" stroke-opacity="1"
                                                  stroke="#FF6600"></path>
                                            <path cs="100,100"
                                                  d="M0.5,-152.5 L59.5,-186.5 L124.5,-186.5 L65.5,-152.5 L0.5,-152.5 Z"
                                                  fill="#ff7a00" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="0"></path>
                                            <path cs="100,100" d="M0.5,-152.5 L59.5,-186.5 L124.5,-186.5" fill="none"
                                                  stroke-width="1" stroke-opacity="1" stroke="#FF6600"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L0.5,-152.5 L65.5,-152.5 L65.5,0.5 L0.5,0.5 Z"
                                                  fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1"></path>
                                        </g>
                                    </g>
                                </g>
                                <g>
                                    <g transform="translate(92,155)">
                                        <g></g>
                                    </g>
                                    <g transform="translate(92,155)">
                                        <g></g>
                                    </g>
                                    <g transform="translate(92,155)">
                                        <g></g>
                                    </g>
                                    <g transform="translate(92,155)">
                                        <g></g>
                                    </g>
                                </g>
                                <g></g>
                                <g>
                                    <path cs="100,100" d="M0.5,160.5 L1296.5,160.5 L1530.5,25.5" fill="none"
                                          stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                          transform="translate(92,155)"></path>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L1296.5,0.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,315)"></path>
                                    </g>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L0.5,160.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,155)"
                                              visibility="visible"></path>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,155)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(324,108)">
                                            <tspan y="6" x="0">10,095</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,155)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(383,96)">
                                            <tspan y="6" x="0">4,795</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1031,61)">
                                            <tspan y="6" x="0">13,519</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,155)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(441,67)">
                                            <tspan y="6" x="0">3,557</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1089,46)">
                                            <tspan y="6" x="0">8,804</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,155)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(500,38)">
                                            <tspan y="6" x="0">2,242</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1148,24)">
                                            <tspan y="6" x="0">5,851</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g>
                                    <g></g>
                                </g>
                                <g>
                                    <g transform="translate(92,155)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(324,177.5)">
                                            <tspan y="6" x="0">Rumah Tangga</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(972,177.5)">
                                            <tspan y="6" x="0">Individu</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,155)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,158)">
                                            <tspan y="6" x="0">0</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,118)">
                                            <tspan y="6" x="0">10,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,78)">
                                            <tspan y="6" x="0">20,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,38)">
                                            <tspan y="6" x="0">30,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,-2)">
                                            <tspan y="6" x="0">40,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="12px" opacity="1"
                                              font-weight="bold" text-anchor="middle"
                                              transform="translate(-70,80) rotate(-90)">
                                            <tspan y="6" x="0">Jumlah Penduduk Miskin</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g></g>
                                <g transform="translate(92,155)"></g>
                                <g></g>
                                <g></g>
                            </svg>
                            <a href="http://www.amcharts.com/javascript-charts/" title="JavaScript charts"
                               style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 97px; top: 160px;"></a>
                        </div>
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 48px;"
                             class="amChartsLegend amcharts-legend-div">
                            <svg version="1.1" style="position: absolute; width: 1643px; height: 48px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g transform="translate(92,0)">
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,37.5 L0.5,37.5 Z" fill="#FFFFFF"
                                          stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path>
                                    <g transform="translate(0,11)">
                                        <g cursor="pointer" aria-label="Desil 1" transform="translate(0,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Desil 1</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(134,7)"></text>
                                            <rect x="32" y="0" width="102" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Desil 2" transform="translate(151,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Desil 2</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(134,7)"></text>
                                            <rect x="32" y="0" width="102" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Desil 3" transform="translate(301,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Desil 3</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(134,7)"></text>
                                            <rect x="32" y="0" width="102" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Desil 4" transform="translate(452,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#0D8ECF" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Desil 4</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(134,7)"></text>
                                            <rect x="32" y="0" width="102" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Penduduk Miskin Berdasarkan Klasifikasi Usia</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div id="chartdiv6"
                     style="width: 100%; height: 400px; background-color: rgb(255, 255, 255); overflow: hidden; text-align: left;">
                    <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 352px; padding: 0px; touch-action: auto;"
                             class="amcharts-chart-div">
                            <svg version="1.1"
                                 style="position: absolute; width: 1643px; height: 352px; top: -0.0999756px; left: 0px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g>
                                    <path cs="100,100" d="M0.5,0.5 L1642.5,0.5 L1642.5,351.5 L0.5,351.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0"></path>
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,295.5 L0.5,295.5 L0.5,0.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(92,20)"></path>
                                </g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <path cs="100,100" d="M153.5,0.5 L153.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L0.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M459.5,0.5 L459.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M306.5,295.5 L306.5,295.5 L306.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M765.5,0.5 L765.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M612.5,295.5 L612.5,295.5 L612.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1071.5,0.5 L1071.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M918.5,295.5 L918.5,295.5 L918.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1377.5,0.5 L1377.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M1224.5,295.5 L1224.5,295.5 L1224.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1530.5,295.5 L1530.5,295.5 L1530.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <g>
                                            <path cs="100,100" d="M0.5,295.5 L6.5,295.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L1530.5,295.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,253.5 L6.5,253.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,253.5 L0.5,253.5 L1530.5,253.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,211.5 L6.5,211.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,211.5 L0.5,211.5 L1530.5,211.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,169.5 L6.5,169.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,169.5 L0.5,169.5 L1530.5,169.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,126.5 L6.5,126.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,126.5 L0.5,126.5 L1530.5,126.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,84.5 L6.5,84.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,84.5 L0.5,84.5 L1530.5,84.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,42.5 L6.5,42.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,42.5 L0.5,42.5 L1530.5,42.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,0.5 L1530.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(31,295)" visibility="visible"
                                               aria-label="Perempuan Usia bawah 6 thn 3,961">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-32.5 L78.5,-32.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(337,295)" visibility="visible"
                                               aria-label="Perempuan Usia 6 - 14 tahun 6,496">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-54.5 L78.5,-54.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(643,295)" visibility="visible"
                                               aria-label="Perempuan Usia 15 - 44 tahun 16,395">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-137.5 L78.5,-137.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(949,295)" visibility="visible"
                                               aria-label="Perempuan Usia 45 - 59 tahun 5,029">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-41.5 L78.5,-41.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1255,295)" visibility="visible"
                                               aria-label="Perempuan Usia 60  tahun keatas 3,041">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-25.5 L78.5,-25.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(114,295)" visibility="visible"
                                               aria-label="Laki laki Usia bawah 6 thn 4,146">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-34.5 L78.5,-34.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(420,295)" visibility="visible"
                                               aria-label="Laki laki Usia 6 - 14 tahun 6,950">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-58.5 L78.5,-58.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(726,295)" visibility="visible"
                                               aria-label="Laki laki Usia 15 - 44 tahun 14,062">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-118.5 L78.5,-118.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1032,295)" visibility="visible"
                                               aria-label="Laki laki Usia 45 - 59 tahun 3,970">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-32.5 L78.5,-32.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1338,295)" visibility="visible"
                                               aria-label="Laki laki Usia 60  tahun keatas 2,310">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-18.5 L78.5,-18.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(197,295)" visibility="visible"
                                               aria-label="Total P + L Usia bawah 6 thn 8,107">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-67.5 L78.5,-67.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(503,295)" visibility="visible"
                                               aria-label="Total P + L Usia 6 - 14 tahun 13,446">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-112.5 L78.5,-112.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(809,295)" visibility="visible"
                                               aria-label="Total P + L Usia 15 - 44 tahun 30,457">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-256.5 L78.5,-256.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1115,295)" visibility="visible"
                                               aria-label="Total P + L Usia 45 - 59 tahun 8,999">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-75.5 L78.5,-75.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1421,295)" visibility="visible"
                                               aria-label="Total P + L Usia 60  tahun keatas 5,351">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-44.5 L78.5,-44.5 L78.5,0.5 L0.5,0.5 Z"
                                                      fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g>
                                    <path cs="100,100" d="M0.5,295.5 L1530.5,295.5 L1530.5,295.5" fill="none"
                                          stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                          transform="translate(92,20)"></path>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L1530.5,0.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,315)"></path>
                                    </g>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L0.5,295.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,20)"
                                              visibility="visible"></path>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(70,250)">
                                            <tspan y="6" x="0">3,961</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(376,229)">
                                            <tspan y="6" x="0">6,496</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(682,145)">
                                            <tspan y="6" x="0">16,395</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(988,241)">
                                            <tspan y="6" x="0">5,029</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1294,258)">
                                            <tspan y="6" x="0">3,041</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(153,249)">
                                            <tspan y="6" x="0">4,146</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(459,225)">
                                            <tspan y="6" x="0">6,950</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(765,165)">
                                            <tspan y="6" x="0">14,062</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1071,250)">
                                            <tspan y="6" x="0">3,970</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1377,264)">
                                            <tspan y="6" x="0">2,310</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(236,215)">
                                            <tspan y="6" x="0">8,107</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(542,170)">
                                            <tspan y="6" x="0">13,446</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(848,27)">
                                            <tspan y="6" x="0">30,457</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1154,208)">
                                            <tspan y="6" x="0">8,999</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1460,238)">
                                            <tspan y="6" x="0">5,351</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g>
                                    <g></g>
                                </g>
                                <g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(153,312.5)">
                                            <tspan y="6" x="0">Usia bawah 6 thn</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(459,312.5)">
                                            <tspan y="6" x="0">Usia 6 - 14 tahun</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(765,312.5)">
                                            <tspan y="6" x="0">Usia 15 - 44 tahun</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(1071,312.5)">
                                            <tspan y="6" x="0">Usia 45 - 59 tahun</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(1377,312.5)">
                                            <tspan y="6" x="0">Usia 60 tahun keatas</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,293)">
                                            <tspan y="6" x="0">0</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,251)">
                                            <tspan y="6" x="0">5,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,209)">
                                            <tspan y="6" x="0">10,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,167)">
                                            <tspan y="6" x="0">15,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,124)">
                                            <tspan y="6" x="0">20,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,82)">
                                            <tspan y="6" x="0">25,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,40)">
                                            <tspan y="6" x="0">30,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,-2)">
                                            <tspan y="6" x="0">35,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="12px" opacity="1"
                                              font-weight="bold" text-anchor="middle"
                                              transform="translate(-70,148) rotate(-90)">
                                            <tspan y="6" x="0">Jumlah Individu</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g></g>
                                <g transform="translate(92,20)"></g>
                                <g></g>
                                <g></g>
                            </svg>
                            <a href="http://www.amcharts.com/javascript-charts/" title="JavaScript charts"
                               style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 97px; top: 25px;"></a>
                        </div>
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 48px;"
                             class="amChartsLegend amcharts-legend-div">
                            <svg version="1.1" style="position: absolute; width: 1643px; height: 48px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g transform="translate(92,0)">
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,37.5 L0.5,37.5 Z" fill="#FFFFFF"
                                          stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path>
                                    <g transform="translate(0,11)">
                                        <g cursor="pointer" aria-label="Perempuan" transform="translate(0,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Perempuan</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(160,7)"></text>
                                            <rect x="32" y="0" width="128" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Laki laki" transform="translate(177,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Laki laki</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(160,7)"></text>
                                            <rect x="32" y="0" width="128" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Total P + L" transform="translate(353,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Total P + L</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(160,7)"></text>
                                            <rect x="32" y="0" width="128" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Penduduk Miskin Yang Mengalami Kecacatan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div id="chartdiv7"
                     style="width: 100%; height: 400px; background-color: rgb(255, 255, 255); overflow: hidden; text-align: left;">
                    <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 352px; padding: 0px; touch-action: auto;"
                             class="amcharts-chart-div">
                            <svg version="1.1"
                                 style="position: absolute; width: 1643px; height: 352px; top: 0.400024px; left: 0px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g>
                                    <path cs="100,100" d="M0.5,0.5 L1642.5,0.5 L1642.5,351.5 L0.5,351.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0"></path>
                                    <path cs="100,100" d="M0.5,0.5 L1548.5,0.5 L1548.5,295.5 L0.5,295.5 L0.5,0.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(74,20)"></path>
                                </g>
                                <g>
                                    <g transform="translate(74,20)">
                                        <g>
                                            <path cs="100,100" d="M195.5,0.5 L195.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M1.5,295.5 L1.5,295.5 L1.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M582.5,0.5 L582.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M388.5,295.5 L388.5,295.5 L388.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M969.5,0.5 L969.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M775.5,295.5 L775.5,295.5 L775.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1356.5,0.5 L1356.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M1162.5,295.5 L1162.5,295.5 L1162.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1549.5,295.5 L1549.5,295.5 L1549.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(74,20)" visibility="visible">
                                        <g>
                                            <path cs="100,100" d="M0.5,295.5 L6.5,295.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L1548.5,295.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,236.5 L6.5,236.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,236.5 L0.5,236.5 L1548.5,236.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,177.5 L6.5,177.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,177.5 L0.5,177.5 L1548.5,177.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,118.5 L6.5,118.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,118.5 L0.5,118.5 L1548.5,118.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,59.5 L6.5,59.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,59.5 L0.5,59.5 L1548.5,59.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,0.5 L1548.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(74,20)">
                                        <g>
                                            <g transform="translate(39,295)" visibility="visible"
                                               aria-label="Perempuan Usia di bawah 15 tahun 33">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-38.5 L152.5,-38.5 L152.5,0.5 L0.5,0.5 Z"
                                                      fill="#0000b7" stroke="#0000b7" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(426,295)" visibility="visible"
                                               aria-label="Perempuan Usia 15 - 44 tahun 142">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-167.5 L152.5,-167.5 L152.5,0.5 L0.5,0.5 Z"
                                                      fill="#0000b7" stroke="#0000b7" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(813,295)" visibility="visible"
                                               aria-label="Perempuan Usia 45 - 59 tahun 85">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-99.5 L152.5,-99.5 L152.5,0.5 L0.5,0.5 Z"
                                                      fill="#0000b7" stroke="#0000b7" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1200,295)" visibility="visible"
                                               aria-label="Perempuan Usia 60 tahun keatas 129">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-151.5 L152.5,-151.5 L152.5,0.5 L0.5,0.5 Z"
                                                      fill="#0000b7" stroke="#0000b7" fill-opacity="0.8"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <g transform="translate(74,20)">
                                        <g>
                                            <g transform="translate(197,295)" visibility="visible"
                                               aria-label="Laki laki Usia di bawah 15 tahun 50">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-58.5 L152.5,-58.5 L152.5,0.5 L0.5,0.5 Z"
                                                      fill="#90c8ff" stroke="#90c8ff" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(584,295)" visibility="visible"
                                               aria-label="Laki laki Usia 15 - 44 tahun 192">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-226.5 L152.5,-226.5 L152.5,0.5 L0.5,0.5 Z"
                                                      fill="#90c8ff" stroke="#90c8ff" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(971,295)" visibility="visible"
                                               aria-label="Laki laki Usia 45 - 59 tahun 69">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-80.5 L152.5,-80.5 L152.5,0.5 L0.5,0.5 Z"
                                                      fill="#90c8ff" stroke="#90c8ff" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1358,295)" visibility="visible"
                                               aria-label="Laki laki Usia 60 tahun keatas 87">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-102.5 L152.5,-102.5 L152.5,0.5 L0.5,0.5 Z"
                                                      fill="#90c8ff" stroke="#90c8ff" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g>
                                    <path cs="100,100" d="M0.5,295.5 L1548.5,295.5 L1548.5,295.5" fill="none"
                                          stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                          transform="translate(74,20)"></path>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L1548.5,0.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(74,315)"></path>
                                    </g>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L0.5,295.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(74,20)"
                                              visibility="visible"></path>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(74,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(115,245)">
                                            <tspan y="6" x="0">33</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(502,116)">
                                            <tspan y="6" x="0">142</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(889,183)">
                                            <tspan y="6" x="0">85</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1276,131)">
                                            <tspan y="6" x="0">129</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(74,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(273,225)">
                                            <tspan y="6" x="0">50</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(660,57)">
                                            <tspan y="6" x="0">192</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1047,202)">
                                            <tspan y="6" x="0">69</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1434,181)">
                                            <tspan y="6" x="0">87</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g>
                                    <g></g>
                                </g>
                                <g>
                                    <g transform="translate(74,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(194.5,312.5)">
                                            <tspan y="6" x="0">Usia di bawah 15 tahun</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(581.5,312.5)">
                                            <tspan y="6" x="0">Usia 15 - 44 tahun</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(968.5,312.5)">
                                            <tspan y="6" x="0">Usia 45 - 59 tahun</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(1355.5,312.5)">
                                            <tspan y="6" x="0">Usia 60 tahun keatas</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(74,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,293)">
                                            <tspan y="6" x="0">0</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,234)">
                                            <tspan y="6" x="0">50</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,175)">
                                            <tspan y="6" x="0">100</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,116)">
                                            <tspan y="6" x="0">150</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,57)">
                                            <tspan y="6" x="0">200</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,-2)">
                                            <tspan y="6" x="0">250</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="12px" opacity="1"
                                              font-weight="bold" text-anchor="middle"
                                              transform="translate(-52,148) rotate(-90)">
                                            <tspan y="6" x="0">Jumlah Individu</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g></g>
                                <g transform="translate(74,20)"></g>
                                <g></g>
                                <g></g>
                            </svg>
                            <a href="http://www.amcharts.com/javascript-charts/" title="JavaScript charts"
                               style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 79px; top: 25px;"></a>
                        </div>
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 48px;"
                             class="amChartsLegend amcharts-legend-div">
                            <svg version="1.1" style="position: absolute; width: 1643px; height: 48px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g transform="translate(74,0)">
                                    <path cs="100,100" d="M0.5,0.5 L1548.5,0.5 L1548.5,37.5 L0.5,37.5 Z" fill="#FFFFFF"
                                          stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path>
                                    <g transform="translate(0,11)">
                                        <g cursor="pointer" aria-label="Perempuan" transform="translate(0,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#0000b7" stroke="#0000b7" fill-opacity="0.8" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Perempuan</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(160,7)"></text>
                                            <rect x="32" y="0" width="128" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Laki laki" transform="translate(177,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#90c8ff" stroke="#90c8ff" fill-opacity="0.7" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Laki laki</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(160,7)"></text>
                                            <rect x="32" y="0" width="128" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Penduduk Miskin Berdasarkan Pendidikan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div id="chartdiv8"
                     style="width: 100%; height: 400px; background-color: rgb(255, 255, 255); overflow: hidden; text-align: left;">
                    <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 352px; padding: 0px; touch-action: auto;"
                             class="amcharts-chart-div">
                            <svg version="1.1"
                                 style="position: absolute; width: 1643px; height: 352px; top: -0.100098px; left: 0px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g>
                                    <path cs="100,100" d="M0.5,0.5 L1642.5,0.5 L1642.5,351.5 L0.5,351.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0"></path>
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,295.5 L0.5,295.5 L0.5,0.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(92,20)"></path>
                                </g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <path cs="100,100" d="M384.5,0.5 L384.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M1.5,295.5 L1.5,295.5 L1.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1149.5,0.5 L1149.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M766.5,295.5 L766.5,295.5 L766.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1531.5,295.5 L1531.5,295.5 L1531.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <g>
                                            <path cs="100,100" d="M0.5,295.5 L6.5,295.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L1530.5,295.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,221.5 L6.5,221.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,221.5 L0.5,221.5 L1530.5,221.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,148.5 L6.5,148.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,148.5 L0.5,148.5 L1530.5,148.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,74.5 L6.5,74.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,74.5 L0.5,74.5 L1530.5,74.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,0.5 L1530.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(77,295)" visibility="visible"
                                               aria-label="Usia 7-12 tahun Jumlah Anak yang Bersekolah 9,823">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-144.5 L149.5,-144.5 L149.5,0.5 L0.5,0.5 Z"
                                                      fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(842,295)" visibility="visible"
                                               aria-label="Usia 7-12 tahun Jumlah Anak yang Tidak Bersekolah 787">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-11.5 L149.5,-11.5 L149.5,0.5 L0.5,0.5 Z"
                                                      fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(231,295)" visibility="visible"
                                               aria-label="Usia 13-15 tahun Jumlah Anak yang Bersekolah 3,793">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-55.5 L149.5,-55.5 L149.5,0.5 L0.5,0.5 Z"
                                                      fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(996,295)" visibility="visible"
                                               aria-label="Usia 13-15 tahun Jumlah Anak yang Tidak Bersekolah 595">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-8.5 L149.5,-8.5 L149.5,0.5 L0.5,0.5 Z"
                                                      fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(386,295)" visibility="visible"
                                               aria-label="Usia 16-18 tahun Jumlah Anak yang Bersekolah 2,001">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-29.5 L149.5,-29.5 L149.5,0.5 L0.5,0.5 Z"
                                                      fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1151,295)" visibility="visible"
                                               aria-label="Usia 16-18 tahun Jumlah Anak yang Tidak Bersekolah 1,468">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-21.5 L149.5,-21.5 L149.5,0.5 L0.5,0.5 Z"
                                                      fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(540,295)" visibility="visible"
                                               aria-label="Total Jumlah Anak yang Bersekolah 15,617">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-229.5 L149.5,-229.5 L149.5,0.5 L0.5,0.5 Z"
                                                      fill="#0D8ECF" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1305,295)" visibility="visible"
                                               aria-label="Total Jumlah Anak yang Tidak Bersekolah 2,850">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-41.5 L149.5,-41.5 L149.5,0.5 L0.5,0.5 Z"
                                                      fill="#0D8ECF" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                      stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g>
                                    <path cs="100,100" d="M0.5,295.5 L1530.5,295.5 L1530.5,295.5" fill="none"
                                          stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                          transform="translate(92,20)"></path>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L1530.5,0.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,315)"></path>
                                    </g>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L0.5,295.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,20)"
                                              visibility="visible"></path>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(152,139)">
                                            <tspan y="6" x="0">9,823</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(917,272)">
                                            <tspan y="6" x="0">787</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(306,228)">
                                            <tspan y="6" x="0">3,793</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1071,275)">
                                            <tspan y="6" x="0">595</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(460,254)">
                                            <tspan y="6" x="0">2,001</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1225,262)">
                                            <tspan y="6" x="0">1,468</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(614,53)">
                                            <tspan y="6" x="0">15,617</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1379,241)">
                                            <tspan y="6" x="0">2,850</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g>
                                    <g></g>
                                </g>
                                <g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(383.5,312.5)">
                                            <tspan y="6" x="0">Jumlah Anak yang Bersekolah</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(1148.5,312.5)">
                                            <tspan y="6" x="0">Jumlah Anak yang Tidak Bersekolah</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,293)">
                                            <tspan y="6" x="0">0</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,219)">
                                            <tspan y="6" x="0">5,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,146)">
                                            <tspan y="6" x="0">10,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,72)">
                                            <tspan y="6" x="0">15,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,-2)">
                                            <tspan y="6" x="0">20,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="12px" opacity="1"
                                              font-weight="bold" text-anchor="middle"
                                              transform="translate(-70,148) rotate(-90)">
                                            <tspan y="6" x="0">Jumlah Individu</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g></g>
                                <g transform="translate(92,20)"></g>
                                <g></g>
                                <g></g>
                            </svg>
                            <a href="http://www.amcharts.com/javascript-charts/" title="JavaScript charts"
                               style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 97px; top: 25px;"></a>
                        </div>
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 48px;"
                             class="amChartsLegend amcharts-legend-div">
                            <svg version="1.1" style="position: absolute; width: 1643px; height: 48px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g transform="translate(92,0)">
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,37.5 L0.5,37.5 Z" fill="#FFFFFF"
                                          stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path>
                                    <g transform="translate(0,11)">
                                        <g cursor="pointer" aria-label="Usia 7-12 tahun" transform="translate(0,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#FF6600" stroke="#FF6600" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Usia 7-12 tahun</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(192,7)"></text>
                                            <rect x="32" y="0" width="160" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Usia 13-15 tahun" transform="translate(209,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#FCD202" stroke="#FCD202" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Usia 13-15 tahun</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(192,7)"></text>
                                            <rect x="32" y="0" width="160" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Usia 16-18 tahun" transform="translate(417,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#B0DE09" stroke="#B0DE09" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Usia 16-18 tahun</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(192,7)"></text>
                                            <rect x="32" y="0" width="160" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                        <g cursor="pointer" aria-label="Total" transform="translate(626,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#0D8ECF" stroke="#0D8ECF" fill-opacity="1" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Total</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(192,7)"></text>
                                            <rect x="32" y="0" width="160" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Sumber Air Minum </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div id="chartdiv9"
                     style="width: 100%; height: 400px; background-color: rgb(255, 255, 255); overflow: hidden; text-align: left;">
                    <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 352px; padding: 0px; touch-action: auto;"
                             class="amcharts-chart-div">
                            <svg version="1.1"
                                 style="position: absolute; width: 1643px; height: 352px; top: 0.399902px; left: 0px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g>
                                    <path cs="100,100" d="M0.5,0.5 L1642.5,0.5 L1642.5,351.5 L0.5,351.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0"></path>
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,295.5 L0.5,295.5 L0.5,0.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(92,20)"></path>
                                </g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <path cs="100,100" d="M191.5,0.5 L191.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L0.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M574.5,0.5 L574.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M383.5,295.5 L383.5,295.5 L383.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M956.5,0.5 L956.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M765.5,295.5 L765.5,295.5 L765.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1339.5,0.5 L1339.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M1148.5,295.5 L1148.5,295.5 L1148.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1530.5,295.5 L1530.5,295.5 L1530.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <g>
                                            <path cs="100,100" d="M0.5,295.5 L6.5,295.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L1530.5,295.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,221.5 L6.5,221.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,221.5 L0.5,221.5 L1530.5,221.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,148.5 L6.5,148.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,148.5 L0.5,148.5 L1530.5,148.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,74.5 L6.5,74.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,74.5 L0.5,74.5 L1530.5,74.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,0.5 L1530.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(38,295)" visibility="visible"
                                               aria-label="Sumber Air Minum Air Kemasan 39">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-0.5 L306.5,-0.5 L306.5,0.5 L0.5,0.5 Z"
                                                      fill="#2cdb00" stroke="#2cdb00" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(421,295)" visibility="visible"
                                               aria-label="Sumber Air Minum Air Ledeng 1,116">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-15.5 L306.5,-15.5 L306.5,0.5 L0.5,0.5 Z"
                                                      fill="#2cdb00" stroke="#2cdb00" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(803,295)" visibility="visible"
                                               aria-label="Sumber Air Minum Sumber Terlindung 16,646">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-245.5 L306.5,-245.5 L306.5,0.5 L0.5,0.5 Z"
                                                      fill="#2cdb00" stroke="#2cdb00" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1186,295)" visibility="visible"
                                               aria-label="Sumber Air Minum Sumber Tidak Terlindung 2,888">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-42.5 L306.5,-42.5 L306.5,0.5 L0.5,0.5 Z"
                                                      fill="#2cdb00" stroke="#2cdb00" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g>
                                    <path cs="100,100" d="M0.5,295.5 L1530.5,295.5 L1530.5,295.5" fill="none"
                                          stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                          transform="translate(92,20)"></path>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L1530.5,0.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,315)"></path>
                                    </g>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L0.5,295.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,20)"
                                              visibility="visible"></path>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(191,283)">
                                            <tspan y="6" x="0">39</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(574,267)">
                                            <tspan y="6" x="0">1,116</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(956,38)">
                                            <tspan y="6" x="0">16,646</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1339,241)">
                                            <tspan y="6" x="0">2,888</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g>
                                    <g></g>
                                </g>
                                <g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(191.25,312.5)">
                                            <tspan y="6" x="0">Air Kemasan</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(574.25,312.5)">
                                            <tspan y="6" x="0">Air Ledeng</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(956.25,312.5)">
                                            <tspan y="6" x="0">Sumber Terlindung</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(1339.25,312.5)">
                                            <tspan y="6" x="0">Sumber Tidak Terlindung</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,293)">
                                            <tspan y="6" x="0">0</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,219)">
                                            <tspan y="6" x="0">5,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,146)">
                                            <tspan y="6" x="0">10,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,72)">
                                            <tspan y="6" x="0">15,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,-2)">
                                            <tspan y="6" x="0">20,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="12px" opacity="1"
                                              font-weight="bold" text-anchor="middle"
                                              transform="translate(-70,148) rotate(-90)">
                                            <tspan y="6" x="0">Jumlah Rumah Tangga</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g></g>
                                <g transform="translate(92,20)"></g>
                                <g></g>
                                <g></g>
                            </svg>
                            <a href="http://www.amcharts.com/javascript-charts/" title="JavaScript charts"
                               style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 97px; top: 25px;"></a>
                        </div>
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 48px;"
                             class="amChartsLegend amcharts-legend-div">
                            <svg version="1.1" style="position: absolute; width: 1643px; height: 48px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g transform="translate(92,0)">
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,37.5 L0.5,37.5 Z" fill="#FFFFFF"
                                          stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path>
                                    <g transform="translate(0,11)">
                                        <g cursor="pointer" aria-label="Sumber Air Minum" transform="translate(0,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#2cdb00" stroke="#2cdb00" fill-opacity="0.7" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Sumber Air Minum</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(201,7)"></text>
                                            <rect x="32" y="0" width="169" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-bar-chart-o"></i>

                    <h3 class="box-title">Jumlah Kepemilikan Fasilitas BAB</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <div id="chartdiv10"
                     style="width: 100%; height: 400px; background-color: rgb(255, 255, 255); overflow: hidden; text-align: left;">
                    <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 352px; padding: 0px; touch-action: auto;"
                             class="amcharts-chart-div">
                            <svg version="1.1"
                                 style="position: absolute; width: 1643px; height: 352px; top: -0.100098px; left: 0px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g>
                                    <path cs="100,100" d="M0.5,0.5 L1642.5,0.5 L1642.5,351.5 L0.5,351.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0"></path>
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,295.5 L0.5,295.5 L0.5,0.5 Z"
                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                          stroke-opacity="0" transform="translate(92,20)"></path>
                                </g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <path cs="100,100" d="M255.5,0.5 L255.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L0.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M765.5,0.5 L765.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M510.5,295.5 L510.5,295.5 L510.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1275.5,0.5 L1275.5,5.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(0,295)"></path>
                                            <path cs="100,100" d="M1020.5,295.5 L1020.5,295.5 L1020.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M1530.5,295.5 L1530.5,295.5 L1530.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <g>
                                            <path cs="100,100" d="M0.5,295.5 L6.5,295.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,295.5 L0.5,295.5 L1530.5,295.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,236.5 L6.5,236.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,236.5 L0.5,236.5 L1530.5,236.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,177.5 L6.5,177.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,177.5 L0.5,177.5 L1530.5,177.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,118.5 L6.5,118.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,118.5 L0.5,118.5 L1530.5,118.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,59.5 L6.5,59.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,59.5 L0.5,59.5 L1530.5,59.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none" stroke-width="0"
                                                  stroke-opacity="1" stroke="#000000"
                                                  transform="translate(-6,0)"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,0.5 L1530.5,0.5" fill="none"
                                                  stroke-width="0" stroke-opacity="0.15" stroke="#000000"></path>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <g>
                                            <g transform="translate(51,295)" visibility="visible"
                                               aria-label="Fasilitas BAB Jamban Sendiri 5,692">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-40.5 L408.5,-40.5 L408.5,0.5 L0.5,0.5 Z"
                                                      fill="#dbdb00" stroke="#dbdb00" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(561,295)" visibility="visible"
                                               aria-label="Fasilitas BAB Jamban Bersama/Umum 5,217">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-12.5 L408.5,-12.5 L408.5,0.5 L0.5,0.5 Z"
                                                      fill="#dbdb00" stroke="#dbdb00" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                            <g transform="translate(1071,295)" visibility="visible"
                                               aria-label="Fasilitas BAB Tidak Ada 9,780">
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,-281.5 L408.5,-281.5 L408.5,0.5 L0.5,0.5 Z"
                                                      fill="#dbdb00" stroke="#dbdb00" fill-opacity="0.7"
                                                      stroke-width="1" stroke-opacity="1"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                <g></g>
                                <g>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L1530.5,0.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,315)"></path>
                                    </g>
                                    <g>
                                        <path cs="100,100" d="M0.5,0.5 L0.5,295.5" fill="none" stroke-width="1"
                                              stroke-opacity="1" stroke="#000000" transform="translate(92,20)"
                                              visibility="visible"></path>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g>
                                    <g transform="translate(92,20)">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(255,243)">
                                            <tspan y="6" x="0">5,692</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(765,271)">
                                            <tspan y="6" x="0">5,217</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" style="pointer-events: none;"
                                              transform="translate(1275,1)">
                                            <tspan y="6" x="0">9,780</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g>
                                    <g></g>
                                </g>
                                <g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(255,312.5)">
                                            <tspan y="6" x="0">Jamban Sendiri</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(765,312.5)">
                                            <tspan y="6" x="0">Jamban Bersama/Umum</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="middle" transform="translate(1275,312.5)">
                                            <tspan y="6" x="0">Tidak Ada</tspan>
                                        </text>
                                    </g>
                                    <g transform="translate(92,20)" visibility="visible">
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,293)">
                                            <tspan y="6" x="0">5,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,234)">
                                            <tspan y="6" x="0">6,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,175)">
                                            <tspan y="6" x="0">7,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,116)">
                                            <tspan y="6" x="0">8,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,57)">
                                            <tspan y="6" x="0">9,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="11px" opacity="1"
                                              text-anchor="end" transform="translate(-12,-2)">
                                            <tspan y="6" x="0">10,000</tspan>
                                        </text>
                                        <text y="6" fill="#000000" font-family="Verdana" font-size="12px" opacity="1"
                                              font-weight="bold" text-anchor="middle"
                                              transform="translate(-70,148) rotate(-90)">
                                            <tspan y="6" x="0">Jumlah Fasilitas BAB</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g></g>
                                <g transform="translate(92,20)"></g>
                                <g></g>
                                <g></g>
                            </svg>
                            <a href="http://www.amcharts.com/javascript-charts/" title="JavaScript charts"
                               style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 97px; top: 25px;"></a>
                        </div>
                        <div style="overflow: hidden; position: relative; text-align: left; width: 1643px; height: 48px;"
                             class="amChartsLegend amcharts-legend-div">
                            <svg version="1.1" style="position: absolute; width: 1643px; height: 48px;">
                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                <g transform="translate(92,0)">
                                    <path cs="100,100" d="M0.5,0.5 L1530.5,0.5 L1530.5,37.5 L0.5,37.5 Z" fill="#FFFFFF"
                                          stroke="#000000" fill-opacity="0" stroke-width="1" stroke-opacity="0"></path>
                                    <g transform="translate(0,11)">
                                        <g cursor="pointer" aria-label="Fasilitas BAB" transform="translate(0,0)">
                                            <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                  fill="#dbdb00" stroke="#dbdb00" fill-opacity="0.7" stroke-width="1"
                                                  stroke-opacity="1" transform="translate(16,8)"></path>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="start" transform="translate(37,7)">
                                                <tspan y="6" x="0">Fasilitas BAB</tspan>
                                            </text>
                                            <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                  opacity="1" text-anchor="end" transform="translate(168,7)"></text>
                                            <rect x="32" y="0" width="136" height="18" rx="0" ry="0" stroke-width="0"
                                                  stroke="none" fill="#fff" fill-opacity="0.005"></rect>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
@endsection
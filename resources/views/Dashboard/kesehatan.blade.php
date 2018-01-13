@extends('layouts.dashboard_template')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <div class="col-md-6">
                <div class="form-group">
                    <table>
                        <tbody>
                        <tr>
                            <td width="20%"><b>Grafik:</b></td>
                            <td>
                            </td>
                            <td>
                                <form>
                                    <select class="form-control" id="listgrafik" name="listgrafik"
                                            onchange="selectgrafik();">
                                        <option value="kesehatan1">Profil Kesehatan Ibu dan Anak</option>
                                        ";
                                        <option value="kesehatan2">Epidemi Penyakit</option>
                                        ";
                                        <option value="kesehatan3">Kepemilikan Sanitasi/Toilet</option>
                                        ";
                                        <option value="kesehatan4">Jumlah Kunjungan Bayi/Balita ke Posyandu</option>
                                        ";
                                    </select>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Kecamatan:</b></td>
                            <td>
                            </td>
                            <td>
                                <form>
                                    <select class="form-control" id="kecamatan" name="kecamatan" onchange="addlist();">
                                        <option value="5203090">Aikmel</option>
                                        <option value="5203030">Terara</option>
                                        <option value="5203070">Selong</option>
                                        <option value="5203010">Keruak</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <table>
                        <tbody>
                        <tr>
                            <td width="20%"><b>Desa:</b></td>
                            <td>
                            </td>
                            <td>
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
                            </td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Tahun:</b></td>
                            <td>
                            </td>
                            <td>
                                <select class="form-control" id="listyear" onchange="addlistrd();">
                                    <option value="ALL">ALL</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <div id="idtest">
                    </div>
                    <h3 class="box-title" id="JudulGrafik">Profil Kesehatan Ibu dan Anak</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">

                        <link rel="stylesheet" href="style.css" type="text/css">
                        <script src="amcharts/amcharts.js" type="text/javascript"></script>
                        <script src="amcharts/serial.js" type="text/javascript"></script>

                        <div id="chartdivALL" style="width: 100%; height: 400px; overflow: visible; text-align: left;">
                            <div style="position: relative; width: 100%; height: 100%;" class="amcharts-main-div">
                                <div style="overflow: hidden; position: relative; text-align: left; width: 1107px; height: 48px;"
                                     class="amChartsLegend amcharts-legend-div">
                                    <svg version="1.1" style="position: absolute; width: 1107px; height: 48px;">
                                        <desc>JavaScript chart by amCharts 3.20.17</desc>
                                        <g transform="translate(60,10)">
                                            <path cs="100,100" d="M0.5,0.5 L1019.5,0.5 L1019.5,37.5 L0.5,37.5 Z"
                                                  fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                  stroke-opacity="0" class="amcharts-legend-bg"></path>
                                            <g transform="translate(0,11)">
                                                <g cursor="pointer" class="amcharts-legend-item-g3"
                                                   aria-label="Jumlah Kematian Ibu" transform="translate(0,0)">
                                                    <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                          fill="#ED1E16" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0.9"
                                                          transform="translate(16,8)"
                                                          class="amcharts-graph-column amcharts-graph-g3 amcharts-legend-marker"></path>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="start" class="amcharts-legend-label"
                                                          transform="translate(37,7)">
                                                        <tspan y="6" x="0">Jumlah Kematian Ibu</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" class="amcharts-legend-value"
                                                          transform="translate(222,7)"></text>
                                                    <rect x="32" y="0" width="190" height="18" rx="0" ry="0"
                                                          stroke-width="0" stroke="none" fill="#fff"
                                                          fill-opacity="0.005"></rect>
                                                </g>
                                                <g cursor="pointer" class="amcharts-legend-item-g4"
                                                   aria-label="Jumlah Kematian Bayi" transform="translate(239,0)">
                                                    <path cs="100,100" d="M-15.5,8.5 L16.5,8.5 L16.5,-7.5 L-15.5,-7.5 Z"
                                                          fill="#6DB4EF" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0.9"
                                                          transform="translate(16,8)"
                                                          class="amcharts-graph-column amcharts-graph-g4 amcharts-legend-marker"></path>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="start" class="amcharts-legend-label"
                                                          transform="translate(37,7)">
                                                        <tspan y="6" x="0">Jumlah Kematian Bayi</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" class="amcharts-legend-value"
                                                          transform="translate(222,7)"></text>
                                                    <rect x="32" y="0" width="190" height="18" rx="0" ry="0"
                                                          stroke-width="0" stroke="none" fill="#fff"
                                                          fill-opacity="0.005"></rect>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div style="overflow: hidden; position: relative; text-align: left; width: 1107px; height: 352px; padding: 0px; touch-action: auto;"
                                     class="amcharts-chart-div">
                                    <svg version="1.1"
                                         style="position: absolute; width: 1107px; height: 352px; top: -0.100006px; left: 0px;">
                                        <desc>JavaScript chart by amCharts 3.20.17</desc>
                                        <g>
                                            <path cs="100,100" d="M0.5,0.5 L1106.5,0.5 L1106.5,351.5 L0.5,351.5 Z"
                                                  fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                  stroke-opacity="0" class="amcharts-bg"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L1002.5,0.5 L1002.5,285.5 L0.5,285.5 L0.5,0.5 Z"
                                                  fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                  stroke-opacity="0" class="amcharts-plot-area"
                                                  transform="translate(77,20)"></path>
                                            <path cs="100,100"
                                                  d="M0.5,0.5 L17.5,-9.5 L1019.5,-9.5 L1002.5,0.5 L0.5,0.5 Z"
                                                  fill="#d9d9d9" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                  stroke-opacity="0" class="amcharts-plot-area-bottom"
                                                  transform="translate(60,315)"></path>
                                            <path cs="100,100" d="M0.5,0.5 L0.5,285.5 L17.5,275.5 L17.5,-9.5 L0.5,0.5 Z"
                                                  fill="#d9d9d9" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                  stroke-opacity="0" class="amcharts-plot-area-left"
                                                  transform="translate(60,30)"></path>
                                        </g>
                                        <g>
                                            <g class="amcharts-category-axis" transform="translate(60,30)">
                                                <g>
                                                    <path cs="100,100" d="M125.5,0.5 L125.5,5.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(0,285)"
                                                          class="amcharts-axis-tick"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M376.5,0.5 L376.5,5.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(0,285)"
                                                          class="amcharts-axis-tick"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M626.5,0.5 L626.5,5.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(0,285)"
                                                          class="amcharts-axis-tick"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M877.5,0.5 L877.5,5.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(0,285)"
                                                          class="amcharts-axis-tick"></path>
                                                </g>
                                            </g>
                                            <g class="amcharts-value-axis value-axis-v1" transform="translate(60,30)"
                                               visibility="visible">
                                                <g>
                                                    <path cs="100,100" d="M0.5,285.5 L6.5,285.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(-6,0)" class="amcharts-axis-tick"></path>
                                                    <path cs="100,100" d="M0.5,285.5 L17.5,275.5 L1019.5,275.5"
                                                          fill="none" stroke-width="0" stroke-opacity="0.1"
                                                          stroke="#000000" class="amcharts-axis-grid"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,228.5 L6.5,228.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(-6,0)" class="amcharts-axis-tick"></path>
                                                    <path cs="100,100" d="M0.5,228.5 L17.5,218.5 L1019.5,218.5"
                                                          fill="none" stroke-width="0" stroke-opacity="0.1"
                                                          stroke="#000000" class="amcharts-axis-grid"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,171.5 L6.5,171.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(-6,0)" class="amcharts-axis-tick"></path>
                                                    <path cs="100,100" d="M0.5,171.5 L17.5,161.5 L1019.5,161.5"
                                                          fill="none" stroke-width="0" stroke-opacity="0.1"
                                                          stroke="#000000" class="amcharts-axis-grid"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,114.5 L6.5,114.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(-6,0)" class="amcharts-axis-tick"></path>
                                                    <path cs="100,100" d="M0.5,114.5 L17.5,104.5 L1019.5,104.5"
                                                          fill="none" stroke-width="0" stroke-opacity="0.1"
                                                          stroke="#000000" class="amcharts-axis-grid"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,57.5 L6.5,57.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(-6,0)" class="amcharts-axis-tick"></path>
                                                    <path cs="100,100" d="M0.5,57.5 L17.5,47.5 L1019.5,47.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.1" stroke="#000000"
                                                          class="amcharts-axis-grid"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(-6,0)" class="amcharts-axis-tick"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L1019.5,-9.5" fill="none"
                                                          stroke-width="0" stroke-opacity="0.1" stroke="#000000"
                                                          class="amcharts-axis-grid"></path>
                                                </g>
                                            </g>
                                            <g class="amcharts-value-axis value-axis-v2" transform="translate(60,30)"
                                               visibility="hidden"></g>
                                        </g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g>
                                            <g transform="translate(60,30)">
                                                <g class="amcharts-graph-column amcharts-graph-g3"
                                                   transform="translate(62,285)"
                                                   aria-label="Jumlah Kematian Ibu 2015 0">
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#ff241a" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-top amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L60.5,0.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          transform="translate(17,-10)"
                                                          class="amcharts-graph-column-back amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M17.5,-9.5 L17.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L17.5,-9.5 L17.5,-9.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-left amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-right amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-bottom amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#ED1E16" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L60.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-front amcharts-graph-column-element"></path>
                                                </g>
                                                <g class="amcharts-graph-column amcharts-graph-g4"
                                                   transform="translate(128,285)"
                                                   aria-label="Jumlah Kematian Bayi 2015 0">
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#83d8ff" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-top amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L60.5,0.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          transform="translate(17,-10)"
                                                          class="amcharts-graph-column-back amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M17.5,-9.5 L17.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L17.5,-9.5 L17.5,-9.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-left amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-right amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-bottom amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#6DB4EF" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L60.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-front amcharts-graph-column-element"></path>
                                                </g>
                                                <g class="amcharts-graph-column amcharts-graph-g3"
                                                   transform="translate(313,285)"
                                                   aria-label="Jumlah Kematian Ibu 2016 0">
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#ff241a" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-top amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L60.5,0.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          transform="translate(17,-10)"
                                                          class="amcharts-graph-column-back amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M17.5,-9.5 L17.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L17.5,-9.5 L17.5,-9.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-left amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-right amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-bottom amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#ED1E16" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L60.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-front amcharts-graph-column-element"></path>
                                                </g>
                                                <g class="amcharts-graph-column amcharts-graph-g4"
                                                   transform="translate(379,285)"
                                                   aria-label="Jumlah Kematian Bayi 2016 0">
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#83d8ff" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-top amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L60.5,0.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          transform="translate(17,-10)"
                                                          class="amcharts-graph-column-back amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M17.5,-9.5 L17.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L17.5,-9.5 L17.5,-9.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-left amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-right amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-bottom amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#6DB4EF" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L60.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-front amcharts-graph-column-element"></path>
                                                </g>
                                                <g class="amcharts-graph-column amcharts-graph-g3"
                                                   transform="translate(563,285)"
                                                   aria-label="Jumlah Kematian Ibu 2017 4">
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-bottom amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,-227.5 L60.5,-227.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          transform="translate(17,-10)"
                                                          class="amcharts-graph-column-back amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M17.5,-9.5 L17.5,-237.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,-227.5 L17.5,-237.5 L17.5,-9.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-left amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L60.5,-227.5 L77.5,-237.5 L77.5,-9.5 L60.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-right amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L77.5,-9.5 L77.5,-237.5 L60.5,-227.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,-227.5 L17.5,-237.5 L77.5,-237.5 L60.5,-227.5 L0.5,-227.5 Z"
                                                          fill="#ff241a" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-top amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,-227.5 L17.5,-237.5 L77.5,-237.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#ED1E16" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,-227.5 L60.5,-227.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#ED1E16" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0.9"
                                                          class="amcharts-graph-column-front amcharts-graph-column-element"></path>
                                                </g>
                                                <g class="amcharts-graph-column amcharts-graph-g4"
                                                   transform="translate(629,285)"
                                                   aria-label="Jumlah Kematian Bayi 2017 1">
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-bottom amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,-56.5 L60.5,-56.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          transform="translate(17,-10)"
                                                          class="amcharts-graph-column-back amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M17.5,-9.5 L17.5,-66.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,-56.5 L17.5,-66.5 L17.5,-9.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-left amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L60.5,-56.5 L77.5,-66.5 L77.5,-9.5 L60.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-right amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M60.5,0.5 L77.5,-9.5 L77.5,-66.5 L60.5,-56.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#6DB4EF" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,-56.5 L17.5,-66.5 L77.5,-66.5 L60.5,-56.5 L0.5,-56.5 Z"
                                                          fill="#83d8ff" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-top amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,-56.5 L17.5,-66.5 L77.5,-66.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#6DB4EF" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,-56.5 L60.5,-56.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#6DB4EF" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0.9"
                                                          class="amcharts-graph-column-front amcharts-graph-column-element"></path>
                                                </g>
                                                <g class="amcharts-graph-column amcharts-graph-g3"
                                                   transform="translate(814,285)"
                                                   aria-label="Jumlah Kematian Ibu 2018 0">
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#ff241a" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-top amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L60.5,0.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          transform="translate(17,-10)"
                                                          class="amcharts-graph-column-back amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M17.5,-9.5 L17.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L17.5,-9.5 L17.5,-9.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-left amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-right amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#be1812" stroke="#ED1E16" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-bottom amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#ED1E16" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L60.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#ED1E16"
                                                          class="amcharts-graph-column-front amcharts-graph-column-element"></path>
                                                </g>
                                                <g class="amcharts-graph-column amcharts-graph-g4"
                                                   transform="translate(880,285)"
                                                   aria-label="Jumlah Kematian Bayi 2018 0">
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#83d8ff" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-top amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L60.5,0.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          transform="translate(17,-10)"
                                                          class="amcharts-graph-column-back amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M17.5,-9.5 L17.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L0.5,0.5 L17.5,-9.5 L17.5,-9.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-left amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M60.5,0.5 L60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-right amcharts-graph-column-element"></path>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5 L60.5,0.5 L0.5,0.5 Z"
                                                          fill="#5790bf" stroke="#6DB4EF" fill-opacity="1"
                                                          stroke-width="1" stroke-opacity="0"
                                                          class="amcharts-graph-column-bottom amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L77.5,-9.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M60.5,0.5 L77.5,-9.5 L77.5,-9.5 L60.5,0.5"
                                                          fill="none" stroke-width="1" stroke-opacity="0.9"
                                                          stroke="#6DB4EF" class="amcharts-graph-column-element"></path>
                                                    <path cs="100,100" d="M0.5,0.5 L60.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.9" stroke="#6DB4EF"
                                                          class="amcharts-graph-column-front amcharts-graph-column-element"></path>
                                                </g>
                                            </g>
                                        </g>
                                        <g>
                                            <g transform="translate(60,30)"
                                               class="amcharts-graph-column amcharts-graph-g3">
                                                <g></g>
                                            </g>
                                            <g transform="translate(60,30)"
                                               class="amcharts-graph-column amcharts-graph-g4">
                                                <g></g>
                                            </g>
                                        </g>
                                        <g></g>
                                        <g>
                                            <path cs="100,100" d="M0.5,285.5 L1002.5,285.5 L1019.5,275.5" fill="none"
                                                  stroke-width="1" stroke-opacity="0.2" stroke="#000000"
                                                  transform="translate(60,30)"
                                                  class="amcharts-axis-zero-grid-v1 amcharts-axis-zero-grid"></path>
                                            <g class="amcharts-category-axis">
                                                <path cs="100,100" d="M0.5,0.5 L1002.5,0.5" fill="none" stroke-width="1"
                                                      stroke-opacity="0.3" stroke="#000000"
                                                      transform="translate(60,315)" class="amcharts-axis-line"></path>
                                            </g>
                                            <g class="amcharts-value-axis value-axis-v1">
                                                <path cs="100,100" d="M0.5,0.5 L0.5,285.5" fill="none" stroke-width="1"
                                                      stroke-opacity="0.3" stroke="#000000" transform="translate(60,30)"
                                                      class="amcharts-axis-line" visibility="visible"></path>
                                            </g>
                                            <g class="amcharts-value-axis value-axis-v2">
                                                <path cs="100,100" d="M0.5,0.5 L0.5,285.5 L-16.5,295.5" fill="none"
                                                      stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                      transform="translate(1079,20)" class="amcharts-axis-line"
                                                      visibility="hidden"></path>
                                            </g>
                                        </g>
                                        <g></g>
                                        <g></g>
                                        <g>
                                            <g transform="translate(60,30)"
                                               class="amcharts-graph-column amcharts-graph-g3"></g>
                                            <g transform="translate(60,30)"
                                               class="amcharts-graph-column amcharts-graph-g4"></g>
                                        </g>
                                        <g>
                                            <g></g>
                                        </g>
                                        <g>
                                            <g class="amcharts-category-axis" transform="translate(60,30)"
                                               visibility="visible">
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" font-weight="bold" text-anchor="middle"
                                                      transform="translate(125,302.5)" class="amcharts-axis-label">
                                                    <tspan y="6" x="0">2015</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" font-weight="bold" text-anchor="middle"
                                                      transform="translate(376,302.5)" class="amcharts-axis-label">
                                                    <tspan y="6" x="0">2016</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" font-weight="bold" text-anchor="middle"
                                                      transform="translate(626,302.5)" class="amcharts-axis-label">
                                                    <tspan y="6" x="0">2017</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" font-weight="bold" text-anchor="middle"
                                                      transform="translate(877,302.5)" class="amcharts-axis-label">
                                                    <tspan y="6" x="0">2018</tspan>
                                                </text>
                                            </g>
                                            <g class="amcharts-value-axis value-axis-v1" transform="translate(60,30)"
                                               visibility="visible">
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" text-anchor="end" transform="translate(-12,283)"
                                                      class="amcharts-axis-label">
                                                    <tspan y="6" x="0">0</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" text-anchor="end" transform="translate(-12,226)"
                                                      class="amcharts-axis-label">
                                                    <tspan y="6" x="0">1</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" text-anchor="end" transform="translate(-12,169)"
                                                      class="amcharts-axis-label">
                                                    <tspan y="6" x="0">2</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" text-anchor="end" transform="translate(-12,112)"
                                                      class="amcharts-axis-label">
                                                    <tspan y="6" x="0">3</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" text-anchor="end" transform="translate(-12,55)"
                                                      class="amcharts-axis-label">
                                                    <tspan y="6" x="0">4</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                      opacity="1" text-anchor="end" transform="translate(-12,-2)"
                                                      class="amcharts-axis-label">
                                                    <tspan y="6" x="0">5</tspan>
                                                </text>
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="12px"
                                                      opacity="1" font-weight="bold" text-anchor="middle"
                                                      class="amcharts-axis-title"
                                                      transform="translate(-38,143) rotate(-90)">
                                                    <tspan y="6" x="0">Jumlah Kelahiran</tspan>
                                                </text>
                                            </g>
                                            <g class="amcharts-value-axis value-axis-v2" transform="translate(60,30)"
                                               visibility="hidden">
                                                <text y="6" fill="#000000" font-family="Verdana" font-size="12px"
                                                      opacity="1" font-weight="bold" text-anchor="middle"
                                                      class="amcharts-axis-title"
                                                      transform="translate(1020,143) rotate(-90)">
                                                    <tspan y="6" x="0">Jumlah Kelahiran</tspan>
                                                </text>
                                            </g>
                                        </g>
                                        <g></g>
                                        <g transform="translate(60,30)"></g>
                                        <g></g>
                                        <g></g>
                                    </svg>
                                    <a href="http://www.amcharts.com/javascript-charts/" title="JavaScript charts"
                                       style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 65px; top: 35px;"></a>
                                </div>
                                <div class="amcharts-export-menu amcharts-export-menu-top-right amExportButton">
                                    <ul>
                                        <li class="export-main"><a href="#"><span>menu.label.undefined</span></a>
                                            <ul>
                                                <li><a href="#"><span>Download as ...</span></a>
                                                    <ul>
                                                        <li><a href="#"><span>PNG</span></a></li>
                                                        <li><a href="#"><span>JPG</span></a></li>
                                                        <li><a href="#"><span>SVG</span></a></li>
                                                        <li><a href="#"><span>PDF</span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#"><span>Save as ...</span></a>
                                                    <ul>
                                                        <li><a href="#"><span>CSV</span></a></li>
                                                        <li><a href="#"><span>XLSX</span></a></li>
                                                        <li><a href="#"><span>JSON</span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#"><span>Annotate ...</span></a></li>
                                                <li><a href="#"><span>Print</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Profil Puskesmas</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row" style="height:400px;">
                        <table class="table table-hover" id="sample_editable_1">
                            <tbody>
                            <tr>
                                <td><font size="2">Nama Puskesmas</font></td>
                                <td><font size="3">
                                        <div style="color:blue;" id="NamaPuskesmasID">Puskemas Aikmel</div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td><font size="2">Jumlah Polindes</font></td>
                                <td><font size="2">
                                        <div id="JumlahPolindesID">0 unit</div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td><font size="2">Jumlah Puskedes</font></td>
                                <td><font size="2">
                                        <div id="JumlahPuskedesID">0 unit</div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td><font size="2">Nama Kepala Puskesmas</font></td>
                                <td><font size="2">
                                        <div id="NamaKaPusID">No Name</div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td><font size="2">Nama Bidan Koordinator</font></td>
                                <td><font size="2">
                                        <div id="NamaBidanKoordinatorID">No Name</div>
                                    </font></td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2"><font size="2">Download Dokumen</font> <i class="fa fa-download"
                                                                                          aria-hidden="true"></i></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select class="form-control" id="docpuskesmas" name="docpuskesmas">
                                        <option value="akreditasi.doc">akreditasi puskesmas</option>
                                        <option value="akreditasi.doc">Pedoman Mutu Puskesmas dan Keselamatan Pasien
                                        </option>
                                        <option value="akreditasi.doc">Contoh Pedoman Pemberdayaan Masyarakat</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
                        <select class="form-control" id="listyear" onchange="addlistrd();">
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Penduduk</span>
                    <span class="info-box-number" id="penduduktotal">5,128</span>
                    <a id="hrefpenduduk" class="small-box-footer"
                       href="data.php?cat=allpenduduk&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">Detail Info <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-male"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Laki-Laki</span>
                    <span class="info-box-number" id="pendudukLakiLakitotal">2,605</span>
                    <a id="hrefpenduduklakilaki" class="small-box-footer"
                       href="data.php?cat=allpenduduklaki&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">Detail Info <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-female"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Perempuan</span>
                    <span class="info-box-number" id="pendudukPerempuantotal">2,523</span>
                    <a id="hrefpendudukperempuan" class="small-box-footer"
                       href="data.php?cat=allpendudukperempuan&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">Detail Info
                        <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span><img src="{{asset("img/cacat_logo.png")}}" style="width:90px;height:90px;float:left;">
                    <!-- <i class="fa fa-wheelchair"></i> --></span>

                <div class="info-box-content">
                    <span class="info-box-text">Disabilitas</span>
                    <span class="info-box-number" id="pendudukCacatTotal">787 </span>
                    <a id="hrefpendudukcacat" class="small-box-footer"
                       href="data.php?cat=allpendudukcacat&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">Detail Info <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


        <!-- /.col -->
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafik Penduduk Per Tahun</h3>

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
                        <div class="col-md-12">
                            <p class="text-center">
                                <strong></strong>
                            </p>

                            <div id="chartpendudukpertahun"
                                 style="width: 100%; height: 250px; overflow: visible; text-align: left;">
                                <div style="position: relative;" class="amcharts-main-div">
                                    <div style="overflow: hidden; position: relative; text-align: left; width: 696px; height: 250px; padding: 0px; cursor: default;"
                                         class="amcharts-chart-div">
                                        <svg version="1.1"
                                             style="position: absolute; width: 696px; height: 250px; top: -0.100006px; left: 0px;">
                                            <desc>JavaScript chart by amCharts 3.21.12</desc>
                                            <g>
                                                <path cs="100,100" d="M0.5,0.5 L695.5,0.5 L695.5,249.5 L0.5,249.5 Z"
                                                      fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                      stroke-opacity="0" class="amcharts-bg"></path>
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L615.5,0.5 L615.5,218.5 L0.5,218.5 L0.5,0.5 Z"
                                                      fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                      stroke-opacity="0" class="amcharts-plot-area"
                                                      transform="translate(60,0)"></path>
                                            </g>
                                            <g>
                                                <g class="amcharts-category-axis" transform="translate(60,0)">
                                                    <g>
                                                        <path cs="100,100" d="M0.5,0.5 L0.5,5.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,218)"
                                                              class="amcharts-axis-tick"></path>
                                                        <path cs="100,100" d="M0.5,218.5 L0.5,218.5 L0.5,0.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M154.5,0.5 L154.5,5.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,218)"
                                                              class="amcharts-axis-tick"></path>
                                                        <path cs="100,100" d="M154.5,218.5 L154.5,218.5 L154.5,0.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M308.5,0.5 L308.5,5.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,218)"
                                                              class="amcharts-axis-tick"></path>
                                                        <path cs="100,100" d="M308.5,218.5 L308.5,218.5 L308.5,0.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M461.5,0.5 L461.5,5.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,218)"
                                                              class="amcharts-axis-tick"></path>
                                                        <path cs="100,100" d="M461.5,218.5 L461.5,218.5 L461.5,0.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M615.5,0.5 L615.5,5.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,218)"
                                                              class="amcharts-axis-tick"></path>
                                                        <path cs="100,100" d="M615.5,218.5 L615.5,218.5 L615.5,0.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                </g>
                                                <g class="amcharts-value-axis value-axis-valueAxisAuto0_1515852844940"
                                                   transform="translate(60,0)" visibility="visible">
                                                    <g>
                                                        <path cs="100,100" d="M0.5,218.5 L0.5,218.5 L615.5,218.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,182.5 L0.5,182.5 L615.5,182.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,145.5 L0.5,145.5 L615.5,145.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,109.5 L0.5,109.5 L615.5,109.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,73.5 L0.5,73.5 L615.5,73.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,36.5 L0.5,36.5 L615.5,36.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#000000" class="amcharts-axis-grid"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,0.5 L0.5,0.5 L615.5,0.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.1" stroke="#000000"
                                                              class="amcharts-axis-grid"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g transform="translate(60,0)" clip-path="url(#AmChartsEl-3)">
                                                <g visibility="hidden">
                                                    <g transform="translate(232,0)" visibility="hidden">
                                                        <rect x="0.5" y="0.5" width="154" height="218" rx="0" ry="0"
                                                              stroke-width="0" fill="#000000" stroke="#000000"
                                                              fill-opacity="0" stroke-opacity="0"
                                                              class="amcharts-cursor-fill"
                                                              transform="translate(-78,0)"></rect>
                                                    </g>
                                                </g>
                                            </g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g>
                                                <g transform="translate(60,0)"
                                                   class="amcharts-graph-smoothedLine amcharts-graph-g1">
                                                    <g clip-path="url(#AmChartsEl-6)">
                                                        <path cs="100,100"
                                                              d="M77,54 C128,57,128,76,231,72 C334,68,283,7,385,32 C487,56,487,187,538,218 "
                                                              fill="none" fill-opacity="0" stroke-width="2"
                                                              stroke-opacity="0.9" stroke="#637bb6"
                                                              class="amcharts-graph-stroke amcharts-graph-stroke-negative"></path>
                                                    </g>
                                                    <g clip-path="url(#AmChartsEl-5)">
                                                        <path cs="100,100"
                                                              d="M77,54 C128,57,128,76,231,72 C334,68,283,7,385,32 C487,56,487,187,538,218 "
                                                              fill="none" fill-opacity="0" stroke-width="2"
                                                              stroke-opacity="0.9" stroke="#d1655d"
                                                              class="amcharts-graph-stroke"></path>
                                                    </g>
                                                    <clipPath id="AmChartsEl-5">
                                                        <rect x="0" y="0" width="615" height="219" rx="0" ry="0"
                                                              stroke-width="0"></rect>
                                                    </clipPath>
                                                    <clipPath id="AmChartsEl-6">
                                                        <rect x="0" y="219" width="615" height="1" rx="0" ry="0"
                                                              stroke-width="0"></rect>
                                                    </clipPath>
                                                    <g></g>
                                                </g>
                                            </g>
                                            <g></g>
                                            <g>
                                                <path cs="100,100" d="M0.5,218.5 L615.5,218.5 L615.5,218.5" fill="none"
                                                      stroke-width="1" stroke-opacity="0.2" stroke="#000000"
                                                      transform="translate(60,0)"
                                                      class="amcharts-axis-zero-grid-valueAxisAuto0_1515852844940 amcharts-axis-zero-grid"></path>
                                                <g class="amcharts-category-axis">
                                                    <path cs="100,100" d="M0.5,0.5 L615.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(60,218)"
                                                          class="amcharts-axis-line"></path>
                                                </g>
                                                <g class="amcharts-value-axis value-axis-valueAxisAuto0_1515852844940">
                                                    <path cs="100,100" d="M0.5,0.5 L0.5,218.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0" stroke="#000000"
                                                          transform="translate(60,0)" class="amcharts-axis-line"
                                                          visibility="visible"></path>
                                                </g>
                                            </g>
                                            <g>
                                                <g transform="translate(60,0)" style="pointer-events: none;"
                                                   clip-path="url(#AmChartsEl-4)">
                                                    <path cs="100,100" d="M0.5,0.5 L615.5,0.5 L615.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.5" stroke="#000000"
                                                          class="amcharts-cursor-line amcharts-cursor-line-horizontal"
                                                          visibility="hidden" transform="translate(0,57)"></path>
                                                </g>
                                                <clipPath id="AmChartsEl-4">
                                                    <rect x="0" y="0" width="615" height="218" rx="0" ry="0"
                                                          stroke-width="0"></rect>
                                                </clipPath>
                                            </g>
                                            <g></g>
                                            <g>
                                                <g transform="translate(60,0)"
                                                   class="amcharts-graph-smoothedLine amcharts-graph-g1">
                                                    <circle r="4" cx="0" cy="0" fill="#d1655d" stroke="#d1655d"
                                                            fill-opacity="1" stroke-width="2" stroke-opacity="0"
                                                            transform="translate(77,54)" aria-label=" 2015 4,512"
                                                            class="amcharts-graph-bullet"></circle>
                                                    <circle r="4" cx="0" cy="0" fill="#d1655d" stroke="#d1655d"
                                                            fill-opacity="1" stroke-width="2" stroke-opacity="0"
                                                            transform="translate(231,72) scale(1)"
                                                            aria-label=" 2016 4,019"
                                                            class="amcharts-graph-bullet"></circle>
                                                    <circle r="4" cx="0" cy="0" fill="#d1655d" stroke="#d1655d"
                                                            fill-opacity="1" stroke-width="2" stroke-opacity="0"
                                                            transform="translate(385,32)" aria-label=" 2017 5,128"
                                                            class="amcharts-graph-bullet"></circle>
                                                    <circle r="4" cx="0" cy="0" fill="#d1655d" stroke="#d1655d"
                                                            fill-opacity="1" stroke-width="2" stroke-opacity="0"
                                                            transform="translate(538,218)" aria-label=" 2018 0"
                                                            class="amcharts-graph-bullet"></circle>
                                                </g>
                                            </g>
                                            <g>
                                                <g></g>
                                            </g>
                                            <g>
                                                <g class="amcharts-category-axis" transform="translate(60,0)"
                                                   visibility="visible">
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(77.03285421005583,230.5)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">2015</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(231.03285421005583,230.5)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">2016</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(385.0328542100558,230.5)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">2017</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(538.0328542100558,230.5)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">2018</tspan>
                                                    </text>
                                                </g>
                                                <g class="amcharts-value-axis value-axis-valueAxisAuto0_1515852844940"
                                                   transform="translate(60,0)" visibility="visible">
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,216)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">0</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,180)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">1,000</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,143)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">2,000</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,107)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">3,000</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,71)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">4,000</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,34)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">5,000</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,-2)"
                                                          class="amcharts-axis-label">
                                                        <tspan y="6" x="0">6,000</tspan>
                                                    </text>
                                                </g>
                                            </g>
                                            <g></g>
                                            <g transform="translate(60,0)"></g>
                                            <g></g>
                                            <g></g>
                                            <clipPath id="AmChartsEl-3">
                                                <rect x="-1" y="-1" width="617" height="220" rx="0" ry="0"
                                                      stroke-width="0"></rect>
                                            </clipPath>
                                        </svg>
                                        <a href="http://www.amcharts.com" title="JavaScript charts"
                                           style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 65px; top: 5px;">JS
                                            chart by amCharts</a></div>
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
        </div>

        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-aqua">
                <span class="info-box-icon" id="info-box-icon-KTP" style="background-color: rgb(34, 122, 15);"><a
                            id="totalktphref" class="link-black"
                            href="data.php?cat=allktp&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">
                        <div id="TOTALKTP" style="color: rgb(255, 255, 255); font-size: 48px;">0</div>
                    </a></span>

                <div class="info-box-content" id="idbgpercentKTP" style="background-color: rgb(115, 192, 99);">
                    <span class="info-box-number">KTP</span>
                    <span class="progress-description" id="idktpterpenuhi">0 dari 5,128 Jiwa Tidak Terpenuhi</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0%; background-color: rgb(255, 255, 255);"
                             id="progressbarktp"></div>
                    </div>
                    <span class="progress-description" id="persentasektp" style="color: rgb(255, 255, 255);">0% Jiwa Tidak Terpenuhi</span>
                </div>
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-aqua">
                <span class="info-box-icon" id="info-box-icon-AktaLahir" style="background-color: rgb(255, 0, 0);"><a
                            id="totalaktalahirhref" class="link-black"
                            href="data.php?cat=allaktalahir&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">
                        <div id="totalaktalahirNumber" style="color: rgb(255, 255, 255); font-size: 36px;">5,127</div>
                    </a></span>

                <div class="info-box-content" id="idbgpercentAktaLahir" style="background-color: rgb(250, 128, 114);">
                    <span class="info-box-number">AKTA LAHIR</span>
                    <span class="progress-description"
                          id="idaktalahirterpenuhi">5,127 dari 5,128 Jiwa Tidak Terpenuhi</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 99.9805%; background-color: rgb(255, 255, 255);"
                             id="progressbaraktalahir"></div>
                    </div>
                    <span class="progress-description" id="persentaseaktalahir" style="color: rgb(255, 255, 255);">99.98% Jiwa Tidak Terpenuhi</span>
                </div>
                <!-- /.info-box-content -->
            </div>

            <!-- /.info-box -->
            <div class="info-box bg-aqua">
                <span class="info-box-icon" id="info-box-icon-AktaNikah" style="background-color: rgb(34, 122, 15);"><a
                            id="totalaktanikahhref" class="link-black"
                            href="data.php?cat=allaktanikah&amp;kec=5203090&amp;desa=ALL&amp;tahun=2017">
                        <div id="totalaktanikahNumber" style="color: rgb(255, 255, 255); font-size: 36px;">1,363</div>
                    </a></span>

                <div class="info-box-content" id="idbgpercentAktaNikah" style="background-color: rgb(115, 192, 99);">
                    <span class="info-box-number">AKTA NIKAH</span>
                    <span class="progress-description"
                          id="idaktanikahterpenuhi">1,363 dari 5,128 Jiwa Tidak Terpenuhi</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 26.5796%; background-color: rgb(255, 255, 255);"
                             id="progressbaraktanikah"></div>
                    </div>
                    <span class="progress-description" id="persentaseaktanikah" style="color: rgb(255, 255, 255);">26.58% Jiwa Tidak Terpenuhi</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <!-- /.row -->

        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title" id="idtest">Jumlah Penduduk Berdasarkan Usia</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-12 col-xs-6">
                            <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
                            <script src="https://www.amcharts.com/lib/3/serial.js"></script>
                            <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
                            <div id="chartdiv" style="overflow: hidden; text-align: left;">
                                <div style="position: relative;" class="amcharts-main-div">
                                    <div style="overflow: hidden; position: relative; text-align: left; width: 696px; height: 500px; padding: 0px;"
                                         class="amcharts-chart-div">
                                        <svg version="1.1"
                                             style="position: absolute; width: 696px; height: 500px; top: 0.400024px; left: 0px;">
                                            <desc>JavaScript chart by amCharts 3.21.12</desc>
                                            <g>
                                                <path cs="100,100" d="M0.5,0.5 L695.5,0.5 L695.5,499.5 L0.5,499.5 Z"
                                                      fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                      stroke-opacity="0"></path>
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L598.5,0.5 L598.5,385.5 L0.5,385.5 L0.5,0.5 Z"
                                                      fill="#FFFFFF" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                      stroke-opacity="0" transform="translate(77,35)"></path>
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L17.5,-9.5 L615.5,-9.5 L598.5,0.5 L0.5,0.5 Z"
                                                      fill="#d9d9d9" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                      stroke-opacity="0" transform="translate(60,430)"></path>
                                                <path cs="100,100"
                                                      d="M0.5,0.5 L0.5,385.5 L17.5,375.5 L17.5,-9.5 L0.5,0.5 Z"
                                                      fill="#d9d9d9" stroke="#000000" fill-opacity="0" stroke-width="1"
                                                      stroke-opacity="0" transform="translate(60,45)"></path>
                                            </g>
                                            <g>
                                                <g transform="translate(60,45)">
                                                    <g>
                                                        <path cs="100,100" d="M60.5,0.5 L60.5,5.5" fill="none"
                                                              stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,385)"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M179.5,0.5 L179.5,5.5" fill="none"
                                                              stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,385)"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M299.5,0.5 L299.5,5.5" fill="none"
                                                              stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,385)"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M419.5,0.5 L419.5,5.5" fill="none"
                                                              stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,385)"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M538.5,0.5 L538.5,5.5" fill="none"
                                                              stroke-width="0" stroke-opacity="0.3" stroke="#000000"
                                                              transform="translate(0,385)"></path>
                                                    </g>
                                                </g>
                                                <g transform="translate(60,45)" visibility="visible">
                                                    <g>
                                                        <path cs="100,100" d="M0.5,385.5 L6.5,385.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,385.5 L17.5,375.5 L615.5,375.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,347.5 L6.5,347.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,347.5 L17.5,337.5 L615.5,337.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,308.5 L6.5,308.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,308.5 L17.5,298.5 L615.5,298.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,270.5 L6.5,270.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,270.5 L17.5,260.5 L615.5,260.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,231.5 L6.5,231.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,231.5 L17.5,221.5 L615.5,221.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,193.5 L6.5,193.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,193.5 L17.5,183.5 L615.5,183.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,154.5 L6.5,154.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,154.5 L17.5,144.5 L615.5,144.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,116.5 L6.5,116.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,116.5 L17.5,106.5 L615.5,106.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,77.5 L6.5,77.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,77.5 L17.5,67.5 L615.5,67.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,39.5 L6.5,39.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,39.5 L17.5,29.5 L615.5,29.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                    <g>
                                                        <path cs="100,100" d="M0.5,0.5 L6.5,0.5" fill="none"
                                                              stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                              transform="translate(-6,0)"></path>
                                                        <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L615.5,-9.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.15"
                                                              stroke="#000000"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g></g>
                                            <g></g>
                                            <g></g>
                                            <g>
                                                <g transform="translate(60,45)">
                                                    <g transform="translate(12,385)" cursor="pointer"
                                                       visibility="visible" aria-label="value Lansia 1,986">
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#c06666" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-343.5 L96.5,-343.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#c06666" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"
                                                              transform="translate(17,-10)"></path>
                                                        <path cs="100,100" d="M17.5,-9.5 L17.5,-353.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-343.5 L17.5,-353.5 L17.5,-9.5 L0.5,0.5 Z"
                                                              fill="#c06666" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L96.5,-343.5 L113.5,-353.5 L113.5,-9.5 L96.5,0.5 Z"
                                                              fill="#c06666" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L113.5,-9.5 L113.5,-353.5 L96.5,-343.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,-343.5 L17.5,-353.5 L113.5,-353.5 L96.5,-343.5 L0.5,-343.5 Z"
                                                              fill="#ff9a9a" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,-343.5 L17.5,-353.5 L113.5,-353.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-343.5 L96.5,-343.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#f08080" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0.1"></path>
                                                    </g>
                                                    <g transform="translate(131,385)" cursor="pointer"
                                                       visibility="visible" aria-label="value Dewasa 1,358">
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#0a72a6" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-222.5 L96.5,-222.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#0a72a6" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"
                                                              transform="translate(17,-10)"></path>
                                                        <path cs="100,100" d="M17.5,-9.5 L17.5,-232.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-222.5 L17.5,-232.5 L17.5,-9.5 L0.5,0.5 Z"
                                                              fill="#0a72a6" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L96.5,-222.5 L113.5,-232.5 L113.5,-9.5 L96.5,0.5 Z"
                                                              fill="#0a72a6" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L113.5,-9.5 L113.5,-232.5 L96.5,-222.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,-222.5 L17.5,-232.5 L113.5,-232.5 L96.5,-222.5 L0.5,-222.5 Z"
                                                              fill="#10aaf8" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,-222.5 L17.5,-232.5 L113.5,-232.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-222.5 L96.5,-222.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#0d8ecf" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0.1"></path>
                                                    </g>
                                                    <g transform="translate(251,385)" cursor="pointer"
                                                       visibility="visible" aria-label="value Remaja 589">
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#8db207" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-74.5 L96.5,-74.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#8db207" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"
                                                              transform="translate(17,-10)"></path>
                                                        <path cs="100,100" d="M17.5,-9.5 L17.5,-84.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-74.5 L17.5,-84.5 L17.5,-9.5 L0.5,0.5 Z"
                                                              fill="#8db207" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L96.5,-74.5 L113.5,-84.5 L113.5,-9.5 L96.5,0.5 Z"
                                                              fill="#8db207" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L113.5,-9.5 L113.5,-84.5 L96.5,-74.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,-74.5 L17.5,-84.5 L113.5,-84.5 L96.5,-74.5 L0.5,-74.5 Z"
                                                              fill="#d3ff0b" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,-74.5 L17.5,-84.5 L113.5,-84.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-74.5 L96.5,-74.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#b0de09" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0.1"></path>
                                                    </g>
                                                    <g transform="translate(371,385)" cursor="pointer"
                                                       visibility="visible" aria-label="value Balita 404">
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#cc5200" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-38.5 L96.5,-38.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#cc5200" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"
                                                              transform="translate(17,-10)"></path>
                                                        <path cs="100,100" d="M17.5,-9.5 L17.5,-48.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-38.5 L17.5,-48.5 L17.5,-9.5 L0.5,0.5 Z"
                                                              fill="#cc5200" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L96.5,-38.5 L113.5,-48.5 L113.5,-9.5 L96.5,0.5 Z"
                                                              fill="#cc5200" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L113.5,-9.5 L113.5,-48.5 L96.5,-38.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,-38.5 L17.5,-48.5 L113.5,-48.5 L96.5,-38.5 L0.5,-38.5 Z"
                                                              fill="#ff7a00" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,-38.5 L17.5,-48.5 L113.5,-48.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-38.5 L96.5,-38.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#ff6600" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0.1"></path>
                                                    </g>
                                                    <g transform="translate(490,385)" cursor="pointer"
                                                       visibility="visible" aria-label="value Anak-anak 316">
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#caa802" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,0.5 L17.5,-9.5 L113.5,-9.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-21.5 L96.5,-21.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#caa802" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"
                                                              transform="translate(17,-10)"></path>
                                                        <path cs="100,100" d="M17.5,-9.5 L17.5,-31.5" fill="none"
                                                              stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-21.5 L17.5,-31.5 L17.5,-9.5 L0.5,0.5 Z"
                                                              fill="#caa802" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L96.5,-21.5 L113.5,-31.5 L113.5,-9.5 L96.5,0.5 Z"
                                                              fill="#caa802" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100"
                                                              d="M96.5,0.5 L113.5,-9.5 L113.5,-31.5 L96.5,-21.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,-21.5 L17.5,-31.5 L113.5,-31.5 L96.5,-21.5 L0.5,-21.5 Z"
                                                              fill="#fffc02" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                        <path cs="100,100" d="M0.5,-21.5 L17.5,-31.5 L113.5,-31.5"
                                                              fill="none" stroke-width="1" stroke-opacity="0.1"
                                                              stroke="#67b7dc"></path>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L0.5,-21.5 L96.5,-21.5 L96.5,0.5 L0.5,0.5 Z"
                                                              fill="#fcd202" stroke="#67b7dc" fill-opacity="1"
                                                              stroke-width="1" stroke-opacity="0.1"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g>
                                                <g transform="translate(60,45)">
                                                    <g></g>
                                                </g>
                                            </g>
                                            <g></g>
                                            <g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,0.5 L598.5,0.5" fill="none"
                                                          stroke-width="1" stroke-opacity="0.3" stroke="#000000"
                                                          transform="translate(60,430)"></path>
                                                </g>
                                                <g>
                                                    <path cs="100,100" d="M0.5,0.5 L0.5,385.5" fill="none"
                                                          stroke-width="1" stroke-opacity="1" stroke="#000000"
                                                          transform="translate(60,45)" visibility="visible"></path>
                                                </g>
                                            </g>
                                            <g></g>
                                            <g></g>
                                            <g>
                                                <g transform="translate(60,45)"></g>
                                            </g>
                                            <g>
                                                <g></g>
                                                <text y="7" fill="#000000" font-family="Verdana" font-size="13px"
                                                      opacity="1" font-weight="bold" text-anchor="middle"
                                                      transform="translate(368,20)" style="pointer-events: none;">
                                                    <tspan y="7" x="0"></tspan>
                                                </text>
                                            </g>
                                            <g>
                                                <g transform="translate(60,45)" visibility="visible">
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(46.211417766862326,406.7885822331377) rotate(-45)">
                                                        <tspan y="6" x="0">Lansia</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(162.02943725152286,409.97056274847716) rotate(-45)">
                                                        <tspan y="6" x="0">Dewasa</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(282.3829906421161,409.6170093578839) rotate(-45)">
                                                        <tspan y="6" x="0">Remaja</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(406.62563132923543,405.37436867076457) rotate(-45)">
                                                        <tspan y="6" x="0">Balita</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="middle"
                                                          transform="translate(515.0190296114372,415.9809703885628) rotate(-45)">
                                                        <tspan y="6" x="0">Anak-anak</tspan>
                                                    </text>
                                                </g>
                                                <g transform="translate(60,45)" visibility="visible">
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,383)">
                                                        <tspan y="6" x="0">200</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,345)">
                                                        <tspan y="6" x="0">400</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,306)">
                                                        <tspan y="6" x="0">600</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,268)">
                                                        <tspan y="6" x="0">800</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,229)">
                                                        <tspan y="6" x="0">1,000</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,191)">
                                                        <tspan y="6" x="0">1,200</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,152)">
                                                        <tspan y="6" x="0">1,400</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,114)">
                                                        <tspan y="6" x="0">1,600</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,75)">
                                                        <tspan y="6" x="0">1,800</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,37)">
                                                        <tspan y="6" x="0">2,000</tspan>
                                                    </text>
                                                    <text y="6" fill="#000000" font-family="Verdana" font-size="11px"
                                                          opacity="1" text-anchor="end" transform="translate(-12,-2)">
                                                        <tspan y="6" x="0">2,200</tspan>
                                                    </text>
                                                </g>
                                            </g>
                                            <g></g>
                                            <g transform="translate(60,45)"></g>
                                            <g></g>
                                            <g></g>
                                        </svg>
                                        <a href="http://www.amcharts.com" title="JavaScript charts"
                                           style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 65px; top: 50px;">JS
                                            chart by amCharts</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- /.row -->
    </div>

</section>
<!-- /.content -->
@endsection
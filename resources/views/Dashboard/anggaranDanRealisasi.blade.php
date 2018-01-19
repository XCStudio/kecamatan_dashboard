@extends('layouts.dashboard_template')

@section('content')
    <script>
        function addlist() {
            var mySelect = document.getElementById("kecamatan").value;

            if (mySelect.length == 0) {
                document.getElementById("desalist").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("desalist").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getDesaList.php?IDKecamatan=" + mySelect, true);
                xmlhttp.send();
            }

            if (mySelect.length == 0) {
                document.getElementById("listyear").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("listyear").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getYearList.php", true);
                xmlhttp.send();
            }

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }
            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }

        function addlistnd() {
            var mySelect = document.getElementById("kecamatan").value;

            if (mySelect.length == 0) {
                document.getElementById("listyear").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("listyear").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getYearList.php", true);
                xmlhttp.send();
            }

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }
            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }

        function addlistrd() {
            var mySelect = document.getElementById("kecamatan").value;

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }

            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }
    </script>

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

        <form id="form" action="" method="post">
            <div class="box">
                <div class="box-header with-border">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-3">Kecamatan:</label>

                            <div class="col-sm-9">
                                <select class="form-control" id="kecamatan" name="kecamatan" onchange="addlist();">"&gt;
                                    <option value="5203090">Aikmel</option>
                                    <option value="5203030">Terara</option>
                                    <option value="5203070">Selong</option>
                                    <option value="5203010">Keruak</option>
                                </select>
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
        </form>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><font size="5"><b>97,1%</b></font></span>

                    <div class="info-box-content">

                        <span class="info-box-number"><font size="2">Rp 14.788.489.281 </font></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 97,1%"></div>
                        </div>
					  <span class="progress-description">
						<b><font size="3">TOTAL BELANJA</font></b>
					  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="info-box bg-purple">
                    <span class="info-box-icon"><font size="5"><b>2,9%</b></font></span>

                    <div class="info-box-content">

                        <span class="info-box-number"><font size="2">Rp 434,112,332 </font></span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 2.9%"></div>
                        </div>
					  <span class="progress-description">
						<b><font size="3">SELISIH ANGGARAN DAN REALISASI</font></b>
					  </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-aqua">
                            <span class="info-box-icon"><font size="5"><b>32.55%</b></font></span>

                            <div class="info-box-content">

                                <span class="info-box-number"><font size="2">Rp 4.814.006.706 </font></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 32.55%"></div>
                                </div>
                  <span class="progress-description">
                    <b><font size="2">BELANJA <br>PEGAWAI</font></b>
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-green">
                            <span class="info-box-icon"><font size="5"><b>48.10%</b></font></span>

                            <div class="info-box-content">
                                <span class="info-box-number"><font size="2">Rp 7.099.531.062</font></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 48.10%"></div>
                                </div>
                  <span class="progress-description">
                    <b><font size="1">BELANJA BARANG <br>DAN JASA</font></b>
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-yellow">
                            <span class="info-box-icon"><font size="5"><b>14.48%</b></font></span>

                            <div class="info-box-content">
                                <span class="info-box-number"><font size="2">Rp. 2.142.001.513</font></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 14.48%"></div>
                                </div>
                  <span class="progress-description">
                    <b><font size="2">BELANJA <br> MODAL</font></b>
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-red">
                            <span class="info-box-icon"><font size="5"><b>4.96%</b></font></span>

                            <div class="info-box-content">
                                <span class="info-box-number"><font size="2">Rp 732,950</font></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 4.96%"></div>
                                </div>
                  <span class="progress-description">
                    <b><font size="2">BELANJA TIDAK<br>LANGSUNG</font></b>
                  </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <!-- BAR CHART -->
                <div class="box box-success">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-12">


                                <link rel="stylesheet" href="style.css" type="text/css">
                                <script src="amcharts/amcharts.js" type="text/javascript"></script>
                                <script src="amcharts/pie.js" type="text/javascript"></script>


                                <script>
                                    var chart;
                                    var legend;

                                    var chartData = [
                                        {
                                            "country": "Belanja Pegawai",
                                            "value": 4814006706
                                        },
                                        {
                                            "country": "Belanja Barang dan Jasa",
                                            "value": 7099531062
                                        },
                                        {
                                            "country": "Belanja Modal",
                                            "value": 2142001513
                                        },
                                        {
                                            "country": "Belanja Tidak Langsung",
                                            "value": 732950000
                                        }
                                    ];

                                    AmCharts.ready(function () {
                                        // PIE CHART
                                        chart = new AmCharts.AmPieChart();
                                        chart.dataProvider = chartData;
                                        chart.titleField = "country";
                                        chart.valueField = "value";
                                        chart.outlineColor = "#FFFFFF";
                                        chart.outlineAlpha = 0.8;
                                        chart.outlineThickness = 2;
                                        chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                                        // this makes the chart 3D
                                        chart.depth3D = 15;
                                        chart.angle = 30;

                                        // LEGEND
                                        // legend = new AmCharts.AmLegend();
                                        //legend.align = "center";
                                        //legend.markerType = "circle";
                                        //chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                                        //chart.addLegend(legend);


                                        // WRITE
                                        chart.write("chartdiv");
                                    });


                                </script>


                                <div id="chartdiv"
                                     style="width: 100%; height: 400px; overflow: hidden; text-align: left;">
                                    <div style="position: relative;" class="amcharts-main-div">
                                        <div style="overflow: hidden; position: relative; text-align: left; width: 1623px; height: 400px; padding: 0px;"
                                             class="amcharts-chart-div">
                                            <svg version="1.1"
                                                 style="position: absolute; width: 1623px; height: 400px; top: 0.399994px; left: 0px;">
                                                <desc>JavaScript chart by amCharts 3.20.17</desc>
                                                <g>
                                                    <path cs="100,100"
                                                          d="M0.5,0.5 L1622.5,0.5 L1622.5,399.5 L0.5,399.5 Z"
                                                          fill="#FFFFFF" stroke="#000000" fill-opacity="0"
                                                          stroke-width="1"
                                                          stroke-opacity="0"></path>
                                                </g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g>
                                                    <g opacity="1"
                                                       aria-label="Belanja Tidak Langsung: 4.96% 732,950,000 "
                                                       visibility="visible" transform="translate(0,0)">
                                                        <path cs="1000,1000"
                                                              d=" M811.5,207.5 L763.3952538445845,107.55018892928416 A157,105,0,0,1,811.5,102.5 L811.5,207.5 Z"
                                                              fill="#caa802" stroke-opacity="0" fill-opacity="1"
                                                              transform="translate(0,0)"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,207.5 L763.3952538445845,107.55018892928416 A157,105,0,0,1,811.5,102.5 L811.5,207.5 Z"
                                                              fill="#caa802" stroke-opacity="0" fill-opacity="1"
                                                              transform="translate(0,-10)"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,192.5 L811.5,207.5 L763.3952538445845,107.55018892928416 L763.3952538445845,92.55018892928416 L811.5,192.5 Z"
                                                              fill="#caa802" stroke-opacity="0" fill-opacity="1"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,87.5 L811.5,102.5 L811.5,207.5 L811.5,192.5 L811.5,87.5 Z"
                                                              fill="#caa802" stroke-opacity="0" fill-opacity="1"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,192.5 L763.3952538445845,92.55018892928416 A157,105,0,0,1,811.5,87.5 L811.5,192.5 Z"
                                                              fill="#FCD202" stroke="#FFFFFF" stroke-width="2"
                                                              stroke-opacity="0.8" fill-opacity="1"></path>
                                                        <path cs="100,100" d="M787.5,89.5 L784.5,76.5 L776.5,76.5"
                                                              fill="none" stroke-opacity="0.2" stroke="#000000"
                                                              visibility="visible"></path>
                                                    </g>
                                                    <g opacity="1" aria-label="Belanja Modal: 14.48% 2,142,001,513 "
                                                       visibility="visible" transform="translate(0,0)">
                                                        <path cs="1000,1000"
                                                              d=" M811.5,207.5 L663.9816795411277,171.563233640145 A157,105,0,0,1,763.3952538445845,107.55018892928416 L811.5,207.5 Z"
                                                              fill="#cc7e01" stroke-opacity="0" fill-opacity="1"
                                                              transform="translate(0,0)"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,207.5 L663.9816795411277,171.563233640145 A157,105,0,0,1,763.3952538445845,107.55018892928416 L811.5,207.5 Z"
                                                              fill="#cc7e01" stroke-opacity="0" fill-opacity="1"
                                                              transform="translate(0,-10)"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,192.5 L811.5,207.5 L663.9816795411277,171.563233640145 L663.9816795411277,156.563233640145 L811.5,192.5 Z"
                                                              fill="#cc7e01" stroke-opacity="0" fill-opacity="1"></path>
                                                        <path cs="1000,1000"
                                                              d=" M763.3952538445845,92.55018892928416 L763.3952538445845,107.55018892928416 L811.5,207.5 L811.5,192.5 L763.3952538445845,92.55018892928416 Z"
                                                              fill="#cc7e01" stroke-opacity="0" fill-opacity="1"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,192.5 L663.9816795411277,156.563233640145 A157,105,0,0,1,763.3952538445845,92.55018892928416 L811.5,192.5 Z"
                                                              fill="#FF9E01" stroke="#FFFFFF" stroke-width="2"
                                                              stroke-opacity="0.8" fill-opacity="1"></path>
                                                        <path cs="100,100" d="M702.5,117.5 L689.5,107.5 L681.5,107.5"
                                                              fill="none" stroke-opacity="0.2" stroke="#000000"
                                                              visibility="visible"></path>
                                                    </g>
                                                    <g opacity="1" aria-label="Belanja Pegawai: 32.55% 4,814,006,706 "
                                                       visibility="visible" transform="translate(0,0)">
                                                        <path cs="1000,1000"
                                                              d=" M811.5,207.5 L811.5,102.5 A157,105,0,0,1,951.1526416108702,255.47670659404687 L811.5,207.5 Z"
                                                              fill="#cc0c00" stroke-opacity="0" fill-opacity="1"
                                                              transform="translate(0,0)"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,207.5 L811.5,102.5 A157,105,0,0,1,951.1526416108702,255.47670659404687 L811.5,207.5 Z"
                                                              fill="#cc0c00" stroke-opacity="0" fill-opacity="1"
                                                              transform="translate(0,-10)"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,192.5 L811.5,207.5 L811.5,102.5 L811.5,87.5 L811.5,192.5 Z"
                                                              fill="#cc0c00" stroke-opacity="0" fill-opacity="1"></path>
                                                        <path cs="1000,1000"
                                                              d=" M951.1526416108702,240.47670659404687 L951.1526416108702,255.47670659404687 L811.5,207.5 L811.5,192.5 L951.1526416108702,240.47670659404687 Z"
                                                              fill="#cc0c00" stroke-opacity="0" fill-opacity="1"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,192.5 L811.5,87.5 A157,105,0,0,1,951.1526416108702,240.47670659404687 L811.5,192.5 Z"
                                                              fill="#FF0F00" stroke="#FFFFFF" stroke-width="2"
                                                              stroke-opacity="0.8" fill-opacity="1"></path>
                                                        <path cs="100,100" d="M946.5,138.5 L963.5,131.5 L971.5,131.5"
                                                              fill="none" stroke-opacity="0.2" stroke="#000000"
                                                              visibility="visible"></path>
                                                    </g>
                                                    <g opacity="1"
                                                       aria-label="Belanja Barang dan Jasa: 48.01% 7,099,531,062 "
                                                       visibility="visible" transform="translate(0,0)">
                                                        <path cs="1000,1000"
                                                              d=" M811.5,207.5 L951.1526416108702,255.47670659404687 A157,105,0,0,1,663.9816795411277,171.563233640145 L811.5,207.5 Z"
                                                              fill="#cc5200" stroke-opacity="0" fill-opacity="1"
                                                              transform="translate(0,0)"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,207.5 L951.1526416108702,255.47670659404687 A157,105,0,0,1,663.9816795411277,171.563233640145 L811.5,207.5 Z"
                                                              fill="#cc5200" stroke-opacity="0" fill-opacity="1"
                                                              transform="translate(0,-10)"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,192.5 L811.5,207.5 L951.1526416108702,255.47670659404687 L951.1526416108702,240.47670659404687 L811.5,192.5 Z"
                                                              fill="#cc5200" stroke-opacity="0" fill-opacity="1"></path>
                                                        <path cs="1000,1000"
                                                              d=" M663.9816795411277,156.563233640145 L663.9816795411277,171.563233640145 L811.5,207.5 L811.5,192.5 L663.9816795411277,156.563233640145 Z"
                                                              fill="#cc5200" stroke-opacity="0" fill-opacity="1"></path>
                                                        <path cs="1000,1000"
                                                              d=" M811.5,192.5 L951.1526416108702,240.47670659404687 A157,105,0,0,1,663.9816795411277,156.563233640145 L811.5,192.5 Z"
                                                              fill="#FF6600" stroke="#FFFFFF" stroke-width="2"
                                                              stroke-opacity="0.8" fill-opacity="1"></path>
                                                        <path cs="100,100" d="M749.5,289.5 L741.5,301.5 L733.5,301.5"
                                                              fill="none" stroke-opacity="0.2" stroke="#000000"
                                                              visibility="visible"></path>
                                                    </g>
                                                </g>
                                                <g></g>
                                                <g>
                                                    <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                        <text y="6" fill="#000000" font-family="Verdana"
                                                              font-size="11px"
                                                              opacity="1" text-anchor="start"
                                                              transform="translate(975,131)"
                                                              style="cursor: default;" visibility="visible">
                                                            <tspan y="6" x="0">Belanja Pegawai: 32.55%</tspan>
                                                        </text>
                                                    </g>
                                                    <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                        <text y="6" fill="#000000" font-family="Verdana"
                                                              font-size="11px"
                                                              opacity="1" text-anchor="end"
                                                              transform="translate(729,301)"
                                                              style="cursor: default;" visibility="visible">
                                                            <tspan y="6" x="0">Belanja Barang dan Jasa: 48.01%</tspan>
                                                        </text>
                                                    </g>
                                                    <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                        <text y="6" fill="#000000" font-family="Verdana"
                                                              font-size="11px"
                                                              opacity="1" text-anchor="end"
                                                              transform="translate(677,107)"
                                                              style="cursor: default;" visibility="visible">
                                                            <tspan y="6" x="0">Belanja Modal: 14.48%</tspan>
                                                        </text>
                                                    </g>
                                                    <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                        <text y="6" fill="#000000" font-family="Verdana"
                                                              font-size="11px"
                                                              opacity="1" text-anchor="end"
                                                              transform="translate(772,76)"
                                                              style="cursor: default;" visibility="visible">
                                                            <tspan y="6" x="0">Belanja Tidak Langsung: 4.96%</tspan>
                                                        </text>
                                                    </g>
                                                </g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g>
                                                    <g></g>
                                                </g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                                <g></g>
                                            </svg>
                                            <a href="http://www.amcharts.com/javascript-charts/"
                                               title="JavaScript charts"
                                               target="_self"
                                               style="position: absolute; text-decoration: none; color: rgb(0, 0, 0); font-family: Verdana; font-size: 11px; opacity: 0.7; display: block; left: 5px; top: 5px;"></a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                </div>

            </div>
            <!-- /.row -->

        </div>

    </section>
    <!-- /.content -->
@endsection
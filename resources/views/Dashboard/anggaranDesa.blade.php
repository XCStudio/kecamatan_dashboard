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
        <!-- /.row -->
        <div class="box box-success">
            <div class="box-header with-border">
                <font size="4">TOTAL BELANJA : <b>RP 1.713.949.947</b></font>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-aqua">
                                <span class="info-box-icon"><font size="5"><b>32,23%</b></font></span>

                                <div class="info-box-content">

                                    <span class="info-box-number"><font size="3">Rp 552.438.857</font></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 32.23%"></div>
                                    </div>
                  <span class="progress-description">
                    <b>PENYELENGARAAN <br>PEMERINTAHAN</b>
                  </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-green">
                                <span class="info-box-icon"><font size="5"><b>61,44%</b></font></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><font size="3">Rp 1.053.100.000</font></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 61.44%"></div>
                                    </div>
                  <span class="progress-description">
                    PEMBANGUNAN<br>&nbsp;
                  </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-yellow">
                                <span class="info-box-icon"><font size="5"><b>4,87%</b></font></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><font size="3">Rp. 83.510.000</font></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 4.87%"></div>
                                    </div>
                  <span class="progress-description">
                    PEMBINAAN<br>KEMASYARAKATAN
                  </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box bg-red">
                                <span class="info-box-icon"><font size="5"><b>1,46%</b></font></span>

                                <div class="info-box-content">
                                    <span class="info-box-number"><font size="3">Rp 25.001.009</font></span>

                                    <div class="progress">
                                        <div class="progress-bar" style="width: 1.46%"></div>
                                    </div>
                  <span class="progress-description">
                    PEMBERDAYAAN<br>MASYARAKAT
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
                        <div class="box-header with-border">
                            <font size="4">TOTAL PENDAPATAN : <b>RP 1.743.949.947</b></font>
                        </div>
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
                                                "country": "Pendapatan Asli Desa (PADes)",
                                                "value": 294350000
                                            },
                                            {
                                                "country": "Dana Desa (APBN)",
                                                "value": 610203000
                                            },
                                            {
                                                "country": "Bagi Hasil Pajak & Retribusi (BHPR)",
                                                "value": 23516000
                                            },
                                            {
                                                "country": "Alokasi Dana Desa (ADD)",
                                                "value": 354243000
                                            },
                                            {
                                                "country": "Bantuan Propinsi (BanProv)",
                                                "value": 20000000
                                            },
                                            {
                                                "country": "Bantuan Kabupaten (Desa Berkembang)",
                                                "value": 845000000
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
                                                     style="position: absolute; width: 1623px; height: 400px; top: -0.166687px; left: 0px;">
                                                    <desc>JavaScript chart by amCharts 3.20.17</desc>
                                                    <g>
                                                        <path cs="100,100"
                                                              d="M0.5,0.5 L1622.5,0.5 L1622.5,399.5 L0.5,399.5 Z"
                                                              fill="#FFFFFF" stroke="#000000" fill-opacity="0"
                                                              stroke-width="1" stroke-opacity="0"></path>
                                                    </g>
                                                    <g></g>
                                                    <g></g>
                                                    <g></g>
                                                    <g></g>
                                                    <g></g>
                                                    <g>
                                                        <g opacity="1"
                                                           aria-label="Bantuan Kabupaten (Desa Berkembang): 39.35% 845,000,000 "
                                                           visibility="visible" transform="translate(0,0)">
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L714.1204920596053,289.8623038247568 A157,105,0,0,1,811.5,102.5 L811.5,207.5 Z"
                                                                  fill="#8db207" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,0)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L714.1204920596053,289.8623038247568 A157,105,0,0,1,811.5,102.5 L811.5,207.5 Z"
                                                                  fill="#8db207" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,-10)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L811.5,207.5 L714.1204920596053,289.8623038247568 L714.1204920596053,274.8623038247568 L811.5,192.5 Z"
                                                                  fill="#8db207" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,87.5 L811.5,102.5 L811.5,207.5 L811.5,192.5 L811.5,87.5 Z"
                                                                  fill="#8db207" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L714.1204920596053,274.8623038247568 A157,105,0,0,1,811.5,87.5 L811.5,192.5 Z"
                                                                  fill="#B0DE09" stroke="#FFFFFF" stroke-width="2"
                                                                  stroke-opacity="0.8" fill-opacity="1"></path>
                                                            <path cs="100,100"
                                                                  d="M663.5,158.5 L644.5,154.5 L636.5,154.5"
                                                                  fill="none" stroke-opacity="0.2" stroke="#000000"
                                                                  visibility="visible"></path>
                                                        </g>
                                                        <g opacity="1"
                                                           aria-label="Bantuan Propinsi (BanProv): 0.93% 20,000,000 "
                                                           visibility="visible" transform="translate(0,0)">
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L721.4900658429481,293.5304231321712 A157,105,0,0,1,714.1204920596053,289.8623038247568 L811.5,207.5 Z"
                                                                  fill="#c6cc01" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,0)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L721.4900658429481,293.5304231321712 A157,105,0,0,1,714.1204920596053,289.8623038247568 L811.5,207.5 Z"
                                                                  fill="#c6cc01" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,-10)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L811.5,207.5 L721.4900658429481,293.5304231321712 L721.4900658429481,278.5304231321712 L811.5,192.5 Z"
                                                                  fill="#c6cc01" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M714.1204920596053,274.8623038247568 L714.1204920596053,289.8623038247568 L811.5,207.5 L811.5,192.5 L714.1204920596053,274.8623038247568 Z"
                                                                  fill="#c6cc01" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L721.4900658429481,278.5304231321712 A157,105,0,0,1,714.1204920596053,274.8623038247568 L811.5,192.5 Z"
                                                                  fill="#F8FF01" stroke="#FFFFFF" stroke-width="2"
                                                                  stroke-opacity="0.8" fill-opacity="1"></path>
                                                            <path cs="100,100"
                                                                  d="M718.5,277.5 L706.5,287.5 L698.5,287.5"
                                                                  fill="none" stroke-opacity="0.2" stroke="#000000"
                                                                  visibility="visible"></path>
                                                        </g>
                                                        <g opacity="1"
                                                           aria-label="Pendapatan Asli Desa (PADes): 13.71% 294,350,000 "
                                                           visibility="visible" transform="translate(0,0)">
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L811.5,102.5 A157,105,0,0,1,930.61319016573,139.09667029809 L811.5,207.5 Z"
                                                                  fill="#cc0c00" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,0)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L811.5,102.5 A157,105,0,0,1,930.61319016573,139.09667029809 L811.5,207.5 Z"
                                                                  fill="#cc0c00" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,-10)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L811.5,207.5 L811.5,102.5 L811.5,87.5 L811.5,192.5 Z"
                                                                  fill="#cc0c00" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M930.61319016573,124.09667029809 L930.61319016573,139.09667029809 L811.5,207.5 L811.5,192.5 L930.61319016573,124.09667029809 Z"
                                                                  fill="#cc0c00" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L811.5,87.5 A157,105,0,0,1,930.61319016573,124.09667029809 L811.5,192.5 Z"
                                                                  fill="#FF0F00" stroke="#FFFFFF" stroke-width="2"
                                                                  stroke-opacity="0.8" fill-opacity="1"></path>
                                                            <path cs="100,100" d="M877.5,97.5 L885.5,85.5 L893.5,85.5"
                                                                  fill="none" stroke-opacity="0.2" stroke="#000000"
                                                                  visibility="visible"></path>
                                                        </g>
                                                        <g opacity="1"
                                                           aria-label="Dana Desa (APBN): 28.42% 610,203,000 "
                                                           visibility="visible" transform="translate(0,0)">
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L930.61319016573,139.09667029809 A157,105,0,0,1,886.0533345710821,299.9063282705955 L811.5,207.5 Z"
                                                                  fill="#cc5200" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,0)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L930.61319016573,139.09667029809 A157,105,0,0,1,886.0533345710821,299.9063282705955 L811.5,207.5 Z"
                                                                  fill="#cc5200" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,-10)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L811.5,207.5 L930.61319016573,139.09667029809 L930.61319016573,124.09667029809 L811.5,192.5 Z"
                                                                  fill="#cc5200" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M886.0533345710821,284.9063282705955 L886.0533345710821,299.9063282705955 L811.5,207.5 L811.5,192.5 L886.0533345710821,284.9063282705955 Z"
                                                                  fill="#cc5200" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L930.61319016573,124.09667029809 A157,105,0,0,1,886.0533345710821,284.9063282705955 L811.5,192.5 Z"
                                                                  fill="#FF6600" stroke="#FFFFFF" stroke-width="2"
                                                                  stroke-opacity="0.8" fill-opacity="1"></path>
                                                            <path cs="100,100"
                                                                  d="M966.5,212.5 L986.5,214.5 L994.5,214.5"
                                                                  fill="none" stroke-opacity="0.2" stroke="#000000"
                                                                  visibility="visible"></path>
                                                        </g>
                                                        <g opacity="1"
                                                           aria-label="Bagi Hasil Pajak &amp; Retribusi (BHPR): 1.10% 23,516,000 "
                                                           visibility="visible" transform="translate(0,0)">
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L886.0533345710821,299.9063282705955 A157,105,0,0,1,876.377042994591,303.1158227022655 L811.5,207.5 Z"
                                                                  fill="#cc7e01" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,0)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L886.0533345710821,299.9063282705955 A157,105,0,0,1,876.377042994591,303.1158227022655 L811.5,207.5 Z"
                                                                  fill="#cc7e01" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,-10)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L811.5,207.5 L886.0533345710821,299.9063282705955 L886.0533345710821,284.9063282705955 L811.5,192.5 Z"
                                                                  fill="#cc7e01" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M876.377042994591,288.1158227022655 L876.377042994591,303.1158227022655 L811.5,207.5 L811.5,192.5 L876.377042994591,288.1158227022655 Z"
                                                                  fill="#cc7e01" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L886.0533345710821,284.9063282705955 A157,105,0,0,1,876.377042994591,288.1158227022655 L811.5,192.5 Z"
                                                                  fill="#FF9E01" stroke="#FFFFFF" stroke-width="2"
                                                                  stroke-opacity="0.8" fill-opacity="1"></path>
                                                            <path cs="100,100"
                                                                  d="M881.5,286.5 L890.5,298.5 L898.5,298.5"
                                                                  fill="none" stroke-opacity="0.2" stroke="#000000"
                                                                  visibility="visible"></path>
                                                        </g>
                                                        <g opacity="1"
                                                           aria-label="Alokasi Dana Desa (ADD): 16.50% 354,243,000 "
                                                           visibility="visible" transform="translate(0,0)">
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L876.377042994591,303.1158227022655 A157,105,0,0,1,721.4900658429481,293.5304231321712 L811.5,207.5 Z"
                                                                  fill="#caa802" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,0)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,207.5 L876.377042994591,303.1158227022655 A157,105,0,0,1,721.4900658429481,293.5304231321712 L811.5,207.5 Z"
                                                                  fill="#caa802" stroke-opacity="0" fill-opacity="1"
                                                                  transform="translate(0,-10)"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L811.5,207.5 L876.377042994591,303.1158227022655 L876.377042994591,288.1158227022655 L811.5,192.5 Z"
                                                                  fill="#caa802" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M721.4900658429481,278.5304231321712 L721.4900658429481,293.5304231321712 L811.5,207.5 L811.5,192.5 L721.4900658429481,278.5304231321712 Z"
                                                                  fill="#caa802" stroke-opacity="0"
                                                                  fill-opacity="1"></path>
                                                            <path cs="1000,1000"
                                                                  d=" M811.5,192.5 L876.377042994591,288.1158227022655 A157,105,0,0,1,721.4900658429481,278.5304231321712 L811.5,192.5 Z"
                                                                  fill="#FCD202" stroke="#FFFFFF" stroke-width="2"
                                                                  stroke-opacity="0.8" fill-opacity="1"></path>
                                                            <path cs="100,100"
                                                                  d="M797.5,297.5 L795.5,322.5 L787.5,322.5"
                                                                  fill="none" stroke-opacity="0.2" stroke="#000000"
                                                                  visibility="visible"></path>
                                                        </g>
                                                    </g>
                                                    <g></g>
                                                    <g>
                                                        <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                            <text y="6" fill="#000000" font-family="Verdana"
                                                                  font-size="11px" opacity="1" text-anchor="start"
                                                                  transform="translate(897,85)" style="cursor: default;"
                                                                  visibility="visible">
                                                                <tspan y="6" x="0">Pendapatan Asli Desa (PADes):</tspan>
                                                                <tspan y="19" x="0">13.71%</tspan>
                                                            </text>
                                                        </g>
                                                        <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                            <text y="6" fill="#000000" font-family="Verdana"
                                                                  font-size="11px" opacity="1" text-anchor="start"
                                                                  transform="translate(998,214)"
                                                                  style="cursor: default;"
                                                                  visibility="visible">
                                                                <tspan y="6" x="0">Dana Desa (APBN): 28.42%</tspan>
                                                            </text>
                                                        </g>
                                                        <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                            <text y="6" fill="#000000" font-family="Verdana"
                                                                  font-size="11px" opacity="1" text-anchor="start"
                                                                  transform="translate(902,298)"
                                                                  style="cursor: default;"
                                                                  visibility="visible">
                                                                <tspan y="6" x="0">Bagi Hasil Pajak &amp; Retribusi
                                                                </tspan>
                                                                <tspan y="19" x="0">(BHPR): 1.10%</tspan>
                                                            </text>
                                                        </g>
                                                        <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                            <text y="6" fill="#000000" font-family="Verdana"
                                                                  font-size="11px" opacity="1" text-anchor="end"
                                                                  transform="translate(783,322)"
                                                                  style="cursor: default;"
                                                                  visibility="visible">
                                                                <tspan y="6" x="0">Alokasi Dana Desa (ADD):</tspan>
                                                                <tspan y="19" x="0">16.50%</tspan>
                                                            </text>
                                                        </g>
                                                        <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                            <text y="6" fill="#000000" font-family="Verdana"
                                                                  font-size="11px" opacity="1" text-anchor="end"
                                                                  transform="translate(694,287)"
                                                                  style="cursor: default;"
                                                                  visibility="visible">
                                                                <tspan y="6" x="0">Bantuan Propinsi (BanProv):</tspan>
                                                                <tspan y="19" x="0">0.93%</tspan>
                                                            </text>
                                                        </g>
                                                        <g visibility="visible" transform="translate(0,0)" opacity="1">
                                                            <text y="6" fill="#000000" font-family="Verdana"
                                                                  font-size="11px" opacity="1" text-anchor="end"
                                                                  transform="translate(632,154)"
                                                                  style="cursor: default;"
                                                                  visibility="visible">
                                                                <tspan y="6" x="0">Bantuan Kabupaten (Desa</tspan>
                                                                <tspan y="19" x="0">Berkembang): 39.35%</tspan>
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
                                                   title="JavaScript charts" target="_self"
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
        </div>
    </section>
    <!-- /.content -->
@endsection
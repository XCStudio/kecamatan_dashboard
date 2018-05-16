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
    <div class="box box-primary">
        <div class="box-header with-border">

            <form class="form-horizontal">

                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="list_desa" class="col-sm-4 control-label">Desa</label>

                        <div class="col-sm-8">
                            <input type="hidden" id="defaultProfil" value="{{ $defaultProfil }}">
                            <select class="form-control" id="list_desa">
                                <option value="ALL">ALL</option>
                                @foreach($list_desa as $desa)
                                    <option value="{{$desa->desa_id}}">{{$desa->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-2 col-sm-12">
                    <div class="form-group">
                        <label for="list_year" class="col-sm-4 control-label">Tahun</label>

                        <div class="col-sm-8">
                            <select class="form-control" id="list_year">
                                @foreach($year_list as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

    {{--Div replace by Kecamatan--}}

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Penduduk</span>
                    <span class="info-box-number" id="total_penduduk">{!! $total_penduduk !!}</span>
                    @if(! Sentinel::guest())
                    <a id="hrefpenduduk" class="small-box-footer" href="#">Detail Info <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
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
                    <span class="info-box-number" id="total_lakilaki">{!! $total_lakilaki !!}</span>
                    @if(! Sentinel::guest())
                    <a id="hrefpenduduklakilaki" class="small-box-footer" href="#">Detail Info <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
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
                    <span class="info-box-number" id="total_perempuan">{!! $total_perempuan !!}</span>
                    @if(! Sentinel::guest())
                    <a id="hrefpendudukperempuan" class="small-box-footer" href="#">Detail Info <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
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
                    <span class="info-box-number" id="total_disabilitas">{!! $total_disabilitas !!}</span>
                    @if(! Sentinel::guest())
                    <a id="hrefpendudukcacat" class="small-box-footer" href="#">Detail Info <i class="fa fa-arrow-circle-right"></i></a>
                    @endif
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
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">
                                <strong></strong>
                            </p>

                            <div id="chart_pertumbuhan_penduduk" style="width: 100%; height: 300px; overflow: visible; text-align: left;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">KTP</span>
                    <span class="info-box-text" id="data_ktp">{!! $ktp_terpenuhi !!} dari {!! $total_penduduk !!}
                        Jiwa Terpenuhi</span>

                    <div class="progress">
                        <div id="ktp_persen" class="progress-bar" style="width: {!! $ktp_persen_terpenuhi !!}%"></div>
                    </div>
                    <span id="ktp_terpenuhi" class="progress-description">{!! $ktp_persen_terpenuhi !!}% Jiwa Tidak Terpenuhi</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion ion-ios-paper-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">Akta Kelahiran</span>
                    <span class="info-box-text" id="data_akta">{!! $akta_terpenuhi !!} dari {!! $total_penduduk !!}
                        Jiwa Terpenuhi</span>

                    <div class="progress">
                        <div id="akta_persen" class="progress-bar" style="width: {!! $akta_persen_terpenuhi !!}%"></div>
                    </div>
                    <span id="akta_terpenuhi" class="progress-description">{!! $akta_persen_terpenuhi !!}% Jiwa Tidak Terpenuhi</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-clipboard"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">Akta Nikah</span>
                    <span class="info-box-text" id="data_nikah">{!! $aktanikah_terpenuhi !!}dari {!! $total_penduduk !!}
                        Jiwa Terpenuhi</span>

                    <div class="progress">
                        <div id="nikah_persen" class="progress-bar"
                             style="width: {!! $aktanikah_persen_terpenuhi !!}%"></div>
                    </div>
                    <span id="nikah_terpenuhi" class="progress-description">{!! $aktanikah_persen_terpenuhi !!}% Jiwa Tidak Terpenuhi</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

        </div>
        <!-- /.row -->

        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#usia" data-toggle="tab">Usia</a></li>
                    <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                    <li><a href="#gol-darah" data-toggle="tab">Golongan Darah</a></li>
                    <li><a href="#perkawinan" data-toggle="tab">Perkawinan</a></li>
                    <li><a href="#agama" data-toggle="tab">Agama</a></li>
                    {{--<li><a href="#kelamin" data-toggle="tab">Kelamin</a></li>--}}
                    {{--<li><a href="#status-tinggal" data-toggle="tab">Status Tinggal</a></li>--}}
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="usia">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart_usia"
                                     style="width:100%; height: 500px; overflow: visible; text-align: left; padding: 10px;;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="pendidikan">
                        <div id="chart_pendidikan"
                             style="width:100%; height: 500px; overflow: visible; text-align: left; padding: 10px;;">
                        </div>
                    </div>
                    <div class="tab-pane" id="gol-darah">
                        <div id="chart_goldarah"
                             style="width:100%; height: 500px; overflow: visible; text-align: left; padding: 10px;;">
                        </div>
                    </div>
                    <div class="tab-pane" id="perkawinan">
                        <div id="chart_kawin"
                             style="width:100%; height: 200px; overflow: visible; text-align: left; padding: 10px;;">
                        </div>
                    </div>
                    <div class="tab-pane" id="agama">
                        <div id="chart_agama"
                             style="width:100%; height: 300px; overflow: visible; text-align: left; padding: 10px;;">
                        </div>
                    </div>
                    {{--<<div class="tab-pane" id="kelamin">
                        <div id="chart_kelamin"
                             style="width:100%; height: 150px; overflow: visible; text-align: left; padding: 10px;;">
                        </div>
                    </div>
                    div class="tab-pane" id="status-tinggal">
                        status tinggal
                    </div>--}}

                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
        <!-- /.col -->
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->
@endsection
@include('partials.asset_datatables')
@include('partials.asset_amcharts')
@include('partials.asset_select2')
@push('scripts')
<script>
    $(function () {

        // Select 2 Kecamatan
        $('#list_desa').select2();
        $('#list_year').select2();



        // Change Dashboard when Lsit Desa changed
        $('#list_desa').on('select2:select', function (e) {
            var kid = $('#defaultProfil').val();
            var did = e.params.data;
            var year = $('#list_year').find(":selected").text();

            change_das_kependudukan(kid, did.id, year);
        });

        // Change Dashboard when List Year changed
        $('#list_year').on('select2:select', function (e) {
            var kid = $('#defaultProfil').val();
            var did = $('#list_desa').find(":selected").val();
            var year = this.value;
            change_das_kependudukan(kid, did, year);
        });


        /*
        Initial Dashboard
         */
        var kid = $('#defaultProfil').val();
        if (kid == null) {
            kid = $('#defaultProfil').val();
        }
        var did = $('#list_desa').find(":selected").val();
        var year = $('#list_year').find(":selected").text();

        change_das_kependudukan(kid, did, year);
        /*
        End Initial Dashboard
         */

    });

    function change_das_kependudukan(kid, did, year) {

        // Load ajax data penduduk
        $.ajax('{!! route('dashboard.show-kependudukan') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {

           /* if(data.total_penduduk==0){
                alert("Data penduduk di tahun " + year + " adalah 0. Data dialihkan ke tahun sebelumnya.");
                $("#list_year").val(year - 1);
                change_das_kependudukan(kid, did, year-1);
            }else{*/
                $('#total_penduduk').html(data.total_penduduk);
                $('#total_lakilaki').html(data.total_lakilaki);
                $('#total_perempuan').html(data.total_perempuan);
                $('#total_disabilitas').html(data.total_disabilitas);
                $('#total_disabilitas').html(data.total_disabilitas);

                $('#data_ktp').html(data.ktp_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
                $('#ktp_persen').css('width', data.ktp_persen_terpenuhi + '%');
                $('#ktp_terpenuhi').html(data.ktp_persen_terpenuhi + '% Jiwa Tidak Terpenuhi');

                $('#data_akta').html(data.akta_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
                $('#akta_persen').css('width', data.akta_persen_terpenuhi + '%');
                $('#akta_terpenuhi').html(data.akta_persen_terpenuhi + '% Jiwa Tidak Terpenuhi');

                $('#data_nikah').html(data.aktanikah_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
                $('#nikah_persen').css('width', data.aktanikah_persen_terpenuhi + '%');
                $('#nikah_terpenuhi').html(data.aktanikah_persen_terpenuhi + '% Jiwa Tidak Terpenuhi');
           /* }*/

        });

        // Load Ajax Chart Pertumbuhan Penduduk
        $.ajax('{!! route('dashboard.chart-kependudukan') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_penduduk(data);
        });

        // Load Ajax Chart Penduduk By Usia
        $.ajax('{!! route('dashboard.chart-kependudukan-usia') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_usia(data);
        });

        // Load Ajax Chart Penduduk By Pendidikan
        $.ajax('{!! route('dashboard.chart-kependudukan-pendidikan') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_pendidikan(data);
        });

        // Load Ajax Chart Penduduk By Golongan Darah
        $.ajax('{!! route('dashboard.chart-kependudukan-goldarah') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_goldarah(data);
        });

        // Load Ajax Chart Penduduk By Status Kawin
        $.ajax('{!! route('dashboard.chart-kependudukan-kawin') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_kawin(data);
        });

        // Load Ajax Chart Penduduk By Agama
        $.ajax('{!! route('dashboard.chart-kependudukan-agama') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_agama(data);
        });

        // Load Ajax Chart Penduduk By Jenis Kelamin
        /*$.ajax('{!! route('dashboard.chart-kependudukan-kelamin') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_kelamin(data);
        });*/
    }

    // Create Chart Penduduk
    function create_chart_penduduk(data) {
        // Chart Pertumbuhan Penduduk
        var chart_penduduk = AmCharts.makeChart("chart_pertumbuhan_penduduk", {
            "type": "serial",
            "theme": "light",
            "marginTop": 0,
            "marginRight": 80,
            "dataProvider": data,
            "valueAxes": [{
                "axisAlpha": 0,
                "position": "left",
                "minimum": 0
            }],
            "graphs": [
                {
                    "id": "g1",
                    "balloonText": "Laki-Laki<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                    "bullet": "round",
                    "bulletSize": 8,
                    "lineColor": "#00c0ef",
                    "lineThickness": 2,
                    "negativeLineColor": "#637bb6",
                    "type": "smoothedLine",
                    "valueField": "value_lk",
                },
                {
                    "id": "gp",
                    "balloonText": "Perempuan<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                    "bullet": "round",
                    "bulletSize": 8,
                    "lineColor": "#dd4b39",
                    "lineThickness": 2,
                    "negativeLineColor": "#637bb6",
                    "type": "smoothedLine",
                    "valueField": "value_pr",
                }
            ],
            "chartCursor": {
                "categoryBalloonDateFormat": "YYYY",
                "cursorAlpha": 0,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "valueLineAlpha": 0.5,
                "fullWidth": true
            },
            "dataDateFormat": "YYYY",
            "categoryField": "year",
            "categoryAxis": {
                "minPeriod": "YYYY",
                "parseDates": true,
                "minorGridAlpha": 0.1,
                "minorGridEnabled": true
            },
            "export": {
                "enabled": true
            },
            "hideCredits": true
        });
    }

    // Create Chart Usia
    function create_chart_usia(data) {
        // Chart Perbandingan Usia
        var chart_usia = AmCharts.makeChart("chart_usia", {
            "theme": "light",
            "type": "serial",
            "startDuration": 1,
            "rotate": true,
            "dataProvider": data,
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Penduduk",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [{
                "text": "Jumlah Penduduk Berdasarkan Kelompok Usia",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "valueField": "value"
            }],
            "depth3D": 5,
            "angle": 10,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "umur",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 90
            },
            "export": {
                "enabled": true
            },
            "hideCredits": true
        });
    }

    // Create Chart Pendidikan
    function create_chart_pendidikan(data) {
        // Chart Perbandingan Pendidikan
        var chart_pendidikan = AmCharts.makeChart("chart_pendidikan", {
            "theme": "light",
            "type": "serial",
            "hideCredits": true,
            "startDuration": 1,
            "rotate": true,
            "dataProvider": data,
            "graphs": [{
                "balloonText": "SD: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#0491c7",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SD",
                "valueField": "SD"
            },{
                "balloonText": "SLTP/Sederajat: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#03749f",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SLTP/Sederajat",
                "valueField": "SLTP"
            },{
                "balloonText": "SLTA/Sederajat: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#025777",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SLTA/Sederajat",
                "valueField": "SLTA"
            },{
                "balloonText": "DIPLOMA: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#013a4f",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "DIPLOMA",
                "valueField": "DIPLOMA"
            },{
                "balloonText": "SARJANA: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#001d27",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SARJANA",
                "valueField": "SARJANA"
            }],
            "depth3D": 5,
            "angle": 10,

            "categoryField": "year",
            "categoryAxis": {
                "gridPosition": "start",
            },
            "export": {
                "enabled": true
            },
            "legend": {
                "enabled": true,
                "useGraphSettings": true
            },
            "allLabels": [{
                "text": "Jumlah Penduduk Berdasarkan Tingkat Pendidikan",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
            "valueAxes": [{
                "baseValue" : 0,
                "minimum": 0
            }],
        });
    }

    // Create Chart Golongan Darah
    function create_chart_goldarah(data) {
        // Chart Perbandingan Pendidikan
        var chart_goldarah = AmCharts.makeChart("chart_goldarah", {
            "theme": "light",
            "type": "serial",
            "startDuration": 1,
            "rotate": true,
            "dataProvider": data,
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Penduduk",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [{
                "text": "Jumlah Penduduk Berdasarkan Golongan Darah",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "valueField": "total"
            }],
            "depth3D": 5,
            "angle": 10,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "blod_type",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 90
            },
            "export": {
                "enabled": true
            },
            "hideCredits": true
        });
    }

    //Create Chart Status Kawin
    function create_chart_kawin(data){
        // Chart Perbandingan Status Kawin
        var chart_kawin = AmCharts.makeChart("chart_kawin", {
            "theme": "light",
            "type": "serial",
            "startDuration": 1,
            "rotate": true,
            "dataProvider": data,
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Penduduk",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [{
                "text": "Jumlah Penduduk Berdasarkan Status Perkawinan",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "valueField": "total"
            }],
            "depth3D": 5,
            "angle": 10,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "status",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 90
            },
            "export": {
                "enabled": true
            },
            "hideCredits": true
        });
    }

    //Create Chart Agama
    function create_chart_agama(data){
        // Chart Perbandingan Status Kawin
        var chart_agama = AmCharts.makeChart("chart_agama", {
            "theme": "light",
            "type": "serial",
            "startDuration": 1,
            "rotate": true,
            "dataProvider": data,
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Penduduk",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [{
                "text": "Jumlah Penduduk Berdasarkan Agama",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "valueField": "total"
            }],
            "depth3D": 5,
            "angle": 10,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "religion",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 90
            },
            "export": {
                "enabled": true
            },
            "hideCredits": true
        });
    }

    //Create Chart Jenis Kelamin
    function create_chart_kelamin(data){
        // Chart Perbandingan Status Kawin
        var chart_kelamin = AmCharts.makeChart("chart_kelamin", {
            "theme": "light",
            "type": "serial",
            "startDuration": 1,
            "rotate": true,
            "dataProvider": data,
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Penduduk",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [{
                "text": "Jumlah Penduduk Berdasarkan Jenis Kelamin",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "valueField": "total"
            }],
            "depth3D": 5,
            "angle": 10,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "sex",
            "categoryAxis": {
                "gridPosition": "start",
                "labelRotation": 90
            },
            "export": {
                "enabled": true
            },
            "hideCredits": true
        });
    }


</script>

<div id="detail-modal" class="modal fade in">
    <div class="modal-dialog" style="width: auto; max-width: 85%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Penduduk</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered table-responsive" id="penduduk-table">
                    <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No. KK</th>
                        <th>Alamat</th>
                        <th>Dusun</th>
                        <th>RW</th>
                        <th>RT</th>
                        <th>Pendidikan dalam KK</th>
                        <th>Umur</th>
                        <th>Pekerjaan</th>
                        <th>Status Kawin</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <a id="delete-modal-cancel" href="#" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Keluar</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        var type = '';
        var data = null;

        $(document).on('click', '#hrefpenduduk', function(e) {
            type = 'C';
            $('#detail-modal').find('.modal-title').html('Detail Penduduk');

            $('#detail-modal').modal('show');
            e.preventDefault();
        });

        $(document).on('click', '#hrefpenduduklakilaki', function(e) {
            type = 'L';
            $('#detail-modal').find('.modal-title').html('Detail Penduduk Laki-Laki');

            $('#detail-modal').modal('show');
            e.preventDefault();
        });

        $(document).on('click', '#hrefpendudukperempuan', function(e) {
            type = 'P';
            $('#detail-modal').find('.modal-title').html('Detail Penduduk Perempuan');

            $('#detail-modal').modal('show');
            e.preventDefault();
        });

        $(document).on('click', '#hrefpendudukcacat', function(e) {
            type = 'D';
            $('#detail-modal').find('.modal-title').html('Detail Penduduk Disabilitas');

            $('#detail-modal').modal('show');
            e.preventDefault();
        });

        $("#detail-modal").on("show.bs.modal", function (e) {

            var id = $(e.relatedTarget).data('target-id');
            var kid = $('#defaultProfil').val();
            if (kid == null) {
                kid = $('#defaultProfil').val();
            }
            var did = $('#list_desa').find(":selected").val();
            var year = $('#list_year').find(":selected").text();

            data = $('#penduduk-table').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    url: "{!! route( 'dashboard.data-penduduk' ) !!}",
                    type: 'GET',
                    data: {t:type, kid:kid, did:did, year:year},
                },
                columns: [
                    // {data: 'action', name: 'action', class: 'text-center', searchable: false, orderable: false},
                    {data: 'nik', name: 'nik'},
                    {data: 'nama', name: 'nama'},
                    {data: 'no_kk', name: 'no_kk'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'dusun', name: 'dusun'},
                    {data: 'rw', name: 'rw'},
                    {data: 'rt', name: 'rt'},
                    {data: 'pendidikan', name: 'pendidikan_kk'},
                    {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                    {data: 'pekerjaan', name: 'pekerjaan'},
                    {data: 'status_kawin', name: 'status_kawin'},
                ],
                order: [[0, 'desc']]
            });

            $(this).find('.modal-body').css({
                width:'auto', //probably not needed
                height:'auto', //probably not needed
                margin: 'auto',
                'max-height':'80%'
            });

        });

        $('#detail-modal').on('hidden.bs.modal', function () {
            // do something…
            data.destroy();
            $('#penduduk-table').empty();
        })
    });
</script>

@endpush

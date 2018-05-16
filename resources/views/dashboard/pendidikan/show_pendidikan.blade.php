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

                        <div class="col-md-8">
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

                        <div class="col-md-8">
                            <select class="form-control" id="list_year">
                                <option value="ALL">ALL</option>
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

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#jumlah_penduduk" data-toggle="tab">Tingkat Pendidikan</a></li>
                    <li><a href="#jumlah_siswa" data-toggle="tab">Jumlah Siswa PAUD</a></li>
                    <li><a href="#jumlah_tidak_sekolah" data-toggle="tab">Jumlah Fasilitas PAUD</a></li>
                    {{-- <li><a href="#jumlah_siswa_fasilitas" data-toggle="tab">Jumlah Siswa dan Fasilitas</a></li> --}}
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="jumlah_penduduk">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart_penduduk_pendidikan"
                                     style="width: 100%; min-height: 800px; overflow: auto; text-align: left;">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="jumlah_siswa">
                        <div id="chart_siswa_pendidikan"
                             style="width:100%; height: 500px; overflow: visible; text-align: left; padding: 10px;;">
                        </div>
                    </div>
                    <div class="tab-pane" id="jumlah_tidak_sekolah">
                        <div id="chart_tidak_sekolah"
                             style="width:100%; height: 500px; overflow: visible; text-align: left; padding: 10px;;">
                        </div>
                    </div>
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
@endsection

@include('partials.asset_amcharts')
@include('partials.asset_select2')
@push('scripts')
<script>
    $(function () {

        // Select 2 Kecamatan
        $('#list_desa').select2();
        $('#list_year').select2();

        var kid = $('#defaultProfil').find(":selected").val();
        if (kid == null) {
            kid = $('#defaultProfil').val();
        }
        var did = $('#list_desa').find(":selected").val();
        var year = $('#list_year').find(":selected").val();

        /*
         Initial Chart Dashboard Pendidikan
         */
        change_das_pendidikan(kid, did, year);
        /*
         End Initial
         */


        // Change div das_kependudukan when Kecamatan changed


        $('#list_desa').on('select2:select', function (e) {
            var kid = $('#defaultProfil').find(":selected").val();
            if (kid == null) {
                kid = $('#defaultProfil').val();
            }
            var did = $('#list_desa').find(":selected").val();
            var year = $('#list_year').find(":selected").val();
            change_das_pendidikan(kid, did, year);
        });

        $('#list_year').on('select2:select', function (e) {
            var kid = $('#defaultProfil').find(":selected").val();
            if (kid == null) {
                kid = $('#defaultProfil').val();
            }
            var did = $('#list_desa').find(":selected").val();
            var year = $('#list_year').find(":selected").val();

            change_das_pendidikan(kid, did, year);
        });
    });

    function change_das_pendidikan(kid, did, year) {

        $.ajax('{!! route('dashboard.pendidikan.chart-tingkat-pendidikan') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_tingkat_pendidikan(data['grafik']);
        });

        $.ajax('{!! route('dashboard.pendidikan.chart-siswa-paud') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_jumlah_siswa(data['grafik']);
        });

        $.ajax('{!! route('dashboard.pendidikan.chart-fasilitas-paud') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_tidak_sekolah(data['grafik']);
        });
    }


    function create_chart_tingkat_pendidikan(data) {
        /**
         * Define data for each year
         */

        /**
         * Create the chart
         */
        var chart_penduduk_pendidikan = AmCharts.makeChart("chart_penduduk_pendidikan", {
            "theme": "light",
            "type": "serial",
            "hideCredits": true,
            "rotate": true,
            "startDuration": 2,
            "dataProvider": data,
            "graphs": [{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#86abf8",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "Tidak Tamat Sekolah",
                "valueField": "tidak_tamat_sekolah"
            },{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#6e9af7",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "Tamat SD",
                "valueField": "tamat_sd"
            },{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#5689f5",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "Tamat SMP",
                "valueField": "tamat_smp"
            },{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#3e78f4",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "Tamat SMA",
                "valueField": "tamat_sma"
            },{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#2667f3",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "Tamat Diploma/Sederajat",
                "valueField": "tamat_diploma_sederajat"
            }],
            "depth3D": 5,
            "angle": 15,
            /*"chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },*/
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

    //Create Chart Jumlah Siswa
    function create_chart_jumlah_siswa(data) {
        // Chart Perbandingan Jumlah Siswa berdasarkan TIngkat Pendidikan
        var chart_siswa_pendidikan = AmCharts.makeChart("chart_siswa_pendidikan", {
            "theme": "light",
            "type": "serial",
            "hideCredits": true,
            "rotate": true,
            "startDuration": 1,
            "dataProvider": data,
            "graphs": [{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#fbf112",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "Siswa PAUD",
                "valueField": "siswa_paud"
            },{
                "balloonText": "[[title]]: <b>[[value]]</b>",
                //"fillColorsField": "color",
                "fillColors" : "#d6cd04",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "Anak Usia PAUD",
                "valueField": "anak_usia_paud"
            }],
            "depth3D": 5,
            "angle": 15,
            /*"chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },*/
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
                "text": "Jumlah Siswa PAUD",
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

    //Create Chart Jumlah Anak TIdak Sekolah
    function create_chart_tidak_sekolah(data) {
        // Chart Perbandingan Jumlah Anak Tidak Sekolah
        var chart_tidak_sekolah = AmCharts.makeChart("chart_tidak_sekolah", {
            "type": "serial",
            "theme": "light",
            "legend": {
                "horizontalGap": 10,
                "maxColumns": 1,
                "position": "right",
                "useGraphSettings": true,
                "markerSize": 10
            },
            "dataProvider": data,
            "valueAxes": [{
                "stackType": "regular",
                "axisAlpha": 0.3,
                "gridAlpha": 0
            }],
            "graphs": [{
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "Jumlah PAUD",
                "type": "column",
                "color": "#000000",
                "valueField": "jumlah_paud"
            }, {
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "Jumlah Guru PAUD",
                "type": "column",
                "color": "#000000",
                "valueField": "jumlah_guru_paud"
            }, {
                "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
                "fillAlphas": 0.8,
                "labelText": "[[value]]",
                "lineAlpha": 0.3,
                "title": "Jumlah Siswa PAUD",
                "type": "column",
                "color": "#000000",
                "valueField": "jumlah_siswa_paud"
            }],
            "categoryField": "year",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "gridAlpha": 0,
                "position": "left"
            },
            "export": {
                "enabled": true
            },
            "hideCredits": true,
            "allLabels": [{
                "text": "Perbandingan Siswa PAUD dan Jumlah Fasilitas PAUD",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
        });
    }
</script>

@endpush

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
                                    <option value="{{$desa->id}}">{{$desa->nama}}</option>
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
                    <li class="active"><a href="#jumlah_penduduk" data-toggle="tab">Jumlah Penduduk</a></li>
                    <li><a href="#jumlah_siswa" data-toggle="tab">Jumlah Siswa</a></li>
                    <li><a href="#jumlah_tidak_sekolah" data-toggle="tab">Jumlah Anak Tidak Bersekolah</a></li>
                    {{-- <li><a href="#jumlah_siswa_fasilitas" data-toggle="tab">Jumlah Siswa dan Fasilitas</a></li> --}}
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="jumlah_penduduk">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart_penduduk_pendidikan"
                                     style="width: 100%; min-height: 400px; overflow: auto; text-align: left;">

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
                    {{-- <div class="tab-pane" id="jumlah_siswa_fasilitas">
                        <div id="chart_siswa_fasilitas"
                             style="width:100%; height: 500px; overflow: visible; text-align: left; padding: 10px;;">
                        </div>
                    </div> --}}
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

        $.ajax('{!! route('dashboard.chart-pendidikan-penduduk') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_tingkat_pendidikan(data);
        });

        $.ajax('{!! route('dashboard.chart-pendidikan-siswa') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_jumlah_siswa(data);
        });

        $.ajax('{!! route('dashboard.chart-tidak-sekolah') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_tidak_sekolah(data);
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
            "startDuration": 2,
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
            "depth3D": 20,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
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
            "startDuration": 2,
            "dataProvider": data,
            "graphs": [{
                "balloonText": "SD: <b>[[value]]</b>",
                "fillColors": "#5ef250",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SD",
                "valueField": "SD"
            },{
                "balloonText": "SLTP/Sederajat: <b>[[value]]</b>",
                "fillColors": "#54d948",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SLTP/Sederajat",
                "valueField": "SLTP"
            },{
                "balloonText": "SLTA/Sederajat: <b>[[value]]</b>",
                "fillColors": "#4bc140",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SLTA/Sederajat",
                "valueField": "SLTA"
            },{
                "balloonText": "DIPLOMA: <b>[[value]]</b>",
                "fillColors": "#41a938",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "DIPLOMA",
                "valueField": "DIPLOMA"
            },{
                "balloonText": "SARJANA: <b>[[value]]</b>",
                "fillColors": "#389130",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SARJANA",
                "valueField": "SARJANA"
            }],
            "depth3D": 20,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
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
                "text": "Jumlah Siswa Berdasarkan Tingkat Pendidikan",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
            "valueAxes": [{
                "baseValue" : 0,
            }],
        });
    }

    //Create Chart Jumlah Anak TIdak Sekolah
    function create_chart_tidak_sekolah(data) {
        // Chart Perbandingan Jumlah Anak Tidak Sekolah
        var chart_tidak_sekolah = AmCharts.makeChart("chart_tidak_sekolah", {
            "theme": "light",
            "type": "serial",
            "hideCredits": true,
            "startDuration": 2,
            "dataProvider": data,
            "graphs": [{
                "balloonText": "Usia Anak 6-12 (SD): <b>[[value]]</b>",
                "fillColors": "#fdff10",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SD",
                "valueField": "SD"
            },{
                "balloonText": "Usia Anak 13-15 (SLTP/Sederajat): <b>[[value]]</b>",
                "fillColors": "#cacc0c",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SLTP/Sederajat",
                "valueField": "SLTP"
            },{
                "balloonText": "Usia Anak 15-18 (SLTA/Sederajat): <b>[[value]]</b>",
                "fillColors": "#979909",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "title": "SLTA/Sederajat",
                "valueField": "SLTA"
            }],
            "depth3D": 20,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
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
                "text": "Jumlah Anak Tidak Sekolah",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
            "valueAxes": [{
                "baseValue" : 0,
            }],
        });
    }
</script>

@endpush

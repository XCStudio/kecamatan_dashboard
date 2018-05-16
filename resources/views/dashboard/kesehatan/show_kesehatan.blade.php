@extends('layouts.dashboard_template')
@section('content')
        
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title or "Page Title" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">{{$page_title}}</li>
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
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#aki_akb" data-toggle="tab">Data Kematian Ibu dan Bayi</a></li>
                    <li><a href="#imunisasi" data-toggle="tab">Cakupan Imunisasi</a></li>
                    <li><a href="#epidemi" data-toggle="tab">Epidemi Penyakit</a></li>
                    <li><a href="#toilet_sanitasi" data-toggle="tab">Toilet & Sanitasi</a></li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="aki_akb">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart_aki_akb" style="width: 100%; height: 350px; overflow: visible; text-align: left;"></div>
                            </div>
                            <div id="tabel_aki_akb" class="col-md-12">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="imunisasi">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart_imunisasi" style="width: 100%; height: 350px; overflow: visible; text-align: left;"></div>
                            </div>
                            <div id="tabel_imunisasi" class="col-md-12">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="epidemi">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart_penyakit" style="width: 100%; min-height: 350px; overflow: visible; text-align: left;"></div>
                            </div>
                            <div id="tabel_penyakit" class="col-md-12">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="toilet_sanitasi">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart_sanitasi" style="width: 100%; min-height: 350px; overflow: visible; text-align: left;"></div>
                            </div>
                            <div id="tabel_sanitasi" class="col-md-12">

                            </div>
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


        // Change Dashboard when Lsit Desa changed
        $('#list_desa').on('select2:select', function (e) {
            var kid = $('#defaultProfil').val();
            var did = e.params.data;
            var year = $('#list_year').find(":selected").text();

            change_das_kesehatan(kid, did.id, year);
        });

        // Change Dashboard when List Year changed
        $('#list_year').on('select2:select', function (e) {
            var kid = $('#defaultProfil').val();
            var did = $('#list_desa').find(":selected").val();
            var year = this.value;
            change_das_kesehatan(kid, did, year);
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

        change_das_kesehatan(kid, did, year);
        /*
         End Initial Dashboard
         */
    });

    function change_das_kesehatan(kid, did, year) {
        $.ajax('{!! route('dashboard.kesehatan.chart-akiakb') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_akiakb(data['grafik']);
            $('#tabel_aki_akb').html(data['tabel']);
        });

        $.ajax('{!! route('dashboard.kesehatan.chart-imunisasi') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_imunisasi(data['grafik']);
            $('#tabel_imunisasi').html(data['tabel']);
        });

       /* $.ajax('{!! route('dashboard.kesehatan.chart-penyakit') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            if (year=='ALL'){
                create_chart_penyakit(data['grafik']);
            }else{
                create_chart_penyakit2(data['grafik']);
            }

            $('#tabel_penyakit').html(data['tabel']);
        });*/

        $.ajax('{!! route('dashboard.kesehatan.chart-sanitasi') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {
            create_chart_sanitasi(data['grafik']);
            $('#tabel_sanitasi').html(data['tabel']);
        });
    }


    /**
     * Create the chart
     */
    function create_chart_akiakb(data) {

        var chart_aki_akb = AmCharts.makeChart("chart_aki_akb", {
            "type": "serial",
            "theme": "light",
            "categoryField": "year",
            "hideCredits": true,
            "rotate": true,
            "startDuration": 1,
            "categoryAxis": {
                "gridPosition": "start",
                //"position": "left"
            },
            //"trendLines": [],
            "graphs": [
                {
                    "balloonText": "AKI:[[value]]",
                    "fillAlphas": 0.8,
                    "fillColors": "#07749f",
                    "id": "AmGraph-1",
                    "lineAlpha": 0.2,
                    "title": "AKI",
                    "type": "column",
                    "valueField": "aki"
                },
                {
                    "balloonText": "AKB:[[value]]",
                    "fillAlphas": 0.8,
                    "fillColors": "#025777",
                    "id": "AmGraph-2",
                    "lineAlpha": 0.2,
                    "title": "AKB",
                    "type": "column",
                    "valueField": "akb"
                }
            ],
            "depth3D": 5,
            "angle": 15,
            "guides": [],
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Angka Kematian",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [],
            "balloon": {},
            "titles": [],
            "dataProvider": data,
            "export": {
                "enabled": true
            }
        });
    }

    function create_chart_imunisasi(data) {

        var chart_imunisasi = AmCharts.makeChart("chart_imunisasi", {
            "type": "serial",
            "theme": "light",
            "categoryField": "year",
            "hideCredits": true,
            "rotate": true,
            "startDuration": 1,
            "categoryAxis": {
                "gridPosition": "start",
                //"position": "left"
            },
            //"trendLines": [],
            "graphs": [
                {
                    "balloonText": "Cakupan Imunisasi:[[value]]",
                    "fillAlphas": 0.8,
                    "fillColors": "#03749f",
                    "id": "AmGraph-1",
                    "lineAlpha": 0.2,
                    "title": "AKI",
                    "type": "column",
                    "valueField": "cakupan_imunisasi"
                },
            ],
            "depth3D": 5,
            "angle": 15,
            "guides": [],
            "valueAxes": [{
                "position": "left",
                "title": "Cakupan Imunisas",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [],
            "balloon": {},
            "titles": [],
            "dataProvider": data,
            "export": {
                "enabled": true
            }
        });
    }

    function create_chart_penyakit(data) {

        var chart_penyakit = AmCharts.makeChart("chart_penyakit", {
            "type": "serial",
            "theme": "light",
            "categoryField": "year",
            "hideCredits": true,
            "rotate": true,
            "startDuration": 1,
            "categoryAxis": {
                "gridPosition": "start",
                //"position": "left"
            },
            //"trendLines": [],
            "graphs": [
                {
                    "balloonText": "Jumlah Penderita:[[value]]",
                    "fillAlphas": 0.8,
                    "fillColors": "#03749f",
                    "id": "AmGraph-1",
                    "lineAlpha": 0.2,
                    "title": "Jumlah Penderita",
                    "type": "column",
                    "valueField": "jumlah"
                },
            ],
            "depth3D": 5,
            "angle": 15,
            "guides": [],
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Penderita",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [],
            "balloon": {},
            "titles": [],
            "dataProvider": data,
            "export": {
                "enabled": true
            }
        });
    }

    function create_chart_penyakit2(data) {
        //console.log(data);
        var chart = AmCharts.makeChart("chart_penyakit", {
            "type": "serial",
            "theme": "light",
            "categoryField": "year",
            "rotate": true,
            "startDuration": 1,
            "categoryAxis": {
                "gridPosition": "start",
                "position": "left"
            },
            "trendLines": [],
            "graphs": [

            ],
            "guides": [],
            "valueAxes": [
                {
                    "id": "ValueAxis-1",
                    "position": "top",
                    "axisAlpha": 0
                }
            ],
            "allLabels": [],
            "balloon": {},
            "titles": [],
            "dataProvider": data,
            "export": {
                "enabled": true
            }

        });

        /*{
            "balloonText": "Income:[[value]]",
                "fillAlphas": 0.8,
                "id": "AmGraph-1",
                "lineAlpha": 0.2,
                "title": "Income",
                "type": "column",
                "valueField": "income"
        },
        {
            "balloonText": "Expenses:[[value]]",
                "fillAlphas": 0.8,
                "id": "AmGraph-2",
                "lineAlpha": 0.2,
                "title": "Expenses",
                "type": "column",
                "valueField": "expenses"
        }*/

        var graphs = [new AmCharts.AmGraph()];

        // SETTINGS
        var i;
        for (i = 0; i < data.length; i++) {
            console.log(data[i]);
        }
        // ATTACH TO CHART INSTANCE;
    }

    function create_chart_sanitasi(data) {

        var chart_sanitasi= AmCharts.makeChart("chart_sanitasi", {
            "type": "serial",
            "theme": "light",
            "categoryField": "year",
            "hideCredits": true,
            "rotate": true,
            "startDuration": 1,
            "categoryAxis": {
                "gridPosition": "start",
                //"position": "left"
            },
            //"trendLines": [],
            "graphs": [
                {
                    "balloonText": "Toilet:[[value]]",
                    "fillAlphas": 0.8,
                    "fillColors": "#07749f",
                    "id": "AmGraph-1",
                    "lineAlpha": 0.2,
                    "title": "Toilet",
                    "type": "column",
                    "valueField": "toilet"
                },
                {
                    "balloonText": "Sanitasi:[[value]]",
                    "fillAlphas": 0.8,
                    "fillColors": "#025777",
                    "id": "AmGraph-2",
                    "lineAlpha": 0.2,
                    "title": "Sanitasi",
                    "type": "column",
                    "valueField": "sanitasi"
                }
            ],
            "depth3D": 5,
            "angle": 15,
            "guides": [],
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Toilet dan Sanitasi",
                "baseValue" : 0,
                "minimum": 0
            }],
            "allLabels": [],
            "balloon": {},
            "titles": [],
            "dataProvider": data,
            "export": {
                "enabled": true
            }
        });
    }
</script>
@endpush
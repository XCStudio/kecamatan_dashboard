@extends('layouts.dashboard_template') @section('content')

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

                <div class="col-md-4 col-lg-4 col-sm-12">

                    <div class="form-group">
                        <label for="bulan" class="col-sm-4 control-label">Bulan</label>

                        <div class="col-sm-8">
                            <select class="form-control" id="list_months" name="m">
                                <option value="ALL">ALL</option>
                                @foreach(months_list() as $key=> $month)
                                    <option value="{{$key}}">{{$month}}</option>
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

    <div class="row">
        <!-- BAR CHART -->
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Persentase Anggaran Desa</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">

                    <div id="chartdiv" style="width: 100%; height: 400px; overflow: hidden; text-align: left;">

                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
            </div>
        </div>

    </div>
    <!-- /.row -->

    <div id="detail_anggaran">

    </div>
    </div>

</section>
<!-- /.content -->
@endsection @include('partials.asset_amcharts') @include('partials.asset_select2') @push('scripts')
<script>
    $(function () {

        // Select 2 Kecamatan
        $('#list_desa').select2();
        $('#list_months').select2();
        $('#list_year').select2();


        var did = $('#list_desa').find(":selected").val();
        var mid = $('#list_months').find(":selected").val();
        var year = $('#list_year').find(":selected").val();

        /*
         Initial Chart Dashboard Pendidikan
         */
        das_chart_anggaran(mid, did, year);
        /*
         End Initial
         */


        $('#list_desa').on('select2:select', function (e) {
            var did = $('#list_desa').find(":selected").val();
            var mid = $('#list_months').find(":selected").val();
            var year = $('#list_year').find(":selected").val();
            das_chart_anggaran(mid, did, year);
        });

        $('#list_months').on('select2:select', function (e) {
            var did = $('#list_desa').find(":selected").val();
            var mid = $('#list_months').find(":selected").val();
            var year = $('#list_year').find(":selected").val();
            das_chart_anggaran(mid, did, year);
        });

        $('#list_year').on('select2:select', function (e) {
            var did = $('#list_desa').find(":selected").val();
            var mid = $('#list_months').find(":selected").val();
            var year = $('#list_year').find(":selected").val();
            das_chart_anggaran(mid, did, year);
        });
    });

    function das_chart_anggaran(mid, did, year) {

        $.ajax('{!! route('dashboard.chart-anggaran-desa') !!}', {
            data: {
                mid: mid,
                did: did,
                y: year
            }
        }).done(function (data) {
            create_chart_anggaran(data.grafik);
            alert
            $('#detail_anggaran').html(data.detail);
        });

    }


    function create_chart_anggaran(data) {

        /**
         * Create the chart
         */
        var chart = AmCharts.makeChart("chartdiv", {
            "hideCredits": true,
            "type": "pie",
            "theme": "light",
            "dataProvider": data,
            "valueField": "jumlah",
            "titleField": "anggaran",
            "outlineAlpha": 0.4,
            "depth3D": 15,
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "angle": 30,
            "export": {
                "enabled": true,
                "pageOrigin":false,
                "fileName":"Persentase Anggaran Desa (APBDes)",
            },
            "allLabels": [{
                "text": "Persentase Anggaran Desa (APBDes)",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": 10
            }],
            "legend":{
                "position":"bottom",
                "marginRight":20,
                "autoMargins":false,
                "valueWidth": 120
            },
            "marginTop" : 50
        });

        chart.addListener("init", handleInit);

        chart.addListener("rollOverSlice", function(e) {
            handleRollOver(e);
        });

        function handleInit(){
            chart.legend.addListener("rollOverItem", handleRollOver);
        }

        function handleRollOver(e){
            var wedge = e.dataItem.wedge.node;
            wedge.parentNode.appendChild(wedge);
        }
    }
</script>

@endpush

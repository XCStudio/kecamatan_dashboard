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
            <form class="form-horizontal">
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="list_kecamatan" class="col-sm-4 control-label">Kecamatan</label>

                        <div class="col-sm-8">
                            <input type="hidden" id="defaultProfil" value="{{ $defaultProfil }}">
                            <select class="form-control" id="list_kecamatan" name="kecamatan">
                                @foreach($list_kecamatan as $kecamatan)
                                    @if($kecamatan->kecamatan_id == $defaultProfil)
                                        <option value="{{ $kecamatan->kecamatan_id }}"
                                                selected="true">{{ $kecamatan->kecamatan->nama }}</option>
                                    @else
                                        <option value="{{ $kecamatan->kecamatan_id }}">{{ $kecamatan->kecamatan->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="list_desa" class="col-sm-4 control-label">Desa</label>

                        <div class="col-sm-8">
                            <select class="form-control" id="list_desa">
                                <option value="ALL">ALL</option>
                                @foreach($list_desa as $desa)
                                    <option value="{{$desa->id}}">{{$desa->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
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

    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-pie-chart"></i>

                    <h3 class="box-title" id="JudulGrafik">Jumlah Penduduk Berdasarkan Tingkat Pendidikan</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart_pendidikan" style="width: 100%; min-height: 400px; overflow: auto; text-align: left;">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

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
        $('#list_kecamatan').select2();
        $('#list_desa').select2();
        $('#list_year').select2();

        // Change div das_kependudukan when Kecamatan changed
        $('#list_kecamatan').on('select2:select', function (e) {
            var kid = e.params.data;
            $.ajax('{!! route('api.desa-by-kid') !!}', {
                data: {kid: kid.id},
                dataType: "json"
            }).done(function (data) {
                var $el = $("#list_desa");
                $('#list_desa option:gt(0)').remove(); // remove old options
                $.each(data, function (key, value) {
                    $el.append($("<option></option>")
                            .attr("value", data[key].id).text(data[key].nama));
                });
            });

            var did = $('#list_desa').find(":selected").val();
            var year = $('#list_year').find(":selected").text();

            change_das_kependudukan(kid.id, did, year);
        });

        $('#list_desa').on('select2:select', function (e) {
            var kid = $('#list_kecamatan').val();
            var did = e.params.data;
            var year = $('#list_year').find(":selected").text();

            change_das_kependudukan(kid, did.id, year);
        });

        $('#list_year').on('select2:select', function (e) {
            var kid = $('#list_kecamatan').val();
            var did = $('#list_desa').find(":selected").val();
            var year = this.value;
            change_das_kependudukan(kid, did, year);
        });


        var kid = $('#list_kecamatan').val();
        if (kid == null) {
            kid = $('#defaultProfil').val();
        }
        var did = $('#list_desa').find(":selected").val();
        var year = $('#list_year').find(":selected").text();

        /*
            Initial Chart Dashboard Pendidikan
         */
        change_das_kependudukan(kid, did, year);
        create_chart_tingkat_pendidikan();


    });

    function change_das_kependudukan(kid, did, year) {
        $.ajax('{!! route('dashboard.show-kependudukan') !!}', {
            data: {kid: kid, did: did, y: year}
        }).done(function (data) {

            $('#total_penduduk').html(data.total_penduduk);
            $('#total_lakilaki').html(data.total_lakilaki);
            $('#total_perempuan').html(data.total_perempuan);
            $('#total_disabilitas').html(data.total_disabilitas);
            $('#total_disabilitas').html(data.total_disabilitas);

            $('#data_ktp').html(data.ktp_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
            $('#ktp_persen').css('width', data.ktp_persen_terpenuhi + '%');
            $('#ktp_terpenuhi').html(data.ktp_persen_terpenuhi + '% Jiwa Terpenuhi');

            $('#data_akta').html(data.akta_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
            $('#akta_persen').css('width', data.akta_persen_terpenuhi + '%');
            $('#akta_terpenuhi').html(data.akta_persen_terpenuhi + '% Jiwa Terpenuhi');

            $('#data_nikah').html(data.aktanikah_terpenuhi + ' dari ' + data.total_penduduk + ' Jiwa Terpenuhi');
            $('#nikah_persen').css('width', data.aktanikah_persen_terpenuhi + '%');
            $('#nikah_terpenuhi').html(data.aktanikah_persen_terpenuhi + '% Jiwa Terpenuhi');

            create_chart_penduduk(data.data_pertumbuhan);
            create_chart_usia(data.data_umur);
        });
    }

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
                "position": "left"
            }],
            "graphs": [{
                "id": "g1",
                "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#d1655d",
                "lineThickness": 2,
                "negativeLineColor": "#637bb6",
                "type": "smoothedLine",
                "valueField": "value",
                /*"balloon":{
                 "drop":true
                 }*/
            }],
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
            }
        });
    }

    function create_chart_usia(data) {
        // Chart Perbandingan Usia
        var chart_usia = AmCharts.makeChart("chart_usia", {
            "theme": "light",
            "type": "serial",
            "startDuration": 2,
            "dataProvider": data,
            "valueAxes": [{
                "position": "left",
                "title": "Jumlah Penduduk"
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillColorsField": "color",
                "fillAlphas": 1,
                "lineAlpha": 0.1,
                "type": "column",
                "valueField": "value"
            }],
            "depth3D": 20,
            "angle": 30,
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
            }

        });
    }

    function create_chart_tingkat_pendidikan() {
        /**
         * Define data for each year
         */
        var chartData = {!! json_encode($data_pendidikan) !!};

        /**
         * Create the chart
         */
        var currentYear = 2015;
        var chart = AmCharts.makeChart("chart_pendidikan", {
            "type": "pie",
            "theme": "light",
            "dataProvider": [],
            "valueField": "jumlah",
            "titleField": "jenjang",
            "startDuration": 0,
            "innerRadius": 80,
            "pullOutRadius": 20,
            "marginTop": 30,
            /* "titles": [{
             //"text": "South African Economy"
             }],*/
            "allLabels": [{
                "y": "54%",
                "align": "center",
                "size": 25,
                "bold": true,
                "text": "2015",
                "color": "#555"
            }, {
                "y": "49%",
                "align": "center",
                "size": 15,
                "text": "Year",
                "color": "#555"
            }],
            "listeners": [{
                "event": "init",
                "method": function (e) {
                    var chart = e.chart;

                    function getCurrentData() {
                        var data = chartData[currentYear];
                        currentYear++;
                        if (currentYear > 2018)
                            currentYear = 2015;
                        return data;
                    }

                    function loop() {
                        chart.allLabels[0].text = currentYear;
                        var data = getCurrentData();
                        chart.animateData(data, {
                            duration: 1000,
                            complete: function () {
                                setTimeout(loop, 3000);
                            }
                        });
                    }

                    loop();
                }
            }],
            "export": {
                "enabled": true
            }
        });
    }

</script>

@endpush

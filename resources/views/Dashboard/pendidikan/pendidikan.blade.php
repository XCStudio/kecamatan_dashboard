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
                    <li><a href="#jumlah_siswa_fasilitas" data-toggle="tab">Jumlah Siswa dan Fasilitas</a></li>
                </ul>

                <div class="tab-content">
                    <div class="active tab-pane" id="jumlah_penduduk">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart_penduduk_pendidikan" style="width: 100%; min-height: 400px; overflow: auto; text-align: left;">

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
                    <div class="tab-pane" id="jumlah_siswa_fasilitas">
                        <div id="chart_siswa_fasilitas"
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
        $('#list_kecamatan').select2();
        $('#list_desa').select2();
        $('#list_year').select2();

        var kid = $('#list_kecamatan').find(":selected").val();
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
        $('#list_kecamatan').on('select2:select', function (e) {
            change_das_pendidikan(kid, did, year);
        });

        $('#list_desa').on('select2:select', function (e) {
            change_das_pendidikan(kid, did, year);
        });

        $('#list_year').on('select2:select', function (e) {
            var kid = $('#list_kecamatan').find(":selected").val();
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
    }


    function create_chart_tingkat_pendidikan(data) {
        /**
         * Define data for each year
         */
        var chartData = data;

        /**
         * Create the chart
         */
        var currentYear = 2015;
        var chart_penduduk_pendidikan = AmCharts.makeChart("chart_penduduk_pendidikan", {
            "type": "pie",
            "theme": "light",
            "dataProvider": [],
            "valueField": "total",
            "titleField": "level",
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

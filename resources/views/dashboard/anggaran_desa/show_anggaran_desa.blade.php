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


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="info-box bg-blue">
                <span class="info-box-icon" style="font-size: 30px;"><i class="fa fa-money"></i></span>

                <div class="info-box-content">

                    <span class="info-box-number" id="total_pendapatan">Rp 0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
					<span class="progress-description">
											<strong>TOTAL PENDAPATAN</strong>
											</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-aqua">
                <span class="info-box-icon" id="in_dd_persen" style="font-size: 30px;"><i
                            class="fa fa-money"></i></span>

                <div class="info-box-content">

                    <span class="info-box-number" id="in_dd">Rp 0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0%" id="in_dd_persen"></div>
                    </div>
					<span class="progress-description">
                    Dana Desa (APBN)
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon" id="in_add_persen" style="font-size: 30px;"><i
                            class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number" id="in_add">Rp 0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0%" id="in_add_persen"></div>
                    </div>
					<span class="progress-description">
                    Alokasi Dana Desa (ADD)
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-yellow">
                <span class="info-box-icon" id="in_pad_persen" style="font-size: 30px;"><i
                            class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number" id="in_pad">Rp. 0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0%" id="in_pad_persen"></div>
                    </div>
					<span class="progress-description">
                    Pendapatan Asli Desa (PAD)
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>

    <div class="row">

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-red">
                <span class="info-box-icon" id="in_bhpr_persen" style="font-size: 30px;"><i
                            class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number" id="in_bhpr">Rp. 0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0%" id="in_bhpr_persen"></div>
                    </div>
					<span class="progress-description">
                    Bagi Hasil Pajak & Retribusi (BHPR)
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-aqua">
                <span class="info-box-icon" id="in_bantuan_kabupaten_persen" style="font-size: 30px;"><i
                            class="fa fa-money"></i></span>

                <div class="info-box-content">

                    <span class="info-box-number" id="in_bantuan_kabupaten">Rp 0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0%" id="in_bantuan_kabupaten_persen"></div>
                    </div>
					<span class="progress-description">
                    Bantuan Kabupaten
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon" id="in_bantuan_provinsi_persen" style="font-size: 30px;"><i
                            class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number" id="in_bantuan_provinsi">Rp 0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0%" id="in_bantuan_provinsi_persen"></div>
                    </div>
					<span class="progress-description">
                    Bantuan Provinsi
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <!-- BAR CHART -->
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">TOTAL BELANJA: <span id="total_belanja"><strong>Rp 0</strong></span></h3>

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

    </div>

</section>
<!-- /.content -->
@endsection @include('partials.asset_amcharts') @include('partials.asset_select2') @push('scripts')
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
        das_chart_anggaran(kid, did, year);
        /*
         End Initial
         */


        // Change div das_kependudukan when Kecamatan changed
        $('#list_kecamatan').on('select2:select', function (e) {
            var kid = $('#list_kecamatan').find(":selected").val();
            if (kid == null) {
                kid = $('#defaultProfil').val();
            }
            var did = $('#list_desa').find(":selected").val();
            var year = $('#list_year').find(":selected").val();
            das_chart_anggaran(kid, did, year);
        });

        $('#list_desa').on('select2:select', function (e) {
            var kid = $('#list_kecamatan').find(":selected").val();
            if (kid == null) {
                kid = $('#defaultProfil').val();
            }
            var did = $('#list_desa').find(":selected").val();
            var year = $('#list_year').find(":selected").val();
            das_chart_anggaran(kid, did, year);
        });

        $('#list_year').on('select2:select', function (e) {
            var kid = $('#list_kecamatan').find(":selected").val();
            if (kid == null) {
                kid = $('#defaultProfil').val();
            }
            var did = $('#list_desa').find(":selected").val();
            var year = $('#list_year').find(":selected").val();

            das_chart_anggaran(kid, did, year);
        });
    });

    function das_chart_anggaran(kid, did, year) {

        $.ajax('{!! route('dashboard.chart-anggaran-desa') !!}', {
            data: {
                kid: kid,
                did: did,
                y: year
            }
        }).done(function (data) {
            $('#total_pendapatan').html('Rp ' + data.sum.total_pendapatan);
            $('#total_belanja').html('Rp ' + data.sum.total_belanja);

            $('#in_dd').html('Rp ' + data.sum.in_dd);

            $('#in_add').html('Rp ' + data.sum.in_add);

            $('#in_pad').html('Rp ' + data.sum.in_pad);

            $('#in_bhpr').html('Rp ' + data.sum.in_bhpr);

            $('#in_bantuan_kabupaten').html('Rp ' + data.sum.in_bantuan_kabupaten);

            $('#in_bantuan_provinsi').html('Rp ' + data.sum.in_bantuan_provinsi);
            //$('#belanja_tidak_langsung_persen').html(data.sum.belanja_tidak_langsung_persen + '%');
            //$('#belanja_tidak_langsung_persen_bar').css('width', data.sum.belanja_tidak_langsung_persen_bar + '%');


            create_chart_anggaran(data.chart);
        });

    }


    function create_chart_anggaran(data) {
        /**
         * Define data for each year
         */
        var chartData = data;

        /**
         * Create the chart
         */
        var chart = AmCharts.makeChart("chartdiv", {
            "hideCredits": true,
            "type": "pie",
            "theme": "light",
            "dataProvider": chartData,
            "valueField": "value",
            "titleField": "anggaran",
            "outlineAlpha": 0.4,
            "depth3D": 15,
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "angle": 30,
            "export": {
                "enabled": true
            },
            "allLabels": [{
                "text": "Persentase Anggaran Kecamatan",
                "align": "center",
                "bold": true,
                "size": 20,
                "y": -4
            }],
        });
    }
</script>

@endpush
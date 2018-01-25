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

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">
                    <div class="box box-solid">
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="prosedure-rkpdesa.php"><i class="fa fa-circle-o text-light-blue"></i> Alur
                                        Penyusunan RKPDesa</a></li>
                                <li><a href="prosedure-danadesa.php"><i class="fa fa-circle-o text-light-blue"></i>
                                        Mekanisme Penyaluran Dana Desa Tahun 2016</a></li>
                                <li><a href="prosedure-keuangandesa.php"><i class="fa fa-circle-o text-light-blue"></i>
                                        Pengelolaan Keuangan Desa</a></li>
                                <li><a href="prosedure-tujuanpembangunandesa.php"><i
                                                class="fa fa-circle-o text-light-blue"></i> Tujuan Pembangunan Desa</a>
                                </li>
                                <li><a href="prosedure-rpjmdesa.php"><i class="fa fa-circle-o text-light-blue"></i> Alur
                                        Penyusunan RPJMDesa</a></li>
                                <li><a href="prosedure-nikahrujuk.php"><i class="fa fa-circle-o text-light-blue"></i>
                                        Alur Nikah dan Rujuk</a></li>
                                <li><a href="prosedure-kiskks.php"><i class="fa fa-circle-o text-light-blue"></i> Alur
                                        Pengurusan KIS &amp; KKS</a></li>
                                <li><a href="prosedure-epupns.php"><i class="fa fa-circle-o text-light-blue"></i> Alur
                                        Kerja Proses ePUPNS 2015</a></li>

                                <li><a href="prosedure-membuatektp.php"><i class="fa fa-circle-o text-light-blue"></i>
                                        Proses Pembuatan e-KTP</a></li>
                                <li><a href="prosedure-kpsraskin.php"><i class="fa fa-circle-o text-light-blue"></i>
                                        Mekanisme KPS untuk Raskin</a></li>
                                <li><a href="prosedure-kpsbsm.php"><i class="fa fa-circle-o text-light-blue"></i>
                                        Mekanisme KPS untuk BSM</a></li>
                                <li><a href="prosedure-pipkip.php"><i class="fa fa-circle-o text-light-blue"></i>
                                        Program Indonesia Pintar menggunakan KIP</a></li>
                                <li><a href="prosedure-pnpmdesa.php"><i class="fa fa-circle-o text-light-blue"></i> Alur
                                        tahapan PNPM Desa</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection
@extends('layouts.dashboard_template')

@section('title') Profil @endsection

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
            <div class="col-md-4">
                <div class="form-group">
                    <label class="col-sm-3"> Kecamatan: </label>

                    <div class="col-sm-9" style="margin-left:0px;">
                        <form>
                            <select class="form-control" id="kecamatan" name="kecamatan" onchange="addlist();">
                                <option value="5203090">Aikmel</option>
                                <option value="5203030">Terara</option>
                                <option value="5203070">Selong</option>
                                <option value="5203010">Keruak</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-3">

            <!-- profil Image -->
            <div class="box box-primary">
                <div class="box-body box-profil">
                    <h4 class="profil-username text-center">Kecamatan <span id="kecamatantitle">Aikmel</span></h4>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Luas wilayah</b> <a class="pull-right" id="luaswilayah">129.92 km<sup>2</sup></a>
                        </li>
                        <li class="list-group-item">
                            <b>Jumlah Penduduk</b> <a class="pull-right" id="jumlahpenduduk">5,128 orang</a>
                        </li>
                        <li class="list-group-item">
                            <b>Kepadatan Penduduk</b> <a class="pull-right" id="kepadatanpenduduk">802
                                orang/km<sup>2</sup></a>
                        </li>
                        <li class="list-group-item">
                            <b>Kelurahan/Desa</b> <a class="pull-right" id="kelurahandesa">24</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tentang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!--
                      <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

                      <p class="text-muted">
                        <p>
                        <span class="label label-success">TK</span>
                        <span class="label label-danger">SD</span>
                        <span class="label label-warning">SLTP</span>
                        <span class="label label-success">SLTA</span>
                        <span class="label label-danger">Perguruan Tinggi</span>
                        <span class="label label-info">Pasca Sarjana</span>
                      </p>

                      <hr>
                      -->
                    <!-- <strong><i class="fa fa-book margin-r-5"></i> Sumber Daya Alam</strong>

                    <p class="text-muted">
                      <p>
                      <span class="label label-success">Pertanian</span>
                      <span class="label label-danger">Perkebunan/Hortikultura</span>
                      <span class="label label-warning">Hutan rakyat/Hutan produksi</span>
                      <span class="label label-info">Wisata Alam</span>

                    </p>
                    </p>
                    -->

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Info Pelayanan </strong>

                    <div id="InfoPelayanan" style="margin:0px 0px 0px 0px;">
                        <ul>
                            <li><a href="http://localhost/kecamatanver1.0/documentation/SYARATSURATPENGANTAR.doc">Surat
                                    Pengantar Pembuatan Akta Kelahiran</a></li>
                            <li><a href="#">Surat Pindah Keluar</a></li>
                            <li><a href="#">Surat Keterangan Tidak mampu</a></li>
                            <li><a href="#">Surat Izin Gangguan</a></li>
                            <li><a href="#">Surat Izin Tempat Usaha</a></li>
                            <li><a href="#">Surat Izin Usaha Mikro Kecil</a></li>
                        </ul>
                    </div>
                    <hr>

                    <!--
                      <strong><i class="fa fa-map-marker margin-r-5"></i> Lokasi</strong>

                      <p class="text-muted">SEKOTONG, SEKOTONG</p>

                      <hr>
                    -->
                    <!--
                      <strong><i class="fa fa-map-marker margin-r-5"></i> Parawisata</strong>

                      <p class="text-muted">SEKOTONG, SEKOTONG</p>

                      <hr>
                    -->
                    <!--
                      <strong><i class="fa fa-pencil margin-r-5"></i> Kemampuan Usaha</strong>
                      <p>
                        <span class="label label-danger">Bertani</span>
                        <span class="label label-success">Berdagang</span>
                        <span class="label label-info">Guru</span>
                        <span class="label label-warning">Beternak</span>
                      </p>
                      <hr>
                    -->
                    <strong><i class="fa fa-book margin-r-5"></i> Kontak</strong>
                    <br><br>

                    <p id="kontakdetail" style="font-size: 8pt;">

                    <p style="text-align: center;"><strong>Kantor Camat AIKMEL<br></strong> Jl. Koperasi No. 1, Kab
                        Lombok Barat, Provinsi Nusa Tenggara Barat 83653<br>Telp: (0376) 123456/e-mail:
                        kecamatanaikmel@gmail.com</p></p><p>
                    </p></div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#peta" data-toggle="tab">Peta</a></li>
                    <li><a href="#profil" data-toggle="tab">Profil</a></li>
                    <li><a href="#timeline" data-toggle="tab">Data Umum</a></li>
                    <li><a href="#settings" data-toggle="tab">Struktur Organisasi</a></li>
                    <li><a href="#desa" data-toggle="tab">Desa</a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="profil">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td width="30%">Nama Kecamatan</td>
                                <td width="5%">:</td>
                                <td width="65%">
                                    <div id="NamaKecamatanProfil">AIKMEL</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tahun Pembentukan</td>
                                <td>:</td>
                                <td>
                                    <div id="TahunPembentukanProfil"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Dasar Hukum Pembentukan</td>
                                <td>:</td>
                                <td>
                                    <div id="DasarHukumPembentukanProfil"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Kode Wilayah</td>
                                <td>:</td>
                                <td>
                                    <div id="NomorKodeWilayahProfil">5203090</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Kode Pos</td>
                                <td>:</td>
                                <td>
                                    <div id="NomorKodePosProfil">83653</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kabupaten/Kota</td>
                                <td>:</td>
                                <td>
                                    <div id="KabupatenKotaProfil">Kab Lombok Barat</div>
                                </td>
                            </tr>

                            <tr>
                                <td>Provinsi</td>
                                <td>:</td>
                                <td>
                                    <div id="ProvinsiProfil">Jl. Koperasi No. 1</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td width="4%">1.</td>
                                <td width="40%">Tipologi Kecamatan</td>
                                <td width="2%">:</td>
                                <td width="54%">
                                    <div id="DataUmumTipologi"> Daerah berkembang cepat</div>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Luas Wilayah</td>
                                <td>:</td>
                                <td><b>
                                        <div id="DataUmumLuasWilayah">129.92 km<sup>2</sup></div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Batas Wilayah</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Sebelah Utara</td>
                                <td>:</td>
                                <td>
                                    <div id="DataUmumLuasBtsWilUtara">Desa Lenek Daya</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Sebelah Selatan</td>
                                <td>:</td>
                                <td>
                                    <div id="DataUmumLuasBtsWilSelatan">Desa Suralaga</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Sebelah Barat</td>
                                <td>:</td>
                                <td>
                                    <div id="DataUmumLuasBtsWilBarat">Desa Anjani</div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Sebelah Timur</td>
                                <td>:</td>
                                <td>
                                    <div id="DataUmumLuasBtsWilTimur">Desa Aikmel Barat</div>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Jumlah Penduduk</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahPendudukTotal">5,128 orang</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Laki-laki</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahPenduduklakilaki">2,605 orang</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Perempuan</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahPendudukPerempuan">2,523 orang</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Jumlah Penduduk Miskin</td>
                                <td>:</td>
                                <td><b><a href="index6.php" id="JumlahPendudukMiskinTotal">66,376 orang</a></b></td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>Jumlah Sarana dan Prasarana</td>
                                <td></td>
                                <td><b></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Sarana Kesehatan</td>
                                <td></td>
                                <td><b></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;1. Puskesmas</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahPuskesmas">1 unit</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;2. Puskesmas Pembantu</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahPuskesmasPembantu">1 unit</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;3. Posyandu</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahPosyandu">1 unit</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;4. Pondok Bersalin Desa</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahPondokBersalinDesa">1 unit</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Sarana Pendidikan</td>
                                <td></td>
                                <td><b></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;1. PAUD</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahSaranaPAUD">4 unit</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;2. SD</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahSaranaSD">1 unit</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;3. SMP</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahSMP">Tidak ada</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;4. SMA</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahSMA">Tidak ada</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Sarana Umum</td>
                                <td></td>
                                <td><b></b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;1. Masjid Besar</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahMasjid">Tidak ada</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;2. Gereja</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahGereja">2 unit</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;3. Pasar</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahPasar">2 unit</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;4. Balai Pertemuan</td>
                                <td>:</td>
                                <td><b>
                                        <div id="JumlahBalaiPertemuan">1 unit</div>
                                    </b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td width="40%">Camat</td>
                                <td width="2%">:</td>
                                <td width="58%"><b>
                                        <div id="NamaCamat">H. Hadi Fathurrahman, S.Sos, M.AP</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Sekretaris Camat</td>
                                <td>:</td>
                                <td><b>
                                        <div id="SekretarisCamat">Drs. Zaenal Abidin</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Kepala Seksi Pemerintahan Umum</td>
                                <td>:</td>
                                <td><b>
                                        <div id="KepalaSeksiPemerintahanUmum">Musyayad, S.Sos</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Kepala Seksi Ketentraman dan Ketertiban</td>
                                <td>:</td>
                                <td><b>
                                        <div id="KepalaSeksiTRANTIB">Mastur Idris, SH</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Kepala Seksi Kesejahteraan Rakyat</td>
                                <td>:</td>
                                <td><b>
                                        <div id="KepalaSeksiKesejahteraanMasyarakat">Suhartono, S.Sos</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Kepala Seksi Pemberdayaan Masyarakat</td>
                                <td>:</td>
                                <td><b>
                                        <div id="KepalaSeksiPemberdayaanMasyarakat">Asrarudin, SE</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Kepala Seksi Pelayanan Umum</td>
                                <td>:</td>
                                <td><b>
                                        <div id="KepalaSeksiPelayananUmum">Masturi, ST</div>
                                    </b></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center">
                                    <img id="strukturpic" src="ammap/images/struktur-aikmel.jpg">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="desa">
                        <li class="list-group-item"><b><a href="#">Lenek Daya</a></b></li>
                        <li class="list-group-item"><b><a href="#">Lenek</a></b></li>
                        <li class="list-group-item"><b><a href="#">Lenek Lauq</a></b></li>
                        <li class="list-group-item"><b><a href="#">Kalijaga</a></b></li>
                        <li class="list-group-item"><b><a href="#">Kembang Kerang</a></b></li>
                        <li class="list-group-item"><b><a href="#">Aikmel</a></b></li>
                        <li class="list-group-item"><b><a href="#">Aikmel Utara</a></b></li>
                        <li class="list-group-item"><b><a href="#">Kalijaga Selatan</a></b></li>
                        <li class="list-group-item"><b><a href="http://kalijagatimur.desa.id/index.php/first">Kalijaga
                                    Timur</a></b></li>
                        <li class="list-group-item"><b><a href="#">Lenek Baru</a></b></li>
                        <li class="list-group-item"><b><a href="#">Kembang Kerang Daya</a></b></li>
                        <li class="list-group-item"><b><a href="#">Aikmel Barat</a></b></li>
                        <li class="list-group-item"><b><a href="#">Lenek Pesiraman</a></b></li>
                        <li class="list-group-item"><b><a href="#">Toya</a></b></li>
                        <li class="list-group-item"><b><a href="#">Lenek Ramban Biak</a></b></li>
                        <li class="list-group-item"><b><a href="#">Lenek Kali Bambang</a></b></li>
                        <li class="list-group-item"><b><a href="#">KalijagaTengah</a></b></li>
                        <li class="list-group-item"><b><a href="#">Bagik Nyaka Santri</a></b></li>
                        <li class="list-group-item"><b><a href="#">Aik Prapa</a></b></li>
                        <li class="list-group-item"><b><a href="#">Sukarema</a></b></li>
                        <li class="list-group-item"><b><a href="#">Kalijaga Baru</a></b></li>
                        <li class="list-group-item"><b><a href="#">Lenek Duren</a></b></li>
                        <li class="list-group-item"><b><a href="#">Keroya</a></b></li>
                        <li class="list-group-item"><b><a href="#">Aikmel Timur</a></b></li>
                    </div>

                    <div class="active tab-pane" id="peta">
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="row">
                                <div class="col-md-9 col-sm-8">
                                    <img id="petakecamatan" src="ammap/images/aikmel.jpg">
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

</section>
<!-- /.content -->
@endsection
@extends('layouts.dashboard_template')

@section('content')
    <script>
        function addlist() {
            var mySelect = document.getElementById("kecamatan").value;

            if (mySelect.length == 0) {
                document.getElementById("desalist").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("desalist").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../getDesaList.php?IDKecamatan=" + mySelect, true);
                xmlhttp.send();
            }

            if (mySelect.length == 0) {
                document.getElementById("listyear").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("listyear").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "../getYearList.php", true);
                xmlhttp.send();
            }

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }
            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }

        function addlistnd() {
            var mySelect = document.getElementById("kecamatan").value;

            if (mySelect.length == 0) {
                document.getElementById("listyear").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("listyear").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getYearList.php", true);
                xmlhttp.send();
            }

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }
            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }

        function addlistrd() {
            var mySelect = document.getElementById("kecamatan").value;

            var mySelectdesa = document.getElementById("desalist").value;
            if (mySelectdesa.length == 0) {
                mySelectdesa = "ALL";
            }

            var mySelecttahun = document.getElementById("listyear").value;
            if (mySelecttahun.length == 0) {
                mySelecttahun = "ALL";
            }

            showDataUmum(mySelect, mySelectdesa, mySelecttahun);
        }
    </script>

    <form id="skfromkec" name="skfromkec" action="/dash-kecamatan2/informasi/potensi.php" method="POST">
        <div class="box">
            <div class="box-header with-border">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-3">Kecamatan:</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="kecamatan" name="kecamatan" onchange="addlist();">"&gt;
                                <option value="5203090">Aikmel</option>
                                <option value="5203030">Terara</option>
                                <option value="5203070">Selong</option>
                                <option value="5203010">Keruak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-3 sm">Desa:</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="desalist" name="desalist" onchange="addlistnd();">
                                <option value="ALL">ALL</option>
                                <option value="5203090001">Lenek Daya</option>
                                <option value="5203090002">Lenek</option>
                                <option value="5203090003">Lenek Lauq</option>
                                <option value="5203090004">Kalijaga</option>
                                <option value="5203090008">Kembang Kerang</option>
                                <option value="5203090009">Aikmel</option>
                                <option value="5203090010">Aikmel Utara</option>
                                <option value="5203090011">Kalijaga Selatan</option>
                                <option value="5203090012">Kalijaga Timur</option>
                                <option value="5203090013">Lenek Baru</option>
                                <option value="5203090014">Kembang Kerang Daya</option>
                                <option value="5203090015">Aikmel Barat</option>
                                <option value="5203090016">Lenek Pesiraman</option>
                                <option value="5203090017">Toya</option>
                                <option value="5203090018">Lenek Ramban Biak</option>
                                <option value="5203090019">Lenek Kali Bambang</option>
                                <option value="5203090020">KalijagaTengah</option>
                                <option value="5203090021">Bagik Nyaka Santri</option>
                                <option value="5203090022">Aik Prapa</option>
                                <option value="5203090023">Sukarema</option>
                                <option value="5203090024">Kalijaga Baru</option>
                                <option value="5203090025">Lenek Duren</option>
                                <option value="5203090026">Keroya</option>
                                <option value="5203090027">Aikmel Timur</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-3">Tahun:</label>

                        <div class="col-sm-9">
                            <select class="form-control" id="listyear" onchange="addlistrd();">
                                <option value="ALL">ALL</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <script>
        function showDataUmum(strkec, strdesa, strtahun) {
            if (strkec.length == 0) {
                document.getElementById("pariwisata_last").innerHTML = "";
                return;
            } else {

                //1
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("pariwisata_last").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensi.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=pariwisata&idPotensi=ALL", true);
                xmlhttp.send();

                //2
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("perdagangan_last").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensi.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=perdagangan&idPotensi=ALL", true);
                xmlhttp.send();

                //3
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("pertanian_last").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensi.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=pertanian&idPotensi=ALL", true);
                xmlhttp.send();

                //4
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("industri_last").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensi.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=industri&idPotensi=ALL", true);
                xmlhttp.send();

                //5
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("pendidikan_last").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensi.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=pendidikan&idPotensi=ALL", true);
                xmlhttp.send();

                //6
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("kelautan_last").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensi.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=kelautan&idPotensi=ALL", true);
                xmlhttp.send();
            }

            if (strkec.length == 0) {
                document.getElementById("pariwisata_table").innerHTML = "";
                return;
            } else {
                //1
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("pariwisata_table").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensiTable.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=pariwisata&idPotensi=ALL", true);
                xmlhttp.send();

                //2
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("perdagangan_table").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensiTable.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=perdagangan&idPotensi=ALL", true);
                xmlhttp.send();

                //3
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("pertanian_table").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensiTable.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=pertanian&idPotensi=ALL", true);
                xmlhttp.send();

                //4
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("industri_table").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensiTable.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=industri&idPotensi=ALL", true);
                xmlhttp.send();

                //5
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("pendidikan_table").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensiTable.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=pendidikan&idPotensi=ALL", true);
                xmlhttp.send();

                //6
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("kelautan_table").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getPotensiTable.php?qq=" + strkec + "&desa=" + strdesa + "&tahun=" + strtahun + "&PotensiType=kelautan&idPotensi=ALL", true);
                xmlhttp.send();
            }
        }

        function setDetailAndSubmit(Potensi, id) {
            var mySelect = document.getElementById("kecamatan").value;
            var mySelectdesa = document.getElementById("desalist").value;
            var mySelecttahun = document.getElementById("listyear").value;
            var element_name = Potensi + "_last";

            if (mySelect.length == 0) {
                document.getElementById(element_name).innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(element_name).innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "getpotensi.php?qq=" + mySelect + "&desa=" + mySelectdesa + "&tahun=" + mySelecttahun + "&PotensiType=normal&idPotensi=" + id, true);
                xmlhttp.send();
            }
        }

        function setInputAndSubmit(input) {
            var form = document.getElementById("skfrom");
            var inputEl = document.getElementById("frmaksi");
            var inputEl2 = document.getElementById("idpotensi");
            var inputEl3 = document.getElementById("TipePotensi");
            inputEl3.value = input
            form.submit();
        }

        function setInputAndSubmit2(input, input2) {
            var form = document.getElementById("skfrom");
            document.getElementById("frmaksi").value = "EDIT";
            var inputEl2 = document.getElementById("idpotensi");
            var inputEl3 = document.getElementById("TipePotensi");
            inputEl2.value = input2;
            inputEl3.value = input
            form.submit();
        }
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#pariwisata" data-toggle="tab">Pariwisata</a></li>
                    <li><a href="#perdagangan" data-toggle="tab">Perdagangan</a></li>
                    <li><a href="#pertanian" data-toggle="tab">Pertanian</a></li>
                    <li><a href="#industri" data-toggle="tab">Industri</a></li>
                    <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                    <li><a href="#kelautan" data-toggle="tab">Kelautan</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="pariwisata">
                        <div class="timeline-item" id="pariwisata_last"><p>Siapa yang tak kenal <strong><a
                                            href="https://www.pariwisata.id/">jogjakarta</a></strong>. Jogja masih
                                merupakan tempat andalan untuk wisata seni dan budaya bahkan alam serta kuliner nya pun
                                tak kalah menarik untuk kita bahas. Berikut adalah 7 tempat wisata di jogja yang paling
                                populer dan menarik yang bisa anda jadikan referensi jika sedang berkunjung ke jogja.
                                Mana saja kah itu ??</p>

                            <h2><strong>1. <a
                                            href="https://www.pariwisata.id/7-tempat-wisata-di-jogja-yang-paling-populer-dan-menarik/">Malioboro</a></strong>
                            </h2>

                            <p><br>
                                Siapa yang tidak kenal akan kesohoran jalan ini, jogjakarta sudah sangat identik dengan
                                jalan malioboro. Jalan yang menghubungkan anda untuk pergi ke keraton ini memang tidak
                                pernah sepi. Banyak para pedagang serta penjual kuliner beraneka ragam ada di tempat
                                ini. Jika anda ingin berkunjung ke jogja malioboro ini bisa di jadikan tempat pertama
                                untuk singgah.</p>

                            <p><img src="https://www.pariwisata.id/wp-content/uploads/2017/08/Malioboro.jpg"></p>

                            <p>&nbsp;</p>

                            <h3><strong>2. Pantai Indrayanti</strong></h3>

                            <h3><br>
                                Untuk Pariwisata alam jogja juga punya pantai cantik nan elok yaitu pantai indrayanti,
                                walaupun banyak pantai – pantai cantik di jogjakarta kami sengaja memilihkan pantai
                                indrayanti untuk tujuan anda karena pemandangan yang indah serta hamparan pasir putih
                                yang mengagumkan, walaupun banyak resort serta kios – kios para penjual souvenir di
                                pantai ini akan tetapi tidak merusak ke alamian dan keindahan wisata pantai indrayanti
                                tersebut.</h3>
                        </div>
                        <br>
                        <br>

                        <div class="timeline-item">
                            <form id="skfrom" name="myform" action="FormPotensi.php" method="POST">
                                <input id="frmaksi" name="aksi" value="ADD" type="hidden">
                                <input id="idpotensi" name="idpotensi" value="1" type="hidden">
                                <input id="TipePotensi" name="TipePotensi" value="pariwisata" type="hidden">
                                <table id="pariwisata_table" class="table table-bordered table-hover"></table>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="perdagangan">
                        <div class="timeline-item" id="perdagangan_last"><p><a
                                        href="http://www.kemendag.go.id/">Beranda</a> // <a
                                        href="http://www.kemendag.go.id/id/newsroom">Berita</a> // Berita Perdagangan
                            </p>

                            <h1>Berita Perdagangan</h1>

                            <p>Kamis, 02 November 2017 17:09</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/11/02/tingkatkan-sinergi-dengan-bank-bri-kdei-taipei-tingkatkan-pelayanan-dan-perlindungan-tki-di-taiwan">Tingkatkan
                                    Sinergi dengan Bank BRI, KDEI Taipei Tingkatkan Pelayanan dan Perlindungan TKI di
                                    Taiwan</a></h2>

                            <p>Kantor Dagang dan Ekonomi Indonesia (KDEI) Taipei terus melakukan berbagai terobosan
                                dalam meningkatkan pelayanan dan perlindungan Tenaga Kerja Indonesia (TKI) atau Warga
                                Negara Indonesia (WNI) di <a
                                        href="http://www.kemendag.go.id/id/news/2017/11/02/tingkatkan-sinergi-dengan-bank-bri-kdei-taipei-tingkatkan-pelayanan-dan-perlindungan-tki-di-taiwan">Selengkapnya</a>
                            </p>

                            <p>Kamis, 02 November 2017 15:58</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/11/02/kerja-sama-indonesia-taiwan-meningkat-kdei-taipei-terima-penghargaan">Kerja
                                    Sama Indonesia-Taiwan Meningkat, KDEI Taipei Terima Penghargaan</a></h2>

                            <p>Kantor Dagang dan Ekonomi Indonesia (KDEI) Taipei menerima penghargaan dari Chamber of
                                Commerce of Taiwan (ROCCOC) sebagai Outstanding Foreign Commercial Agencies 2017. <a
                                        href="http://www.kemendag.go.id/id/news/2017/11/02/kerja-sama-indonesia-taiwan-meningkat-kdei-taipei-terima-penghargaan">Selengkapnya</a>
                            </p>

                            <p>Selasa, 24 Oktober 2017 09:52</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/10/24/kdei-taipei-gelar-nikah-massal-bagi-wni">KDEI
                                    Taipei Gelar Nikah Massal Bagi WNI</a></h2>

                            <p>Kantor Dagang dan Ekonomi Indonesia (KDEI) di Taipei kembali menggelar pernikahan massal
                                bagi warga negara Indonesia (WNI) di Taiwan. Prosesi pernikahan massal yang diikuti enam
                                pasang mempelai <a
                                        href="http://www.kemendag.go.id/id/news/2017/10/24/kdei-taipei-gelar-nikah-massal-bagi-wni">Selengkapnya</a>
                            </p>

                            <p>Senin, 23 Oktober 2017 10:12</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/10/23/bidik-pasar-fesyen-as-tenun-ikat-indonesia-tampil-bergaya-ultra-modern">Bidik
                                    Pasar Fesyen AS, Tenun Ikat Indonesia Tampil Bergaya Ultra-Modern</a></h2>

                            <p>Perwakilan Indonesia di Amerika Serikat (AS) membidik pasar fesyen di Negeri Paman Sam
                                untuk mengembangkan potensi ekspor tenun ikat Indonesia. Melalui kegiatan Lokakarya Ikat
                                di Los Angeles, AS <a
                                        href="http://www.kemendag.go.id/id/news/2017/10/23/bidik-pasar-fesyen-as-tenun-ikat-indonesia-tampil-bergaya-ultra-modern">Selengkapnya</a>
                            </p>

                            <p>Kamis, 19 Oktober 2017 14:53</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/10/19/tas-jinjing-batik-indonesia-yang-ramah-lingkungan-curi-perhatian-pecinta-seni-di-los-angeles-amerika">Tas
                                    Jinjing Batik Indonesia yang Ramah Lingkungan Curi Perhatian Pecinta Seni di Los
                                    Angeles, Amerika Serikat</a></h2>

                            <p>Indonesia Trade Promotion Center (ITPC) Los Angeles (LA) menyelenggarakan lokakarya tas
                                jinjing (tote bag) batik ramah lingkungan di Chinatown LA, Amerika Serikat (AS), pada 7
                                Oktober 2017 lalu. Para <a
                                        href="http://www.kemendag.go.id/id/news/2017/10/19/tas-jinjing-batik-indonesia-yang-ramah-lingkungan-curi-perhatian-pecinta-seni-di-los-angeles-amerika">Selengkapnya</a>
                            </p>

                            <p>Rabu, 18 Oktober 2017 17:45</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/10/18/explore-indonesia-2017-masyarakat-los-angeles-antusias-serbu-teh-indonesia">Explore
                                    Indonesia 2017: Masyarakat Los Angeles Antusias Serbu Teh Indonesia</a></h2>

                            <p>Lebih dari 2.000 cangkir teh khas Indonesia beragam kreasi habis diserbu pengunjung dalam
                                acara Explore Indonesia 2017. Kegiatan tersebut berlangsung di 3rd Street Promenade,
                                Santa Monica <a
                                        href="http://www.kemendag.go.id/id/news/2017/10/18/explore-indonesia-2017-masyarakat-los-angeles-antusias-serbu-teh-indonesia">Selengkapnya</a>
                            </p>

                            <p>Rabu, 18 Oktober 2017 17:36</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/10/18/lokakarya-teh-kreatif-indonesia-di-los-angeles-tradisi-teh-menyatu-dengan-budaya-minum-teh-modern">Lokakarya
                                    Teh Kreatif Indonesia di Los Angeles: Tradisi Teh Menyatu dengan Budaya Minum Teh
                                    Modern</a></h2>

                            <p>Melalui lokakarya Teh Kreatif Indonesia, perwakilan Indonesia di AS berusaha semakin
                                menarik minat warga AS terhadap teh Indonesia. <a
                                        href="http://www.kemendag.go.id/id/news/2017/10/18/lokakarya-teh-kreatif-indonesia-di-los-angeles-tradisi-teh-menyatu-dengan-budaya-minum-teh-modern">Selengkapnya</a>
                            </p>

                            <p>Jumat, 29 September 2017 16:19</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/09/29/produk-alat-kebersihan-dan-produk-kosmetik-sabun-dan-spa-indonesia-sukses-curi-perhatian-di-autumn-f">Produk
                                    Alat Kebersihan dan Produk Kosmetik, Sabun dan Spa Indonesia Sukses Curi Perhatian
                                    di Autumn Fair 2017</a></h2>

                            <p>Di awal musim gugur di Inggris, KBRI London melalui Atase Perdagangan London
                                berpartisipasi dalam kegiatan pameran Autumn Fair 2017. <a
                                        href="http://www.kemendag.go.id/id/news/2017/09/29/produk-alat-kebersihan-dan-produk-kosmetik-sabun-dan-spa-indonesia-sukses-curi-perhatian-di-autumn-f">Selengkapnya</a>
                            </p>

                            <p>Senin, 25 September 2017 14:38</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/09/25/kbri-tokyo-dan-kemendag-ajak-ceo-waralaba-beri-pembekalan-wirausaha">KBRI
                                    Tokyo dan Kemendag Ajak CEO Waralaba Beri Pembekalan Wirausaha</a></h2>

                            <p>Sejumlah CEO perusahaan waralaba Indonesia diundang sebagai pembicara dalam lokakarya
                                bertajuk “Pendampingan Waralaba bagi Diaspora dan Tenaga Magang Indonesia di Jepang”. <a
                                        href="http://www.kemendag.go.id/id/news/2017/09/25/kbri-tokyo-dan-kemendag-ajak-ceo-waralaba-beri-pembekalan-wirausaha">Selengkapnya</a>
                            </p>

                            <p>Rabu, 20 September 2017 19:56</p>

                            <h2>
                                <a href="http://www.kemendag.go.id/id/news/2017/09/20/dari-fine-food-australia-2017-produk-makanan-dan-minuman-olahan-indonesia-raup-usd-1-juta-">Dari
                                    Fine Food Australia 2017: Produk Makanan dan Minuman Olahan Indonesia Raup USD 1
                                    juta </a></h2>

                            <p>Produk makanan dan minuman (mamin) olahan Indonesia berhasil mencuri perhatian para
                                pengunjung Fine Food Australia 2017.&nbsp; <a
                                        href="http://www.kemendag.go.id/id/news/2017/09/20/dari-fine-food-australia-2017-produk-makanan-dan-minuman-olahan-indonesia-raup-usd-1-juta-">Selengkapnya</a>
                            </p>

                            <p>Silahkan mengisi detail potensi.</p>
                        </div>
                        <br>
                        <br>
                        <table id="perdagangan_table" class="table table-bordered table-hover"></table>
                    </div>
                    <div class="tab-pane" id="pertanian">
                        <div class="timeline-item" id="pertanian_last"><h3><strong>Petani Inggris Ini Mengubur Celana
                                    Dalam di Lahannya, Untuk Apa?</strong></h3>

                            <p>&nbsp;</p>

                            <p><strong>Liputan6.com, Moray -</strong> Mengetahui tingkat kesuburan lahan bukan lah hal
                                yang mudah untuk dilakukan, apalagi jika iklim di sekitarnya&nbsp;terus mengalami
                                perubahan. Hal itu membuat para petani harus mengeluarkan dana cukup banyak pada setiap
                                pergantian iklim yang tak terduga.</p>

                            <p>Namun petani ini memiliki cara unik dan murah untuk&nbsp;menguji tingkat kesuburan
                                lahannya. Ia adalah&nbsp;Iain Green, seorang petani dari Corskie Farm, Moray, <a
                                        title="Inggris"
                                        href="http://global.liputan6.com/read/2562182/setelah-20-tahun-daging-merah-asal-inggris-kembali-beredar-di-as">Inggris</a>.
                            </p></div>
                        <br>
                        <br>
                        <table id="pertanian_table" class="table table-bordered table-hover"></table>
                    </div>
                    <div class="tab-pane" id="industri">
                        <div class="timeline-item" id="industri_last"><h2><span style="color: #0000ff;">RENCANA STRATEGIS KEMENTERIAN PERINDUSTRIAN</span>
                            </h2>

                            <p>&nbsp;</p>

                            <p>Renstra Kementerian Perindustrian 2015-2019 dimaksudkan untuk merencanakan kontribusi
                                yang signifikan bagi keberhasilan pencapaian sasaran pembangunan nasional sebagaimana
                                diamanatkan pada Rencana Pembangunan Jangka Menengah Nasional 2015-2019, serta disusun
                                antara lain berdasarkan hasil evaluasi terhadap pelaksanaan Renstra Kementerian
                                Perindustrian periode 2010-2014, analisa terhadap dinamika perubahan lingkungan
                                strategis baik tataran daerah, nasional, maupun di tataran global, serta perubahan
                                paradigma peningkatan daya saing dan kecenderungan pengembangan industri ke depan.</p>

                            <p><a href="http://www.kemenperin.go.id/download/8436/rencana-strategis-kemenperin">Download
                                    Renstra Kemenperin 2015-2019 (2,58 MB)</a></p></div>
                        <br>
                        <br>
                        <table id="industri_table" class="table table-bordered table-hover"></table>
                    </div>
                    <div class="tab-pane" id="pendidikan">
                        <div class="timeline-item" id="pendidikan_last"><h1><span style="color: #ff0000;">Program Studi Sarjana Teknik Industri </span>
                            </h1>

                            <h3>Prospek Kerja</h3>

                            <p>Seorang alumni Teknik Industri memiliki prospek kerja yang sangat luas, beberapa
                                diantaranya adalah:</p>
                            <ul>
                                <li><strong>Bidang produksi/ operasi dan penjaminan mutu</strong><br> Lulusan TI sangat
                                    dibutuhkan khususnya untuk menangani perencanaan dan pengendalian produksi,
                                    pengendalian kualitas, pengembangan sistem manajemen kualitas. Hampir semua
                                    perusahaan membutuhkan ini, khususnya perusahaan manufaktur seperti Toyota Astra
                                    Motor, PT Rekayasa Industri, PT Krakatau Steel, dll.
                                </li>
                                <li><strong>Bidang sistem informasi</strong><br> Posisi yang biasanya diduduki lulusan
                                    TI misalnya staf&nbsp;<em>IT,&nbsp;</em>staf dalam pemasangan sistem informasi,
                                    bahkan banyak alumni yang membuka usaha di bidang software house<em>.&nbsp;</em>Perusahaan
                                    yang membutuhkan lulusan TI misalnya: SAP Indonesia, Oracle Telekomsel, Pertamina, P&amp;G,
                                    dll<em>.</em></li>
                                <li><strong>Bidang pemasaran</strong><br> Beberapa posisi yang biasanya ditempati oleh
                                    lulusan TI misalnya&nbsp;<em>market research, technical sales</em>, dll. Misalnya di
                                    perusahaan P&amp;G, Unilever, Nestle, Astra, dll.
                                </li>
                                <li><strong>Bidang logistik</strong><br> Perencanaan dan pengelolaan sistem distribusi
                                    merupakan bidang yang mulai banyak dimasuki oleh lulusan TI seperti di P&amp;G, PT
                                    Semen Gresik, dll.
                                </li>
                                <li><strong>Bidang manajemen sumber daya manusia</strong><br> Pengelolaan sumber daya
                                    manusia mulai dari masalah rekruitmen, pengembangan sistem penggajian dan manajemen
                                    personalia termasuk pengembangan SDM dalam pelatihan. Alumni TI yang bekerja di
                                    bidang ini misalnya di PT Semen Padang, P&amp;G, dll.
                                </li>
                                <li><strong>Bidang keuangan (bank dan asuransi)</strong><br> Misalnya BNI, Bank Mandiri,
                                    Bank Niaga, dsb.
                                </li>
                                <li><strong>Bidang konsultasi manajemen</strong><br> Misalnya Boston Consulting Group,
                                    Accenture, Nielsen Company, dsb.
                                </li>
                            </ul>
                        </div>
                        <br>
                        <br>
                        <table id="pendidikan_table" class="table table-bordered table-hover"></table>
                    </div>
                    <div class="tab-pane" id="kelautan">
                        <div class="timeline-item" id="kelautan_last"><h1><span style="color: #ff00ff;">Kelautan</span>
                            </h1>

                            <div class="leadtext"><span style="color: #333399;">Program Kelautan WWF-Indonesia memberikan sumbangan berarti untuk mencapai tujuan yang ditetapkan oleh jaringan global WWF. Ekosistem laut dan pesisir dan sumber daya perikanannya di seluruh dunia.berada dalam kondisi yang mengkhawatirkan. Eksploitasi ikan yang berlebihan dan kemundurun kualitas habitat laut dan pesisir, yang kerap diakibatkan oleh kegiatan manusia, mengancam keanekaragaman hayati dan penghidupan masyarakat yang tergantung pada sumber daya laut.</span>
                            </div>
                            <div class="leadtext">&nbsp;</div>
                            <div class="bodytext"><span style="color: #993300;">Jaringan global WWF telah menetapkan visinya untuk mengembalikan keseimbangan: Pemerintah, komunitas, para ahli lingkungan, industri dan berbagai kelompok kepentingan di seluruh dunia bekerjasama untuk menjaga dan memulihkan harta kekayaan laut. Masyarakat memanfaatkan laut dan pesisir secara bijak untuk keuntungan sekarang dan bagi generasi selanjutnya, dan memiliki pemahaman yang sama bahwa seluruh kehidupan di lautan memiliki hak dan tempat untuk meneruskan kehidupan mereka.</span>
                            </div>
                        </div>
                        <br>
                        <br>
                        <table id="kelautan_table" class="table table-bordered table-hover"></table>
                    </div>
                </div>
                <!-- /.tab-content -->

            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
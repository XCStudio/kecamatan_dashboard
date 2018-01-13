<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview {{ (Request::is(['/','dashboard/*'])? 'active' : '') }}">
                <a href="#"><i class="fa fa-line-chart"></i> <span>Dashboard</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ (Request::is(['/','dashboard/', 'dashboard/profile'])? 'class=active' : '') }}><a href="{{ route('dashboard.profile') }}"><i class="fa fa-circle-o"></i>Profile</a></li>
                    <li {{ (Request::is(['dashboard/kependudukan'])? 'class=active' : '') }}><a href="{{ route('dashboard.kependudukan') }}"><i class="fa fa-circle-o"></i>Kependudukan</a></li>
                    <li {{ (Request::is(['dashboard/kesehatan'])? 'class=active' : '') }}><a href="{{ route('dashboard.kesehatan') }}"><i class="fa fa-circle-o"></i>Kesehatan</a></li>
                    <li {{ (Request::is(['dashboard/pendidikan'])? 'class=active' : '') }}><a href="{{ route('dashboard.pendidikan') }}"><i class="fa fa-circle-o"></i>Pendidikan</a></li>
                    <li {{ (Request::is(['dashboard/program-bantuan'])? 'class=active' : '') }}><a href="{{ route('dashboard.program-bantuan') }}"><i class="fa fa-circle-o"></i>Program Bantuan</a></li>
                    <li {{ (Request::is(['dashboard/anggaran-dan-realisasi'])? 'class=active' : '') }}><a href="{{ route('dashboard.anggaran-dan-realisasi') }}"><i class="fa fa-circle-o"></i>Anggaran & Realisasi</a></li>
                    <li {{ (Request::is(['dashboard/anggaran-desa'])? 'class=active' : '') }}><a href="{{ route('dashboard.anggaran-desa') }}"><i class="fa fa-circle-o"></i>Anggaran Desa</a></li>
                </ul>
            </li>
            <li class="treeview {{ (Request::is(['informasi/*'])? 'active' : '') }}">
                <a href="#"><i class="fa fa-archive"></i> <span>Informasi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ (Request::is(['informasi/prosedur'])? 'class=active' : '') }}><a href="{{ route('informasi.prosedur') }}"><i class="fa fa-circle-o"></i>Prosedur</a></li>
                    <li {{ (Request::is(['informasi/layanan'])? 'class=active' : '') }}><a href="{{ route('informasi.layanan') }}"><i class="fa fa-circle-o"></i>Layanan</a></li>
                    <li {{ (Request::is(['informasi/potensi'])? 'class=active' : '') }}><a href="{{ route('informasi.potensi') }}"><i class="fa fa-circle-o"></i>Potensi</a></li>
                    <li {{ (Request::is(['informasi/event'])? 'class=active' : '') }}><a href="{{ route('informasi.event') }}"><i class="fa fa-circle-o"></i>Event</a></li>
                    <li {{ (Request::is(['informasi/faq'])? 'class=active' : '') }}><a href="{{ route('informasi.faq') }}"><i class="fa fa-circle-o"></i>FAQ</a></li>
                    <li {{ (Request::is(['informasi/kontak'])? 'class=active' : '') }}><a href="{{ route('informasi.kontak') }}"><i class="fa fa-circle-o"></i>Kontak</a></li>
                    <li {{ (Request::is(['informasi/kalender'])? 'class=active' : '') }}><a href="{{ route('informasi.kalender') }}"><i class="fa fa-circle-o"></i>Kalender</a></li>
                </ul>
            </li>
            <li class="treeview {{ (Request::is(['profil/*'])? 'active' : '') }}">
                <a href="#"><i class="fa fa-book"></i> <span>Profil</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ (Request::is(['profil/visi-misi'])? 'class=active' : '') }}><a href="{{ route('profil.visi-misi') }}"><i class="fa fa-circle-o"></i>Visi & Misi</a></li>
                    <li {{ (Request::is(['profil/regulasi'])? 'class=active' : '') }}><a href="{{ route('profil.regulasi') }}"><i class="fa fa-circle-o"></i>Regulasi</a></li>
                </ul>
            </li>
            <li class="treeview {{ (Request::is(['data/*'])? 'active' : '') }}">
                <a href="#"><i class="fa fa-database"></i> <span>Data</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li {{ (Request::is(['data/visi-misi'])? 'class=active' : '') }}><a href="{{ route('profil.visi-misi') }}"><i class="fa fa-circle-o"></i>Profil</a></li>
                    <li {{ (Request::is(['data/regulasi'])? 'class=active' : '') }}><a href="{{ route('profil.regulasi') }}"><i class="fa fa-circle-o"></i>Data Umum</a></li>
                    <li {{ (Request::is(['data/regulasi'])? 'class=active' : '') }}><a href="{{ route('profil.regulasi') }}"><i class="fa fa-circle-o"></i>Kependudukan</a></li>
                    <li {{ (Request::is(['data/regulasi'])? 'class=active' : '') }}><a href="{{ route('profil.regulasi') }}"><i class="fa fa-circle-o"></i>Kesehatan</a></li>
                    <li {{ (Request::is(['data/regulasi'])? 'class=active' : '') }}><a href="{{ route('profil.regulasi') }}"><i class="fa fa-circle-o"></i>Program Bantuan</a></li>
                    <li {{ (Request::is(['data/regulasi'])? 'class=active' : '') }}><a href="{{ route('profil.regulasi') }}"><i class="fa fa-circle-o"></i>Finansial</a></li>
                </ul>
            </li>
        </ul>

        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label class="control-label col-sm-4">Foto</label>

            <div class="col-sm-8">
                <img src="{{ asset($penduduk->foto) }}" id="showgambar"
                     style="max-width:120px;max-height:150px;float:left;"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4">Ganti Foto</label>

            <div class="col-sm-8">
                <input type="file" id="foto" name="foto" class="validate form-control"/>
            </div>
        </div>

        <div class="form-group">
            <label for="nama" class="col-sm-4 control-label">Nama<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::text('nama', null,['placeholder'=>'Nama', 'class'=>'form-control', 'required', 'id'=>'nama']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="nik" class="col-sm-4 control-label">NIK<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::text('nik', null,['placeholder'=>'NIK', 'class'=>'form-control', 'required', 'id'=>'nik']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="no_kk_sebelumnya" class="col-sm-4 control-label">No KK Sebelumnya</label>

            <div class="col-sm-8">
                {!! Form::text('no_kk_sebelumnya', null,['placeholder'=>'NIK', 'class'=>'form-control', 'id'=>'no_kk_sebelumnya']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="kk_level" class="col-sm-4 control-label">Hubungan dalam Keluarga<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::select('kk_level', \App\Models\HubunganKeluarga::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'kk_level', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin" class="col-sm-4 control-label">Jenis Kelamin<span class="required">*</span></label>
            <div class="input-group col-sm-8">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    <input name="sex" value="1" type="radio" class="minimal" checked id="jenis_kelamin">
                    Laki-Laki
                </label>
                &nbsp;
                <label>
                    <input name="sex" value="2" type="radio" class="minimal" id="jenis_kelamin">
                    Perempuan
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="agama_id" class="col-sm-4 control-label">Agama<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::select('agama_id', \App\Models\Agama::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'agama_id', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="status" class="col-sm-4 control-label">Status Penduduk<span class="required">*</span></label>
            <div class="input-group col-sm-8">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    <input name="status" value="1" type="radio" class="minimal" checked id="status">
                    Tetap
                </label>
                &nbsp;
                <label>
                    <input name="status" value="2" type="radio" class="minimal" id="status">
                    Tidak Aktif
                </label>
                &nbsp;
                <label>
                    <input name="status" value="3" type="radio" class="minimal" id="status">
                    Pendatang
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="akta_lahir" class="col-sm-4 control-label">Akta Lahir<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::text('akta_lahir', null,['placeholder'=>'Akta Kelahiran', 'class'=>'form-control', 'required', 'id'=>'akta_lahir']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="tempat_lahir" class="col-sm-4 control-label">Tempat Lahir<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::text('tempat_lahir', null,['placeholder'=>'Tempat Lahir', 'class'=>'form-control', 'required', 'id'=>'tempat_lahir']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="tanggal_lahir" class="col-sm-4 control-label">Tanggal Lahir<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::text('tanggal_lahir', null,['placeholder'=>'0000-00-00', 'class'=>'form-control datepicker', 'required', 'id'=>'tanggal_lahir']) !!}
            </div>
        </div>

        <legend>PENDIDIKAN DAN PEKERJAAN</legend>

        <div class="form-group">
            <label for="pendidikan_kk_id" class="col-sm-4 control-label">Pendidikan dalam KK<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::select('pendidikan_kk_id', \App\Models\PendidikanKK::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'pendidikan_kk_id', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="pendidikan_sedang_id" class="col-sm-4 control-label">Pendidikan sedang ditempuh<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::select('pendidikan_sedang_id', \App\Models\PendidikanKK::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'pendidikan_sedang_id', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="pekerjaan_id" class="col-sm-4 control-label">Pekerjaan<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::select('pekerjaan_id', \App\Models\Pekerjaan::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'pekerjaan_id', 'required']) !!}
            </div>
        </div>

        <legend>DATA KEWARGANEGARAAN</legend>

        <div class="form-group">
            <label for="warga_negara_id" class="col-sm-4 control-label">Warganegara<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::select('warga_negara_id', \App\Models\Warganegara::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'warga_negara_id', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="dokumen_pasport" class="col-sm-4 control-label">Nomor Paspor</label>

            <div class="col-sm-8">
                {!! Form::text('dokumen_pasport', null,['placeholder'=>'Nomor Paspor', 'class'=>'form-control', 'id'=>'dokumen_pasport']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="tanggal_akhir_pasport" class="col-sm-4 control-label">Tanggal Akhir Paspor</label>

            <div class="col-sm-8">
                {!! Form::text('tanggal_akhir_pasport', null,['placeholder'=>'0000-00-00', 'class'=>'form-control datepicker','id'=>'tanggal_akhir_pasport']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="dokumen_kitas" class="col-sm-4 control-label">Nomor KITAS/KITAP</label>

            <div class="col-sm-8">
                {!! Form::text('dokumen_kitas', null,['placeholder'=>'Nomor KITAS/KITAP', 'class'=>'form-control', 'id'=>'dokumen_kitas']) !!}
            </div>
        </div>

    </div>

    <div class="col-md-6">
        <legend>ORANG TUA</legend>

        <div class="form-group">
            <label for="ayah_nik" class="col-sm-4 control-label">NIK Ayah</label>

            <div class="col-sm-8">
                {!! Form::text('ayah_nik', null,['placeholder'=>'NIK Ayah', 'class'=>'form-control', 'id'=>'ayah_nik']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="nama_ayah" class="col-sm-4 control-label">Nama Ayah</label>

            <div class="col-sm-8">
                {!! Form::text('nama_ayah', null,['placeholder'=>'Nama Ayah', 'class'=>'form-control', 'id'=>'nama_ayah']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="ibu_nik" class="col-sm-4 control-label">NIK Ibu</label>

            <div class="col-sm-8">
                {!! Form::text('ibu_nik', null,['placeholder'=>'NIK Ibu', 'class'=>'form-control', 'id'=>'ibu_nik']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="nama_ibu" class="col-sm-4 control-label">Nama Ibu</label>

            <div class="col-sm-8">
                {!! Form::text('nama_ibu', null,['placeholder'=>'Nama Ibu', 'class'=>'form-control', 'id'=>'nama_ibu']) !!}
            </div>
        </div>

        <legend>ALAMAT</legend>

        <div class="form-group">
            <label for="telepon" class="col-sm-4 control-label">Nomor Telepon</label>

            <div class="col-sm-8">
                {!! Form::text('telepon', null,['placeholder'=>'021-5432109', 'class'=>'form-control', 'id'=>'telepon']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="alamat_sebelumnya" class="col-sm-4 control-label">Alamat Sebelumnya</label>

            <div class="col-sm-8">
                {!! Form::text('alamat_sebelumnya', null,['placeholder'=>'Alamat Sebelumnya', 'class'=>'form-control', 'id'=>'alamat_sebelumnya']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="alamat_sekarang" class="col-sm-4 control-label">Alamat Sekarang</label>

            <div class="col-sm-8">
                {!! Form::text('alamat_sekarang', null,['placeholder'=>'Alamat Sekarang', 'class'=>'form-control', 'id'=>'alamat_sekarang']) !!}
            </div>
        </div>

        <legend>STATUS KAWIN</legend>

        <div class="form-group">
            <label for="status_kawin" class="col-sm-4 control-label">Status Kawin<span class="required">*</span></label>

            <div class="col-sm-8">
                {!! Form::select('status_kawin', \App\Models\Kawin::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'status_kawin', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="akta_perkawinan" class="col-sm-4 control-label">No. Akta Nikah (Buku Nikah)</label>

            <div class="col-sm-8">
                {!! Form::text('akta_perkawinan', null,['placeholder'=>'No. Akta Nikah (Buku Nikah)', 'class'=>'form-control', 'id'=>'akta_perkawinan']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="tanggal_perkawinan" class="col-sm-4 control-label">Tanggal Nikah</label>

            <div class="col-sm-8">
                {!! Form::text('tanggal_perkawinan', null,['placeholder'=>'0000-00-00', 'class'=>'form-control datepicker','id'=>'tanggal_perkawinan']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="akta_perceraian" class="col-sm-4 control-label">Akta Perceraian</label>

            <div class="col-sm-8">
                {!! Form::text('akta_perceraian', null,['placeholder'=>'Alamat Sekarang', 'class'=>'form-control', 'id'=>'akta_perceraian']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="tanggal_perceraian" class="col-sm-4 control-label">Tanggal Perceraian</label>

            <div class="col-sm-8">
                {!! Form::text('tanggal_perceraian', null,['placeholder'=>'0000-00-00', 'class'=>'form-control datepicker','id'=>'tanggal_perceraian']) !!}
            </div>
        </div>

        <legend>DATA KESEHATAN</legend>

        <div class="form-group">
            <label for="golongan_darah_id" class="col-sm-4 control-label">Golongan Darah</label>

            <div class="col-sm-8">
                {!! Form::select('golongan_darah_id', \App\Models\GolonganDarah::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'golongan_darah_id']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="cacat_id" class="col-sm-4 control-label">Cacat</label>

            <div class="col-sm-8">
                {!! Form::select('cacat_id', \App\Models\Cacat::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'cacat_id']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="sakit_menahun_id" class="col-sm-4 control-label">Sakit Menahun</label>

            <div class="col-sm-8">
                {!! Form::select('sakit_menahun_id', \App\Models\SakitMenahun::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'sakit_menahun_id']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="cara_kb_id" class="col-sm-4 control-label">Cara KB</label>

            <div class="col-sm-8">
                {!! Form::select('cara_kb_id', \App\Models\CaraKB::pluck('nama', 'id'), null,['placeholder'=>'-Pilih', 'class'=>'form-control', 'id'=>'cara_kb_id', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="hamil" class="col-sm-4 control-label">Status Kehamilan</label>
            <div class="input-group col-sm-8">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    <input name="sex" value="0" type="radio" class="minimal" checked id="hamil">
                    Tidak Hamil
                </label>
                &nbsp;
                <label>
                    <input name="sex" value="1" type="radio" class="minimal" id="hamil">
                    Hamil
                </label>
            </div>
        </div>

    </div>
</div>

<div class="ln_solid"></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Provinsi <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
               {!! Form::select('provinsi_id', [], null, ['class' => 'form-control', 'id' => 'provinsi_id', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kabupaten <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
               {!! Form::select('kabupaten_id', [], 'S', ['class' => 'form-control', 'id' => 'kabupaten_id', 'required' ]) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
               {!! Form::select('kecamatan_id', [], 'S', ['class' => 'form-control', 'id' => 'kecamatan_id', 'required' ]) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::textarea('alamat', null,['placeholder'=>'Alamat', 'class'=>'form-control', 'rows' => 3, 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Pos <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('kode_pos', null,['placeholder'=>'13210', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('telepon', null,['placeholder'=>'021-4567890', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('email', null,['placeholder'=>'021-4567890', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Camat <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
               {!! Form::text('nama_camat', null,['placeholder'=>'Nama Camat', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sekretaris Camat <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
               {!! Form::text('sekretaris_camat', null,['placeholder'=>'Sekretaris Camat', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kepala Seksi Pemerintahan Umum <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
               {!! Form::text('kepsek_pemerintahan_umum', null,['placeholder'=>'Kepala Seksi Pemerintahan Umum', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kepala Seksi Kesejahteraan Masyarakat <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('kepsek_kesejahteraan_masyarakat', null,['placeholder'=>'Kepala Seksi Kesejahteraan Masyarakat', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kepala Seksi Pemberdayaan Masyarakat <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('kepsek_pemberdayaan_masyarakat', null,['placeholder'=>'Kepala Seksi Pemberdayaan Masyarakat', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kepala Seksi Pelayanan Umum <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('kepsek_pelayanan_umum', null,['placeholder'=>'Kepala Seksi Pelayanan Umum', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kepala Seksi TRANTIB <span class="required">*</span></label>
        
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('kepsek_trantib', null,['placeholder'=>'Kepala Seksi TRANTIB', 'class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">File Struktur Organisasi <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" name="file_struktur_organisasi" class="form-control" required>
            </div>
        </div>
    </div>
</div>

<div class="ln_solid"></div>
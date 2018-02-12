<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kecamatan <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="kecamatan_id" class="form-control" id="kecamatan_id" style="width: 100%;">
            <option value="1" selected="selected">Aikmel</option>
            <option value="2">Sarang Selatan</option>
            <option value="3">Cipunagara</option>
            <option value="4">Pegaden Baru</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('tipe_regulasi', ['NASIONAL'=>'Regulasi Nasional', 'DAERAH'=>'Regulasi Daerah'], null,['class'=>'form-control',  'required'=>'required']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text( 'judul', null, [ 'class' => 'form-control', 'placeholder' => 'Judul Regulasi' ,'required'=>'required'] ) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea('deskripsi', null,['class'=>'form-control', 'placeholder'=>'Deskripsi', 'required'=>'required']) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">File Regulasi <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" name="file_regulasi" class="form-control" >
    </div>
</div>
<div class="ln_solid"></div>

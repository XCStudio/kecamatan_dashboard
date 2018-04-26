<div class="form-group">
    <label class="control-label col-md-4 col-sm-3 col-xs-12">Judul Prosedur <span class="required">*</span></label>
    <div class="col-md-5 col-sm-5 col-xs-12">
        {!! Form::text( 'judul_prosedur', null, [ 'class' => 'form-control', 'placeholder' => 'Judul Prosedur', 'required'] ) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 col-sm-3 col-xs-12">File Prosedur <span class="required">*</span></label>
    <div class="col-md-5 col-sm-5 col-xs-12">
        <input type="file" name="file_prosedur" id="file_prosedur" class="form-control" required >
        <br>
        <img src="http://placehold.it/1000x600" id="showgambar"
             style="max-width:400px;max-height:250px;float:left;"/>
    </div>
</div>
<div class="ln_solid"></div>

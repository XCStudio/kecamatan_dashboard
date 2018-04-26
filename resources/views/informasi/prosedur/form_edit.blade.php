<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Prosedur <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text( 'judul_prosedur', null, [ 'class' => 'form-control', 'placeholder' => 'Judul Prosedur'] ) !!}
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">File Prosedur</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="file" name="file_prosedur" id="file_prosedur" class="form-control" >
        <img src="@if(! $prosedur->file_prosedur == '') {{ asset($prosedur->file_prosedur) }} @else {{ "http://placehold.it/1000x600" }} @endif" id="showgambar"
             style="max-width:400px;max-height:250px;float:left;"/>
    </div>
</div>
<div class="ln_solid"></div>

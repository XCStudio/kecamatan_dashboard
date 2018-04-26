<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipe <span class="required">*</span></label>

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('tipe_regulasi', \App\Models\TipeRegulasi::pluck('nama', 'id'), null,['class'=>'form-control', 'id'=>'tipe', 'required']) !!}
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
        <input type="file" id="file_regulasi" name="file_regulasi" class="form-control" @if(isset($regulasi->file_regulasi)) required @else {{ " " }}@endif>
        <br>
        <img src="@if(isset($regulasi->file_regulasi)) {{ asset($regulasi->file_regulasi) }} @else {{ "http://placehold.it/1000x600" }} @endif"  id="showgambar"
             style="max-width:400px;max-height:250px;float:left;"/>
    </div>
</div>
<div class="ln_solid"></div>

@push('scripts')
<script>
    $(function () {

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#showgambar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file_regulasi").change(function () {
            readURL(this);
        });
    });
</script>
@endpush

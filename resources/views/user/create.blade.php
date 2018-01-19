@extends( 'layouts.dashboard_template' )

@section('title') Create User @endsection

@section( 'content' )
<section class="content-header">
	<h1>
	User Management
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Administrator</a></li>
		<li><a href="#">User</a></li>
		<li class="active">Create</li>
	</ol>
</section>

<section class="content">
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Users</h3>
	</div>
	<div class="box-body">
		{!! Form::open( [ 'route' => 'setting.user.store', 'method' => 'post', 'files' => true, 'id' => 'form-user', 'class' => 'form-horizontal form-label-left' ] ) !!}
		@include( 'flash::message' )
		@include('user.form')
		{!! Form::close() !!}
	</div>
</div>
</section>
@endsection

@push( 'scripts' )
{!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#form-user') !!}
<script type="text/javascript">
$('.showpass').hover(function () {
   $('.password').attr('type', 'text'); 
}, function () {
   $('.password').attr('type', 'password'); 
});
</script>
@endpush
@extends('layouts.app')

@section('content')
	{{-- <h3 class="page-title" style="color: #3c8dbc">Нууц үгээ солих цонх</h3> --}}

	@if(session('success'))
		<!-- If password successfully show message -->
		<div class="row">
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		</div>
	@else
		{!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
		<!-- If no success message in flash session show change password form  -->
		<div class="panel panel-default">
			<div class="panel-heading" style="color: #3c8dbc">
				Нууц үгээ солих цонх
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('current_password', trans('Одоогийн нууц үг'), ['class' => 'control-label']) !!}
						{!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('current_password'))
							<p class="help-block">
								{{ $errors->first('current_password') }}
							</p>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('new_password', trans('Шинэ нууц үг'), ['class' => 'control-label']) !!}
						{!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('new_password'))
							<p class="help-block">
								{{ $errors->first('new_password') }}
							</p>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('new_password_confirmation', trans('Шинэ нууц үг'), ['class' => 'control-label']) !!}
						{!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('new_password_confirmation'))
							<p class="help-block">
								{{ $errors->first('new_password_confirmation') }}
							</p>
						@endif
					</div>
				</div>
			</div>
		</div>

		{!! Form::submit(trans('Хадгалах'), ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
	@endif
@stop


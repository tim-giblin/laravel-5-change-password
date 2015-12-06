@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

{!! Form::open(['url' => '/password/change-password', 'method' => 'post', 'class' => 'form-horizontal']) !!}
	<div class="form-group">
		<h3 class="form-title">Change Password</h3>
	
		<div class="col-md-12">
			{!! Form::password('old_password', ['class'=>'form-control', 'placeholder' => 'Old Password']) !!}
		</div>
	</div>
	<div class="form-group">

		<div class="col-md-12">
			{!! Form::password('new_password', ['class'=>'form-control', 'placeholder' => 'Password']) !!}
		</div>
	</div>

	<div class="form-group">

		<div class="col-md-12">
			{!! Form::password('new_password_confirmation', ['class'=>'form-control', 'placeholder' => 'Confirm Password']) !!}
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			{!! Form::submit('Change Password', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
{!! Form::close() !!}
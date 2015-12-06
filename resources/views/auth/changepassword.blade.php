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

<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/change-password') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">


	<div class="form-group">
		<h3 class="form-title">Change Password</h3>
	
		<div class="col-md-12">
			<input type="password" placeholder="Old Password"  class="form-control" name="old_password" >
		</div>
	</div>

	<div class="form-group">

		<div class="col-md-12">
			<input type="password" placeholder="Password" class="form-control" name="new_password">
		</div>
	</div>

	<div class="form-group">

		<div class="col-md-12">
			<input type="password" placeholder="Confirm Password" class="form-control" name="new_password_confirmation">
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			<button type="submit" class="btn btn-primary">
				Change Password
			</button>
		</div>
	</div>
</form>
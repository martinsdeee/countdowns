@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Create new event
				</div>

				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/new') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title" value="{{ old('title') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Date</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="datetime" value="{{ old('datetime') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Slug</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Background</label>
							<div class="checkbox col-md-6">
								{!!Form::select('background_url', $bgs, old('background_url'), ['class' => 'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Public</label>

							<div class="checkbox col-md-6">
								<label>
									{!! Form::checkbox('public', 1, old('publix')) !!}
									<i>Event visible in public list</i>
								</label>
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Create event
								</button>
							</div>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@extends('app')

@section('title', 'Create new')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="page-heading"> Create New</h1>

					@if (count($errors) > 0)
						<div class="alert alert-danger row">
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
							<label class="control-label"><strong>The event title *</strong></label>
							<div class="">
								<input type="text" class="form-control" name="title" value="{{ old('title') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Event description</strong></label>
							<div class="">
								<textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Event date *</strong></label>
							<div class="">
								<input type="date" class="form-control" name="datetime" value="{{ old('datetime') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Event slug</strong> If you leave this field blank
							system will try to make link from title</label>
							<div class="">
								<input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Background for event page</strong></label>
							<div class="checkbox ">
								{!!Form::select('background_url', $bgs, old('background_url'), ['class' => 'form-control'])!!}
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><strong>Public</strong></label>

							<div class="checkbox ">
								<label>
									{!! Form::checkbox('public', 1, old('public')) !!}
									<i>Event visible in public list</i>
								</label>
							</div>
						</div>
						<div class="form-group">
							<strong>*</strong> - <i>Required fields</i>
						</div>
						<div class="form-group">
								<button type="submit" class="btn btn-block btn-primary">
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

<?php

	$xbgs = Storage::files('/images/bg');
	foreach($xbgs as $key => $value){
		$bgs['/'.$value] = '/'.$value;
	}
?>

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit event

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

					{!!Form::model($countdown, ['class' => 'form-horizontal', 'role'=>'form'])!!}


						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{$countdown->id}}">
						<div class="form-group">
							<label class="col-md-4 control-label">Title</label>
							<div class="col-md-6">
								{!!Form::text('title',$countdown->title,['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								{!!Form::text('description',$countdown->description,['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Date</label>
							<div class="col-md-6">
								{!!Form::text('datetime',$countdown->datetime,['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Slug</label>
							<div class="col-md-6">
								{!!Form::text('slug',$countdown->slug,['class'=>'form-control'])!!}
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
									<input type="checkbox" name="public"> <i>Event visible in public list</i>
								</label>
							</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update
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

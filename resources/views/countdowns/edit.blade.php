@extends('app')

@section('title', 'Edit Event')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<h1 class="page-heading"> Edit event</h1>
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
							<label class="control-label"><strong>Title</strong></label>
							<div class="">
								{!!Form::text('title',$countdown->title,['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="control-label"><strong>Description</strong></label>
							<div class="">
								{!!Form::textarea('description',$countdown->description,['class'=>'form-control', 'rows'=>3])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="control-label"><strong>Event date</strong></label>
							<div class="">
								{!!Form::text('datetime',$countdown->datetime,['class'=>'form-control'])!!}
							</div>
						</div>

						<div class="form-group">
							<label class="control-label"><strong>Event slug</strong></label>
							<div class="">
								{!!Form::text('slug',$countdown->slug,['class'=>'form-control'])!!}
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
									{!! Form::checkbox('public', 1, $countdown->public) !!}
									<i>Event visible in public list</i>
								</label>
							</div>
						</div>


						<div class="form-group text-center">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-fw fa-pencil"></i>
									Update
								</button>
								<a class="btn btn-success" target="_blank" href="{{url($countdown->slug)}}">
									<i class="fa fa-fw fa-eye"></i>
									Look
								</a>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">
									<i class="fa fa-fw fa-trash-o"></i>
									Delete
								</button>

							</div>
						</div>
					</form>

		</div>
	</div>
</div>
<!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Do you want to delete event?</h4>
			</div>
			<div class="modal-body">
				<a class="btn btn-danger btn-block" href="{{route('destroy', ['id' => $countdown->id])}}">
					<i class="fa fa-fw fa-trash-o"></i>
					Delete
				</a>
			</div>

		</div>
	</div>
</div>
@endsection

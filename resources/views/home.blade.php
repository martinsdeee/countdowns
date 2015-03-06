@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					My Countdowns
					<div class="pull-right">
						<a class="btn btn-xs btn-default" href="{{url('new')}}">
							<i class="fa  fa-plus"></i>
						</a>
					</div>
				</div>

				<div class="panel-body">
					<table class="table table-hover table-bordered">
						<tr>
							<th>Title</th>
							<th>Slug</th>
							<th>Datatime</th>
							<th>Public</th>
							<th>Actions</th>
						</tr>
					@foreach($countdowns as $countdown)
						<tr>
							<td>
								<a href="{{url($countdown->slug)}}">
									{{$countdown->title}}
								</a>
							</td>
							<td>{{$countdown->slug}}</td>
							<td>{{$countdown->datetime}}</td>
							<td>{{($countdown->public == 1 ? 'Yes' : 'No')}}</td>
							<td>
								<a class="btn btn-default btn-xs" href="{{route('edit', ['cd' => $countdown->slug])}}">
									<i class="fa fa-pencil"></i>
								</a>
							</td>
						</tr>
					@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

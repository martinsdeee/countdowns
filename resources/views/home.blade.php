<?php
use Carbon\Carbon;
?>

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
							<i class="fa fa-fw fa-plus"></i>
							Create new
						</a>
					</div>
				</div>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Title</th>
							<th>Slug</th>
							<th>Datatime</th>
							<th>Event gone</th>
							<th>Public</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					@foreach($countdowns as $countdown)
						<tr class="{{ Carbon::now() > $countdown->datetime == true ? 'active' : '' }}">
							<td>
								<i class="fa fa-newspaper-o fa-fw"></i>&nbsp;
								<a href="{{url($countdown->slug)}}">
									{{$countdown->title}}
								</a>
							</td>
							<td>{{$countdown->slug}}</td>
							<td>
								<i class="fa fa-clock-o fa-fw"></i>&nbsp;
								{{$countdown->datetime}}
							</td>
							<td>
								{{ Carbon::now() > $countdown->datetime == true ? 'Yes' : 'No' }}
							</td>
							<td>{{($countdown->public == 1 ? 'Yes' : 'No')}}</td>
							<td>
								<a class="btn btn-default btn-xs" href="{{route('edit', ['cd' => $countdown->id])}}">
									<i class="fa fa-pencil"></i>
								</a>
								<a class="btn btn-default btn-xs" target="_blank"href="{{url($countdown->slug)}}">
									<i class="fa fa-eye"></i>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection



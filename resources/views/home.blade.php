<?php
use Carbon\Carbon;
?>

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h1 class="page-heading"> My Countdowns</h1>

			@if(count($countdowns))
			<table class="table table-hover">
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
							{{$countdown->title}}
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
			@endif
			@unless(count($countdowns))
				<p class="text-center"> You don't have any countdowns right now. If you want, you can create one <a class="btn btn-xs btn-default" href="{{url('new')}}">here</a></p>
			@endunless


		</div>
	</div>
</div>
@endsection



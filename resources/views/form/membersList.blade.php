@extends('adminlte.layout')
@section('content')
<div class="container">
	<ul>
    	@foreach($data as $d)
      		<li>{{$d->name}}</li>
      		<li>{{$d->gender}}</li>
      		<li>{{$d->address}}</li>
      		<li>{{$d->tel_1}}</li>
      		<li>{{$d->tel_2}}</li>
      		<li>{{$d->email}}</li>
    	@endforeach
  	</ul>
</div>
@endsection

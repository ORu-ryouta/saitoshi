@extends('adminlte.layout')
@section('content')
<div class="container">
	<ul>
    	@foreach($data as $d)
      		<li>{{$d->name}}</li>
    	@endforeach
  	</ul>
</div>
@endsection

@extends('adminlte.layout')
@section('content')
<div class="container">
  <table>
    <tr>
      <th>顧客名</th>
      <th>性別</th>
      <th>住所</th>
      <th>連絡先１</th>
      <th>連絡先２</th>
      <th>E-mail</th>
    </tr>






  </table>
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

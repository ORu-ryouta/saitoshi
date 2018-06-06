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
      @foreach($data as $d)
      <tr>
          <th>{{$d->name}}</th>
          <th>{{$d->gender}}</th>
          <th>{{$d->address}}</th>
          <th>{{$d->tel_1}}</th>
          <th>{{$d->tel_2}}</th>
          <th>{{$d->email}}</th>
      </tr>
      @endforeach
  </table>
	
</div>
@endsection

@extends('adminlte.layout')
@section('content')
<div class="container">
  <table border="1">
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
      
    <tr><button type="submit" class="btn btn-primary">編集</button></tr>
           
    </tr>
      @endforeach
      <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">更新する</button>
            </div>
      </div>
  </table>
   
    <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">削除する</button>
            </div>
       </div>
  
    <form method="GET" action="{{ route('form::input') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">新規登録</button>
            </div>
        </div>
    </form>
</div>１
@endsection

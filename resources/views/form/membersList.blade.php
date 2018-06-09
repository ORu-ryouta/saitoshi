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
      
    <th>
        <form method="GET" action="{{ route('form::input') }}">
            <input type="hidden" class="form-control" name="memberId" value="{{$d->member_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>
        </form>
    </th>
    <th>
        <form method="GET" action="{{ route('form::input') }}">
            <input type="hidden" class="form-control" name="memberId" value="{{$d->member_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">modal</button>
                </div>
            </div>
        </form>
        
    </th>
    
    </tr>
      @endforeach
  </table>
    <form method="GET" action="{{ route('form::input') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">新規登録</button>
            </div>
        </div>
    </form>
</div>
<!--モーダル-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">顧客削除</h4>
            </div>
            <div class="modal-body">
                本当に削除？
            </div>
            <button type="submit" class="btn-delete">削除</button>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
            </div>
        </div>
    </div>
</div>
<!--ここまでモーダル-->
@endsection

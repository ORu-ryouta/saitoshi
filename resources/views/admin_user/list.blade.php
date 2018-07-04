@extends('adminlte.layout')
@section('content')
<div class="container">
    <form method="GET" action="{{ route('admin_user::list') }}">
       <p>名の検索</p>
       <input type="text" name="search" value="">
       <button type="submit" class="btn btn-primary">検索</button>
    </form>
  <table border="1">
    <tr>
      <th></th>
      <th>名前</th>
      <th>パスワード</th>
      <th>メールアドレス</th>
    </tr>
      @if (!empty($data)) 
      @foreach($data as $d)
    <tr>
      <th>{{$d->name}}</th>
      <th>{{$d->password}}</th>
      <th>{{$d->email}}</th>
    </tr>
      
    <th>
        <form method="GET" action="{{ route('admin_user::input') }}">
            <input type="hidden" class="form-control" name="admin_user_id" value="{{$d->admin_user_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">詳細</button>
                </div>
            </div>
        </form>
    </th>
    <th>
        <form method="GET" action="{{ route('admin_user::delete') }}">
            <input type="hidden" class="form-control" name="admin_user_id" value="{{$d->admin_user_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" onclick="return submitcheck();">削除</button>
                </div>
            </div>
        </form>
        
    </th>
    
    </tr>
      @endforeach
      @endif
  </table>
    <form method="GET" action="{{ route('admin_user::input') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">新規登録</button>
            </div>
        </div>
    </form>
</div>

<script  type="text/javascript">
//    削除ダイアログ
function submitcheck() {
	var check = confirm('削除？');
	return check;
}
</script>
@endsection

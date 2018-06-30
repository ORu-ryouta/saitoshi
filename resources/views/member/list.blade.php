@extends('adminlte.layout')
@section('content')
<div class="container">
    <form method="GET" action="{{ route('member::list') }}">
       <p>会社名の検索</p>
       <input type="text" name="search" value="">
       <button type="submit" class="btn btn-primary">検索</button>
    </form>
  <table border="1">
    <tr>
      <th>顧客名</th>
      <th>性別</th>
      <th>住所</th>
      <th>連絡先１</th>
      <th>連絡先２</th>
      <th>E-mail</th>
    </tr>
      @if (!empty($data)) 
      @foreach($data as $d)
    <tr>
      <th>{{$d->name}}</th>
      <th>{{$d->gender}}</th>
      <th>{{$d->address}}</th>
      <th>{{$d->tel_1}}</th>
      <th>{{$d->tel_2}}</th>
      <th>{{$d->email}}</th>
    </tr>
      
    <th>
        <form method="GET" action="{{ route('member::input') }}">
            <input type="hidden" class="form-control" name="memberId" value="{{$d->member_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>
        </form>
    </th>
    <th>
        <form method="GET" action="{{ route('member::delete') }}">
            <input type="hidden" class="form-control" name="memberId" value="{{$d->member_id}}">
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
    <form method="GET" action="{{ route('member::input') }}">
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

@extends('adminlte.layout')
@section('content')
<div class="container">
  <table border="1">
    <tr>
      <th>会社名</th>
      <th>代表者名</th>
      <th>住所</th>
      <th>連絡先</th> 
      <th>管理者備考</th>
      
    </tr>
      @foreach($data as $d)
    <tr>
      <th>{{$d->company}}</th>
      <th>{{$d->fixer}}</th>
      <th>{{$d->address}}</th>
      <th>{{$d->tel}}</th>
      <th>{{$d->note}}</th>
    
      
    <th>
        <form method="GET" action="{{ route('form::input') }}">
            <input type="hidden" class="form-control" name="memberId" value="{{$d->company_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>
        </form>
    </th>
    <th>
        <form method="GET" action="{{ route('form::membersDelete') }}">
            <input type="hidden" class="form-control" name="memberId" value="{{$d->company_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" onclick="return submitcheck();">削除</button>
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

<script  type="text/javascript">
//    削除ダイアログ
function submitcheck() {
	var check = confirm('削除？');
	return check;
}
</script>
@endsection

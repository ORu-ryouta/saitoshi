@extends('adminlte.layout')
@section('content')
<div class="container">
  <table border="1">
    <tr>
      <th>部品</th>
      <th>在庫</th>
      <th>最低在庫数</th>
      <th>最終仕入れ日</th>
    </tr>
      @if (!empty($data)) 
      @foreach($data as $d)
    <tr>
      <th>{{$d->parts}}</th>
      <th>{{$d->stock}}</th>
      <th>{{$d->min_stock}}</th>
      <th>{{$d->last_data}}</th>
    </tr>
      
    <th>
        <form method="GET" action="{{ route('stock::input') }}">
            <input type="hidden" class="form-control" name="stockId" value="{{$d->stock_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>
        </form>
    </th>
    <th>
        <form method="GET" action="{{ route('stock::delete') }}">
            <input type="hidden" class="form-control" name="stockId" value="{{$d->stock_id}}">
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
    <form method="GET" action="{{ route('stock::input') }}">
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

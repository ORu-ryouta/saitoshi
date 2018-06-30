@extends('adminlte.layout')
@section('content')

<div class="container">
    <form method="GET" action="{{ route('sale::list') }}">
       <p>会社名の検索</p>
       <input type="text" name="search" value="">
       <button type="submit" class="btn btn-primary">検索</button>
    </form>
  <table border="1">
    <tr>
      <th>会社名</th>
      <th>金額</th>
      <th>入金日</th>
    </tr>
      @if (!empty($data)) 
      @foreach($data as $d)
    <tr>
      <th>{{$demandNameList[$d->demand_id]}}</th>
      <th>{{$d->price}}</th>
      <th>{{$d->credit_date}}</th>
    </tr>
      
    <th>
        <form method="GET" action="{{ route('sale::input') }}">
            <input type="hidden" class="form-control" name="saleId" value="{{$d->sale_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>
        </form>
    </th>
    <th>
        <form method="GET" action="{{ route('sale::delete') }}">
            <input type="hidden" class="form-control" name="saleId" value="{{$d->sale_id}}">
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
    <form method="GET" action="{{ route('sale::input') }}">
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

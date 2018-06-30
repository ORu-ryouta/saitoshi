@extends('adminlte.layout')
@section('content')
<div class="container">
    <form method="GET" action="{{ route('supplier::list') }}">
       <p>会社名の検索</p>
       <input type="text" name="search" value="">
       <button type="submit" class="btn btn-primary">検索</button>
    </form>
  <table border="1">
    <tr>
      <th>部品名</th>
      <th>会社名</th>
      <th>仕入数</th>
      <th>単価</th> 
      <th>仕入れ日</th>
      
    </tr>
      @if (!empty($data)) 
      @foreach($data as $d)
    <tr>
      <th>{{$partsNameList[$d->parts_id]}}</th>
      <th>{{$companyNameList[$d->company_id]}}</th>
      <th>{{$d->supplier_num}}</th>
      <th>{{$d->price}}</th>
      <th>{{$d->supplier_date}}</th>
    </tr>
      
    <th>
        <form method="GET" action="{{ route('supplier::input') }}">
            <input type="hidden" class="form-control" name="supplierId" value="{{$d->supplier_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>
        </form>
    </th>
    <th>
        <form method="GET" action="{{ route('supplier::delete') }}">
            <input type="hidden" class="form-control" name="supplierId" value="{{$d->supplier_id}}">
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
    <form method="GET" action="{{ route('supplier::input') }}">
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

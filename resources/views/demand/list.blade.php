@extends('adminlte.layout')
@section('content')

<div class="container">
     <form method="GET" action="{{ route('demand::list') }}">
       <p>会社名の検索</p>
       <input type="text" name="search" value="">
       <button type="submit" class="btn btn-primary">検索</button>
    </form>
  <table border="1">
    <tr>
      <th>会社名</th>
      <th>注文内容</th>
      <th>商談内容</th>
      <th>作業内容</th>
      <th>金額</th>
      <th>注文日</th>
      <th>受注日</th>
      <th>完了日</th>
      <th>完了予定日</th>
      <th>進捗状況</th>
    </tr>
      @if (!empty($data)) 
      @foreach($data as $d)
    <tr>
      <th>{{$companyNameList[$d->company_id]}}</th>
      <th>{{$category[$d->category]}}</th>
      <th>{{$d->business}}</th>
      <th>{{$d->work}}</th>
      <th>{{$d->price}}</th>
      <th>{{$d->demand_date}}</th>
      <th>{{$d->receipt_date}}</th>
      <th>{{$d->complete_plans}}</th>
      <th>{{$d->complete_date}}</th>
      <th>{{$status[$d->status]}}</th>
    </tr>
      
    <th>
        <form method="GET" action="{{ route('demand::input') }}">
            <input type="hidden" class="form-control" name="demandId" value="{{$d->demand_id}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>
        </form>
    </th>
    <th>
        <form method="GET" action="{{ route('demand::delete') }}">
            <input type="hidden" class="form-control" name="demandId" value="{{$d->demand_id}}">
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
    <form method="GET" action="{{ route('demand::input') }}">
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

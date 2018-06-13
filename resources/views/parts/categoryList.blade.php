@extends('adminlte.layout')
@section('content')
<div class="container">
  <table border="1">
    <tr>
      <th>カテゴリ名</th>
      
    </tr>
      @if (!empty($data))
      @foreach($data as $d)
    <tr> 
      <th>{{$partsCategory[$d->category]}}</th>
    </tr>
      
    <th>
        <form method="GET" action="{{ route('parts::partsList') }}">
            <input type="hidden" class="form-control" name="category" value="{{$d->category}}">
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">部品一覧を表示</button>
                </div>
            </div>
        </form>
    </th> 
    
      @endforeach
      @endif
  </table>
    <form method="GET" action="{{ route('parts::input') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">新規登録</button>
            </div>
        </div>
    </form>
</div>


@endsection

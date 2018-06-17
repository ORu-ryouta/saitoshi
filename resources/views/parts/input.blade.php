@extends('adminlte.layout')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <h3>情報を入力してください。</h3>
  
    <form method="POST" action="{{ route('parts::save') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        @if (!empty($data)) <input type="hidden" class="form-control" name="partsId" value="{{$data->parts_id}}"> @endif
        
        <div class="form-group">
            <label>部品名</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="parts" placeholder="部品名を入力してください" @if (!empty($data)) value="{{$data->parts}}" @endif>
        </div>
        <div class="form-group">
            <label>在庫数</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="stock" placeholder="在庫数を入力してください" @if (!empty($data)) value="{{$data->stock}}" @endif>
        </div>
        <div class="form-group">
            <label>最低在庫数</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="min_stock" placeholder="最低在庫数を入力してください" @if (!empty($data)) value="{{$data->min_stock}}" @endif>
        </div>
        <div class="form-group">
            <label>最終仕入れ日</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="last_date" placeholder="最終仕入れ日を入力してください" @if (!empty($data)) value="{{$data->last_date}}" @endif>
        </div>
        
        <div class="form-group">
            <label>カテゴリ</label><span class="label label-danger">必須</span>
             <select name="category">
                 @foreach ($partsCategory as $numKey => $categoryName)
                 <option value="{{$numKey}}" @if (!empty($data)) @if ($data->category == $numKey) checked @endif @endif>{{$categoryName}}</option>
                 @endforeach
            
             </select>
       
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>
    <form method="GET" action="{{ route('parts::categoryList') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

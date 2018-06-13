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
 
    <form method="POST" action="{{ route('stock::save') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        @if (!empty($data)) <input type="hidden" class="form-control" name="stockId" value="{{$data->stock_id}}"> @endif
        
        <div class="form-group">
            <label>部品</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="parts" placeholder="部品を入力してください" @if (!empty($data)) value="{{$data->parts}}" @endif>
        </div>
        <div class="form-group">
            <label>在庫</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="stock" placeholder="在庫数を入力してください" @if (!empty($data)) value="{{$data->stock}}"@endif>
        </div>
        <div class="form-group">
            <label>最低在庫数</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="min_stock" placeholder="最低在庫数を入力してください" @if (!empty($data)) value="{{$data->min_stock}}"@endif>
        </div>
        <div class="form-group">
            <label>最終仕入れ日</label>
            <input type="text" class="form-control" name="last_data" placeholder="最終仕入れ日を入力してください" @if (!empty($data)) value="{{$data->last_data}}"@endif>
        </div>
        
 <!--       </div>
        <div class="form-group">
            <label>会社名</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="company" placeholder="会社名を入力してください" >
        </div>   -->
<!-- 
        <div class="form-group">
            <label>船舶名</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="shipId" placeholder="船舶名を入力してください" >
        </div>    -->
        
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">確認する</button>
            </div>
        </div>
    </form>
    <form method="GET" action="{{ route('stock::list') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

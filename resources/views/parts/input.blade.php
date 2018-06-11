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
            <label>カテゴリ</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="category" placeholder="カテゴリを入力してください" @if (!empty($data)) value="{{$data->ategory}}" @endif>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">確認する</button>
            </div>
        </div>
    </form>
    <form method="GET" action="{{ route('parts::list') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

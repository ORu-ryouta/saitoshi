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
 
    <form method="POST" action="{{ route('form::save') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
 
        <div class="form-group">
            <label>氏名</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="name" placeholder="氏名を入力してください" @if (!empty($data)) value="{{$data->name}}" @endif>
        </div>

        <div class="form-group">
            <label>性別</label><span class="label label-danger">必須</span>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender" value="1" @if ($data->gender == 1) checked @endif>男性
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="gender" value="2" @if ($data->gender == 2) checked @endif>女性
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>住所</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="address" placeholder="住所を入力してください" @if (!empty($data)) value="{{$data->address}}"@endif>
        </div>
        <div class="form-group">
            <label>連絡先_１</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="tel_1" placeholder="電話番号を入力してください" @if (!empty($data)) value="{{$data->tel_1}}"@endif>
        </div>
        <div class="form-group">
            <label>連絡先_２</label>
            <input type="text" class="form-control" name="tel_2" placeholder="電話番号を入力してください" @if (!empty($data)) value="{{$data->tel_2}}"@endif>
        </div>
        <div class="form-group">
            <label>メールアドレス</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="email" placeholder="メールアドレスを入力してください" @if (!empty($data)) value="{{$data->email}}"@endif>
 <!--       </div>
        <div class="form-group">
            <label>会社名</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="company" placeholder="会社名を入力してください" @if (!empty($data)) value="{{$data->company}}"@endif>
        </div>   -->
<!-- 
        <div class="form-group">
            <label>船舶名</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="shipId" placeholder="船舶名を入力してください" @if (!empty($data)) value="{{$data->shipId}}"@endif>
        </div>    -->
        
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">確認する</button>
            </div>
        </div>
    </form>
    <form method="GET" action="{{ route('form::membersList') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

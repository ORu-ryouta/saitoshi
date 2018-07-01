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
    <img src="{{ asset('/img/saitoshi_logo.png') }}" width="100%" height="100%" alt="ヤンマー特約店｜青森県深浦町｜齊敏機械｜ヤンマー舶用製品、マリンプレジャーの販売・整備・修理・加工" />
    <h3>取引先情報を入力してください。</h3>
 
    
    
    <form method="POST" action="{{ route('company::save') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        @if (!empty($data)) <input type="hidden" class="form-control" name="companyId" value="{{$data->company_id}}"> @endif
        
        <div class="form-group">
            <label>会社名/船名</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="company" placeholder="会社名又は船舶名を入力してください" @if (!empty($data)) value="{{$data->company}}" @endif>
        </div>
        <div class="form-group">
            <label>代表者名</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="fixer" placeholder="代表者名を入力してください" @if (!empty($data)) value="{{$data->fixer}}" @endif>
        </div>
        
        <div class="form-group">
            <label>住所</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="address" placeholder="住所を入力してください" @if (!empty($data)) value="{{$data->address}}"@endif>
        </div>
        <div class="form-group">
            <label>連絡先</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="tel" placeholder="電話番号を入力してください" @if (!empty($data)) value="{{$data->tel}}"@endif>
        </div>
        <div class="form-group">
            <label>備考</label>
            <textarea name="note" row="4" cols="40" width="300px" placeholder="備考を入力してください">
                @if (!empty($data)) "{{$data->note}}"@endif
            </textarea>
        </div>
     
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>
    <form method="GET" action="{{ route('company::list') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

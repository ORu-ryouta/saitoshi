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
 
    <form method="POST" action="{{ route('adminUser::save') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        @if (!empty($data)) <input type="hidden" class="form-control" name="admin_user_id" value="{{$data->admin_user_id}}"> @endif
        
        <div class="form-group">
            <label>名前</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="name" placeholder="氏名を入力してください" @if (!empty($data)) value="{{$data->name}}" @endif>
        </div>
        <div class="form-group">
            <label>パスワード</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="password" placeholder="パスワードを入力してください" @if (!empty($data)) value="{{$data->password}}"@endif>
        </div>
        <div class="form-group">
            <label>メールアドレス</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="email" placeholder="メールアドレスを入力してください" @if (!empty($data)) value="{{$data->email}}"@endif>

        
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>
    <form method="GET" action="{{ route('adminUser::list') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

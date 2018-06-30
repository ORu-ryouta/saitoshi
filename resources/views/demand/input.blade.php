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
 
    <form method="POST" action="{{ route('demand::save') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        @if (!empty($data)) <input type="hidden" class="form-control" name="demandId" value="{{$data->demand_id}}"> @endif
        <div class="form-group">
            <label>会社名</label><span class="label label-danger">必須</span>
             <select name="company_id">
                 @foreach ($data1 as $companyName)
                 <option value="{{$companyName->company_id}}" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>{{$companyName->company}}</option>
                 @endforeach
             </select>
       
        </div>
        <div class="form-group">
            <label>注文内容</label><span class="label label-danger">必須</span>
            <select name="category">
                <option value="0" @if (!empty($data)) @if ($data->category == 0 ) checked @endif @endif>メンテナンス</option>
                <option value="1" @if (!empty($data)) @if ($data->category == 1 ) checked @endif @endif>発注</option>
                <option value="2" @if (!empty($data)) @if ($data->category == 2 ) checked @endif @endif>クレーム</option>             
            </select>
        </div>
        <div class="form-group">
            <label>商談内容</label><span class="label label-danger">必須</span>
            <textarea name="business" row="4" cols="40" placeholder="商談内容を入力してください">
                @if (!empty($data)){{$data->business}}@endif
            </textarea>      
        </div>
        <div class="form-group">
            <label>作業内容</label><span class="label label-danger">必須</span>
            <textarea name="work" row="4" cols="40" placeholder="作業内容を入力してください">
                @if (!empty($data)){{$data->work}}@endif
            </textarea>
        </div>
        <div class="form-group">
            <label>金額</label>
            <input type="text" class="form-control" name="price" placeholder="金額を入力してください" @if (!empty($data)) value="{{$data->price}}"@endif>
        </div>
        <div class="form-group">
            <label>注文日</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="demand_date" placeholder="注文日を入力してください" @if (!empty($data)) value="{{$data->demand_date}}"@endif>
        </div>
         <div class="form-group">
            <label>受注日</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="receipt_date" placeholder="受注日を入力してください" @if (!empty($data)) value="{{$data->receipt_date}}"@endif>
        </div>
         <div class="form-group">
            <label>完了日</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="complete_plans" placeholder="完了日を入力してください" @if (!empty($data)) value="{{$data->complete_plans}}"@endif>
        </div>
         <div class="form-group">
            <label>完了予定日</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="complete_date" placeholder="完了予定日を入力してください" @if (!empty($data)) value="{{$data->complete_date}}"@endif>
        </div>
        <div class="form-group">
            <label>進捗状況</label><span class="label label-danger">必須</span>
            <select name="status">
                <option value="0" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>完了</option>
                <option value="1" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>進行中</option>
                <option value="2" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>未受注</option>
                <option value="3" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>保留</option>
                <option value="4" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>破棄</option>
            </select>
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
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>
    <form method="GET" action="{{ route('demand::list') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

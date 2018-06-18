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
             <select name="company">
                 @foreach ($data1 as $companyName)
                 <option value="{{$companyName->company_id}}" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>{{company}}</option>
                 @endforeach
            
             </select>
       
        </div>
        <div class="form-group">
            <label>注文内容</label><span class="label label-danger">必須</span>
            <input type="note" class="form-control" name="category" placeholder="注文内容を選択してください" @if (!empty($data)) value="{{$data->category}}" @endif>
        </div>
        <div class="form-group">
            <label>商談内容</label><span class="label label-danger">必須</span>
            <input type="note" class="form-control" name="business" placeholder="商談内容を入力してください" @if (!empty($data)) value="{{$data->business}}"@endif>
        </div>
        <div class="form-group">
            <label>作業内容</label><span class="label label-danger">必須</span>
            <input type="note" class="form-control" name="work" placeholder="作業内容を入力してください" @if (!empty($data)) value="{{$data->work}}"@endif>
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
            <input type="text" class="form-control" name="status" placeholder="進捗状況を入力してください" @if (!empty($data)) value="{{$data->status}}"@endif>
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
    <form method="GET" action="{{ route('demand::list') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

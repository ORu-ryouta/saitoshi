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
 
    <form method="POST" action="{{ route('sale::save') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        @if (!empty($data)) <input type="hidden" class="form-control" name="saleId" value="{{$data->sale_id}}"> @endif
        <div class="form-group">
            <label>会社名</label><span class="label label-danger">必須</span>
             <select name="company_id">
                 @foreach ($data1 as $companyName)
                 <option value="{{$companyName->company_id}}" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>{{$companyName->company}}</option>
                 @endforeach
             </select>
        </div> 
        <div class="form-group">
            <label>金額</label>
            <input type="text" class="form-control" name="price" placeholder="金額を入力してください" @if (!empty($data)) value="{{$data->price}}"@endif>
        </div>
        <div class="form-group">
            <label>入金日</label>
            <input type="text" class="form-control" name="credit_date" placeholder="入金日を入力してください" @if (!empty($data)) value="{{$data->credit_date}}"@endif>
        </div>
         <div class="form-group">
            <label>受注日</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="receipt_date" placeholder="受注日を入力してください" @if (!empty($data)) value="{{$data->receipt_date}}"@endif>
        </div>
         <div class="form-group">
            <label>完了日</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="complete_plans" placeholder="完了日を入力してください" @if (!empty($data)) value="{{$data->complete_plans}}"@endif>
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
    <form method="GET" action="{{ route('sale::list') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
</div>
@endsection

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
 
    <form method="POST" action="{{ route('supplier::save') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        @if (!empty($data)) <input type="hidden" class="form-control" name="supplierId" value="{{$data->supplier_id}}"> @endif
        <div class="form-group">
            <label>部品名</label><span class="label label-danger">必須</span>
             <select name="parts_id">
                 @foreach ($data2 as $partsName)
                 <option value="{{$partsName->parts_id}}" @if (!empty($data)) @if ($data->parts_id == $partsName->parts_id ) checked @endif @endif>{{$partsName->parts}}</option>
                 @endforeach
             </select>
        </div> 
        <div class="form-group">
            <label>会社名</label><span class="label label-danger">必須</span>
             <select name="company_id">
                 @foreach ($data1 as $companyName)
                 <option value="{{$companyName->company_id}}" @if (!empty($data)) @if ($data->company_id == $companyName->company_id ) checked @endif @endif>{{$companyName->company}}</option>
                 @endforeach
             </select>
        </div> 
        
        <div class="form-group">
            @if (!empty($data)){{$supplierNum = $data->supplier_num;}}
            @else {{$supplierNum = 0;}}
            @endif
            
            <label>仕入数</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="supplier_num" placeholder="仕入数を入力してください" value="{{$supplierNum}}">
        </div>
        <div class="form-group">
            <label>単価</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="price" placeholder="単価を入力してください" @if (!empty($data)) value="{{$data->price}}"@endif>
        </div>
        <div class="form-group">
            <label>仕入れ日</label><span class="label label-danger">必須</span>
            <input type="text" class="form-control" name="supplier_date" placeholder="仕入れ日を入力してください" @if (!empty($data)) value="{{$data->supplier_date}}"@endif>
        </div>
        
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>
    
    <form method="GET" action="{{ route('supplier::list') }}">
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary">リストに戻る</button>
            </div>
        </div>
    </form>
    
</div>
@endsection

@extends('adminlte.layout')

@section('content')


    # $dataから順に値を取り出して$valに代入します。
    @foreach ($data as $val) {
 
    # $valの値を使い、その中にある各項目の値を表示します。
    {{ $val->oname }}
 
}



@endsection
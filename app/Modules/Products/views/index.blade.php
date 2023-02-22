@extends('admin.layouts.master')

@section("header")
    @include("admin.layouts.components.header")
@endsection
@section("content")
    @include('admin.layouts.components.error')
    {{-- @include("Products::modals.add") --}}   
    @include('admin.layouts.components.datatable',[
        'id'=>$table_id,
        'heads'=>$heads,
        'config'=>$config
    ])
@endsection


@extends('admin.layouts.master')

@section("header")
    @include("admin.layouts.components.header")
@endsection
@section("content")
    @include("admin.layouts.components.button-header")
    @include('admin.layouts.components.error')
    @include("Roles::modals.add")    
     @foreach($roles as $role)
      @include('Roles::modals.detail',['model' => $role])
    @endforeach  
    @include('admin.layouts.components.datatable',[
        'id'=>$table_id,
        'heads'=>$heads,
        'config'=>$config
    ])
@endsection


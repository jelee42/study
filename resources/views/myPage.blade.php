@extends('layouts.master')

@section('style')
    <style>
        body {background: #C0FFFF; color: gray;}
    </style>
@endsection

@section('script')
    <script>
        alert("Hello User");
    </script>
@endsection

@section('content')
    <h4>Hello! My page</h4>
    <p>First visit My page</p>

@endsection
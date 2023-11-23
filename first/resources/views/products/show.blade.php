@extends('layouts.app')

@section("title","Show Product")

@section("content")
    @if($product['is_new'])
        <p>This Product Is New </p>
    @else
        <p>This Product Is Old</p>
    @endif
    @isset($product['has_reviews'])
    <p>This Product Has Review</p>
    @endisset
    <h1>{{$product['title']}}</h1>
    <p>{{$product['description']}}</p>
@stop
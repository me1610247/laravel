@extends('layouts.app')

@section("title","Show Product")

@section("content")
   @foreach ($Products as $key => $value)
       <h1>{{$loop->iteration}}.{{$value['title']}}</h1>
   @endforeach
@stop
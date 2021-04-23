@extends('adminlte::page')

@section('title', 'Classes')

@section('content_header')
    <h1>Classes</h1>
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classes as $class)
            <tr>
                <td>{{$class->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

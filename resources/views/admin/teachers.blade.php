@extends('adminlte::page')

@section('title', 'Teachers')

@section('content_header')
    <h1>Teachers</h1>
@stop

@section('content')

    <div class="row">
        <div class="col m-3 text-right">
            <a href="{{route('teachers.create')}}" class="btn btn-primary text-white">Add Teacher</a>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{$teacher->name}}</td>
                <td width="150" class="text-center">
                    <form method="post" action="{{route('teachers.destroy', [$teacher->id])}}">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('teachers.edit', [$teacher->id])}}" class="btn"><i
                                class="text-primary fas fa-edit"></i></a>
                        <button type="submit" class="btn"><i class="text-danger fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop


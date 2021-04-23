@extends('adminlte::page')

@section('title', 'Teachers')

@section('content_header')
    <h1>{{isset($teacher) ? $teacher->name : 'Create Teacher'}}</h1>
@stop

@section('content')
    <form action="{{isset($teacher) ? route('teachers.update', [$teacher->id]) : route('teachers.store')}}" method="POST">
        @csrf
        @if(isset($teacher))
            @method('PUT')
        @endif
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{isset($teacher) ? $teacher->name : ''}}">
                    </div>
                    <div class="form-group">
                        <div class='input-group date d-flex justify-content-end'>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

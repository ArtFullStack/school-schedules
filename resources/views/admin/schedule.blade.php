@extends('adminlte::page')

@section('title', 'Schedule')

@section('content_header')
    <h1>Schedule</h1>
@stop

@section('content')

    <div class="row">
        <div class="col m-3 text-right">
            <a href="{{route('schedule.create')}}" class="btn btn-primary text-white">Add Schedule</a>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Teacher</th>
            <th scope="col">Class</th>
            <th scope="col">Day</th>
            <th scope="col">Start Time</th>
            <th scope="col">End Time</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($schedules as $schedule)
            <tr>
                <td>{{$schedule->teacher->name}}</td>
                <td>{{$schedule->schoolClass->name}}</td>
                <td>{{$schedule->weekDay->name}}</td>
                <td>{{$schedule->start_time}}</td>
                <td>{{$schedule->end_time}}</td>
                <td width="150" class="text-center">
                    <form method="post" action="{{route('schedule.destroy', [$schedule->id])}}">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('schedule.edit', [$schedule->id])}}" class="btn"><i
                                class="text-primary fas fa-edit"></i></a>
                        <button type="submit" class="btn"><i class="text-danger fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop


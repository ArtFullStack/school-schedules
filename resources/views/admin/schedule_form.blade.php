@extends('adminlte::page')

@section('title', 'Schedules')

@section('content_header')
    <h1>{{isset($schedule) ? $schedule->name : 'Create Schedule'}}</h1>
@stop

@section('content')
    <form action="{{isset($schedule) ? route('schedule.update', [$schedule->id]) : route('schedule.store')}}"
          method="POST">
        @csrf
        @if(isset($schedule))
            @method('PUT')
        @endif
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <div class="form-group">
                        <label for="classes">Teachers</label>
                        <select class="form-control" id="classes" name="teacher_id">
                            <option value=""> Select Class</option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="classes">Classes</label>
                        <select class="form-control" id="classes" name="class_id">
                            <option value=""> Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="days">Week Days</label>
                        <select class="form-control" id="days" name="day_id">
                            <option value=""> Select Class</option>
                            @foreach($days as $day)
                                <option value="{{$day->id}}">{{$day->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Strat Time</label>
                                <div class='input-group date'>
                                    <input type='text' name="start_time" id="startTime" class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                     </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name">End Time</label>
                                <div class='input-group date'>
                                    <input type='text' name="end_time" id="endTime" class="form-control"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                     </span>
                                </div>
                            </div>
                        </div>
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
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"/>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            $('#startTime').datetimepicker({
                format: 'hh:mm'
            });
            $('#endTime').datetimepicker({
                format: 'hh:mm'
            });
        })
    </script>
@stop


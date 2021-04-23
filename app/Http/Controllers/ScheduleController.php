<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\WeekDay;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $schedules = Schedule::with([
            'teacher',
            'schoolClass',
            'weekDay',
        ])->get();

        return view('admin.schedule', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $classes = Classes::all();
        $days = WeekDay::all();
        $teachers = Teacher::all();

        return view('admin.schedule_form', compact('classes', 'days', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'class_id' => 'required',
            'day_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule = new Schedule;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->teacher()->associate($request->teacher_id);
        $schedule->schoolClass()->associate($request->class_id);
        $schedule->weekDay()->associate($request->day_id);
        $schedule->save();

        return redirect()->route('schedule.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule) {
            $schedule->delete();
        }

        return back();
    }
}

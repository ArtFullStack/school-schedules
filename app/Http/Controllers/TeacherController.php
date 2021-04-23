<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Teacher;
use App\Models\WeekDay;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('admin.teachers', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.teacher_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Teacher::create([
            'name' => $request->name
        ]);

        return redirect()->route('teachers.index');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('admin.teacher_form', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $teacher = Teacher::find($id);

        if ($teacher) {
            $teacher->update(['name' => $name]);
        }

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if ($teacher) {
            $teacher->delete();
        }

        return back();
    }
}

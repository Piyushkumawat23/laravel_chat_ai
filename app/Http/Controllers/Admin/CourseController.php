<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'chatbot_prompt' => 'required',
            'status' => 'required',
        ]);

        Course::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'chatbot_prompt' => $request->chatbot_prompt,
            'status' => $request->status ?? 0,
        ]);

        return redirect()
            ->route('admin.courses')
            ->with('success', 'Course created successfully');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'chatbot_prompt' => $request->chatbot_prompt,
            'status' => $request->status ?? 0,
        ]);

        return redirect()
            ->route('admin.courses')
            ->with('success', 'Course updated successfully');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()
            ->route('admin.courses')
            ->with('success', 'Course deleted successfully');
    }
}

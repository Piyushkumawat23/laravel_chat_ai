<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $courses = Course::all();

        $userCourseIds = $user->courses->pluck('id')->toArray();

        return view('admin.users.edit', compact(
            'user',
            'courses',
            'userCourseIds'
        ));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update(
            $request->only(['name', 'email'])
        );

        return redirect()
            ->route('admin.users')
            ->with('success', 'User updated successfully');
    }

    public function updateCourses(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $courses = $request->input('courses', []);

        // user_courses table update
        $user->courses()->sync($courses);


        return redirect()
            ->route('admin.users')
            ->with('success', 'Courses assigned successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()
            ->route('admin.users')
            ->with('success', 'User deleted successfully');
    }
}

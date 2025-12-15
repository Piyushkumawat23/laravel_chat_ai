@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="card">
    <h2>Edit User</h2>

    <h3>Assign Courses</h3>

    <form method="POST" action="{{ route('admin.users.courses.update', $user->id) }}">
        @csrf

        @foreach($courses as $course)
            <label>
                <input type="checkbox"
                       name="courses[]"
                       value="{{ $course->id }}"
                       {{ in_array($course->id, $userCourseIds) ? 'checked' : '' }}>
                {{ $course->title }}
            </label><br>
        @endforeach

        <br>
        <button type="submit">Save Courses</button>
    </form>
</div>
@endsection

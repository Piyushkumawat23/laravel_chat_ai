@extends('admin.layouts.app')

@section('title', 'Edit Course')

@section('content')
<div class="card">
    <h2>Edit Course</h2>

    <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data">
        @csrf

        <label>Title</label><br>
        <input type="text" name="title" value="{{ $course->title }}" required><br><br>

        <label>Slug</label><br>
        <input type="text" name="slug" value="{{ $course->slug }}" required><br><br>

        <label>Description</label><br>
        <textarea name="description" rows="4">{{ $course->description }}</textarea><br><br>

        <label>Chatbot Prompt</label><br>
        <textarea name="chatbot_prompt" rows="3">{{ $course->chatbot_prompt }}</textarea><br><br>

        <label>Course PDF</label><br>

        @if($course->course_pdf)
            <a href="{{ asset('storage/courses/'.$course->course_pdf) }}" target="_blank">
                View Current PDF
            </a><br><br>
        @endif

        <input type="file" name="course_pdf" accept="application/pdf"><br><br>

        <label>Status</label><br>
        <select name="status">
            <option value="1" {{ $course->status ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$course->status ? 'selected' : '' }}>Inactive</option>
        </select><br><br>

        <button type="submit">Update Course</button>
    </form>
</div>
@endsection

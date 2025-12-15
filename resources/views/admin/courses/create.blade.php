@extends('admin.layouts.app')

@section('title', 'Add Course')

@section('content')
<div class="card">
    <h2>Add Course</h2>

    <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Title</label><br>
        <input type="text" name="title" required><br><br>

        <label>Description</label><br>
        <textarea name="description" rows="4"></textarea><br><br>

        <label>Chatbot Prompt</label><br>
        <textarea name="chatbot_prompt" rows="3"></textarea><br><br>

        <label>Course PDF</label><br>
        <input type="file" name="course_pdf" accept="application/pdf"><br><br>


        <label>Status</label><br>
        <select name="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select><br><br>

        <button type="submit">Save Course</button>
    </form>
</div>
@endsection

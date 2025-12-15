@extends('admin.layouts.app')

@section('title', 'Courses')

@section('content')
<div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center;">
        <h2>Courses</h2>
        <a href="{{ route('admin.courses.create') }}"
           style="background:#2563eb;color:#fff;padding:8px 14px;text-decoration:none;border-radius:4px;">
            ➕ Add Course
        </a>
    </div>

    <table width="100%" cellpadding="10" cellspacing="0" border="1"
           style="border-collapse: collapse; margin-top: 15px;">
        <thead style="background:#f1f5f9;">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Created At</th>
                <th width="140">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->slug }}</td>
                    <td>
                        @if($course->status)
                            <span style="color:green;">Active</span>
                        @else
                            <span style="color:red;">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $course->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.courses.edit', $course->id) }}">✏️ Edit</a>

                        <form action="{{ route('admin.courses.destroy', $course->id) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Delete this course?')">
                            @csrf
                            <button type="submit"
                                    style="color:red;border:none;background:none;">
                                🗑 Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">No courses found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

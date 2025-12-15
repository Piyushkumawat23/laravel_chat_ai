@extends('admin.layouts.app')

@section('title', 'Users List')

@section('content')
<div class="card">
    <h2>Users</h2>

    <table width="100%" cellpadding="10" cellspacing="0" border="1"
           style="border-collapse: collapse; margin-top: 15px;">
        <thead style="background:#f1f5f9;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Courses</th>
                <th>Created At</th>
                <th width="160">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    {{-- COURSES --}}
                    <td>
                        @if($user->courses->count())
                            @foreach($user->courses as $course)
                                <span style="
                                    background:#e0f2fe;
                                    padding:3px 6px;
                                    margin:2px;
                                    display:inline-block;
                                    border-radius:4px;
                                    font-size:12px;">
                                    {{ $course->title }}
                                </span>
                            @endforeach
                        @else
                            <span style="color:#999;">No Courses</span>
                        @endif
                    </td>

                    <td>{{ $user->created_at->format('d M Y') }}</td>

                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}">✏️ Edit</a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Delete user?')">
                            @csrf
                            <button style="background:none;border:none;color:red;">
                                🗑 Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">No users found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

<x-admin-layout title="All Subjects">
    <x-slot name="content">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">All Subjects</h4>

            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Chapters Count</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->level }}</td>
                                    <td>{{ $subject->chapters_count }}</td>
                                    <td>{{ optional($subject->created_at)->format('Y-m-d') }}</td>
                                    <td>
                                        <form action="{{ route('subjects.delete', $subject->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                               </td>
                          </tr>
                        @endforeach
                   </tbody>
                 </table>
             </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
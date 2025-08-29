<x-admin-layout title="All Classes">
    <x-slot name="content">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">All Classes</h4>

            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Students Count</th>
                                <th>School</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($classes as $class)
                                <tr>
                                    <td>{{ $class->name }}</td>
                                    <td>{{ $class->students_count }}</td>
                                    <td>{{ $class->school }}</td>
                                    <td>{{ optional($class->created_at)->format('Y-m-d') }}</td>
                                    <td>
                                        <form action="{{ route('classes.delete', $class->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this class?');">
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
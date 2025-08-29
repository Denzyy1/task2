<x-admin-layout title="Main Page">
    <x-slot name="content">

<div class="p-6">
        <h1 class="text-xl font-bold">Main Page</h1>
        <ul class="mt-4 space-y-2">
            <li>
                <a href="{{ route('classes.index') }}" class="text-blue-600 underline">View All Classes</a>
            </li>
            <li>
                <a href="{{ route('subjects.index') }}" class="text-blue-600 underline">View All Subjects</a>
            </li>
        </ul>
    </div>
    </x-slot>
</x-admin-layout>
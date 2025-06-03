<x-app-layout>
    <x-slot name="header">
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Your Task
        </h2>
        
            
 
        <a href="{{ route('tasks.create') }}" class="bg-slate-700 hover:bg-slate-600  text-sm text-white rounded-lg px-3 py-2">Create </a>
               
      </div>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr class="border-b">
                                        <th class="px-6 py-3 text-left" width="60">#</th>
                                        <th class="px-6 py-3 text-left">Title</th>
                                        <th class="px-6 py-3 text-left">Description</th>
                                        <th class="px-6 py-3 text-left" width="180">Created</th>
                                        <th class="px-6 py-3 text-center" width="180">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($tasks as $task)
                                        <tr class="border-b">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td class="px-6 py-3 text-left">{{ $task->title }}</td>
                                            <td class="px-6 py-3 text-left">{{ $task->description }}</td>
                                            <td class="px-6 py-3">{{ $task->created_at->format('d M Y') }}</td>
                                            <td class="px-6 py-3 text-center " style="display: flex;  gap: 10px;">
                                                
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-slate-700 hover:bg-slate-600  text-sm text-white rounded-lg px-3 py-2 hover:bg-slate-600">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-600 text-sm text-white rounded-lg px-3 py-2 hover:bg-red-500 border-0">
                                                            Delete
                                                        </button>
                                                    </form>
                                               
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

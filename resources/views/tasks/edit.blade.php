<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Task
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 bg-white p-8 rounded-lg shadow-md py-3">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block text-lg font-semibold text-gray-700 mb-2">Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $task->title) }}"
                    placeholder="Enter your task title" 
                    class="w-full border border-gray-300 focus:ring-2 focus:ring-indigo-500 rounded-lg shadow-sm p-3"
                >
            </div>

            <div class="mb-6">
                <label for="description" class="block text-lg font-semibold text-gray-700 mb-2">Description</label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="5"
                    placeholder="Enter task description..." 
                    class="w-full border border-gray-300 focus:ring-2 focus:ring-indigo-500 rounded-lg shadow-sm p-3"
                >{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="flex items-center space-x-4">
                <button 
                    type="submit" 
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow-md transition duration-200"
                >
                    Update Task
                </button>

                <a 
                    href="{{ route('tasks.index') }}" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 text-lg font-semibold px-6 py-3 rounded-lg shadow-md transition duration-200"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

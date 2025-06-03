<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                            <form action="{{ route('tasks.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="title" class="text-lg font-medium">Title</label>
                                    <input 
                                        type="text" 
                                        id="title" 
                                        name="title" 
                                        value="{{ old('title') }}"
                                        placeholder="Enter your task title" 
                                        class="border-gray-300 shadow-sm rounded-lg w-full p-2"
                                    >
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="text-lg font-medium">Description</label>
                                    <textarea 
                                        id="description" 
                                        name="description" 
                                        rows="4" 
                                        placeholder="Enter description here..." 
                                        class="border-gray-300 shadow-sm rounded-lg w-full p-2"
                                    >{{ old('description') }}</textarea>
                                </div>

                                <div>
                                    <button 
                                        type="submit" 
                                        class="bg-slate-700 hover:bg-slate-600 text-white rounded-lg px-6 py-3"
                                    >
                                        Create
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

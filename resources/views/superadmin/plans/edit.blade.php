@extends('layouts.dashboard-layout')
@section('title', 'Plans')
@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Plan</h1>
            </div>

            <form action="{{ route('superadmin.update', $plan) }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                {{-- Name Field --}}
                <div class="mb-6">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <x-ui.custom-input id="name" name="name" type="text" :value="old('name', $plan->name)"
                        class="bg-gray-600 text-white" />
                </div>
                {{-- Price Field --}}
                <div class="mb-6">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Price <span class="text-red-500">*</span>
                    </label>
                    <x-ui.custom-input id="price" name="price" type="number" :value="old('price', $plan->price)" min="1"
                        class="bg-gray-600 text-white" />
                </div>

                {{-- Features Field --}}
                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Features
                    </label>
                    <div id="features-container" class="space-y-3">
                        @php
                            $features = old('features', $plan->features ?? []);
                            if (empty($features)) {
                                $features = [''];
                            }
                        @endphp
                        @foreach ($features as $index => $feature)
                            <div class="feature-row flex items-center gap-2">
                                <input type="text" name="features[]" value="{{ $feature }}"
                                    class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <button type="button" onclick="removeFeature(this)"
                                    class="text-red-500 hover:text-red-700 p-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-feature"
                        class="mt-3 text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add Feature
                    </button>

                    @error('features')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                    @error('features.*')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Form Buttons --}}
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('superadmin.plans') }}"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancel
                    </a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Plan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addFeatureBtn = document.getElementById('add-feature');
            const featuresContainer = document.getElementById('features-container');

            addFeatureBtn.addEventListener('click', function() {
                const featureRow = document.createElement('div');
                featureRow.className = 'feature-row flex items-center gap-2';
                featureRow.innerHTML = `
            <input type="text"
                   name="features[]"
                   class="bg-gray-50 border border-gray-300 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <button type="button"
                    onclick="removeFeature(this)"
                    class="text-red-500 hover:text-red-700 p-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        `;
                featuresContainer.appendChild(featureRow);
            });
        });

        function removeFeature(button) {
            const featuresContainer = document.getElementById('features-container');
            const featureRows = featuresContainer.querySelectorAll('.feature-row');

            // Keep at least one feature input
            if (featureRows.length > 1) {
                button.parentElement.remove();
            }
        }
    </script>
@endsection

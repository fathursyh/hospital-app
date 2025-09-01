@props([
    'id' => null,
    'label' => null,
    'name',
    'type' => 'text',
    'error' => null,
    'value' => old($name),
])

<div>
    <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-gray-900">{{ $label }}</label>
    <input
        {{ $attributes->merge([
            'class' =>
                'focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 sm:text-sm',
        ]) }}
        type="{{ $type }}" id="{{ $id }}" value="{{ $value }}" name="{{ $name }}">
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

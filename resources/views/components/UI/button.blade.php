@if ($buttonType === 'default')
    <button
        {{ $attributes->merge([
            'class' => "rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none disabled:bg-gray-500 disabled:cursor-not-allowed!",
        ]) }}>
        {{ $slot }}
    </button>
@elseif ($buttonType === 'outline')
    <button
        {{ $attributes->merge([
            'class' => "rounded-lg border border-blue-700 px-5 py-2.5 text-center text-sm font-medium text-blue-800 hover:bg-blue-800 hover:text-white focus:outline-none",
        ]) }}>
        {{ $slot }}
    </button>
@endif

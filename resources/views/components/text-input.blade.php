@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'form-input w-full text-gray-800 rounded-md bg-gray-50 border border-gray-300 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-300 p-2 transition duration-200 ease-in-out shadow-sm hover:border-blue-400',
]) !!}>

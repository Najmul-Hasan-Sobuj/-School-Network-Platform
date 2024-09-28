<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full bg-[#4361ee] text-white font-semibold py-2 rounded-md hover:bg-[#4895ef] transition-all duration-300 ease-in-out']) }}>
    {{ $slot }}
</button>

@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }}  {{ $attributes->merge(['type' => 'submit', 'class' => 'disabled:opacity-25 inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>


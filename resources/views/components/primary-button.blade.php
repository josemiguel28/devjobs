<button {{ $attributes->merge(['type' => 'submit',
 'class' => 'inline-flex items-center px-8 py-4 bg-yellow-500 border border-transparent rounded-3xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

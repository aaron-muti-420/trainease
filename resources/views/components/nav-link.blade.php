@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-red-500 dark:border-red-600 text-sm font-bold leading-5 text-gray-100 dark:text-gray-100 focus:outline-none focus:border-red-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm font-light leading-5 text-gray-400 dark:text-gray-400  hover:text-gray-100 dark:hover:text-gray-300  focus:outline-none focus:text-gray-100 dark:focus:text-gray-100  transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

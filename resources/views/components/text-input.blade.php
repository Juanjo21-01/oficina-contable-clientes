@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-zinc-200 dark:border-zinc-600 dark:bg-gray-700 dark:text-zinc-300 focus:border-purple-400 dark:focus:border-purple-600 focus:outline-none focus:shadow-outline-purple rounded-md shadow-sm',
]) !!}>

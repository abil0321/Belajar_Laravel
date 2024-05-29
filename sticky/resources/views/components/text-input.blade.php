@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-zinc-800 text-white
focus:outline-none bg-zinc-950 rounded-md shadow-sm']) !!}>

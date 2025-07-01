@props(['disabled' => false])
<textarea {{$disabled ? 'disabled': ''}} {{ $attributes->merge(['clasess' => 'font-medium texts-sm text-gray-700 block']) }}>
    {{ $slot }}
</textarea>
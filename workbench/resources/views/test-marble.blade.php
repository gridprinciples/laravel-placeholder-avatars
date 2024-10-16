<x-test-page>
    @php $name = 'lasagnacat'; @endphp
    @php $colors = ["#8e3f65", "#73738d", "#72a5ae", "#98e9d0", "#d8ffcc"]; @endphp
    @php $size = 400; @endphp
    @php $square = true; @endphp

    <x-slot:embedded>
        <x-placeholder-avatar::marble :$colors :$size :$square :$name @class(['rounded-xl xl:rounded-3xl max-w-full h-auto']) />
    </x-slot:embedded>

    <x-slot:viaUrl>
        <img src="{{ route('marble', compact('colors', 'square', 'size', 'name')) }}" @class(['rounded-xl xl:rounded-3xl max-w-full h-auto']) />
    </x-slot:viaUrl>
</x-test-page>
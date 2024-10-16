<x-test-page>
    @php $name = 'lasagnacat'; @endphp
    @php $colors = ["#551bb3", "#268fbe", "#2cb8b2", "#3ddb8f", "#a9f04d"]; @endphp
    @php $size = 400; @endphp
    @php $square = true; @endphp

    <x-slot:embedded>
        <x-placeholder-avatar::pixel :$colors :$size :$square :$name @class(['rounded-xl xl:rounded-3xl max-w-full
            h-auto']) />
    </x-slot:embedded>

    <x-slot:viaUrl>
        <img src="{{ route('pixel', compact('colors', 'square', 'size', 'name')) }}" @class(['rounded-xl xl:rounded-3xl
            max-w-full h-auto']) />
    </x-slot:viaUrl>
</x-test-page>
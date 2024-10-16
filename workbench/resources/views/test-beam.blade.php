<x-test-page>
    @php $name = 'lasagna'; @endphp
    @php $colors = ['#8DA2FB', '#6875F5', '#5850EC']; @endphp
    @php $size = 400; @endphp
    @php $square = true; @endphp

    <x-slot:embedded>
        <x-placeholder-avatar::beam :$colors :$size :$square :$name @class(['rounded-xl xl:rounded-3xl max-w-full h-auto']) />
    </x-slot:embedded>

    <x-slot:viaUrl>
        <img src="{{ route('face', compact('colors', 'square', 'size', 'name')) }}" @class(['rounded-xl xl:rounded-3xl max-w-full h-auto']) />
    </x-slot:viaUrl>
</x-test-page>
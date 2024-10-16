<nav>
    <ul class="flex gap-2 justify-end">
        @foreach($links ?? [] as $link)
            <li>
                @if($link['href'] === request()->path())
                    <span class="font-semibold">{{ $link['label'] }}</span>
                @else
                    <a class="font-semibold underline" href="{{ url($link['href']) }}">{{ $link['label'] }}</a>
                @endif
            </li>
        @endforeach
    </ul>
</nav>
@php $data = $makeAvatarData(); @endphp
<svg {{ $attributes->merge([
    'viewBox' => '0 0 ' . $baseSize . ' ' . $baseSize,
    'fill' => 'none',
    'role' => 'img',
    'xmlns' => 'http://www.w3.org/2000/svg',
    'width' => $size,
    'height' => $size,
]) }}>
@if($name)
    <title>{{ $name }}</title>
@endif

    <mask id="{{ $maskID }}" maskUnits="userSpaceOnUse" x="0" y="0" width="{{ $size }}" height="{{ $size }}">
        <rect width="{{ $baseSize }}" height="{{ $baseSize }}" rx="{{ $square ? 0 : $baseSize * 2 }}" fill="#FFFFFF" />
    </mask>

    <g mask="url(#{{ $maskID }})">
        <rect width="{{ $baseSize }}" height="{{ $baseSize }}" fill="{{ $data['backgroundColor'] }}" />
        <rect
            x="0"
            y="0"
            width="{{ $baseSize }}"
            height="{{ $baseSize }}"
            transform="{{
            'translate(' .
            $data['wrapperTranslateX'] .
            ' ' .
            $data['wrapperTranslateY'] .
            ') rotate(' .
            $data['wrapperRotate'] .
            ' ' .
            $baseSize / 2 .
            ' ' .
            $baseSize / 2 .
            ') scale(' .
            $data['wrapperScale'] .
            ')'
            }}"
            fill="{{ $data['wrapperColor'] }}"
            rx="{{ $data['isCircle'] ? $baseSize : $baseSize / 6 }}"
        />
        <g transform="{{
            'translate(' .
            $data['faceTranslateX'] .
            ' ' .
            $data['faceTranslateY'] .
            ') rotate(' .
            $data['faceRotate'] .
            ' ' .
            $baseSize / 2 .
            ' ' .
            $baseSize / 2 .
            ')'
        }}">
            @if($data['isMouthOpen'])
                <path
                    d="{{ 'M15 ' . (19 + $data['mouthSpread']) . 'c2 1 4 1 6 0' }}"
                    stroke="{{ $data['faceColor'] }}"
                    fill="none"
                    strokeLinecap="round"
                    />
            @else
                <path
                    d="{{'M13,' . (19 + $data['mouthSpread']) . ' a1,0.75 0 0,0 10,0'}}"
                    fill="{{ $data['faceColor'] }}"
                    />
            @endif
            <rect
            x="{{ 14 - $data['eyeSpread'] }}"
            y="{{ 14 }}"
            width="{{ 1.5 }}"
            height="{{ 2 }}"
            rx="{{ 1 }}"
            stroke="none"
            fill="{{ $data['faceColor'] }}"
            />
            <rect
            x="{{ 20 + $data['eyeSpread'] }}"
            y="{{ 14 }}"
            width="{{ 1.5 }}"
            height="{{ 2 }}"
            rx="{{ 1 }}"
            stroke="none"
            fill="{{ $data['faceColor'] }}"
            />
        </g>
    </g>
</svg>
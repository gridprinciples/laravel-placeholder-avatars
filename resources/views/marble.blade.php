@php $properties = $makeAvatarData(); @endphp
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
        <rect width="{{ $baseSize }}" height="{{ $baseSize }}" fill="{{ $properties[0]['color'] }}" />
        
        <path
          filter="url(#filter_{{ $maskID }})"
          d="M32.414 59.35L50.376 70.5H72.5v-71H33.728L26.5 13.381l19.057 27.08L32.414 59.35z"
          fill="{{ $properties[1]['color'] }}"
          transform="{{
            'translate(' .
            $properties[1]['translateX'] .
            ' ' .
            $properties[1]['translateY'] .
            ') rotate(' .
            $properties[1]['rotate'] .
            ' ' .
            $baseSize / 2 .
            ' ' .
            $baseSize / 2 .
            ') scale(' .
            $properties[2]['scale'] .
            ')'
          }}"
        />

        <path
          filter="url(#filter_{{ $maskID }})"
          style="mix-blend-mode: overlay;"
          d="M22.216 24L0 46.75l14.108 38.129L78 86l-3.081-59.276-22.378 4.005 12.972 20.186-23.35 27.395L22.215 24z"
          fill="{{ $properties[2]['color'] }}"
          transform="{{
            'translate(' .
            $properties[2]['translateX'] .
            ' ' .
            $properties[2]['translateY'] .
            ') rotate(' .
            $properties[2]['rotate'] .
            ' ' .
            $baseSize / 2 .
            ' ' .
            $baseSize / 2 .
            ') scale(' .
            $properties[2]['scale'] .
            ')'
          }}"
        />
    </g>

    <defs>
        <filter
            id="filter_{{ $maskID }}"
            filterUnits="userSpaceOnUse"
            colorInterpolationFilters="sRGB"
        >
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="7" result="effect1_foregroundBlur" />
        </filter>
    </defs>
</svg>
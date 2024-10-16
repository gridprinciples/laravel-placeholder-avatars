<?php

namespace GridPrinciples\PlaceholderAvatars\View\Components;

use GridPrinciples\PlaceholderAvatars\Concerns\BoringAvatarMath;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Marble extends Component
{
    use BoringAvatarMath;

    public string $maskID;

    public int $elements = 3;

    public int $baseSize = 80;

    public array $properties = [];

    public function __construct(
        public ?string $name = null,
        public array $colors = ['#8DA2FB', '#6875F5', '#5850EC'],
        public int $size = 36,
        public bool $square = false,
    ) {
        $this->maskID = 'mask-'.uniqid();

        if (! $name) {
            $this->name = Str::random(8);
        }
    }

    public function render()
    {
        return view('placeholder-avatar::marble', $this->data());
    }

    public function makeAvatarData(): array
    {
        $numFromName = $this->hashCode($this->name);
        $range = count($this->colors);

        return array_map(function ($i) use ($numFromName, $range) {
            return [
                'color' => $this->getRandomColor($numFromName + $i, $this->colors, $range),
                'translateX' => $this->getUnit($numFromName * ($i + 1), $this->baseSize / 10, 1),
                'translateY' => $this->getUnit($numFromName * ($i + 1), $this->baseSize / 10, 2),
                'scale' => 1.2 + $this->getUnit($numFromName * ($i + 1), $this->baseSize / 20) / 10,
                'rotate' => $this->getUnit($numFromName * ($i + 1), 360, 1),
            ];
        }, range(1, $this->elements));
    }
}

<?php

namespace GridPrinciples\PlaceholderAvatars\View\Components;

use GridPrinciples\PlaceholderAvatars\Concerns\BoringAvatarMath;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Pixel extends Component
{
    use BoringAvatarMath;

    public string $maskID;

    public int $elements = 64;

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
        return view('placeholder-avatar::pixel', $this->data());
    }

    public function makeAvatarData(): array
    {
        $numFromName = $this->hashCode($this->name);
        $range = count($this->colors);

        return array_map(function ($i) use ($numFromName, $range) {
            return $this->getRandomColor($numFromName % ($i + 1), $this->colors, $range);
        }, range(1, $this->elements));
    }
}

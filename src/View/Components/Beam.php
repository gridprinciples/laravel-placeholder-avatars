<?php

namespace GridPrinciples\PlaceholderAvatars\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use GridPrinciples\PlaceholderAvatars\Concerns\BoringAvatarMath;

class Beam extends Component
{
    use BoringAvatarMath;
    
    public string $maskID;

    public int $baseSize = 36;

    public function __construct(
        public ?string $name = null,
        public array $colors = ['#8DA2FB', '#6875F5', '#5850EC'],
        public int $size = 36,
        public bool $square = false,
    ) {
        $this->maskID = 'mask-' . uniqid();

        if (!$name) {
            $this->name = Str::random(8);
        }
    }

    public function render()
    {
        return view('placeholder-avatar::beam', $this->data());
    }

    public function makeAvatarData()
    {
        $numFromName = $this->hashCode($this->name);
        $range = count($this->colors);
        $wrapperColor = $this->getRandomColor($numFromName, $this->colors, $range);
        $preTranslateX = $this->getUnit($numFromName, 10, 1);
        $wrapperTranslateX = $preTranslateX < 5 ? $preTranslateX + $this->baseSize / 9 : $preTranslateX;
        $preTranslateY = $this->getUnit($numFromName, 10, 2);
        $wrapperTranslateY = $preTranslateY < 5 ? $preTranslateY + $this->baseSize / 9 : $preTranslateY;

        return [
            'wrapperColor' => $wrapperColor,
            'faceColor' => $this->getContrast($wrapperColor),
            'backgroundColor' => $this->getRandomColor($numFromName + 13, $this->colors, $range),
            'wrapperTranslateX' => $wrapperTranslateX,
            'wrapperTranslateY' => $wrapperTranslateY,
            'wrapperRotate' => $this->getUnit($numFromName, 360),
            'wrapperScale' => 1 + $this->getUnit($numFromName, $this->baseSize / 12) / 10,
            'isMouthOpen' => $this->getBoolean($numFromName, 2),
            'isCircle' => $this->getBoolean($numFromName, 1),
            'eyeSpread' => $this->getUnit($numFromName, 5),
            'mouthSpread' => $this->getUnit($numFromName, 3),
            'faceRotate' => $this->getUnit($numFromName, 10, 3),
            'faceTranslateX' => $wrapperTranslateX > $this->baseSize / 6 ? $wrapperTranslateX / 2 : $this->getUnit($numFromName, 8, 1),
            'faceTranslateY' => $wrapperTranslateY > $this->baseSize / 6 ? $wrapperTranslateY / 2 : $this->getUnit($numFromName, 7, 2),
        ];
    }
}
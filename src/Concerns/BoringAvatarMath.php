<?php

namespace GridPrinciples\PlaceholderAvatars\Concerns;

// Basically a port of utilities.js from BoringAvatars
// https://github.com/boringdesigners/boring-avatars

trait BoringAvatarMath
{
    protected function hashCode($name)
    {
        $hash = 0;
        $length = strlen($name);
        for ($i = 0; $i < $length; $i++) {
            $character = ord($name[$i]);
            $hash = (($hash << 5) - $hash) + $character;
            $hash = $hash & $hash; // Convert to 32bit integer
        }
        return abs($hash);
    }

    protected function getModulus($num, $max)
    {
        return $num % $max;
    }

    protected function getDigit($number, $ntn): int
    {
        return floor(($number / pow(10, $ntn)) % 10);
    }

    protected function getBoolean($number, $ntn): bool
    {
        return !($this->getDigit($number, $ntn) % 2);
    }

    protected function getAngle($x, $y): float
    {
        return atan2($y, $x) * 180 / pi();
    }

    protected function getUnit($number, $range, $index = null): int
    {
        $value = $number % $range;

        if ($index && ($this->getDigit($number, $index) % 2 === 0)) {
            return -$value;
        } else {
            return $value;
        }
    }

    protected function getRandomColor($number, $colors, $range)
    {
        return $colors[$number % $range];
    }

    protected function getContrast($hexcolor): string
    {
        // If a leading # is provided, remove it
        if (substr($hexcolor, 0, 1) === '#') {
            $hexcolor = substr($hexcolor, 1);
        }

        // Convert to RGB value
        $r = hexdec(substr($hexcolor, 0, 2));
        $g = hexdec(substr($hexcolor, 2, 2));
        $b = hexdec(substr($hexcolor, 4, 2));

        // Get YIQ ratio
        $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

        // Check contrast
        return ($yiq >= 128) ? '#000000' : '#FFFFFF';
    }
}
<?php

namespace App\Services;

use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Color\Hex;
use Spatie\Color\Rgba;

class QrCodeService
{
    public function generate(string $string, int $size, string $color, string $background)
    {
        $filename = Str::random() . '.svg';
        $publicPath = 'storage/' . $filename;
        $storagePath = 'app/public/' . $filename;
        $colorRGBA = $this->getColors($color);
        $backgroundRGBA = $this->getColors($background);

        QrCode::size($size)
            ->color($colorRGBA->red(), $colorRGBA->green(), $colorRGBA->blue())
            ->backgroundColor($backgroundRGBA->red(), $backgroundRGBA->green(), $backgroundRGBA->blue())
            ->generate($string, storage_path($storagePath));

        return $publicPath;
    }

    public function prepareInputsForDB($request)
    {
        return [
            'string' => $request['content'],
            'size' => $request['size'],
            'color' => Rgba::fromString($request['fill_color'])->toHex(),
            'background' => Rgba::fromString($request['background_color'])->toHex(),
            'created_by' => auth()->user()->id,
        ];
    }

    public function getColors($colorString)
    {
        return (substr($colorString, 0, 1) == '#')
            ? Hex::fromString($colorString)->toRgba()
            : Rgba::fromString($colorString)->toRgba();

    }
}

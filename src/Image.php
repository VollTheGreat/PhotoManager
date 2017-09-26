<?php


use Interfaces\ImageInterface;

class Image implements ImageInterface
{
    private $image;
    public function __construct($image)
    {

        $this->image = $image;
    }
    public static function make(UploadedFile $image): Image
    {
        return self::make($image);
    }
    public function resize($height, $weight, $closure): Image
    {
        function aspectRatio($constraint) { }
        ;
        function upsize($constraint) { }
        ;
    }
    public function interlace(): Image
    {

    }
    public function save($url, $quality = null): bool
    {
        return true;
    }
}
<?php


namespace Interfaces;


use UploadedFile;

interface ImageInterface
{
    public static function make(UploadedFile $image);
    public function resize($height, $weight, $closure);
    public function interlace();
    public function save($url, $quality = null);
}
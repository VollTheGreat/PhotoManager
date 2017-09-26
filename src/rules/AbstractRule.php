<?php


use Interfaces\RulesInterface;

abstract class AbstractRule implements RulesInterface
{
    public function generateFileCredentials(string $basic_url, string $name, string $extension, string $property)
    {
        $this->createFolder($basic_url);
        $filename = $this->findSlug($basic_url, $name, $extension);

        return [
            'screen_type' => $property,
            'slug'        => $filename['slug'],
            'extension'   => $extension,
            'path'        => $filename['path'],
            'photo_url'   => $basic_url.$filename['slug'].'.'.$extension,
        ];
    }
    public function findSlug(string $basic_url, string $name, string $extension)
    {
        $filename = str_slug(basename($name, '.'.$extension), '-');
        $slug = $filename;
        $candidate = $filename.'.'.$extension;
        $path = public_path($basic_url.$candidate);
        while (\File::exists($path)) {
            $slug = str_slug($filename.'_'.rand(), '-');
            $candidate = $slug.'.'.$extension;
            $path = public_path($basic_url.$candidate);
        };

        return [
            'slug' => $slug,
            'path' => $path,
        ];
    }
    public function createFolder($base_destination)
    {
        if (!file_exists(public_path($base_destination))) {
            \File::makeDirectory(public_path($base_destination), 0777, true);
        };
    }
}
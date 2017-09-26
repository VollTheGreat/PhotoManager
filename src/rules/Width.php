<?php

class Width extends AbstractRule
{

    protected $preset;
    protected $image;
    protected $custom_params;
    /* $preset
     * 'rules' =>'width',
     * 'properties' => [
     *      'TEL' => ['target_width' => 750,'target_height' => null,'save_quality'=>50],],
     * 'thumbnails' => [
     *      'thumbTEL' => ['target_width' => 120,'target_height' => null,'save_quality'=>50],],
     * */

    public function __construct(UploadedFile $image, $preset, $custom_params = null)
    {

        $this->preset = $preset;
        $this->image = $image;
        $this->custom_params = $custom_params;

    }
    public function handle()
    {
        $photos = [];
        foreach ($this->preset->properties as $property => $option) {
            $target_width = $option['target_width'];
            $img = Image::make($this->image);
            $image_obj = $this->generateFileCredentials($this->custom_params['basic_url'].'/'.$property.'/',
                $this->image->getClientOriginalName(), $this->image->getClientOriginalExtension(), $property);
            $url = $image_obj['path'];
            $img->resize($target_width, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->interlace();
            $img->save($url, $option['save_quality']);

            $photos[] = new Image($image_obj);
        };

        return $photos;
    }
}
<?php

namespace App\Classes;

use Illuminate\Http\UploadedFile;
use Image;


class PhotoManager
{

    public static function uploadManager(UploadedFile $image, $parameters)
    {
        $default = (object)[
            'slide_main_image'     => [
                'rules'      => 'width',
                'properties' => [
                    'TEL' => ['w' => 750],
                    'TAB' => ['w' => 1536],
                    'HD'  => ['w' => 650],
                    'FHD' => ['w' => 1020],
                    'UHD' => ['w' => 2040],
                ],
            ],
            'article_thumbnail'    => [
                'rules'      => 'gallery_thumbnail',
                'properties' => [
                    'TEL' => [
                        'maxW' => 750,
                        'maxH' => 970,
                    ],
                    'TAB' => [
                        'maxW' => 1536,
                        'maxH' => 1908,
                    ],
                    'HD'  => [
                        'maxW' => 1126,
                        'maxH' => 510,
                    ],
                    'FHD' => [
                        'maxW' => 1680,
                        'maxH' => 760,
                    ],
                    'UHD' => [
                        'maxW' => 3360,
                        'maxH' => 1520,
                    ],
                ],
                'thumbnails' => [
                    'thumbTEL' => [
                        'fixW' => 154,
                        'fixH' => 86,
                    ],
                    'thumbTAB' => [
                        'fixW' => 320,
                        'fixH' => 180,
                    ],
                    'thumbHD'  => [
                        'fixW' => 320,
                        'fixH' => 180,
                    ],
                    'thumbFHD' => [
                        'fixW' => 320,
                        'fixH' => 180,
                    ],
                    'thumbUHD' => [
                        'fixW' => 640,
                        'fixH' => 360,
                    ],
                ],
            ],
            'start_full_size'      => [
                'rules'      => 'flexible',
                'properties' => [
                    'TEL' => [
                        'maxW' => 750,
                        'maxH' => 970,
                    ],
                    'TAB' => [
                        'maxW' => 1536,
                        'maxH' => 1908,
                    ],
                    'HD'  => [
                        'maxW' => 1126,
                        'maxH' => 510,
                    ],
                    'FHD' => [
                        'maxW' => 1680,
                        'maxH' => 760,
                    ],
                    'UHD' => [
                        'maxW' => 3360,
                        'maxH' => 1520,
                    ],
                ],
            ],
            'constructor_texture'  => [
                'rules'      => 'fixed',
                'properties' => [
                    'TEL'    => [
                        'fixW' => 104,
                        'fixH' => 64,
                    ],
                    'TAB'    => [
                        'fixW' => 104,
                        'fixH' => 64,
                    ],
                    'HD'     => [
                        'fixW' => 104,
                        'fixH' => 64,
                    ],
                    'FHD'    => [
                        'fixW' => 104,
                        'fixH' => 64,
                    ],
                    'UHD'    => [
                        'fixW' => 104,
                        'fixH' => 64,
                    ],
                    'source' => [
                        'fixW' => 256,
                        'fixH' => 256,
                    ],
                ],
            ],
            'contact_map'          => [
                'rules'      => 'ready',
                'properties' => ['HD'],
            ],
            'contact_location_TEL' => [
                'rules'      => 'ready_just_validation',
                'properties' => [
                    'TEL' => [
                        'validete_W' => 750,
                        'validete_H' => 1160,
                    ],
                ],
            ],
            'contact_location_TAB' => [
                'rules'      => 'ready_just_validation',
                'properties' => [
                    'TAB' => [
                        'validete_W' => 1536,
                        'validete_H' => 1536,
                    ],
                ],
            ],
            'contact_location_HD'  => [
                'rules'      => 'ready_just_validation',
                'properties' => [
                    'HD' => [
                        'validete_W' => 520,
                        'validete_H' => 700,
                    ],
                ],
            ],
            'contact_location_FHD' => [
                'rules'      => 'ready_just_validation',
                'properties' => [
                    'FHD' => [
                        'validete_W' => 730,
                        'validete_H' => 900,
                    ],
                ],
            ],
            'contact_location_UHD' => [
                'rules'      => 'ready_just_validation',
                'properties' => [
                    'UHD' => [
                        'validete_W' => 1460,
                        'validete_H' => 1800,
                    ],
                ],
            ],
            'contact_photo'        => [
                'rules'      => 'fixed',
                'properties' => [
                    'TEL' => [
                        'fixW' => 750,
                        'fixH' => 420,
                    ],
                    'TAB' => [
                        'fixW' => 1536,
                        'fixH' => 866,
                    ],
                    'HD'  => [
                        'fixW' => 850,
                        'fixH' => 700,
                    ],
                    'FHD' => [
                        'fixW' => 1190,
                        'fixH' => 900,
                    ],
                    'UHD' => [
                        'fixW' => 2380,
                        'fixH' => 1800,
                    ],
                ],
            ],
            'contact_slider'       => [
                'rules'      => 'fixed',
                'properties' => [
                    'TEL' => [
                        'fixW' => 750,
                        'fixH' => 1110,
                    ],
                    'TAB' => [
                        'fixW' => 1536,
                        'fixH' => 2048,
                    ],
                    'HD'  => [
                        'fixW' => 1366,
                        'fixH' => 650,
                    ],
                    'FHD' => [
                        'fixW' => 1920,
                        'fixH' => 900,
                    ],
                    'UHD' => [
                        'fixW' => 3840,
                        'fixH' => 1800,
                    ],
                ],
            ],
            'poolpage_poolfull'    => [
                'rules'      => 'width_thumbnail_png',
                'properties' => [
                    'TEL' => [
                        'w' => 680,
                    ],
                    'TAB' => [
                        'w' => 680,
                    ],
                    'HD'  => [
                        'w' => 680,
                    ],
                    'FHD' => [
                        'w' => 1030,
                    ],
                    'UHD' => [
                        'w' => 2060,
                    ],
                ],
                'thumbnails' => [
                    'thumbTEL' => 19,
                    'thumbTAB' => 19,
                    'thumbHD'  => 19,
                    'thumbFHD' => 19,
                    'thumbUHD' => 38,
                ],
            ],
            'poolpage_thumbnail'   => [
                'rules'      => 'fixed_thumbnail_png',
                'properties' => [
                    'TEL' => [
                        'fixW' => 127,
                        'fixH' => 53,
                    ],
                    'TAB' => [
                        'fixW' => 127,
                        'fixH' => 53,
                    ],
                    'HD'  => [
                        'fixW' => 127,
                        'fixH' => 53,
                    ],
                    'FHD' => [
                        'fixW' => 127,
                        'fixH' => 53,
                    ],
                    'UHD' => [
                        'fixW' => 254,
                        'fixH' => 106,
                    ],
                ],
            ],
            'poolpage_fullsize'    => [
                'rules'      => 'gallery_thumbnail',
                'properties' => [
                    'TEL' => [
                        'maxW' => 750,
                        'maxH' => 970,
                    ],
                    'TAB' => [
                        'maxW' => 1536,
                        'maxH' => 1908,
                    ],
                    'HD'  => [
                        'maxW' => 1126,
                        'maxH' => 510,
                    ],
                    'FHD' => [
                        'maxW' => 1680,
                        'maxH' => 760,
                    ],
                    'UHD' => [
                        'maxW' => 3360,
                        'maxH' => 1520,
                    ],
                ],
                'thumbnails' => [
                    'thumbTEL' => [
                        'fixW' => 750,
                        'fixH' => 420,
                    ],
                    'thumbTAB' => [
                        'fixW' => 1536,
                        'fixH' => 886,
                    ],
                    'thumbHD'  => [
                        'fixW' => 520,
                        'fixH' => 700,
                    ],
                    'thumbFHD' => [
                        'fixW' => 730,
                        'fixH' => 900,
                    ],
                    'thumbUHD' => [
                        'fixW' => 1460,
                        'fixH' => 1800,
                    ],
                ],
            ],
            'promo_background'     => [
                'rules'      => 'fixed',
                'properties' => [
                    'TEL' => [
                        'fixW' => 375,
                        'fixH' => 555,
                    ],
                    'TAB' => [
                        'fixW' => 768,
                        'fixH' => 1024,
                    ],
                    'HD'  => [
                        'fixW' => 1366,
                        'fixH' => 650,
                    ],
                    'FHD' => [
                        'fixW' => 1920,
                        'fixH' => 900,
                    ],
                    'UHD' => [
                        'fixW' => 3840,
                        'fixH' => 1800,
                    ],
                ],
            ],
            'promo_banner'         => [
                'rules'      => 'fixed',
                'properties' => [
                    'TEL' => [
                        'fixW' => 520,
                        'fixH' => 148,
                    ],
                    'TAB' => [
                        'fixW' => 1140,
                        'fixH' => 304,
                    ],
                    'HD'  => [
                        'fixW' => 570,
                        'fixH' => 152,
                    ],
                    'FHD' => [
                        'fixW' => 570,
                        'fixH' => 152,
                    ],
                    'UHD' => [
                        'fixW' => 1140,
                        'fixH' => 304,
                    ],
                ],
            ],
            'pano_preview'         => [
                'rules'      => 'fixed',
                'properties' => [
                    'TEL' => [
                        'fixW' => 120,
                        'fixH' => 68,
                    ],
                    'TAB' => [
                        'fixW' => 180,
                        'fixH' => 108,
                    ],
                    'HD'  => [
                        'fixW' => 180,
                        'fixH' => 108,
                    ],
                    'FHD' => [
                        'fixW' => 180,
                        'fixH' => 108,
                    ],
                    'UHD' => [
                        'fixW' => 320,
                        'fixH' => 216,
                    ],
                ],
            ],
            'pano_pano'            => [
                'rules'      => 'ready',
                'properties' => [
                    'HD',
                ],
            ],
            'gallery_fullsize'     => [
                'rules'      => 'gallery_thumbnail',
                'properties' => [
                    'TEL' => [
                        'maxW' => 750,
                        'maxH' => 970,
                    ],
                    'TAB' => [
                        'maxW' => 1536,
                        'maxH' => 1908,
                    ],
                    'HD'  => [
                        'maxW' => 1126,
                        'maxH' => 510,
                    ],
                    'FHD' => [
                        'maxW' => 1680,
                        'maxH' => 760,
                    ],
                    'UHD' => [
                        'maxW' => 3360,
                        'maxH' => 1520,
                    ],
                ],
                'thumbnails' => [
                    'thumbTEL' => [
                        'fixW' => 150,
                        'fixH' => 84,
                    ],
                    'thumbTAB' => [
                        'fixW' => 320,
                        'fixH' => 180,
                    ],
                    'thumbHD'  => [
                        'fixW' => 160,
                        'fixH' => 90,
                    ],
                    'thumbFHD' => [
                        'fixW' => 160,
                        'fixH' => 90,
                    ],
                    'thumbUHD' => [
                        'fixW' => 320,
                        'fixH' => 180,
                    ],
                ],
            ],
            'team_solo'            => [
                'rules'      => 'fixed',
                'properties' => [
                    'TEL' => [
                        'fixW' => 226,
                        'fixH' => 226,
                    ],
                    'TAB' => [
                        'fixW' => 226,
                        'fixH' => 226,
                    ],
                    'HD'  => [
                        'fixW' => 226,
                        'fixH' => 226,
                    ],
                    'FHD' => [
                        'fixW' => 226,
                        'fixH' => 226,
                    ],
                    'UHD' => [
                        'fixW' => 226,
                        'fixH' => 226,
                    ],
                ],
            ],
            'team_photo'           => [
                'rules'      => 'height',
                'properties' => [
                    'TEL' => ['h' => 650],
                    'TAB' => ['h' => 1250],
                    'HD'  => ['h' => 480],
                    'FHD' => ['h' => 650],
                    'UHD' => ['h' => 1250],
                ],
            ],
            'feedback_thumbnail'   => [
                'rules'      => 'fixed',
                'properties' => [
                    'TEL' => [
                        'fixW' => 154,
                        'fixH' => 86,
                    ],
                    'TAB' => [
                        'fixW' => 500,
                        'fixH' => 280,
                    ],
                    'HD'  => [
                        'fixW' => 600,
                        'fixH' => 340,
                    ],
                    'FHD' => [
                        'fixW' => 600,
                        'fixH' => 340,
                    ],
                    'UHD' => [
                        'fixW' => 1200,
                        'fixH' => 680,
                    ],
                ],
            ],
            'seo_photo'            => [
                'rules'      => 'ready',
                'properties' => ['HD'],
            ],
        ];
        $preset = $parameters->preset;
        $preset = $default->$preset;

        return self::uploadPhoto($image, (object)$preset, $parameters);
    }
    private static function uploadPhoto(UploadedFile $image, $preset, $params)
    {
        $photos = [];
        /*Open image*/
        $source_image = Image::make($image);
        /*Transform image*/
        switch ($preset->rules) {
            case 'width': {
                foreach ($preset->properties as $property => $option) {
                    /*Generate folder*/
                    $target_width = $option['w'];
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    $img->resize($target_width, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->interlace();
                    switch ($property) {
                        case('TEL');
                        case('TAB');
                        case('UHD'):
                            $img->save($url, 50);
                            break;
                        case('HD');
                        case('FHD'):
                            $img->save($url, 65);
                    }
                    $photos[] = new \App\Image($image_obj);
                };
                break;
            }
            case 'height': {
                foreach ($preset->properties as $property => $option) {
                    /*Generate folder*/
                    $target_height = $option['h'];
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    $img->resize(null, $target_height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->interlace();
                    switch ($property) {
                        case('TEL');
                        case('TAB');
                        case('UHD'):
                            $img->save($url, 50);
                            break;
                        case('HD');
                        case('FHD'):
                            $img->save($url, 65);
                    }
                    $photos[] = new \App\Image($image_obj);
                };
                break;
            }
            case 'flexible': {
                $img = $source_image;
                if ($img->getHeight() / $img->getWidth() < 1) {
                    $image_x = 'maxH';
                    $image_y = null;
                } else {
                    $image_x = null;
                    $image_y = 'maxW';
                }
                foreach ($preset->properties as $property => $option) {
                    /*Generate folder*/
                    $option = json_decode(json_encode($option), true);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    $img->resize($option[$image_x] ? $option[$image_x] : null,
                        $option[$image_y] ? $option[$image_y] : null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                    $img->interlace();
                    switch ($property) {
                        case('TEL');
                        case('TAB');
                        case('UHD'):
                            $img->save($url, 50);
                            break;
                        case('HD');
                        case('FHD'):
                            $img->save($url, 65);
                    }
                    $photos[] = new \App\Image($image_obj);
                }
                break;
            }
            case 'fixed': {
                foreach ($preset->properties as $property => $option) {
                    $target_width = $option['fixW'];
                    $target_height = $option['fixH'];
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    if ((($img->getHeight() * $target_width) / $img->getWidth()) < $target_height) {
                        $img->resize(null, $target_height, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } else {
                        $img->resize($target_width, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }; //$constraint->upsize();
                    $img->crop($target_width, $target_height);
                    $img->interlace();
                    switch ($property) {
                        case('TEL');
                        case('TAB');
                        case('UHD'):
                            $img->save($url, 60);
                            break;
                        case('HD');
                        case('source');
                        case('FHD'):
                            $img->save($url, 90);
                    }
                    $photos[] = new \App\Image($image_obj);
                };
                break;
            }
            case 'width_thumbnail_png': {
                foreach ($preset->properties as $property => $option) {
                    /*Generate folder*/
                    $target_width = $option['w'];
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    $img->resize($target_width, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->interlace();
                    $img->save($url);
                    $photos[] = new \App\Image($image_obj);
                };
                foreach ($preset->thumbnails as $name => $zoomIndex) {
                    $target_width = $params->length * $zoomIndex / 100;
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$name.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $name);
                    $url = $image_obj['path'];
                    $img->resize($target_width, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->interlace();
                    $img->save($url);
                    $photos[] = new \App\Image($image_obj);
                }
                break;
            }
            case 'fixed_thumbnail_png': {
                foreach ($preset->properties as $property => $option) {
                    /*Generate folder*/
                    $target_width = $params->length * (($option['fixW'] - 6) / $params->max_length_const) / 100;
                    if ($target_width < $option['fixW'] / 3) {
                        $target_width = $option['fixW'] / 3;
                    }
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    $img->resize($target_width, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $background = Image::canvas($option['fixW'], $option['fixH']);
                    $new_image = $background->insert($img, 'center');
                    $new_image->interlace();
                    $new_image->save($url);
                    $photos[] = new \App\Image($image_obj);
                };
                break;
            }
            case 'gallery_thumbnail': {
                $img = $source_image;
                if ($img->getHeight() / $img->getWidth() < 1) {
                    $image_x = 'maxH';
                    $image_y = null;
                } else {
                    $image_x = null;
                    $image_y = 'maxW';
                }
                foreach ($preset->properties as $property => $option) {
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    $img->resize($image_y ? $option[$image_y] : null, $image_x ? $option[$image_x] : null,
                        function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                    $img->interlace();
                    switch ($property) {
                        case('TEL');
                        case('TAB');
                        case('UHD'):
                            $img->save($url, 50);
                            break;
                        case('HD');
                        case('FHD'):
                            $img->save($url, 65);
                    }
                    $photos[] = new \App\Image($image_obj);
                }
                foreach ($preset->thumbnails as $property => $option) {
                    /*Generate folder*/
                    $target_width = $option['fixW'];
                    $target_height = $option['fixH'];
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    if ((($img->getHeight() * $target_width) / $img->getWidth()) < $target_height) {
                        $img->resize(null, $target_height, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } else {
                        $img->resize($target_width, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    };
                    $img->crop($target_width, $target_height);
                    $img->interlace();
                    switch ($property) {
                        case('thumbTEL');
                        case('thumbTAB');
                        case('thumbUHD'):
                            $img->save($url, 50);
                            break;
                        case('thumbHD');
                        case('thumbFHD'):
                            $img->save($url, 65);
                    }
                    $photos[] = new \App\Image($image_obj);
                };
                break;
            }
            case 'ready_just_validation': {
                foreach ($preset->properties as $property => $option) {
                    $img = Image::make($image);
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    $img->interlace();
                    switch ($property) {
                        case('TEL');
                        case('TAB');
                        case('UHD'):
                            $img->save($url, 100);
                            break;
                        case('HD');
                        case('FHD'):
                            $img->save($url, 100);
                    }
                    $photos[] = new \App\Image($image_obj);
                }
                break;
            }
            case 'ready': {
                foreach ($preset->properties as $property) {
                    $img = $source_image;
                    $image_obj = self::generateFileCredentials($params->basic_url.'/'.$property.'/',
                        $image->getClientOriginalName(), $image->getClientOriginalExtension(), $property);
                    $url = $image_obj['path'];
                    switch ($property) {
                        case('TEL');
                        case('TAB');
                        case('UHD'):
                            $img->save($url, 100);
                            break;
                        case('HD');
                        case('FHD'):
                            $img->save($url, 100);
                    }
                    $photos[] = new \App\Image($image_obj);
                }
                break;
            }
        }

        return $photos;
    }
    private static function findSlug(string $basic_url, string $name, string $extension)
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

    private static function generateFileCredentials(
        string $basic_url,
        string $name,
        string $extension,
        string $property
    ) {
        self::createFolder($basic_url);
        $filename = self::findSlug($basic_url, $name, $extension);

        return [
            'screen_type' => $property,
            'slug'        => $filename['slug'],
            'extension'   => $extension,
            'path'        => $filename['path'],
            'photo_url'   => $basic_url.$filename['slug'].'.'.$extension,
        ];
    }

    private static function createFolder($base_destination)
    {
        if (!file_exists(public_path($base_destination))) {
            \File::makeDirectory(public_path($base_destination), 0777, true);
        };
    }
}

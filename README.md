# PhotoManager
Photo Upload Manager based on intervention.io.

1. Takes image and parameters(presets),
2. Making folder, creating slug;
3. Make all needed transformations(resizing,cropping etc) from 'RULES';
4. Saving multiple images if needed
5. Return a array of data, ready to save in DB.

Working with helper Example:
```php
$images_array = PhotoManager::uploadManager(
                $photo, (object)[
                'preset'    => 'constructor_texture',
                'basic_url' => '/images/consctructor/textures/'.rand(),
            ]);
        $new_texture = new MediaData(
            ([
                'type'  => 'texture',
                'alt'   => $photo->getClientOriginalName(),
            ]));
        $media = $category->media()->save($new_texture);
        $media->images()->savemany($images_array); 
```


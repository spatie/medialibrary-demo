<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use InteractsWithMedia;

    public static function last()
    {
        return static::all()->last();
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('big-files')
            ->useDisk('s3');
    }
}

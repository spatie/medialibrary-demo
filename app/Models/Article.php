<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use InteractsWithMedia;

    public static function last()
    {
        return static::all()->last();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(300)
            ->height(300);
    }
















    /*
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(500)
            ->height(500);

        $this
            ->addMediaConversion('pixelated')
            ->pixelate(5)
            ->width(500)
            ->height(500);

        $this
            ->addMediaConversion('non-optimized')
            ->width(500)
            ->nonOptimized()
            ->height(500);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('big-files')
            ->useDisk('s3');
    }
    */
}

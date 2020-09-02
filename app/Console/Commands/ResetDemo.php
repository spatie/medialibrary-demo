<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ResetDemo extends Command
{
    protected $signature = 'reset-demo';

    protected $description = 'Reset the demo';

    public function handle()
    {
        $this->comment('Resetting demo...');

        Article::all()->each->delete();
        Article::truncate();

        Media::all()->each->delete();
        Media::truncate();

        File::cleanDirectory(public_path('media'));

        $this->call('cache:clear');

        $this->info('All done!');
    }
}

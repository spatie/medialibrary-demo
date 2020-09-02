<?php

namespace App\Console\Commands;

use App\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\Models\Media;

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

        $this->comment('Don\'t forget to reset the code in the Article model, and delete all files in the S3 bucket.');
        $this->info('All done!');
    }
}

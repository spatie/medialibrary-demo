<?php

namespace App\Console\Commands;

use App\Services\Demo as DemoService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Visit extends Command
{
    protected $signature = 'visit';

    protected $description = 'Perform the demo';

    public function handle()
    {
        $demoRouteUris = $this->getDemoRouteUris();

        while (true) {
            $this->performLoop($demoRouteUris);
        }
    }

    protected function performLoop(array $demoRouteUris)
    {
        $uri = $this->anticipate('Route?', $demoRouteUris);

        DemoService::resetDemoFiles();

        if (! in_array($uri, $demoRouteUris)) {
            $this->warn("`{$uri}` does not exist");

            return;
        }

        Str::startsWith($uri, ['downloading', 'showing', 'add-media-from-request'])
            ? $this->openUpBrowser($uri)
            : $this->visit($uri);
    }

    protected function getDemoRouteUris(): array
    {
        return collect(Route::getRoutes())
            ->reject(function ($route) {
                return str_contains($route->uri, '/');
            })
            ->pluck('uri')
            ->toArray();
    }

    protected function visit(string $uri)
    {
        file_get_contents(url($uri));

        $this->comment("Visited `{$uri}`...");
    }

    protected function openUpBrowser(string $uri)
    {
        $command = 'open ' . url($uri);

        shell_exec($command);

        $this->comment("Opened browser at `{$uri}`...");
    }
}

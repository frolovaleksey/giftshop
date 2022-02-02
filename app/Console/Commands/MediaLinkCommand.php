<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MediaLinkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'media:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from "public/media" to "storage/app/public/media/"';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (file_exists(public_path('media'))) {
            return $this->error('The "public/media" directory already exists.');
        }

        $this->laravel->make('files')->link(
            storage_path('app/public/media'), public_path('media')
        );

        $this->info('The [public/media] directory has been linked.');
    }
}

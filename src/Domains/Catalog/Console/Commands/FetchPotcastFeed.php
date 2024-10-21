<?php

namespace Castr\Domains\catalog\Console\Commands;

use Illuminate\Console\Command;
use Laminas\Feed\Reader\Reader;

class FetchPotcastFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'podcast:fetch {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the feed from a podcast to process.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $feed = Reader::import(
            uri: $this->argument('url'),
        );
        $data = (array) simplexml_load_string($feed->saveXml());
        dd((array) $data['channel']);
        $this->info('Fetch podcast ended successfully');
    }
}

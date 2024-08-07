<?php

namespace GridPrinciples\PlaceholderAvatars\Commands;

use Illuminate\Console\Command;

class PlaceholderAvatarsCommand extends Command
{
    public $signature = 'laravel-placeholder-avatars';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

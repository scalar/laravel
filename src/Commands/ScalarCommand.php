<?php

namespace Scalar\Commands;

use Illuminate\Console\Command;

class ScalarCommand extends Command
{
    public $signature = 'laravel-scalar';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

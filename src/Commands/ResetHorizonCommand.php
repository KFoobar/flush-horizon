<?php

namespace KFoobar\Horizon\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class ResetHorizonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'horizon:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all data for Horizon';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Redis::connection(name: 'horizon')
            ->client()
            ->flushAll();

        $this->components->info('Redis keys flushed successfully.');

        return Command::SUCCESS;
    }
}

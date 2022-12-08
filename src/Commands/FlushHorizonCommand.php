<?php

namespace KFoobar\Horizon\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class FlushHorizonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'horizon:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all failed jobs from Horizon';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = $this->flush();

        is_numeric($count = $this->flush())
            ? $this->components->info('Failed jobs ('.$count.') flushed successfully.')
            : $this->components->info('Skipped! Found no keys to flush.');

        return Command::SUCCESS;
    }

    /**
     * Flushes the failed jobs from Redis.
     *
     * @return int|void
     */
    private function flush()
    {
        $keys = array_merge(
            Redis::connection('horizon')->keys('failed:*'),
            Redis::connection('horizon')->keys('failed_jobs')
        );

        $keys = collect($keys)
            ->map(function ($key) {
                return str_replace(config('horizon.prefix'), '', $key);
            });

        if ($keys->isEmpty()) {
            return;
        }

        return Redis::connection(name: 'horizon')->del(
            $keys->toArray()
        );
    }
}

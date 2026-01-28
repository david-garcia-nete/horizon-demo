<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Throwable;

class SimulateInventoryUpdate implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $timeout = 60;
    public $tries = 1;

    public string $sku;
    public int $workMs;

    public function __construct(string $sku, int $workMs = 50)
    {
        $this->sku = $sku;
        $this->workMs = $workMs;
    }

    public function handle(): void
    {
        try {
            Cache::lock("inv:sku:{$this->sku}", 10)->block(5, function (): void {
                $start = microtime(true);
                usleep($this->workMs * 1000);
                $elapsedMs = (int) round((microtime(true) - $start) * 1000);

                Log::info('Simulated inventory update', [
                    'sku' => $this->sku,
                    'work_ms' => $this->workMs,
                    'elapsed_ms' => $elapsedMs,
                ]);
            });
        } catch (Throwable $exception) {
            Log::warning('Failed to acquire inventory lock', [
                'sku' => $this->sku,
                'exception' => $exception,
            ]);

            throw $exception;
        }
    }
}

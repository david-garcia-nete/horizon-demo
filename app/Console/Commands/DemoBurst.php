<?php

namespace App\Console\Commands;

use App\Jobs\SimulateInventoryUpdate;
use Illuminate\Console\Command;

class DemoBurst extends Command
{
    protected $signature = 'demo:burst {count=200} {skus=10} {workMs=50}';
    protected $description = 'Dispatch a burst of inventory update jobs across multiple SKUs.';

    public function handle(): int
    {
        $count = (int) $this->argument('count');
        $skus = max(1, (int) $this->argument('skus'));
        $workMs = (int) $this->argument('workMs');

        $skuList = [];
        for ($i = 1; $i <= $skus; $i++) {
            $skuList[] = "SKU-{$i}";
        }

        for ($i = 0; $i < $count; $i++) {
            $sku = $skuList[$i % $skus];
            SimulateInventoryUpdate::dispatch($sku, $workMs);
        }

        $this->info("Dispatched {$count} jobs across {$skus} SKUs with {$workMs}ms work each.");

        return Command::SUCCESS;
    }
}

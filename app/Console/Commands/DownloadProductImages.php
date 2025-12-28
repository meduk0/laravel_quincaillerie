<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DownloadProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:download {--output=./downloaded_images : Output directory for images}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download product images from remote server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Prefer local public product_images instead of remote host
        $baseDir = public_path('product_images');
        $outputDir = $this->option('output');

        // Create output directory
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        $this->info('========================================');
        $this->info('Product Image Downloader');
        $this->info('========================================');
        $this->info("Base URL: {$baseUrl}");
        $this->info("Output Directory: {$outputDir}");
        $this->info('========================================');

        // Get all products with images
        $products = Product::whereNotNull('img_path')
            ->where('img_path', '!=', '')
            ->get();

        $total = $products->count();
        $this->line("\nFound {$total} products with images\n");

        if ($total === 0) {
            $this->warn('No products with images found.');
            return 0;
        }

        $downloaded = 0;
        $failed = 0;

        $progressBar = $this->output->createProgressBar($total);
        $progressBar->start();

        foreach ($products as $product) {
            $imgPath = $product->img_path;
            $filename = basename($imgPath);
            $outputPath = "{$outputDir}/{$filename}";

            // Skip if file already exists
            if (file_exists($outputPath)) {
                $progressBar->advance();
                continue;
            }

            // Try to copy from local public directory
            $local = "$baseDir/{$filename}";
            if (file_exists($local)) {
                copy($local, $outputPath);
                $downloaded++;
            } else {
                $failed++;
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $this->newLine(2);

        $this->info('=========================================');
        $this->info('Download Complete!');
        $this->info('=========================================');
        $this->line("Successfully downloaded: {$downloaded}");
        $this->line("Failed: {$failed}");
        $this->line("Total: {$total}");
        $this->line("Output Directory: {$outputDir}");
        $this->info('=========================================');

        return 0;
    }
}

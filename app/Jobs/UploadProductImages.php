<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UploadProductImages
{
    use Dispatchable, Queueable, SerializesModels;

    protected $products;
    protected $images;

    public function __construct($products, $images)
    {
        $this->products = $products;
        $this->images = $images;
    }

    public function handle()
    {
        foreach ((array) $this->images as $file) {
            $this->products->addMedia($file)->toMediaCollection('product_collection');
        }
    }
}

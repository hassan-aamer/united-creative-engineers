<?php

namespace App\Models;

use App\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;
    public $translatable = ['title', 'description', 'content'];
    protected $guarded = [''];
    public function features()
    {
        return $this->belongsToMany(ProductFeature::class, 'product_feature_product');
    }
    public function services()
    {
        return $this->belongsToMany(ProductService::class, 'product_product_service');
    }
    public function additionalServices()
    {
        return $this->belongsToMany(ProductService::class, 'product_additional_service');
    }
}

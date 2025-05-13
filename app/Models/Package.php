<?php

namespace App\Models;

use App\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;
    public $translatable = ['title'];
    protected $guarded = [''];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'package_service');
    }
    public function PackageDetails()
    {
        return $this->belongsToMany(PackageDetail::class, 'package_detail_package');
    }
}

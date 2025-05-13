<?php

namespace App\Models;
use App\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;
    public $translatable = ['title','description'];
    protected $guarded = [''];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'feature_service');
    }
}

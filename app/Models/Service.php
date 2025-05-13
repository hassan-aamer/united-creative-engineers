<?php

namespace App\Models;

use App\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;
    public $translatable = ['title','description'];
    protected $guarded = [''];
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function developments()
    {
        return $this->belongsToMany(Development::class, 'development_service');
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_service');
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_service');
    }
    public function infoSection()
    {
        return $this->belongsToMany(InfoSection::class, 'info_section_service');
    }
    public function infoSectionDetails()
    {
        return $this->hasOne(InfoSectionDetail::class);
    }
}

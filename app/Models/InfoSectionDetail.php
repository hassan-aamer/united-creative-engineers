<?php

namespace App\Models;

use App\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfoSectionDetail extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;
    public $translatable = ['title', 'description', 'content'];
    protected $guarded = [''];
    public function services()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function infoOptions()
    {
        return $this->belongsToMany(InfoOption::class, 'info_option_section_detail');
    }
}

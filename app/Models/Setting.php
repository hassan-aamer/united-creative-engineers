<?php

namespace App\Models;

use App\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;
    protected $guarded = [''];
    public $translatable = [
        'name',
        'title',
        'about',
        'address',
        'header',
        'footer',
        'copyrights',
        'description',
        'terms_condition',
        'return_description',
        'privacy_description',
    ];
}

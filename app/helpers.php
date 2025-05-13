<?php
use Illuminate\Support\Str;

if (! function_exists('setting')) {
    function setting(?string $key = null, $default = null)
    {
        $settings = \App\Models\Setting::first();

        if (!$settings) {
            return $default;
        }

        if (is_null($key)) {
            return $settings;
        }

        if (in_array($key, $settings->translatable ?? []) && method_exists($settings, 'getTranslation')) {
            return $settings->getTranslation($key, app()->getLocale()) ?? $default;
        }

        return $settings->{$key} ?? $default;
    }
}
if (!function_exists('shortenText')) {
    function shortenText($text, $length = 50) {
        return Str::limit($text, $length);
    }
}
if (!function_exists('syncRelations')) {
    function syncRelations($model, array $data, array $relations): void {
        foreach ($relations as $field => $relation) {
            if (!empty($data[$field])) {
                $model->$relation()->sync($data[$field]);
            }
        }
    }
}


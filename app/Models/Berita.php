<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug from judul before saving
        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = Str::slug($model->judul);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('judul') && !$model->isDirty('slug')) {
                $model->slug = Str::slug($model->judul);
            }
        });
    }
}

<?php

namespace Castr\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Casts\AsStringable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'uuid',
        'name',
    ];

    protected $cast = [
        'name'      => 'string'
    ];

    protected function casts(): array
    {
        return [
            'name'      => AsStringable::class,
        ];
    }

    public $timestamps = false;

    public function podcasts(): HasMany
    {
        return $this->hasMany(
            related: Podcast::class,
            foreignKey: 'category_id',
        );
    }
}

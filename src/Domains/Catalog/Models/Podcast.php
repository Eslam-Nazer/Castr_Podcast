<?php

namespace Castr\Domains\Catalog\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Castr\Domains\Shared\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Podcast extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'title',
        'generator',
        'description',
        'author',
        'copyright',
        'language',
        'external_url',
        'feed_url',
        'image',
        'owner',
        'user_id',
        'category_id',
    ];

    protected function casts(): array
    {
        return [
            'image'     => AsArrayObject::class,
            'owner'     => AsArrayObject::class,
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            related: Category::class,
            foreignKey: 'category_id'
        );
    }
}

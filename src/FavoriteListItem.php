<?php

namespace AlexSchmidhuber\FavoriteList;

use Illuminate\Database\Eloquent\Relations\Pivot;
use AlexSchmidhuber\FavoriteList\FavoriteList;
use AlexSchmidhuber\FavoriteList\Scopes\ListitemScope;
use AlexSchmidhuber\LaravelTraitCollection\Traits\ORM\HasJsonColumn;

class FavoriteListItem extends Pivot
{
    use HasJsonColumn;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ListitemScope);

        static::creating(function ($model) {
            $model->relation_type = 'listitem';
        });
    }

    protected $table = 'favorite_listables';

    /** Relationships **/

    public function favoriteList()
    {
        return $this->belongsTo(FavoriteList::class);
    }

    public function favoriteListable()
    {
        return $this->morphTo('listable');
    }
}

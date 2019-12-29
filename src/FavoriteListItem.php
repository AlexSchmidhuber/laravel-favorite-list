<?php

namespace AlexSchmidhuber\FavoriteList;

use Illuminate\Database\Eloquent\Relations\Pivot;
use AlexSchmidhuber\FavoriteList\FavoriteList;
use AlexSchmidhuber\LaravelTraitCollection\Traits\ORM\HasJsonColumn;

class FavoriteListItem extends Pivot
{
    use HasJsonColumn;

    protected static function boot()
    {
        parent::boot();
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

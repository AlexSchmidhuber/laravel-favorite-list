<?php

namespace AlexSchmidhuber\FavoriteList;

use Illuminate\Database\Eloquent\Relations\Pivot;
use AlexSchmidhuber\FavoriteList\FavoriteList;
use AlexSchmidhuber\FavoriteList\Scopes\MemberScope;
use AlexSchmidhuber\LaravelTraitCollection\Traits\ORM\HasJsonColumn;

class FavoriteListMember extends Pivot
{
    use HasJsonColumn;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new MemberScope);

        static::creating(function ($model) {
            $model->relation_type = 'member';
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

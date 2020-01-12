<?php

namespace AlexSchmidhuber\FavoriteList;

use AlexSchmidhuber\FavoriteList\FavoriteListItem;
use AlexSchmidhuber\LaravelTraitCollection\Traits\ORM\HasJsonColumn;
use AlexSchmidhuber\LaravelTraitCollection\Traits\ORM\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoriteList extends Model
{
    use SoftDeletes, HasUuid, HasJsonColumn;

    protected $fillable = ['valid_until', 'name', 'json', 'relation_type', 'member_role'];

    protected $casts = [
        'valid_until' => 'datetime'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /** Relationships **/
    public function owner()
    {
        return $this->belongsTo(config('auth.providers.users.model', \App\User::class), 'user_id');
    }

    public function items()
    {
        return $this->hasMany(FavoriteListItem::class);
    }

    public function members()
    {
        return $this->hasMany(FavoriteListMember::class);
    }
}

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

    protected $fillable = ['valid_until', 'name'];

    protected $casts = [
        'valid_until' => 'datetime'
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function isOwnerShadowUser()
    {
        return $this->owner->is_shadow;
    }

    /** Relationships **/
    public function owner()
    {
        return $this->belongsTo(config('user.model', \App\User::class), 'user_id');
    }

    public function items()
    {
        return $this->hasMany(FavoriteListItem::class);
    }
}

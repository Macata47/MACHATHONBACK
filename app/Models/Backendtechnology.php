<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backendtechnology extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'backendtechnologies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'backendtechnology',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'backendtechnology' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

       /**
     * The users that belong to the technology.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_backendtech_levels')
                    ->withPivot('level_id')
                    ->withTimestamps();
    }

}


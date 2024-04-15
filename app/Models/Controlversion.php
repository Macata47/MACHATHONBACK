<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controlversion extends Model
{
    use HasFactory;

      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'controlversiones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'controlversion',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'controlversion' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the users associated with the control version.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_control_versiones_levels')
                    ->withPivot('level_id')
                    ->withTimestamps();
    }
}

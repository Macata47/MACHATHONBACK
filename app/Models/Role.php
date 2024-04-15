<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'role_id', 'bootcamp_id', 'active'
    ];

    /**
     * Get the bootcamp that the user belongs to.
     */
    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class);
    }
}

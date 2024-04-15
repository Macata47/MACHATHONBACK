<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
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
     * Define the bootcamp relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bootcamp()
    {
        return $this->belongsTo(Bootcamp::class);
    }

    /**
     * Get the bootcamp associated with the user.
     *
     * @return Bootcamp|null
     */
    
    public function getBootcampAttribute()
    {
        return $this->bootcamp()->first();
    }

    /**
     * The technologies that belong to the user.
     */
    public function backendTechnologies()
    {
        return $this->belongsToMany(BackendTechnology::class, 'users_backendtech_levels')
                    ->withPivot('level_id')
                    ->withTimestamps();
    }

      /**
     * The frontend technologies that belong to the user.
     */
    public function frontendTechnologies()
    {
        return $this->belongsToMany(FrontendTechnology::class, 'users_frontendtech_levels')
                    ->withPivot('level_id')
                    ->withTimestamps();
    }

    /**
     * The control versions that belong to the user.
     */
    public function controlVersions()
    {
        return $this->belongsToMany(ControlVersion::class, 'users_control_versiones_levels')
                    ->withPivot('level_id')
                    ->withTimestamps();
    }

    /**
     * Get the team that belongs to the user.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

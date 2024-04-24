<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class UserBackendtechLevel extends Pivot
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_backendtech_levels';

    public function index()
    {
        $levels = UserBackendTechLevel::with('user')->get();
        return response()->json($levels);
    }
}

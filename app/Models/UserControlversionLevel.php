<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserControlversionLevel extends Pivot
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_control_versiones_levels';

    public function index()
    {
        $levels = UserControlversionLevel::with('user')->get();
        return response()->json($levels);
    }
}

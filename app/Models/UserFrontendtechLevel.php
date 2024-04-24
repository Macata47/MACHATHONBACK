<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFrontendtechLevel extends Pivot
{
    use HasFactory;

      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_frontendtech_levels';

    public function index()
    {
        $levels = UserFrontendTechLevel::with('user')->get();
        return response()->json($levels);
    }
}

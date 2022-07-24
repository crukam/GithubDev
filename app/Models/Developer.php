<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Developer extends Model
{
    use HasFactory;

    public function repositories()
    {
        return $this->hasMany(DeveloperRepository::class);
    }

     public static function findByuserName($userName)
    {
        return DB::table('developers')->where('userName', $userName)->first();

    }
}

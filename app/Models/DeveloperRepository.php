<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DeveloperRepository extends Model
{
    use HasFactory;

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
   
}

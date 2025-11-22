<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Permission extends Model
{
    use HasFactory;
     //fillable fields
        protected $fillable = [
            'user_id',
            'date_permission',
            'reason',
            'image',
            'is_approved',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

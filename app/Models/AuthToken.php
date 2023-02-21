<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthToken extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function seedData()
    {
        // generate random token
        $token = bin2hex(random_bytes(32));

        AuthToken::Create([
            'user_id' => 1,
            'token' => $token
        ]);
        return [];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

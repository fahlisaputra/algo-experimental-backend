<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function seedData()
    {
        ModuleData::Create([
            'module_id' => 1,
            'user_id' => 1,
            'progress' => 42
        ]);

        ModuleData::Create([
            'module_id' => 2,
            'user_id' => 1,
            'progress' => 60
        ]);

        ModuleData::Create([
            'module_id' => 3,
            'user_id' => 1,
            'progress' => 70
        ]);


        return [];
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }
}

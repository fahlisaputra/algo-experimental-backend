<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function seedData()
    {
        Course::Create([
            'name' => 'Mengenal HTML',
            'estimated_duration' => 60,
            'description' => 'Berisi penjelasan dari HTML pada website',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/HTML5_logo_and_wordmark.svg/800px-HTML5_logo_and_wordmark.svg.png',
            'questions_count' => 10
        ]);
        Course::Create([
            'name' => 'Menyimpan dan mengorganisir data',
            'estimated_duration' => 90,
            'description' => 'Berisi pengetahuan dasar tentang menyimpan data dan mengorganisir data dengan efektif',
            'image' => 'https://1.cms.s81c.com/sites/default/files/2021-12-13/overview-secure-infrastructure.jpg',
            'questions_count' => 15
        ]);
        Course::Create([
            'name' => 'Probabilitas Bersyarat dan Bayes',
            'estimated_duration' => 120,
            'description' => 'Probabilitas bersyarat dan Bayes sebagai penghitung probabilitas',
            'image' => 'https://vitalflux.com/wp-content/uploads/2022/04/probability-concepts-formula-and-examples-300x190.png',
            'questions_count' => 20
        ]);
        Course::Create([
            'name' => 'Structure Efficiency',
            'estimated_duration' => 75,
            'description' => 'Membuat struktur algoritma yang efisien',
            'image' => 'https://images.klipfolio.com/website/public/11f3da89-351a-4ca1-a59d-b6806b0fcec1/algorithm.jpg',
            'questions_count' => 15
        ]);
        return [];
    }
}

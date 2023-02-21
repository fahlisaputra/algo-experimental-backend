<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function seedData() {
        Module::Create([
            'name' => 'Pemrograman Web',
            'description' => 'Mengajarkan ilmu dalam pembuatan dan pengembangan website',
            'image' => 'https://teknokreatips.com/wp-content/uploads/2022/04/apa-itu-web-development.jpg',
        ]);

        Module::Create([
            'name' => 'Basis Data',
            'description' => 'Memuat pemahaman tentang bagaimana data dibuat, disimpan, dan diakses pada bidang yang umum',
            'image' => 'https://assets.toptal.io/images?url=https://bs-uploads.toptal.io/blackfish-uploads/components/blog_post_page/content/cover_image_file/cover_image/1154098/retina_500x200_0712-Bad_Practices_in_Database_Design_-_Are_You_Making_These_Mistakes_Dan_Newsletter-f90d29e5d2384eab9f4f76a0a18fa9a8.png',
        ]);

        Module::Create([
            'name' => 'Statistika',
            'description' => 'Ilmu yang membahas tentang organisir, analisis, interpretasi, dan presentasi data',
            'image' => 'https://mentehealth.com/wp-content/uploads/2019/03/Copy-of-CASE-STUDIES-1030x687.png',
        ]);

        Module::Create([
            'name' => 'Analisis dan Desain Algoritma',
            'description' => 'Berisi ilmu mendesain algoritma yang efisien dan efektif',
            'image' => 'https://pandorafms.com/blog/wp-content/uploads/2018/05/what-is-an-algorithm-featured.png',
        ]);

        return [];
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Category;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->truncate();

        $web_category = Category::where([
            ['label', "Développement Web"],
            ['isProjectCategory', true],
        ])->first();
        $mobile_category = Category::where([
            ['label', "Développement mobile"],
            ['isProjectCategory', true],
        ])->first();

        Project::create([
            "title" => "Portfolio artiste peintre",
            "description" => "Site vitrine avec plusieurs pages dont une galerie pour la présentation des tableaux.",
            "used_techs" => json_encode([
                array("name" => "HTML5"),
                array("name" => "CSS3"),
                array("name" => "jQuery"),
                array("name" => "PHP"),
            ]),
            "image" => "/storage/images/projects/ouidad_khi_home_page.png",
            "website_url" => "http://ouidad-khi.fr",
            "github_url" => "https://github.com/drro23/artistePeintre",
            "video_url" => "",
            "category_id" => $web_category['id'],
        ]);

        Project::create([
            "title" => "Flutter Clock Challenge organisé par Google",
            "description" => "Cadran de montre digitale pour le reveil connécté Lenovo Smart Clock.",
            "used_techs" => json_encode([
                array("name" => "Flutter")
            ]),
            "image" => "/storage/images/projects/lenovo_flawe_clock.png",
            "website_url" => "",
            "github_url" => "https://github.com/drro23/flaweClock",
            "video_url" => "",
            "category_id" => $mobile_category['id'],
        ]);

        Project::create([
            "title" => "Kado",
            "description" => "Application permettant de partager ses souhaits de cadeaux avec sa famille et ses amis pour les fêtes afin qu'on reçoive toujours le cadeau parfait.",
            "used_techs" => json_encode([
                array("name" => "Flutter")
            ]),
            "image" => "/storage/images/projects/cado_app_min.png",
            "website_url" => "",
            "github_url" => "https://github.com/drro23/Kado",
            "video_url" => "",
            "category_id" => $mobile_category['id'],
        ]);
    }
}

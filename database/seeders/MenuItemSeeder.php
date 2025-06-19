<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            [
                'title' => 'Features',
                'type' => 'route',
                'route_name' => 'features',
                'url' => null,
                'page_id' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'FAQ',
                'type' => 'route',
                'route_name' => 'faq',
                'url' => null,
                'page_id' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Contact',
                'type' => 'route',
                'route_name' => 'contact',
                'url' => null,
                'page_id' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Blog',
                'type' => 'route',
                'route_name' => 'blog.index',
                'url' => null,
                'page_id' => null,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'API Docs',
                'type' => 'route',
                'route_name' => 'api.docs',
                'url' => null,
                'page_id' => null,
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($menuItems as $item) {
            \App\Models\MenuItem::firstOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}

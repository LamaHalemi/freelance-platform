<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $freelancer = User::where('role', 'freelancer')->first();

    $webDevelopment = Category::where('name', 'Web Development')->first();
    $graphicDesign = Category::where('name', 'Graphic Design')->first();
    $mobileDevelopment = Category::where('name', 'Mobile Development')->first();
        Service::create([
            'user_id' => $freelancer->id,
            'category_id' => $webDevelopment->id,
            'title' => 'Build a Laravel Website',
            'description' => 'I will build a complete website using Laravel.',
            'budget' => 500,
            'deadline' => now()->addDays(14),
            'status' => 'open',
        ]);

        Service::create([
            'user_id' => $freelancer->id,
            'category_id' => $graphicDesign->id,
            'title' => 'Professional Logo Design',
            'description' => 'I will design a modern and professional logo for your business.',
            'budget' => 100,
            'deadline' => now()->addDays(7),
            'status' => 'open',
        ]);

        Service::create([
            'user_id' => $freelancer->id,
            'category_id' => $mobileDevelopment->id,
            'title' => 'Build a Mobile Application',
            'description' => 'I will develop a mobile application for Android and iOS.',
            'budget' => 800,
            'deadline' => now()->addDays(30),
            'status' => 'open',
        ]);
    }
}

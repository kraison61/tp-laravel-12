<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Service; // 🌟 อย่าลืม import Model Service

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();

        // 1. หน้าหลักและหน้า Static พื้นฐาน
        $sitemap->add(Url::create(route('home'))->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
            ->add(Url::create(route('contact'))->setPriority(0.5))
            ->add(Url::create(route('about'))->setPriority(0.5));

        // 2. หน้าหมวดหมู่บริการและเครื่องมือคำนวณ (จาก Route Group: services)
        $sitemap->add(Url::create(route('services.index'))->setPriority(0.9))
            ->add(Url::create(route('calculate'))->setPriority(0.8));

        // 3. หน้าบริการรายตัว (Dynamic Services จาก Database)
        ServiceCategory::all()->each(function (ServiceCategory $service) use ($sitemap) {
            $sitemap->add(
                Url::create(route('service.show', $service->slug)) // ใช้ slug ตาม web.php
                    ->setLastModificationDate($service->updated_at)
                    ->setPriority(0.9)
            );
        });

        // 4. บทความ Blog ทั้งหมด
        Blog::all()->each(function (Blog $blog) use ($sitemap) {
            $sitemap->add(
                Url::create(route('blog.show', $blog))
                    ->setLastModificationDate($blog->updated_at)
                    ->setPriority(0.8)
            );
        });

        // 5. โครงการ/งวดงาน (แก้ไขชื่อ Route ให้ตรงกับ web.php ของคุณ)
        Project::all()->each(function (Project $project) use ($sitemap) {
            $sitemap->add(
                Url::create(route('projects.user.show', $project->id)) // 🌟 เปลี่ยนเป็น projects.user.show ตามไฟล์ web.php
                    ->setLastModificationDate($project->updated_at)
                    ->setPriority(0.6)
            );
        });

        return $sitemap->toResponse(request());
    }
}
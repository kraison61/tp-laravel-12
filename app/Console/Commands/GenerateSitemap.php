<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $sitemap = Sitemap::create();

    // 1. Static Pages (หน้าหลัก, ติดต่อเรา, เกี่ยวกับเรา)
    $sitemap->add(Url::create(route('home'))->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
            ->add(Url::create(route('contact'))->setPriority(0.5))
            ->add(Url::create(route('about'))->setPriority(0.5));

    // 2. Gallery
    // ถ้า Gallery คุณมีหมวดหมู่ ให้วนลูปดึง ID มาใส่ แต่ถ้ามีหน้าเดียวก็ใส่แค่หน้าหลัก
    $sitemap->add(Url::create(route('gallery.index'))->setPriority(0.7));

    // 3. Blogs (หน้าหลัก Blog + บทความรายตัว)
    $sitemap->add(Url::create(route('blog.index'))->setPriority(0.9));

    \App\Models\Blog::all()->each(function ($blog) use ($sitemap) {
        $sitemap->add(
            Url::create(route('blog.show', $blog)) // ใช้ Route Model Binding ตามที่คุณเซตไว้
                ->setLastModificationDate(now())
                ->setPriority(0.8)
        );
    });

    // 4. Services (หน้าที่ใช้ {slug} อยู่ล่างสุดของ web.php)
    $sitemap->add(Url::create(route('services.index'))->setPriority(0.9))
            ->add(Url::create(route('calculate'))->setPriority(0.8));

    // ดึงหน้า Pages/Services ทั้งหมดที่มีใน DB มาสร้าง URL
    \App\Models\Service::all()->each(function ($page) use ($sitemap) {
        $sitemap->add(
            Url::create(route('service.show', ['slug' => $page->category->slug]))
                ->setLastModificationDate(now())
                ->setPriority(0.7)
        );
    });

    $sitemap->writeToFile(public_path('sitemap.xml'));

    $this->info('Sitemap generated for Blogs, Services, and Static pages!');
}
}

<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Front\PageController as FrontPageController;
use App\Http\Controllers\Front\BlogController as FrontBlogController;
use App\Http\Controllers\Front\GalleryController as FrontGalleryController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::redirect('/blog', '/blogs', 301);
Route::redirect('/about', '/about-us', 301);
Route::redirect('/portfolio', '/gallery', 301);
Route::redirect('/images/retaining-wall', '/retaining-wall', 301);
Route::redirect('/รับถมดิน', '/landfill', 301);

// --- 2. กลุ่ม ID (แก้ไข Slug ปลายทางให้ตรงตาม blogs.sql) ---
// *ตรวจสอบแล้วว่าใน SQL ของคุณ Slug บางตัวมีเครื่องหมายขีด (-) ไม่เหมือนเดิม*
// โค้ดนี้จะดักจับทุกอย่างที่ตามหลัง /blog/ แล้วนำมาประมวลผลอย่างยืดหยุ่น
Route::get('/blog/{any}', function ($any) {
    // ถอดรหัส %20 และภาษาไทยให้เป็นข้อความปกติ
    $decodedUrl = urldecode($any);

    // 1. จัดการกลุ่ม ID (ตัวเลข)
    $idMap = [
        17 => 'เขื่อนกันดิน-ไทรม้า19-EP1',
        18 => 'เขื่อนกันดิน-ไทรม้า19-EP2',
        19 => 'เขื่อนกันดิน-ไทรม้า19-EP3',
        20 => 'เขื่อนกันดิน-ไทรม้า19-EP4',
        21 => 'กำแพงกันดิน-ซอยบางกร่าง45-5-EP1',
        22 => 'เขื่อนกันดิน-ไทรม้า19-EP5',
        23 => 'สำรวจกำแพงกั้นดินพัง-สุพรรณบุรี',
        24 => 'เขื่อนกันดิน-ไทรม้า19-EP6',
        25 => 'กำแพงกันดิน-ซอยบางกร่าง45-5-EP2',
        26 => 'ขุดบ่อน้ำ-ปากน้ำกระโจมทอง',
        27 => 'กำแพงกันดิน-ซอยไทรม้า19-ส่งงาน',
        28 => 'เทพื้นปูน-ราคาต่อตารางเมตร-2567-รับเหมาเทพื้นคอนกรีต-มืออาชีพ',
        29 => 'เทปูน-1-คิว-ใช้ปูนกี่ถุง-คำนวณวัสดุและต้นทุนอย่างมืออาชีพ',
        30 => 'ถมที่ด้วยเศษวัสดุก่อสร้าง-ช่วยประหยัด-เสริมพื้นแข็งแรง-เหมาะกับงานสร้างกำแพงกันดิน',
    ];

    if (is_numeric($decodedUrl) && isset($idMap[$decodedUrl])) {
        return redirect()->to('/blogs/' . $idMap[$decodedUrl], 301);
    }

    // 2. จัดการกลุ่มภาษาไทย (ใช้ Str::contains เพื่อไม่ต้องกังวลเรื่องการเว้นวรรคผิด)
    if (Str::contains($decodedUrl, 'เขื่อนกันดินไทรม้า 19 EP.1'))
        return redirect()->to('/blogs/เขื่อนกันดิน-ไทรม้า19-EP1', 301);
    if (Str::contains($decodedUrl, 'เขื่อนกันดินไทรม้า 19 EP.2'))
        return redirect()->to('/blogs/เขื่อนกันดินไทรม้า19-EP2', 301);
    if (Str::contains($decodedUrl, 'เขื่อนกันดินไทรม้า 19 EP.3'))
        return redirect()->to('/blogs/เขื่อนกันดิน-ไทรม้า19-EP3', 301);
    if (Str::contains($decodedUrl, 'เขื่อนกันดินไทรม้า 19 EP.6'))
        return redirect()->to('/blogs/เขื่อนกันดิน-ไทรม้า19-EP6', 301);
    if (Str::contains($decodedUrl, 'ถมที่ด้วยเศษวัสดุก่อสร้าง'))
        return redirect()->to('/blogs/ถมที่ด้วยเศษวัสดุก่อสร้าง-ช่วยประหยัด-เสริมพื้นแข็งแรง-เหมาะกับงานสร้างกำแพงกันดิน', 301);
    if (Str::contains($decodedUrl, 'เทปูน 1 คิว ใช้ปูนกี่ถุง? คำนวณวัสดุและต้นทุนอย่างมืออาชีพ'))
        return redirect()->to('/blogs/เทปูน-1-คิว-ใช้ปูนกี่ถุง-คำนวณวัสดุและต้นทุนอย่างมืออาชีพ', 301);
    if (Str::contains($decodedUrl, 'เทพื้นปูน'))
        return redirect()->to('/blogs/เทพื้นปูน-ราคาต่อตารางเมตร-2567-รับเหมาเทพื้นคอนกรีต-มืออาชีพ', 301);

    // 3. ถ้ามีคนเข้าลิงก์เก่าอื่นๆ นอกเหนือจากนี้ ให้ส่งไปหน้าบล็อกรวมเพื่อป้องกัน 404
    return redirect('/blogs', 301);

})->where('any', '.*'); // อนุญาตให้มีเครื่องหมาย / หรือช่องว่างได้

// --- 3. กลุ่มภาษาไทย (แก้ปัญหา Error จาก .htaccess) ---
// Laravel จะรับค่าที่มี "ช่องว่าง" ได้โดยไม่ต้องใส่เครื่องหมายพิเศษ
Route::redirect('/blog/เขื่อนกันดินไทรม้า 19 EP.2', '/blogs/เขื่อนกันดินไทรม้า-19-EP2', 301);
Route::redirect('/blog/เขื่อนกันดินไทรม้า 19 EP.2', '/blogs/เขื่อนกันดินไทรม้า-19-EP2', 301);
Route::redirect('/blog/เขื่อนกันดินไทรม้า 19 EP.3', '/blogs/เขื่อนกันดินไทรม้า-19-ep3', 301);
Route::redirect('/blog/เขื่อนกันดินไทรม้า 19 EP.6', '/blogs/เขื่อนกันดินไทรม้า-19-ep-6', 301);
Route::redirect('/blog/ถมที่ด้วยเศษวัสดุก่อสร้าง ช่วยประหยัด เสริมพื้นแข็งแรง เหมาะกับงานสร้างกำแพงกันดิน', '/blogs/ถมที่ด้วยเศษวัสดุก่อสร้าง-ช่วยประหยัด-เสริมพื้นแข็งแรง-เหมาะกับงานสร้างกำแพงกันดิน', 301);
Route::redirect('/blog/เทพื้นปูน ราคาต่อ ตาราง เมตร 2567 | รับเหมาเทพื้นคอนกรีต มืออาชีพ', '/blogs/เทพื้นปูน-ราคาต่อตารางเมตร-2567', 301);

// Route::get('/test-hash', function () {
//     // 1. สร้างรหัสผ่านแบบ Hash
//     $hashedPassword = Hash::make('12345678');

//     // 2. แสดงผลออกมาบนหน้าจอ
//     return "Your Hashed Password: " . $hashedPassword;
// });

// 1. Route ที่เป็นชื่อเฉพาะ (Static) ต้องอยู่บนสุด
Route::get('/', [FrontHomeController::class, 'index'])->name('home');
Route::get('/contact-us', [FrontHomeController::class, 'contactUs'])->name('contact');
Route::get('/about-us', [FrontHomeController::class, 'aboutUs'])->name('about');




// Gallery Routes
Route::prefix('gallery')->group(function () {
    Route::get('/{id?}', [FrontGalleryController::class, 'index'])->name('gallery.index');
});

//Admin Route
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::prefix('blog')->group(function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/store', [AdminBlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/edit/{id}', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
        Route::delete('/del/{id}', [AdminBlogController::class, 'destroy'])->name('admin.blog.destroy');
        Route::put('/update/{id}', [AdminBlogController::class, 'update'])->name('admin.blog.update');
    });

    Route::prefix('service')->group(function () {
        Route::get('/', [AdminServiceController::class, 'index'])->name('admin.service.index');
        Route::get('/create', [AdminServiceController::class, 'create'])->name('admin.service.create');
        Route::post('/store', [AdminServiceController::class, 'store'])->name('admin.service.store');
        Route::get('/edit/{slug}', [AdminServiceController::class, 'edit'])->name('admin.service.edit');
        Route::delete('/del/{slug}', [AdminServiceController::class, 'destroy'])->name('admin.service.destroy');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/category/edit/{slug}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
        Route::delete('/category/del/{slug}', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy');
    });

    Route::prefix('faqs')->group(function () {
        Route::get('/', [AdminFaqController::class, 'index'])->name('admin.faq.index');
        Route::get('/create', [AdminFaqController::class, 'create'])->name('admin.faq.create');
        Route::post('/store', [AdminFaqController::class, 'store'])->name('admin.faq.store');
        Route::get('/edit/{slug}', [AdminFaqController::class, 'edit'])->name('admin.faq.edit');
        Route::delete('/del/{slug}', [AdminFaqController::class, 'destroy'])->name('admin.faq.destroy');
    });
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::get('/create', [ProfileController::class, 'create'])->name('admin.profile.create');
        Route::post('/store', [ProfileController::class, 'store'])->name('admin.profile.store');
        Route::get('/edit/{slug}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::delete('/del/{slug}', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    });

});

Route::prefix('admin')->middleware(['guest'])->group(function () {

    // แสดงหน้าฟอร์ม Login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    // รับข้อมูลตอนกดปุ่มเข้าสู่ระบบ (ต้องเป็น POST)
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

});

// Blog Routes
Route::prefix('blogs')->group(function () {
    Route::get('/', [FrontBlogController::class, 'index'])->name('blog.index');
    Route::get('/category/{id}', [FrontBlogController::class, 'index'])->name('blog.filter');
    Route::get('/{blog}', [FrontBlogController::class, 'show'])->name('blog.show');
});


//  Route ที่เป็นตัวแปรแบบกว้างมากๆ ({slug}) "ต้องอยู่ล่างสุดเสมอ"
Route::prefix('services')->group(function () {
    Route::get('/', [FrontPageController::class, 'index'])->name('services.index');
    Route::get('/calculate', [FrontHomeController::class, 'soilCalculate'])->name('calculate');
});
Route::get('/{slug}', [FrontPageController::class, 'show'])->name('service.show');





Route::fallback(function (Request $request) {

    // 1. ดึง URL ทั้งหมดมาถอดรหัส (รวมถึงพารามิเตอร์หลัง ?)
    $fullUrl = urldecode($request->fullUrl());

    // 2. ตรวจสอบเงื่อนไขบทความ "เทปูน 1 คิว"
    // เราใช้การเช็คคำสำคัญ (Keywords) เพื่อให้ครอบคลุมทั้งลิงก์ที่มีช่องว่าง หรือ %3F (?)
    if (Str::contains($fullUrl, 'เทปูน') && Str::contains($fullUrl, '1 คิว') && Str::contains($fullUrl, 'คำนวณวัสดุ')) {

        // 3. ปลายทางที่ต้องการ (blogs แบบมี s และใช้ขีดแทนช่องว่าง)
        $destination = 'https://www.theeraphong.com/blogs/เทปูน-1-คิว-ใช้ปูนกี่ถุง-คำนวณวัสดุและต้นทุนอย่างมืออาชีพ';

        // 4. สั่ง 301 Permanent Redirect (สำคัญมากต่อ SEO)
        return redirect()->to($destination, 301);
    }

    // หากไม่ตรงเงื่อนไขใดๆ ให้แสดงหน้า 404 ตามมาตรฐาน
    abort(404);
});

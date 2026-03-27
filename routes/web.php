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
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\PriceController as AdminPriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PublicLaborCostController;
use App\Http\Controllers\Admin\LaborCostController as AdminLaborCostController;
use App\Http\Controllers\Admin\LaborCategoryController as AdminLaborCategoryController;


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


// Labor Cost Routes
Route::get('/labor-costs/autocomplete', [PublicLaborCostController::class, 'autocomplete'])->name('public.labor_costs.autocomplete');
Route::get('/labor-costs', [PublicLaborCostController::class, 'index'])->name('public.labor_costs');



// Gallery Routes
Route::prefix('gallery')->group(function () {
    Route::get('/{id?}', [FrontGalleryController::class, 'index'])->name('gallery.index');
});

Route::prefix('admin')
    ->name('admin.') // 🌟 เพิ่ม name('admin.') ตรงนี้ เพื่อไม่ต้องพิมพ์ 'admin.' ซ้ำๆ ใน resource
    ->middleware(['auth'])
    ->group(function () {

        // --- หน้า Dashboard ---
        // สังเกตว่าชื่อ Route จะกลายเป็น 'admin.dashboard' อัตโนมัติ เพราะเราใส่ ->name('admin.') ไว้ข้างบนแล้ว
        // (แต่ถ้าอยากให้เป็นแค่ 'dashboard' เฉยๆ ตามเดิม ให้ย้ายบรรทัดนี้ออกไปไว้นอกกลุ่ม name('admin.') นะครับ)
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // --- กลุ่ม CRUD มาตรฐาน (ยุบรวม 6 บรรทัดเหลือ 1 บรรทัด) ---
        // except(['show']) คือบอกว่าเราไม่มีหน้า show รายละเอียด
        Route::resource('blog', AdminBlogController::class)->except(['show']);
        Route::resource('service', AdminServiceController::class)->except(['show']);
        Route::resource('category', AdminCategoryController::class)->except(['show']);
        Route::resource('price', AdminPriceController::class)->except(['show']);

        // --- กลุ่ม CRUD ที่มีแค่บางหน้า (ใช้ only) ---
        // สมมติว่า FAQs และ Reviews ไม่มีหน้า create ให้ไปกดปุ่ม (เช่น อาจจะมาจากฟอร์มอื่น) 
        Route::resource('faqs', AdminFaqController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
        Route::resource('review', AdminReviewController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

        // --- กลุ่มพิเศษ (ใช้ {slug} แทน {id}) ---
        // แบบนี้คือการบอก Resource ว่าเวลาหาข้อมูล ให้หาด้วยคอลัมน์ 'slug' แทน 'id'
        Route::resource('profile', ProfileController::class)->parameters([
            'profile' => 'slug' // เปลี่ยน parameter จาก {profile} เป็น {slug}
        ])->except(['show']);

        Route::resource('labor_cost', AdminLaborCostController::class);

        // เพิ่มบรรทัดนี้ลงไปครับ
        Route::resource('labor_category', AdminLaborCategoryController::class);

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

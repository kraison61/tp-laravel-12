# Project Context: www.theeraphong.com

## 1. Project Overview
- **ชื่อโปรเจกต์:** www.theeraphong.com
- **ประเภท:** เว็บไซต์ทั่วไป (นำเสนอบริการด้านวิศวกรรม/รับเหมาก่อสร้าง เช่น งานกำแพงกันดิน, เสาเข็มไมโครไพล์, และบทความให้ความรู้)
- **ภาษาที่ใช้สื่อสารกับ AI:** ใช้ภาษาไทยผสมภาษาอังกฤษได้ (ทั้งในการอธิบายและการเขียน Comment ในโค้ด)

## 2. Tech Stack & Infrastructure
- **Framework:** Laravel 12
- **Database:** MySQL
- **Frontend:** Laravel Blade Templates
- **Dynamic/Interactive UI:** ใช้ **Livewire** (โดยเฉพาะสำหรับการแสดงผลภาพ)
- **File Storage:** ใช้ **Cloudflare Storage** (S3-compatible) สำหรับเก็บรูปภาพและไฟล์ต่างๆ
- **Environment:** รันโปรเจกต์แบบ Local ปกติ (ไม่ได้ใช้ Docker)

## 3. Architecture & Coding Standards
- **Design Pattern:** ใช้โครงสร้างมาตรฐานของ Laravel คือ **Controller + Model ทั่วไป** (ไม่ได้ใช้ Service-Repository Pattern)
- **Naming Conventions:** - ตัวแปรในโค้ด (Variables/Methods): อนุโลมให้ใช้ได้ทั้ง `snake_case` และ `camelCase`
  - ฐานข้อมูล (Database/Tables/Columns): ใช้ `snake_case`
- **API Responses:** ไม่ได้บังคับรูปแบบตายตัว (Flexible)
- **Comments:** เขียนคอมเมนต์อธิบายโค้ดเป็นภาษาไทย ผสมภาษาอังกฤษได้ตามความเหมาะสม

## 4. Core Database Schema & Relationships
ข้อมูลตารางหลักในระบบ:
- `services`: เก็บข้อมูลบริการหลักของเว็บไซต์
- `service_categories`: หมวดหมู่ของบริการ
- `portfolios`: เก็บผลงานที่ผ่านมา (เชื่อมโยงกับ `services` ผ่าน `service_id`)
- `prices` / `service_prices`: ข้อมูลราคาแพ็กเกจของแต่ละบริการ
- `blogs`: ระบบบทความ/อัปเดตหน้างาน (เชื่อมกับ `service_category_id`)
- `reviews`: รีวิวจากลูกค้า
- `users`: ระบบจัดการผู้ใช้งาน/แอดมิน

## 5. Development Commands
คำสั่งหลักที่ใช้ในการพัฒนาโปรเจกต์นี้:
- **Run Project:** `composer dev`
- **Testing:** ไม่มีคำสั่งสำหรับ Test Run
- **Database Management:** ไม่มีการระบุคำสั่งจัดการฐานข้อมูลเป็นพิเศษ ให้ใช้คำสั่ง Artisan พื้นฐานตามความจำเป็น

## 6. AI Instructions (สำหรับ Claude Code)
- **การจัดการไฟล์และรูปภาพ:** รูปภาพทั้งหมดถูกเก็บไว้ที่ **Cloudflare Storage** ดังนั้นเมื่อมีการอัปโหลด ลบ หรือแสดงผลภาพ ให้พิจารณาการใช้ Storage facade ของ Laravel (ผ่าน S3 driver) ให้ถูกต้อง ห้ามบันทึกลง Local public folder
- เมื่อถูกสั่งให้แก้ไข UI หรือส่วนแสดงผลรูปภาพ ให้พิจารณาการทำงานร่วมกับ **Livewire** เสมอ (ระวังเรื่อง Temporary Uploads ของ Livewire กับ Cloud Storage)
- ไม่ต้องกังวลเรื่องการเขียน API Response ให้เป็นฟอร์แมตตายตัว ให้เน้นส่งข้อมูลไปแสดงผลที่ Blade View เป็นหลัก
- ไม่ต้องหาโฟลเดอร์พิเศษใดๆ ให้ทำงานตามโครงสร้างโฟลเดอร์มาตรฐานของ Laravel 12
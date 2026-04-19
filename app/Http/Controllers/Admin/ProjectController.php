<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $columns = ['id', 'name', 'description', 'user_id', 'status', 'slug'];
        $data = Project::select($columns)->with('user')->latest()->get()
            ->map(function ($item) {
                // Map ชื่อเจ้าของโครงการมาไว้ที่ user_name เพื่อให้แสดงในตารางได้
                $item->user_name = $item->user->name ?? 'ไม่มีเจ้าของ';
                return $item;
            });

        $headers = [
            'id' => 'ลำดับ',
            'name' => 'ชื่อโครงการ',
            'description' => 'รายละเอียด',
            'user_name' => 'เจ้าของโครงการ',
            'status' => 'สถานะ',
            'slug' => 'Slug',
        ];

        return view('admin.index', [
            'title' => 'Admin-Projects',
            'data' => $data,
            'headers' => $headers,
            'routeBase' => 'admin.projects',
            'createRoute' => 'admin.projects.create',
            'showPhases' => true, // 🌟 บอกให้ Template กลางแสดงปุ่ม "งวดงาน"
        ]);
    }

    public function create()
    {
        $project = new Project();
        $users = User::orderBy('name')->get();
        return view('admin.projects.form', compact('project', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
        ]);

        $data['slug'] = Str::slug($data['name']) . '-' . uniqid();

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'เพิ่มโครงการใหม่เรียบร้อยแล้ว');
    }

    public function show(Project $project)
    {
        $project->load([
            'phases' => function ($query) {
                $query->orderBy('phase_number', 'asc');
            },
            'user'
        ]);

        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $users = User::orderBy('name')->get();
        return view('admin.projects.form', compact('project', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
        ]);

        if ($request->name !== $project->name) {
            $data['slug'] = Str::slug($data['name']) . '-' . uniqid();
        }

        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'แก้ไขโครงการเรียบร้อยแล้ว');
    }

    public function destroy(Project $project)
    {
        $project->phases()->delete(); // ลบงวดงานด้วย
        $project->delete();
        return back()->with('success', 'ลบโครงการและงวดงานที่เกี่ยวข้องเรียบร้อยแล้ว');
    }

}

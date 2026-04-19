<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectPhase;
use App\Models\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectPhaseController extends Controller
{
    public function index(Project $project)
    {
        $project->load([
            'phases' => function ($query) {
                $query->orderBy('phase_number', 'asc')->with('images');
            }
        ]);

        return view('admin.phases.index', compact('project'));
    }

    public function create(Project $project)
    {
        $phase = new ProjectPhase();
        $phase->project_id = $project->id;

        return view('admin.phases.form', compact('phase', 'project'));
    }

    public function store(Project $project, Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'phase_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        ProjectPhase::create($data);
        return redirect()->route('admin.project.phases.index', $data['project_id'])
            ->with('success', 'เพิ่มงวดงานเรียบร้อยแล้ว');
    }

    public function edit(Project $project, ProjectPhase $phase)
    {
        return view('admin.phases.form', compact('phase', 'project'));
    }

    public function update(Request $request, Project $project, ProjectPhase $phase)
    {
        $data = $request->validate([
            'phase_number' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $phase->update([
            'phase_number' => $data['phase_number'],
            'title' => $data['title'],
            'status' => $data['status'],
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images/projects/' . $project->id, $fileName, 's3');

                ImageUpload::create([
                    'phase_id' => $phase->id,
                    'service_id' => 0, // Default or dummy since it doesn't apply
                    'img_url' => $path,
                    'location' => 'Project: ' . $project->name,
                ]);
            }
        }

        return redirect()->route('admin.project.phases.index', $project->id)
            ->with('success', 'อัปเดตข้อมูลงวดงานเรียบร้อยแล้ว');
    }

    public function destroy(Project $project, ProjectPhase $phase)
    {
        // ลบรูปภาพออกจาก S3
        foreach ($phase->images as $image) {
            Storage::disk('s3')->delete($image->img_url);
            $image->delete();
        }

        $phase->delete();
        return redirect()->route('admin.project.phases.index', $project->id)
            ->with('success', 'ลบงวดงานและรูปภาพที่เกี่ยวข้องเรียบร้อยแล้ว');
    }

    public function destroyImage(ImageUpload $image)
    {
        $phase = ProjectPhase::find($image->phase_id);

        // ลบไฟล์ออกจาก S3
        if (Storage::disk('s3')->exists($image->img_url)) {
            Storage::disk('s3')->delete($image->img_url);
        }

        $image->delete();

        return back()->with('success', 'ลบรูปภาพเรียบร้อยแล้ว');
    }
}

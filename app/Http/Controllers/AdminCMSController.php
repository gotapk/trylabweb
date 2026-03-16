<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Experiment;
use App\Models\Translation;
use Illuminate\Support\Facades\DB;

class AdminCMSController extends Controller
{
    public function index()
    {
        $stats = [
            'total_visits' => Visit::count(),
            'unique_visitors' => Visit::distinct('ip_address')->count(),
            'device_breakdown' => Visit::select('device_type', DB::raw('count(*) as count'))
                ->groupBy('device_type')
                ->get(),
            'recent_visits' => Visit::latest()->take(10)->get(),
            'unread_messages' => ContactMessage::where('status', 'unread')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function visits()
    {
        $visits = Visit::latest()->paginate(50);
        return view('admin.visits', compact('visits'));
    }

    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.messages', compact('messages'));
    }

    public function projects()
    {
        $projects = Project::orderBy('order')->get();
        return view('admin.projects', compact('projects'));
    }

    public function experiments()
    {
        $experiments = Experiment::orderBy('order')->get();
        return view('admin.experiments', compact('experiments'));
    }

    public function translations()
    {
        $translations = Translation::all();
        return view('admin.translations', compact('translations'));
    }

    // Projects CRUD
    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('img/Proyectos', 'public_uploads');
            $data['image_path'] = $path;
        }

        Project::create($data);
        return redirect()->back()->with('success', 'Project created successfully');
    }

    public function updateProject(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('img/Proyectos', 'public_uploads');
            $data['image_path'] = $path;
        }

        $project->update($data);
        return redirect()->back()->with('success', 'Project updated successfully');
    }

    public function deleteProject(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully');
    }

    // Experiments CRUD
    public function storeExperiment(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'link' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('img/Experimentos', 'public_uploads');
            $data['image_path'] = $path;
        }

        Experiment::create($data);
        return redirect()->back()->with('success', 'Experiment created successfully');
    }

    public function updateExperiment(Request $request, Experiment $experiment)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'link' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('img/Experimentos', 'public_uploads');
            $data['image_path'] = $path;
        }

        $experiment->update($data);
        return redirect()->back()->with('success', 'Experiment updated successfully');
    }

    public function deleteExperiment(Experiment $experiment)
    {
        $experiment->delete();
        return redirect()->back()->with('success', 'Experiment deleted successfully');
    }

    // Translations CRUD
    public function storeTranslation(Request $request)
    {
        $data = $request->validate([
            'key' => 'required|string',
            'locale' => 'required|string|max:5',
            'value' => 'required|string',
        ]);

        Translation::updateOrCreate(
            ['key' => $data['key'], 'locale' => strtolower($data['locale'])],
            ['value' => $data['value']]
        );

        return redirect()->back()->with('success', 'Translation saved successfully');
    }
}

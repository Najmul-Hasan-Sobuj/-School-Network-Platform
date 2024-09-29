<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project.index', ['only' => ['index']]);
        $this->middleware('permission:project.create', ['only' => ['create']]);
        $this->middleware('permission:project.show', ['only' => ['show']]);
        $this->middleware('permission:project.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:project.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::latest('id')->get();

            return DataTables::of($projects)
                ->addColumn('DT_RowIndex', function ($project) {
                    return $project->id;
                })
                ->addColumn('title', function ($project) {
                    return $project->title;
                })
                ->editColumn('start_date', function ($project) {
                    return Carbon::parse($project->start_date)->format('Y-m-d');
                })
                ->editColumn('end_date', function ($project) {
                    return $project->end_date ? Carbon::parse($project->end_date)->format('Y-m-d') : null;
                })
                ->addColumn('status', function ($project) {
                    return $project->status;
                })
                ->addColumn('action', function ($project) {
                    return '<a href="' . route('admin.project.show', $project->id) . '" class="btn_navy text-white px-2 rounded ms-3">View</a>' .
                        '<a href="' . route('admin.project.edit', $project->id) . '" class="btn_paste text-white px-2 rounded ms-3">Edit</a>' .
                        '<a href="' . route('admin.project.destroy', $project->id) . '" class="btn_red text-white px-2 rounded delete ms-3">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allMembers = User::all();

        return view('admin.pages.project.create', compact('allMembers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:Completed,In progress',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'members' => 'nullable|array'
        ]);

        DB::beginTransaction();

        try {
            $filePath = $request->file('file_path') ? uploadImage($request->file('file_path'), 'projects') : null;

            Project::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
                'file_path' => $filePath,
                'members' => $request->members,
            ]);

            DB::commit();
            return redirect()->route('admin.project.index')->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error creating the project: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.pages.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $allMembers = User::all();

        return view('admin.pages.project.edit', compact('project', 'allMembers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|in:Completed,In progress',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'members' => 'nullable|array'
        ]);

        DB::beginTransaction();

        try {
            // Check if a new file is being uploaded
            if ($request->hasFile('file_path')) {
                // Delete the old file if it exists
                if ($project->file_path) {
                    Storage::disk('public')->delete($project->file_path);
                }

                // Upload the new file
                $filePath = uploadImage($request->file('file_path'), 'projects');
            } else {
                $filePath = $project->file_path; // Keep the old file path if no new file is uploaded
            }

            $project->update([
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'status' => $request->status,
                'file_path' => $filePath,
                'members' => $request->members,
            ]);

            DB::commit();
            return redirect()->route('admin.project.index')->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error updating the project: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->file_path) {
            Storage::disk('public')->delete($project->file_path);
        }

        $project->delete();
    }
}

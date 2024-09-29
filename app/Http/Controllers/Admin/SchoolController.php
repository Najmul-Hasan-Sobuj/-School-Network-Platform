<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:school.index', ['only' => ['index']]);
        $this->middleware('permission:school.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:school.show', ['only' => ['show']]);
        $this->middleware('permission:school.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:school.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $schools = School::latest('id')->get();

            return DataTables::of($schools)
                ->addColumn('DT_RowIndex', function ($school) {
                    return $school->id;
                })
                ->addColumn('name', function ($school) {
                    return $school->name;
                })
                ->addColumn('address', function ($school) {
                    return $school->address ?? 'N/A';
                })
                ->addColumn('country', function ($school) {
                    return $school->country;
                })
                ->addColumn('action', function ($school) {
                    return '<a href="' . route('admin.school.show', $school->id) . '" class="btn_navy text-white px-2 rounded ms-3">View</a>' .
                        '<a href="' . route('admin.school.edit', $school->id) . '" class="btn_paste text-white px-2 rounded ms-3">Edit</a>' .
                        '<a href="' . route('admin.school.destroy', $school->id) . '" class="btn_red text-white px-2 rounded delete ms-3">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.school.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.school.create');
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'country' => 'required|max:100',
        ]);

        DB::beginTransaction();

        try {
            School::create([
                'name' => $request->name,
                'address' => $request->address,
                'country' => $request->country,
            ]);

            DB::commit();
            return redirect()->route('admin.school.index')->with('success', 'School created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error creating the school: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('admin.pages.school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('admin.pages.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'country' => 'required|max:100',
        ]);

        DB::beginTransaction();

        try {
            $school->update([
                'name' => $request->name,
                'address' => $request->address,
                'country' => $request->country,
            ]);

            DB::commit();
            return redirect()->route('admin.school.index')->with('success', 'School updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error updating the school: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $school->delete();
    }
}

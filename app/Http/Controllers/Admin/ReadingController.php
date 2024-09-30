<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reading;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ReadingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:reading.index', ['only' => ['index']]);
        $this->middleware('permission:reading.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:reading.show', ['only' => ['show']]);
        $this->middleware('permission:reading.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:reading.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $readings = Reading::latest('id')->get();

            return DataTables::of($readings)
                ->addColumn('DT_RowIndex', function ($reading) {
                    return $reading->id;
                })
                ->addColumn('title', function ($reading) {
                    return $reading->title;
                })
                ->addColumn('doi', function ($reading) {
                    return $reading->doi ?? 'N/A';
                })
                ->addColumn('year', function ($reading) {
                    return $reading->year;
                })
                ->addColumn('type', function ($reading) {
                    return $reading->type;
                })
                ->addColumn('action', function ($reading) {
                    return '<a href="' . route('admin.reading.show', $reading->id) . '" class="btn_navy text-white px-2 rounded ms-3">View</a>' .
                        '<a href="' . route('admin.reading.edit', $reading->id) . '" class="btn_paste text-white px-2 rounded ms-3">Edit</a>' .
                        '<a href="' . route('admin.reading.destroy', $reading->id) . '" class="btn_red text-white px-2 rounded delete ms-3">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.reading.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allUsers = User::all();

        return view('admin.pages.reading.create', compact('allUsers'));
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
            'doi' => 'nullable|max:50',
            'year' => 'required|digits:4',
            'type' => 'required|in:Article,Book,Chapter',
        ]);

        DB::beginTransaction();

        try {
            Reading::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'doi' => $request->doi,
                'year' => $request->year,
                'type' => $request->type,
            ]);

            DB::commit();
            return redirect()->route('admin.reading.index')->with('success', 'Reading created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error creating the reading: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reading $reading)
    {
        return view('admin.pages.reading.show', compact('reading'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reading $reading)
    {
        $allUsers = User::all();
        return view('admin.pages.reading.edit', compact('reading', 'allUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reading $reading)
    {
        $request->validate([
            'title' => 'required|max:255',
            'doi' => 'nullable|max:50',
            'year' => 'required|digits:4',
            'type' => 'required|in:Article,Book,Chapter',
        ]);

        DB::beginTransaction();

        try {
            $reading->update([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'doi' => $request->doi,
                'year' => $request->year,
                'type' => $request->type,
            ]);

            DB::commit();
            return redirect()->route('admin.reading.index')->with('success', 'Reading updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an error updating the reading: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reading $reading)
    {
        $reading->delete();
    }
}

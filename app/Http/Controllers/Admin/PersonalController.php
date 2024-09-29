<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:student.index', ['only' => ['index']]);
        $this->middleware('permission:student.show', ['only' => ['show']]);
        $this->middleware('permission:student.delete', ['only' => ['destroy']]);
        $this->middleware('permission:student.approve', ['only' => ['toggleApproval']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::latest('id')->get();

            return DataTables::of($users)
                ->addColumn('DT_RowIndex', function ($personal) {
                    return $personal->id;
                })
                ->addColumn('action', function ($personal) {
                    return '<a href="' . route('admin.personal.show', $personal->id) . '" class="btn_navy text-white px-2 rounded ms-3">View</a>' .
                        '<a href="' . route('admin.personal.destroy', $personal->id) . '" class="btn_red text-white px-2 rounded delete ms-3">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.personal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $personal)
    {
        return view('admin.pages.personal.show', compact('personal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $personal)
    {
        $personal->delete();
    }

    public function toggleApproval(User $personal)
    {
        try {
            $personal->is_approved = !$personal->is_approved;
            $personal->save();

            return redirect()->back()->with('success', 'Student approval status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error creating the project: ' . $e->getMessage());
        }
    }
}

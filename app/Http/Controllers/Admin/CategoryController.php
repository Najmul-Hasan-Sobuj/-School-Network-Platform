<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category.index', ['only' => ['index']]);
        $this->middleware('permission:category.create', ['only' => ['create']]);
        $this->middleware('permission:category.show', ['only' => ['show']]);
        $this->middleware('permission:category.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category.delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::latest('id')->get();

            return DataTables::of($categories)
                ->addColumn('DT_RowIndex', function ($categories) {
                    return $categories->id;
                })
                ->addColumn('action', function ($categories) {
                    return '<a href="' . route('admin.category.show', $categories->id) . '" class="btn_navy text-white px-2 rounded ms-3">Veiw</a>' .
                        '<a href="' . route('admin.category.edit', $categories->id) . '" class="btn_paste text-white px-2 rounded ms-3">Edit</a>' .
                        '<a href="' . route('admin.category.destroy', $categories->id) . '" class="btn_red text-white px-2 rounded delete ms-3">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' =>  Str::slug($request->name),
            'status' => $request->status,
        ]);

        flash()
            ->success('Your information has been saved.')
            ->flash();
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pages.category.show', [
            'category' => Category::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.category.edit', [
            'category' => Category::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        Category::findOrFail($id)->update([
            'name' => $request->name,
            'slug' =>  Str::slug($request->name),
            'status' => $request->status,
        ]);

        flash()
            ->success('Your information has been update.')
            ->flash();
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
    }

    public function toggleStatus($id)
    {
        $category = Category::findOrFail($id);

        // Toggle the status: 1 = Active, 0 = Inactive
        $category->status = !$category->status;
        $category->save();

        // Return a JSON response with the new status
        return response()->json(['status' => $category->status]);
    }
}

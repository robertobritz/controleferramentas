<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTool;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    private $repository;

    public function __construct(Tool $tool)
    {
        $this->repository = $tool;

        //$this->middleware(['can:tool']); para quando criar o GATE
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = $this->repository->latest()->paginate();

        return view('pages.tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tools.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateTool $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('tools.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$tool = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('pages.tools.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$tool = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('pages.tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateTool $request, string $id)
    {
        if (!$tool = $this->repository->find($id)) {
            return redirect()->back();
        }

        $tool->update($request->all());

        return redirect()->route('tools.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$tool = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        $tool->delete();

        return redirect()->route('tools.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        //dd($filters);
        $tools = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name','LIKE',"%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('pages.tools.index', compact('tools', 'filters'));
    }
}
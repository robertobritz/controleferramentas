<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMagazine;
use App\Models\Machine;
use App\Models\Magazine;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    private $repository;

    public function __construct(Magazine $magazine)
    {
        $this->repository = $magazine;

        //$this->middleware(['can:magazine']); para quando criar o GATE
    }

    public function index()
    {
        $magazines = $this->repository->latest()->paginate();

        return view('pages.magazines.index', compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Machine $machine)
    {
        return view('pages.magazines.create', compact('machine'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateMagazine $request)
    {
        //dd($request->all());
        
        //$this->repository->create($request->all());

        $magazine = new Magazine;
        $magazine->positions = $request->positions;
        $magazine->machine_id = $request->machine_id;
        $magazine->machine_name = $request->machine_name; // Adiciona o valor do campo machine_name
        $magazine->save();

        return redirect()->route('magazines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$magazine = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('pages.magazines.show', compact('magazine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$magazine = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('pages.magazines.edit', compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateMagazine $request, string $id)
    {
        if (!$magazine = $this->repository->find($id)) {
            return redirect()->back();
        }

        $magazine->update($request->all());

        return redirect()->route('magazines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$magazine = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        $magazine->delete();

        return redirect()->route('magazines.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');
        //dd($filters);
        $magazines = $this->repository
                            ->where(function($query) use ($request) {
                                if ($request->filter) {
                                    $query->where('name','LIKE',"%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('pages.magazines.index', compact('magazines', 'filters'));
    }
}

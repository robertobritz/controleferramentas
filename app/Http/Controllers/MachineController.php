<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMachine;
use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    private $repository;

    public function __construct(Machine $machine)
    {
        $this->repository = $machine;

        //$this->middleware(['can:machine']); para quando criar o GATE
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = $this->repository->latest()->paginate();

        return view('pages.machines.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.machines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateMachine $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('machines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$machine = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('pages.machines.show', compact('machine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!$machine = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        return view('pages.machines.edit', compact('machine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateMachine $request, string $id)
    {
        if (!$machine = $this->repository->find($id)) {
            return redirect()->back();
        }

        $machine->update($request->all());

        return redirect()->route('machines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$machine = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        $machine->delete();

        return redirect()->route('machines.index');
    }
}

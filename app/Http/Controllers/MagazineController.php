<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMagazine;
use App\Models\Machine;
use App\Models\Magazine;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $magazines = DB::table('magazines') // Serve para criar uma nova coluna chamada machine_name, fazendo a associação entre a Maquina e o Magazine
            ->join('machines', 'magazines.machine_id', '=', 'machines.id')
            ->select('magazines.*', 'machines.name as machine_name')
            ->orderBy('created_at', 'desc')
            ->paginate(20);


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

        $positions = $request->position;
        
        for ($i=1; $i < ($positions+1) ; $i++) { 
            
            $magazine = new Magazine;
            $magazine->position = $i;
            $magazine->machine_id = $request->machine_id;
            $magazine->machine_name = $request->machine_name; // Adiciona o valor do campo machine_name
            $magazine->save();
        }
        $machine = Machine::find($request->machine_id);
        $machine->update([
            'has_magazine' => true,
        ]);

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
        // if (!$magazine = $this->repository->find($id)) {
        //     return redirect()->back();
        // }

        // return view('pages.magazines.edit', compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateMagazine $request, string $id)
    {
        // if (!$magazine = $this->repository->find($id)) {
        //     return redirect()->back();
        // }

        // $magazine->update($request->all());

        // return redirect()->route('magazines.index');
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
                                    $query->where('machine_name','LIKE',"%{$request->filter}%");
                                }
                            })
                            ->latest()
                            ->paginate();

        return view('pages.magazines.index', compact('magazines', 'filters'));
    }

    public function addTool(Tool $tool, string $id){

        if (!$magazine = $this->repository->find($id)) {
            return redirect()->back();
        }

        $tools = $tool->pluck('description');
        //dd($tools);

        return view('pages.magazines.addTool', compact(['tools', 'magazine']));

    }

    public function toolUpdate(StoreUpdateMagazine $request, string $id)
    {
        if (!$magazine = $this->repository->find($id)) {
            return redirect()->back();
        }

        $tool = Tool::where('description', $request->tool_name)->first();

        $magazine->update([
            'tool_id' => $tool->id,
            'position' => $request->position,
            'machine_id' => $request->machine_id,
            'tool_name' => $request->tool_name,
            'machine_name' => $request->machine_name, 
        ]);

        return redirect()->route('magazines.index');
    }
}

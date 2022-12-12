<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Deuda;
use Illuminate\Http\Request;

/**
 * Class DeudaController
 * @package App\Http\Controllers
 */
class DeudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deudas = Deuda::paginate();

        return view('deuda.index', compact('deudas'))
            ->with('i', (request()->input('page', 1) - 1) * $deudas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deuda = new Deuda();
        $clientes = Cliente::pluck('nombre', 'id');

        return view('deuda.create', compact('deuda', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Deuda::$rules);

        $deuda = Deuda::create($request->all());

        return redirect()->route('deudas.index')
            ->with('success', 'Deuda Guardada Correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deuda = Deuda::find($id);

        return view('deuda.show', compact('deuda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deuda = Deuda::find($id);
        $clientes = Cliente::pluck('nombre', 'id');
        return view('deuda.edit', compact('deuda', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Deuda $deuda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deuda $deuda)
    {


        $deuda->update($request->all());

        if($request->abono > 0){
            $deuda->adeudo = $deuda->adeudo - $deuda->abono;
        }

        if($request->abono < 0){
            Deuda::where('id','=',$request->id)->delete();
        }

        $deuda->save();
        return redirect()->route('deudas.index')
            ->with('success', 'Abono Agregado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $deuda = Deuda::find($id)->delete();

        return redirect()->route('deudas.index')
            ->with('success', 'Deuda Saldada');
    }
}

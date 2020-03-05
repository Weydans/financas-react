<?php

namespace App\Http\Controllers\Api;

use App\Api\Movimentacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    private $movimentacao;

    public function __construct()
    {
        $this->movimentacao = new Movimentacao();
    }

    public function getSummary()
    {
        return response()->json($this->movimentacao->getSummary()[0]);
    }

    public function income()
    {
        return response()->json($this->movimentacao->where('classe_id', 1)->get());
    }

    public function detail($id)
    {
        return response()->json($this->movimentacao->where('id', $id)->where('classe_id', 1)->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

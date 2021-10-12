<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Traits\ApiResponser;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class InstituicaoController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $fileReader = Arquivo::leArquivo('instituicoes.json');
            return $this->getReponser($fileReader);
        } catch (FileNotFoundException $th) {
            return $this->error('Arquivo \'instituicoes.json\' não encontrado.', 404);
        }
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
}

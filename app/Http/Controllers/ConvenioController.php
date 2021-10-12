<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Traits\ApiResponser;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class ConvenioController extends Controller
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
            $fileReader = Arquivo::leArquivo('convenios.json');
            return $this->getReponser($fileReader);
        } catch (FileNotFoundException $th) {
            return $this->error('Arquivo \'convenios.json\' não encontrado.', 404);
        }
    }

}

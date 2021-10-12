<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Arquivo;
use App\Models\Filtro;
use App\Traits\ApiResponser;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SimuladorController extends Controller
{
    use ApiResponser;

    /**
     * Função responsável por receber o request da simulação e
     * retornar o arquivo json correspondente
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function simulador(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'valor_emprestimo' => 'required|numeric|min:1',
                'instituicoes' => 'array',
                'convenios' => 'array',
                'parcela' => 'numeric|min:1',
            ]);
            if ($validator->fails()) {
                return $this->error(
                    $validator->errors(),
                    400
                );
            }
            $arrayTaxas = Filtro::filtrarTaxas(Arquivo::leArquivo('taxas_instituicoes.json'), $request->all());
            $arrayInstituicoes = Helper::preparaArrayInstituicao(Filtro::filtraInstituicoes(Arquivo::leArquivo('instituicoes.json'), is_null($request->input('instituicoes')) ? array() : $request->input('instituicoes')));
            return $this->success($arrayTaxas, $arrayInstituicoes, $request->all());
        } catch (FileNotFoundException $th) {
            return $this->error('Arquivo \'taxas_instituicoes.json\' não encontrado.', 404);
        }

    }
}

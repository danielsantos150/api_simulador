<?php

namespace App\Traits;

trait ApiResponser
{
	/**
     * Função responsável por formatar e retornar um JSON de acordo com
     * o formato desejado (Ponto 6(c) do PDF)
     *
     * @param  array  $arrayTaxas
     * @param  array  $arrayInstituicoes
     * @param  array  $requestInputs
     * @return \Illuminate\Http\JsonResponse
     */
	protected function success(array $arrayTaxas, array $arrayInstituicoes, array $requestInputs)
	{
		$arrayRetorno = $arrayInstituicoes;
        foreach ($arrayInstituicoes as $key => $instituicao) {
            foreach ($arrayTaxas as $taxa) {
                if($key == $taxa["instituicao"]){
                    array_push($arrayRetorno[$key],
                        [
                            'taxa' => $taxa["taxaJuros"],
                            'parcelas' => $taxa["parcelas"],
                            'valor_parcela' => round($requestInputs["valor_emprestimo"] * $taxa["coeficiente"], 2),
                            'convenio' => $taxa["convenio"],
                        ]
                    );
                }
            }
        }
        return response()->json($arrayRetorno);
	}

    /**
     * Função responsável por retornar um JSON de acordo com
     * o formato desejado (Ponto 4(c) e 5(c) do PDF)
     *
     * @param  array  $jsonDecoded
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getReponser(array $jsonDecoded)
    {
        $array = array();
        foreach ($jsonDecoded as $value) {
            array_push($array, [
                'chave' => $value["chave"],
                'valor' => $value["valor"]
                ]
            );
        }
        return response()->json($array);
    }

	/**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
	protected function error(string $message = null, int $code)
	{
		return response()->json([
            'code' => $code,
			'status' => 'Error',
			'message' => $message
		], $code);
	}

}

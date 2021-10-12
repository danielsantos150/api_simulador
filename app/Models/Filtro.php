<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    use HasFactory;

    /**
     * Função responsável por filtrar as instituições de acordo com o corpo
     * da requisição
     *
     * @param  array $taxas
     * @param  array $instituicoes
     * @return array
     */
    public static function filtraInstituicoes(array $taxas, array $instituicoes)
    {
        if(empty($instituicoes)){
            return $taxas;
        }
        $arrayFiltrado = array();
        foreach ($taxas as $keyTaxa => $taxa) {
            foreach ($instituicoes as $instituicao) {
                if($taxa["chave"] == $instituicao){
                    array_push($arrayFiltrado, $taxa);
                }
            }
        }
        ksort($arrayFiltrado);
        return $arrayFiltrado;
    }

    /**
     * Função responsável por realizar o filtro de convênios e parcela,
     * caso sejam informadas na requisição
     *
     * @param  array $taxas
     * @param  array $arrayInputs
     * @return array
     */
    public static function filtrarTaxas(array $taxas, array $arrayInputs)
    {
        if(empty($arrayInputs)){
            return $taxas;
        }
        $arrayFiltrado = $arrayRetorno = array();
        foreach ($taxas as $keyTaxa => $taxa) {
            array_push($arrayFiltrado, self::filtraConvenios($taxa, $arrayInputs));
        }
        ksort($arrayFiltrado);

        if(isset($arrayInputs["parcela"])){
            foreach (array_filter($arrayFiltrado) as $filtrado) {
                if($filtrado["parcelas"] == $arrayInputs["parcela"]){
                    array_push($arrayRetorno, ($filtrado));
                }
            }
            return $arrayRetorno;
        }
        return $arrayFiltrado;
    }

    /**
     * Função responsável por filtrar os convênios conforme passados
     * no corpo da requisição
     *
     * @param  array $taxa
     * @param  array $inputs
     * @return array
     */
    public static function filtraConvenios(array $taxa, array $inputs)
    {
        if(!isset($inputs["convenios"]) && empty($inputs["convenios"])){
            return $taxa;
        }
        foreach ($inputs["convenios"] as $convenio) {
            if($taxa["convenio"] === $convenio){
                return $taxa;
            }
        }
    }
}

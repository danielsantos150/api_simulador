<?php

namespace App\Helpers;

class Helper
{
    /**
     * Retorna um array com as chaves sendo as instituições do arquivo lido
     *
     * @param  array $arrayInstituicoes
     * @return array
     */
    public static function preparaArrayInstituicao(array $arrayInstituicoes) : array
    {
        $arrayFormatado = array();
        foreach ($arrayInstituicoes as $instituicao) {
            $arrayFormatado[$instituicao["chave"]] = [];
        }
        ksort($arrayFormatado);
        return $arrayFormatado;
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Arquivo extends Model
{
    use HasFactory;

    /**
     * Função responsável por realizar a leitura do arquivo JSON
     * e retornar os seus respectivos valores em um array
     *
     * @param  string $nomeArquivo
     * @return array
     */
    public static function leArquivo(string $nomeArquivo)
    {
        try {
            $json = Storage::disk('local')->get($nomeArquivo);
            return json_decode($json, true);
        } catch (FileNotFoundException $th) {
            throw $th;
        }
    }
}

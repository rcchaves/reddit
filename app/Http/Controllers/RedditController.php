<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Reddit;
use DB;

class RedditController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('atributos')) {
            $valores = $request->atributos;
            if ($valores == 'ups' or $valores == 'coments' or ($valores == 'coments, ups' or $valores == 'ups, coments')) {
                $params = $valores . ' desc';
                $autores = DB::table('reddit')
                    ->orderByRaw($params)
                    ->get();
                foreach ($autores as $autor) {
                    $ato = $autor->autor;
                    echo '<li>' . $ato . '</li>';
                }
            } else {
                return 'Somente parametro ups ou coments';
            }
        } else {
            return 'passe algum paramentro';
        }
    }

    public function update(Request $request)
    {
        $regras = [
            'inicio' => 'required|date_format:d/m/Y',
            'fim'    => 'required|date_format:d/m/Y',
            'filtro' => 'required|max:7'
        ];
        $fededback = [
            'required' => 'O campo :attribute é obrigatório',
            'date_formate' => 'Digite o padrão DD/MM/AAAA',
            'max' => 'No maximo sete caracteres'
        ];
        $request->validate($regras, $fededback);
        $inicio =  date('Y/m/d', strtotime($request->inicio));
        $fim =  date('Y/m/d', strtotime($request->fim));
        $filtro = $request->filtro;
        if ($filtro == 'ups' or  $filtro == 'coments') {
            $dias = DB::table('reddit')
                ->whereBetween('data', [$inicio, $fim])
                ->orderBy($filtro, 'desc')
                ->get();

            foreach ($dias as $dia) {
                $id    =  $dia->id;
                $titulo =  $dia->titulo;
                $autor  =  $dia->autor;
                $ups    =  $dia->ups;
                $coments = $dia->coments;
                $data   =  $dia->data;

                echo "<li>
        <strong>Data:</strong> $data<br>
        <strong>Titulo:</strong> $titulo<br>
        <strong>Autor:</strong> $autor<br>
        <strong>Curtidas:</strong> $ups<br>
        <strong>Comentarios:</strong> $coments<br>
        <strong>ID:</strong> $id<br><br>
        </li>";
            }
        }
    }
}

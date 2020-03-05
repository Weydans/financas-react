<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movimentacao extends Model
{
    protected $table = 'movimentacao';

    public function getSummary()
    {
        $movimentacoes = DB::select('
            select 
                sum(
                    case when classe_id = 1 then value else 0 end
                ) as credit, 
                sum(
                    case when classe_id = 2 then value else 0 end
                ) as debit 
            from movimentacao
        ');
    
        return $movimentacoes;
    }
}

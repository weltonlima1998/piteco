<?php

namespace App\Console\Commands;

use App\Http\Controllers\EntradaController;
use App\Models\DespesaFixa;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use PhpParser\Node\Expr\New_;

class InserirDespesasFixas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inserir-despesas-fixas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insere despesas fixa no primeiro dia de cada mês';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = App::make(EntradaController::class);
        $resulto = $controller->inserirDespesasFixas();
        $this->info($resulto);
    }
}

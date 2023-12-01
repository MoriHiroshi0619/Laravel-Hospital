<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class uptadeCargos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateCargos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updtades tables RECEPCIONISTA, ADMIN with each foreign key from FUNCIONARIO';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sql1 = "SELECT CreateRecepcionistaFromFuncionario();";
        $sql2 = "SELECT CreateAdminFromFuncionario();";
        $sql3 = "SELECT CreateEnfermeiraFromFuncionario();";
        $sql4 = "SELECT CreateMedicoFromFuncionario();";
        $sql5 = "SELECT CreateAdministrativoFromFuncionario();";
        try {
            DB::statement($sql1);
            DB::statement($sql2);
            DB::statement($sql3);
            DB::statement($sql4);
            DB::statement($sql5);
            $this->info('Procedure executed successfully!');
        } catch (\Exception $e) {
            $this->error('Error executing procedure: ' . $e->getMessage());
        }
    
    }
}

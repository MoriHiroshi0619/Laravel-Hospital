<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Hash;


class UpdatePasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'passwords:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update existing passwords to use Bcrypt algorithm';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $funcionarios = Funcionario::all();

        foreach ($funcionarios as $funcionario) {
            $funcionario->update([
                'senha' => Hash::make($funcionario->senha)
            ]);
        }

        $this->info('Passwords updated successfully.');

    }
}

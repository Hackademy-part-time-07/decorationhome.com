<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rapido:makeUserRevisor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asigna el rol de revisor a un usuario';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('Ingrese el correo del usuario:');
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error('No se encontró ningún usuario con el correo proporcionado.');
            return;
        }

        $user->is_revisor = true;
        $user->save();

        $this->info('Se ha habilitado al usuario como revisor correctamente.');
    }
}

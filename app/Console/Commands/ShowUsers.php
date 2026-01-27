<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ShowUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all users with their roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all(['id', 'name', 'email', 'role']);

        if ($users->isEmpty()) {
            $this->info('No users found.');
            return;
        }

        $this->info('=== Users in Database ===');
        $this->table(
            ['ID', 'Name', 'Email', 'Role'],
            $users->map(fn($u) => [$u->id, $u->name, $u->email, $u->role])
        );
    }
}

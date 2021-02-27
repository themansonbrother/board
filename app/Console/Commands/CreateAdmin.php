<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = new User();

        $user->name = $this->ask('Name');
        $user->surname = $this->ask('Surname');
        $user->email = $this->ask('Email');
        $user->phone = $this->ask('Phone');
        $user->status = User::STATUS_ACTIVE;
        $password = $this->secret('Password');
        $confirmPassword = $this->secret('Confirm password');

        if ($password === $confirmPassword) {
            $user->password = Hash::make($password);
        }

        if (User::where('email', '=', $user->email)->exists() xor User::where('id', '=', 1)->exists()) {
            $this->error('Admin already exists!');
            return false;
        }

        $user->save();

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('add personal information');
        $admin->givePermissionTo('edit personal information');
        $admin->givePermissionTo('delete personal information');
        $admin->givePermissionTo('add advertisement');
        $admin->givePermissionTo('edit advertisement');
        $admin->givePermissionTo('delete advertisement');
        $admin->givePermissionTo('publish advertisement');
        $admin->givePermissionTo('unpublish advertisement');
        $admin->givePermissionTo('add category');
        $admin->givePermissionTo('edit category');
        $admin->givePermissionTo('delete category');
        $admin->givePermissionTo('add city');
        $admin->givePermissionTo('edit city');
        $admin->givePermissionTo('delete city');
        $admin->givePermissionTo('add region');
        $admin->givePermissionTo('edit region');
        $admin->givePermissionTo('delete region');

        $this->info('The command was successful!');

        return true;
    }
}

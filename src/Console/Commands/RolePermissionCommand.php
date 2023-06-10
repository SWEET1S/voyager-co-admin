<?php

namespace Sweet1s\VoyagerCoAdmin\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Command\Command as CommandAlias;

class RolePermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'co-admin:role-permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up permissions for each role to be able to flexibly manage role permissions in the future.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {

            $role = DB::table('roles')->first();

            $ask = $this->ask("Please provide a role ID with all rights. ( Default: For first role in table roles is [$role->name] with ID [$role->id] )");
            $roleID = $ask ?? DB::table('roles')->first()->id;

            $roles = DB::table('roles')->get();

            foreach ($roles as $role) {
                $permID = DB::table('permissions')->insertGetId(
                    [
                        "key" => "can_give_{$role->name}",
                        "table_name" => "can_give",
                    ]
                );

                DB::table('permission_role')->insert(
                    [
                        "permission_id" => $permID,
                        "role_id" => $roleID
                    ]
                );
            }
        } catch (\Throwable $th) {

            $this->error('Something went wrong!');
            $this->error($th->getMessage());

            return CommandAlias::FAILURE;

        }

        $this->info('Successfully! The role permissions have been set up. You can now manage the role permissions in the future.');
        return CommandAlias::SUCCESS;
    }
}

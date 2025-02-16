<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            'manage-users',

            'view-authors',
            'create-authors',
            'edit-authors',
            'delete-authors',
            'restore-authors',

            'view-genres',
            'create-genres',
            'edit-genres',
            'delete-genres',
            'restore-genres',

            'view-titles',
            'create-titles',
            'edit-titles',
            'delete-titles',
            'restore-titles',

            'view-book-statuses',
            'create-book-statuses',
            'edit-book-statuses',
            'delete-book-statuses',
            'restore-book-statuses',

            'view-book-conditions',
            'create-book-conditions',
            'edit-book-conditions',
            'delete-book-conditions',
            'restore-book-conditions',

            'view-locations',
            'create-locations',
            'edit-locations',
            'delete-locations',
            'restore-locations',

            'view-books',
            'create-books',
            'edit-books',
            'delete-books',
            'restore-books',

            'view-loan-prices',
            'create-loan-prices',
            'edit-loan-prices',
            'delete-loan-prices',
            'restore-loan-prices',

            'view-loans',
            'view-all-loans',
            'create-loans',
            'edit-loans',
            'delete-loans',
            'restore-loans',
            'force-delete-loans'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles = [
            'admin' => Role::firstOrCreate(['name' => 'admin']),
            'librarian' => Role::firstOrCreate(['name' => 'librarian']),
            'patron' => Role::firstOrCreate(['name' => 'patron'])
        ];


        $roles['admin']->syncPermissions($permissions);
        $roles['librarian']->syncPermissions([
            'view-authors',
            'create-authors',
            'edit-authors',
            'delete-authors',
            'restore-authors',

            'view-genres',
            'create-genres',
            'edit-genres',
            'delete-genres',
            'restore-genres',

            'view-titles',
            'create-titles',
            'edit-titles',
            'delete-titles',
            'restore-titles',

            'view-book-statuses',
            'create-book-statuses',
            'edit-book-statuses',
            'delete-book-statuses',
            'restore-book-statuses',

            'view-book-conditions',
            'create-book-conditions',
            'edit-book-conditions',
            'delete-book-conditions',
            'restore-book-conditions',

            'view-locations',
            'create-locations',
            'edit-locations',
            'delete-locations',
            'restore-locations',

            'view-books',
            'create-books',
            'edit-books',
            'delete-books',
            'restore-books',

            'view-loan-prices',
            'create-loan-prices',
            'edit-loan-prices',
            'delete-loan-prices',
            'restore-loan-prices',

            'view-loans',
            'view-all-loans',
            'create-loans',
            'edit-loans',
            'delete-loans',
            'restore-loans',
            'force-delete-loans'
        ]);

        $roles['patron']->syncPermissions([
            'view-authors',
            'view-genres',
            'view-titles',
            'view-books',
            'view-loans',
            'create-loans'
        ]);
    }
}

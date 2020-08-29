<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();
      	DB::table('permission_role')->truncate();
        /*     permission table insert    */
        /*    role permission */

        $role_view = new Permission(); // 1
        $role_view->name = 'user-role-view';
        $role_view->display_name = 'Display Role Listing';
        $role_view->description = 'See only Listing Of Role';
        $role_view->created_by = 1;
        $role_view->save();

        $role_create = new Permission(); // 2
        $role_create->name = 'user-role-create';
        $role_create->display_name = 'Create Role';
        $role_create->description = 'Create New Role';
        $role_create->created_by = 1;
        $role_create->save();

        $role_edit = new Permission(); // 3
        $role_edit->name = 'user-role-edit';
        $role_edit->display_name = 'Edit Role';
        $role_edit->description = 'Edit Role';
        $role_edit->created_by = 1;
        $role_edit->save();

        $role_delete = new Permission(); // 4
        $role_delete->name = 'user-role-delete';
        $role_delete->display_name = 'Delete Role';
        $role_delete->description = 'Delete Role';
        $role_delete->created_by = 1;
        $role_delete->save();

        $role_status = new Permission(); // 5
        $role_status->name = 'user-role-status';
        $role_status->display_name = 'Delete Status';
        $role_status->description = 'Delete Status';
        $role_status->created_by = 1;
        $role_status->save();

        /*    project permission */

        $permission_view = new Permission(); // 1
        $permission_view->name = 'user-permission-view';
        $permission_view->display_name = 'Display Permission Listing';
        $permission_view->description = 'See only Listing Of Permission';
        $permission_view->created_by = 1;
        $permission_view->save();

        $permission_create = new Permission(); // 2
        $permission_create->name = 'user-permission-create';
        $permission_create->display_name = 'Create Permission';
        $permission_create->description = 'Create New Permission';
        $permission_create->created_by = 1;
        $permission_create->save();

        $permission_edit = new Permission(); // 3
        $permission_edit->name = 'user-permission-edit';
        $permission_edit->display_name = 'Edit Permission';
        $permission_edit->description = 'Edit Permission';
        $permission_edit->created_by = 1;
        $permission_edit->save();

        $permission_delete = new Permission(); // 4
        $permission_delete->name = 'user-permission-delete';
        $permission_delete->display_name = 'Delete Permission';
        $permission_delete->description = 'Delete Permission';
        $permission_delete->created_by = 1;
        $permission_delete->save();

        $permission_status = new Permission(); // 5
        $permission_status->name = 'user-permission-status';
        $permission_status->display_name = 'Permission Status';
        $permission_status->description = 'Permission Status';
        $permission_status->created_by = 1;
        $permission_status->save();


        /*    project user */

        $user_view = new Permission(); // 1
        $user_view->name = 'user-user-view';
        $user_view->display_name = 'Display User Listing';
        $user_view->description = 'See only Listing Of User';
        $user_view->created_by = 1;
        $user_view->save();

        $user_create = new Permission(); // 2
        $user_create->name = 'user-user-create';
        $user_create->display_name = 'Create User';
        $user_create->description = 'Create New User';
        $user_create->created_by = 1;
        $user_create->save();

        $user_edit = new Permission(); // 3
        $user_edit->name = 'user-user-edit';
        $user_edit->display_name = 'Edit User';
        $user_edit->description = 'Edit User';
        $user_edit->created_by = 1;
        $user_edit->save();

        $user_delete = new Permission(); // 4
        $user_delete->name = 'user-user-delete';
        $user_delete->display_name = 'Delete User';
        $user_delete->description = 'Delete User';
        $user_delete->created_by = 1;
        $user_delete->save();

        $user_status = new Permission(); // 5
        $user_status->name = 'user-user-status';
        $user_status->display_name = 'User Status';
        $user_status->description = 'User Status';
        $user_status->created_by = 1;
        $user_status->save();

        /*     permission role user insert     */

        $super_admin = Role::where('name', '=', 'super-admin')->first();
        $super_admin->attachPermissions([
                              $role_view, 
                              $role_create, 
                              $role_edit,
                              $role_delete,
                              $role_status,
                              $permission_view,
                              $permission_create,
                              $permission_edit,
                              $permission_delete,
                              $permission_status,
                              $user_view,
                              $user_create,
                              $user_edit,
                              $user_delete,
                              $user_status
                          ]);

        $super_editor = Role::where('name', '=', 'super-editor')->first();
        $super_editor->attachPermissions([
                              $permission_view,
                              $permission_edit,
                              $user_view,
                              $user_edit
                          ]);

        $admin = Role::where('name', '=', 'admin')->first();
        $admin->attachPermissions([
                              $permission_view,
                              $user_view,
                              $user_create,
                              $user_edit
                          ]);

        $editor = Role::where('name', '=', 'editor')->first();
        $editor->attachPermissions([
                              $permission_view,
                              $user_view
                          ]);

        // $cash = Role::where('name', '=', 'cash')->first();
        // $cash->attachPermissions([
        //                       $permission_view,
        //                       $permission_create,
        //                       $permission_edit
        //                   ]);
    }
}

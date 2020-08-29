<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
    	DB::table('role_user')->truncate();

    	/*   role create    */

    	$super_admin = new Role(); // 1
		$super_admin->name = 'super-admin';
		$super_admin->display_name = 'Super Admin';
		$super_admin->description = 'All controll of application';
		$super_admin->created_by = 1;
		$super_admin->save();

		$super_editor = new Role(); // 2
		$super_editor->name = 'super-editor';
		$super_editor->display_name = 'Super Editor';
		$super_editor->description = 'All manage of application';
		$super_editor->created_by = 1;
		$super_editor->save();

		$admin = new Role(); // 3
		$admin->name = 'admin';
		$admin->display_name = 'Admin';
		$admin->description = 'Self shop admin users';
		$admin->created_by = 1;
		$admin->save();

		$editor = new Role(); // 4
		$editor->name = 'editor';
		$editor->display_name = 'Editor';
		$editor->description = 'Self shop manage users';
		$editor->created_by = 1;
		$editor->save();

		$class_teacher = new Role(); // 5
		$class_teacher->name = 'class-teacher';
		$class_teacher->display_name = 'Class Teacher';
		$class_teacher->description = 'Class offer mange of application';
		$class_teacher->created_by = 1;
		$class_teacher->save();

		$teacher = new Role(); // 6
		$teacher->name = 'teacher';
		$teacher->display_name = 'Teacher';
		$teacher->description = 'Self class mange of application';
		$teacher->created_by = 1;
		$teacher->save();

		$student = new Role(); // 7
		$student->name = 'student';
		$student->display_name = 'Student';
		$student->description = '';
		$student->created_by = 1;
		$student->save();

		$guardian = new Role(); // 8
		$guardian->name = 'guardian';
		$guardian->display_name = 'Guardian';
		$guardian->description = '';
		$guardian->created_by = 1;
		$guardian->save();

		$governing_body = new Role(); // 9
		$governing_body->name = 'governing-body';
		$governing_body->display_name = 'Governing Body';
		$governing_body->description = '';
		$governing_body->created_by = 1;
		$governing_body->save();

		$account = new Role(); // 10
		$account->name = 'account';
		$account->display_name = 'Account';
		$account->description = '';
		$account->created_by = 1;
		$account->save();

		$head_librarian = new Role(); // 11
		$head_librarian->name = 'head-librarian';
		$head_librarian->display_name = 'Head Librarian';
		$head_librarian->description = '';
		$head_librarian->created_by = 1;
		$head_librarian->save();

		$librarian = new Role(); // 12
		$librarian->name = 'librarian';
		$librarian->display_name = 'Librarian';
		$librarian->description = '';
		$librarian->created_by = 1;
		$librarian->save();

		$hostel_manager = new Role(); // 13
		$hostel_manager->name = 'hostel-manager';
		$hostel_manager->display_name = 'Hostel Manager';
		$hostel_manager->description = '';
		$hostel_manager->created_by = 1;
		$hostel_manager->save();

		$inventory_manager = new Role(); // 14
		$inventory_manager->name = 'inventory-manager';
		$inventory_manager->display_name = 'Inventory Manager';
		$inventory_manager->description = '';
		$inventory_manager->created_by = 1;
		$inventory_manager->save();

		/*    role_user  create     */

		$sa_user = User::where('email', '=', 'superadmin@gmail.com')->first();
		$sa_user->attachRole($super_admin);

		$se_user = User::where('email', '=', 'supereditor@gmail.com')->first();
		$se_user->roles()->attach($super_editor->id); //Eloquent basic
    }
}

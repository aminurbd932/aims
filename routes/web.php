<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function ()
{
	Route::get('/dashboard', 'Admin\DashboardController@index');

	/*             config               */
	Route::get('/config', 'Admin\Setup\ConfigController@index');
	Route::post('/update-config', 'Admin\Setup\ConfigController@update');
	/*              customer             */
	Route::get('/customer', 'Admin\Setup\CustomerController@index');
	Route::get('/add-customer', 'Admin\Setup\CustomerController@create');
	Route::post('/save-customer', 'Admin\Setup\CustomerController@store');
	Route::get('/edit-customer/{id}', 'Admin\Setup\CustomerController@edit');
	Route::post('/update-customer/{id}', 'Admin\Setup\CustomerController@update');
	Route::post('/inactive-customer/{id}', 'Admin\Setup\CustomerController@inactiveStatus');
	Route::post('/active-customer/{id}', 'Admin\Setup\CustomerController@activeStatus');
	Route::post('/view-customer/{id}', 'Admin\Setup\CustomerController@show');
	Route::post('/delete-customer/{id}', 'Admin\Setup\CustomerController@destroy');

	/*              supplier             */
	Route::get('/supplier', 'Admin\Setup\SupplierController@index');
	Route::get('/add-supplier', 'Admin\Setup\SupplierController@create');
	Route::post('/save-supplier', 'Admin\Setup\SupplierController@store');
	Route::get('/edit-supplier/{id}', 'Admin\Setup\SupplierController@edit');
	Route::post('/update-supplier/{id}', 'Admin\Setup\SupplierController@update');
	Route::post('/inactive-supplier/{id}', 'Admin\Setup\SupplierController@inactiveStatus');
	Route::post('/active-supplier/{id}', 'Admin\Setup\SupplierController@activeStatus');
	Route::post('/view-supplier/{id}', 'Admin\Setup\SupplierController@show');
	Route::post('/delete-supplier/{id}', 'Admin\Setup\SupplierController@destroy');

	/*            category         */
	Route::get('/category', 'Admin\Setup\CategoryController@index');
	Route::get('/add-category', 'Admin\Setup\CategoryController@create');
	Route::post('/save-category', 'Admin\Setup\CategoryController@store');
	Route::get('/edit-category/{id}', 'Admin\Setup\CategoryController@edit');
	Route::post('/update-category/{id}', 'Admin\Setup\CategoryController@update');
	Route::post('/inactive-category/{id}', 'Admin\Setup\CategoryController@inactiveStatus');
	Route::post('/active-category/{id}', 'Admin\Setup\CategoryController@activeStatus');
	Route::post('/delete-category/{id}', 'Admin\Setup\CategoryController@destroy');

	/*            rake         */
	Route::get('/rake', 'Admin\Setup\RakeController@index');
	Route::get('/add-rake', 'Admin\Setup\RakeController@create');
	Route::post('/save-rake', 'Admin\Setup\RakeController@store');
	Route::get('/edit-rake/{id}', 'Admin\Setup\RakeController@edit');
	Route::post('/update-rake/{id}', 'Admin\Setup\RakeController@update');
	Route::post('/inactive-rake/{id}', 'Admin\Setup\RakeController@inactiveStatus');
	Route::post('/active-rake/{id}', 'Admin\Setup\RakeController@activeStatus');
	Route::post('/delete-rake/{id}', 'Admin\Setup\RakeController@destroy');

	/*            generic product         */
	Route::get('/generic-product', 'Admin\Setup\GenericProductController@index');
	Route::get('/add-generic-product', 'Admin\Setup\GenericProductController@create');
	Route::post('/save-generic-product', 'Admin\Setup\GenericProductController@store');
	Route::get('/edit-generic-product/{id}', 'Admin\Setup\GenericProductController@edit');
	Route::post('/update-generic-product/{id}', 'Admin\Setup\GenericProductController@update');
	Route::post('/inactive-generic-product/{id}', 'Admin\Setup\GenericProductController@inactiveStatus');
	Route::post('/active-generic-product/{id}', 'Admin\Setup\GenericProductController@activeStatus');
	Route::post('/delete-generic-product/{id}', 'Admin\Setup\GenericProductController@destroy');

	/*           shift         */
	Route::get('/shift', 'Admin\Setup\ShiftController@index');
	Route::get('/add-shift', 'Admin\Setup\ShiftController@create');
	Route::post('/save-shift', 'Admin\Setup\ShiftController@store');
	Route::get('/edit-shift/{id}', 'Admin\Setup\ShiftController@edit');
	Route::post('/update-shift/{id}', 'Admin\Setup\ShiftController@update');
	Route::post('/inactive-shift/{id}', 'Admin\Setup\ShiftController@inactiveStatus');
	Route::post('/active-shift/{id}', 'Admin\Setup\ShiftController@activeStatus');
	Route::post('/view-shift/{id}', 'Admin\Setup\ShiftController@show');
	Route::post('/delete-shift/{id}', 'Admin\Setup\ShiftController@destroy');

	/*           medium         */
	Route::get('/medium', 'Admin\Setup\MediumController@index');
	Route::get('/add-medium', 'Admin\Setup\MediumController@create');
	Route::post('/save-medium', 'Admin\Setup\MediumController@store');
	Route::get('/edit-medium/{id}', 'Admin\Setup\MediumController@edit');
	Route::post('/update-medium/{id}', 'Admin\Setup\MediumController@update');
	Route::post('/inactive-medium/{id}', 'Admin\Setup\MediumController@inactiveStatus');
	Route::post('/active-medium/{id}', 'Admin\Setup\MediumController@activeStatus');
	Route::post('/view-medium/{id}', 'Admin\Setup\MediumController@show');
	Route::post('/delete-medium/{id}', 'Admin\Setup\MediumController@destroy');

	/*           group         */
	Route::get('/group', 'Admin\Setup\GroupController@index');
	Route::get('/add-group', 'Admin\Setup\GroupController@create');
	Route::post('/save-group', 'Admin\Setup\GroupController@store');
	Route::get('/edit-group/{id}', 'Admin\Setup\GroupController@edit');
	Route::post('/update-group/{id}', 'Admin\Setup\GroupController@update');
	Route::post('/inactive-group/{id}', 'Admin\Setup\GroupController@inactiveStatus');
	Route::post('/active-group/{id}', 'Admin\Setup\GroupController@activeStatus');
	Route::post('/view-group/{id}', 'Admin\Setup\GroupController@show');
	Route::post('/delete-group/{id}', 'Admin\Setup\GroupController@destroy');

	/*            class level               */

	Route::get('/class-level', 'Admin\Setup\ClasslevelController@index');
	Route::get('/add-classlevel', 'Admin\Setup\ClasslevelController@create');
	Route::post('/save-classlevel', 'Admin\Setup\ClasslevelController@store');
	Route::get('/edit-classlevel/{id}', 'Admin\Setup\ClasslevelController@edit');
	Route::post('/update-classlevel/{id}', 'Admin\Setup\ClasslevelController@update');
	Route::post('/inactive-classlevel/{id}', 'Admin\Setup\ClasslevelController@inactiveStatus');
	Route::post('/active-classlevel/{id}', 'Admin\Setup\ClasslevelController@activeStatus');
	Route::post('/delete-classlevel/{id}', 'Admin\Setup\ClasslevelController@destroy');

	/*            class level               */

	Route::get('/class-level', 'Admin\Setup\ClasslevelController@index');
	Route::get('/add-class-level', 'Admin\Setup\ClasslevelController@create');
	Route::post('/save-class-level', 'Admin\Setup\ClasslevelController@store');
	Route::get('/edit-class-level/{id}', 'Admin\Setup\ClasslevelController@edit');
	Route::post('/update-class-level/{id}', 'Admin\Setup\ClasslevelController@update');
	Route::post('/inactive-class-level/{id}', 'Admin\Setup\ClasslevelController@inactiveStatus');
	Route::post('/active-class-level/{id}', 'Admin\Setup\ClasslevelController@activeStatus');
	Route::post('/delete-class-level/{id}', 'Admin\Setup\ClasslevelController@destroy');

	/*            Designations               */

	Route::get('/designation', 'Admin\Setup\DesignationController@index');
	Route::get('/add-designation', 'Admin\Setup\DesignationController@create');
	Route::post('/save-designation', 'Admin\Setup\DesignationController@store');
	Route::get('/edit-designation/{id}', 'Admin\Setup\DesignationController@edit');
	Route::post('/update-designation/{id}', 'Admin\Setup\DesignationController@update');
	Route::post('/inactive-designation/{id}', 'Admin\Setup\DesignationController@inactiveStatus');
	Route::post('/active-designation/{id}', 'Admin\Setup\DesignationController@activeStatus');
	Route::post('/delete-designation/{id}', 'Admin\Setup\DesignationController@destroy');

	/*            Department                 */

	Route::get('/department', 'Admin\Setup\DepartmentController@index');
	Route::get('/add-department', 'Admin\Setup\DepartmentController@create');
	Route::post('/save-department', 'Admin\Setup\DepartmentController@store');
	Route::get('/edit-department/{id}', 'Admin\Setup\DepartmentController@edit');
	Route::post('/update-department/{id}', 'Admin\Setup\DepartmentController@update');
	Route::post('/inactive-department/{id}', 'Admin\Setup\DepartmentController@inactiveStatus');
	Route::post('/active-department/{id}', 'Admin\Setup\DepartmentController@activeStatus');
	Route::post('/delete-department/{id}', 'Admin\Setup\DepartmentController@destroy');


	/*            Program                 */

	Route::get('/program', 'Admin\Setup\ProgramController@index');
	Route::get('/add-program', 'Admin\Setup\ProgramController@create');
	Route::post('/save-program', 'Admin\Setup\ProgramController@store');
	Route::get('/edit-program/{id}', 'Admin\Setup\ProgramController@edit');
	Route::post('/update-program/{id}', 'Admin\Setup\ProgramController@update');
	Route::post('/inactive-program/{id}', 'Admin\Setup\ProgramController@inactiveStatus');
	Route::post('/active-program/{id}', 'Admin\Setup\ProgramController@activeStatus');
	Route::post('/delete-program/{id}', 'Admin\Setup\ProgramController@destroy');

	/*            section         */
	Route::get('/section', 'Admin\Setup\SectionController@index');
	Route::get('/add-section', 'Admin\Setup\SectionController@create');
	Route::post('/save-section', 'Admin\Setup\SectionController@store');
	Route::get('/edit-section/{id}', 'Admin\Setup\SectionController@edit');
	Route::post('/update-section/{id}', 'Admin\Setup\SectionController@update');
	Route::post('/inactive-section/{id}', 'Admin\Setup\SectionController@inactiveStatus');
	Route::post('/active-section/{id}', 'Admin\Setup\SectionController@activeStatus');
	Route::post('/delete-section/{id}', 'Admin\Setup\SectionController@destroy');

	/*            session         */
	Route::get('/session', 'Admin\Setup\SessionController@index');
	Route::get('/add-session', 'Admin\Setup\SessionController@create');
	Route::post('/save-session', 'Admin\Setup\SessionController@store');
	Route::get('/edit-session/{id}', 'Admin\Setup\SessionController@edit');
	Route::post('/update-session/{id}', 'Admin\Setup\SessionController@update');
	Route::post('/delete-session/{id}', 'Admin\Setup\SessionController@destroy');

	/*            Subject                 */

	Route::get('/subject', 'Admin\Setup\SubjectController@index');
	Route::get('/add-subject', 'Admin\Setup\SubjectController@create');
	Route::post('/save-subject', 'Admin\Setup\SubjectController@store');
	Route::get('/edit-subject/{id}', 'Admin\Setup\SubjectController@edit');
	Route::post('/update-subject/{id}', 'Admin\Setup\SubjectController@update');
	Route::post('/inactive-subject/{id}', 'Admin\Setup\SubjectController@inactiveStatus');
	Route::post('/active-subject/{id}', 'Admin\Setup\SubjectController@activeStatus');
	Route::post('/delete-subject/{id}', 'Admin\Setup\SubjectController@destroy');

	/*            Exam                 */

	Route::get('/exam', 'Admin\Setup\ExamController@index');
	Route::get('/add-exam', 'Admin\Setup\ExamController@create');
	Route::post('/save-exam', 'Admin\Setup\ExamController@store');
	Route::get('/edit-exam/{id}', 'Admin\Setup\ExamController@edit');
	Route::post('/update-exam/{id}', 'Admin\Setup\ExamController@update');
	Route::post('/inactive-exam/{id}', 'Admin\Setup\ExamController@inactiveStatus');
	Route::post('/active-exam/{id}', 'Admin\Setup\ExamController@activeStatus');
	Route::post('/delete-exam/{id}', 'Admin\Setup\ExamController@destroy');


	/*           Admission Exam  Subject             */

	Route::get('/admission-subject', 'Admin\Admission\SubjectController@index');
	Route::get('/add-admission-subject', 'Admin\Admission\SubjectController@create');
	Route::post('/save-admission-subject', 'Admin\Admission\SubjectController@store');
	Route::get('/edit-admission-subject/{id}', 'Admin\Admission\SubjectController@edit');
	Route::post('/update-admission-subject/{id}', 'Admin\Admission\SubjectController@update');
	Route::post('/inactive-admission-subject/{id}', 'Admin\Admission\SubjectController@inactiveStatus');
	Route::post('/active-admission-subject/{id}', 'Admin\Admission\SubjectController@activeStatus');
	Route::post('/delete-admission-subject/{id}', 'Admin\Admission\SubjectController@destroy');
	/*           Admission Offer             */

	Route::get('/admission-offer', 'Admin\Admission\AdmissionOfferController@index');
	Route::get('/add-admission-offer', 'Admin\Admission\AdmissionOfferController@create');
	Route::post('/save-admission-offer', 'Admin\Admission\AdmissionOfferController@store');
	Route::get('/edit-admission-offer/{id}', 'Admin\Admission\AdmissionOfferController@edit');
	Route::post('/view-admission-offer/{id}', 'Admin\Admission\AdmissionOfferController@show');
	Route::post('/update-admission-offer/{id}', 'Admin\Admission\AdmissionOfferController@update');
	Route::post('/inactive-admission-offer/{id}', 'Admin\Admission\AdmissionOfferController@inactiveStatus');
	Route::post('/active-admission-offer/{id}', 'Admin\Admission\AdmissionOfferController@activeStatus');
	Route::post('/delete-admission-offer/{id}', 'Admin\Admission\AdmissionOfferController@destroy');

	/*           Admission Exam             */
	
	Route::get('/admission-exam', 'Admin\Admission\AdmissionExamController@index');
	Route::get('/add-admission-exam', 'Admin\Admission\AdmissionExamController@create');
	Route::post('/save-admission-exam', 'Admin\Admission\AdmissionExamController@store');
	Route::get('/edit-admission-exam/{id}', 'Admin\Admission\AdmissionExamController@edit');
	Route::post('/view-admission-exam/{id}', 'Admin\Admission\AdmissionExamController@show');
	Route::post('/update-admission-exam/{id}', 'Admin\Admission\AdmissionExamController@update');
	Route::post('/inactive-admission-exam/{id}', 'Admin\Admission\AdmissionExamController@inactiveStatus');
	Route::post('/active-admission-exam/{id}', 'Admin\Admission\AdmissionExamController@activeStatus');
	Route::post('/delete-admission-exam/{id}', 'Admin\Admission\AdmissionExamController@destroy');

	/*           Program Offer             */

	Route::get('/program-offer', 'Admin\Program\ProgramOfferController@index');
	Route::get('/add-program-offer', 'Admin\Program\ProgramOfferController@create');
	Route::post('/save-program-offer', 'Admin\Program\ProgramOfferController@store');
	Route::get('/edit-program-offer/{id}', 'Admin\Program\ProgramOfferController@edit');
	Route::post('/view-program-offer/{id}', 'Admin\Program\ProgramOfferController@show');
	Route::post('/update-program-offer/{id}', 'Admin\Program\ProgramOfferController@update');
	Route::post('/inactive-program-offer/{id}', 'Admin\Program\ProgramOfferController@inactiveStatus');
	Route::post('/active-program-offer/{id}', 'Admin\Program\ProgramOfferController@activeStatus');
	Route::post('/delete-program-offer/{id}', 'Admin\Program\ProgramOfferController@destroy');
	/*           Applicant Registration             */

	Route::get('/applicant-registration', 'Admin\Admission\ApplicantRegistrationController@index');
	Route::get('/add-applicant-registration', 'Admin\Admission\ApplicantRegistrationController@create');
	Route::post('/save-applicant-registration', 'Admin\Admission\ApplicantRegistrationController@store');
	Route::get('/edit-applicant-registration/{id}', 'Admin\Admission\ApplicantRegistrationController@edit');
	Route::post('/view-applicant-registration/{id}', 'Admin\Admission\ApplicantRegistrationController@show');
	Route::post('/update-applicant-registration/{id}', 'Admin\Admission\ApplicantRegistrationController@update');
	Route::post('/delete-applicant-registration/{id}', 'Admin\Admission\ApplicantRegistrationController@destroy');


	/*           Admission Result Mark             */

	Route::get('/admission-mark', 'Admin\Admission\AdmissionResultMarkController@index');
	Route::get('/add-admission-mark', 'Admin\Admission\AdmissionResultMarkController@create');
	Route::post('/save-admission-mark', 'Admin\Admission\AdmissionResultMarkController@store');
	Route::get('/edit-admission-mark/{id}', 'Admin\Admission\AdmissionResultMarkController@edit');
	Route::post('/view-admission-mark/{id}', 'Admin\Admission\AdmissionResultMarkController@show');
	Route::post('/update-admission-mark/{id}', 'Admin\Admission\AdmissionResultMarkController@update');
	Route::post('/delete-admission-mark/{id}', 'Admin\Admission\AdmissionResultMarkController@destroy');
	Route::post('/search-admission-mark', 'Admin\Admission\AdmissionResultMarkController@search');

	/*           Admission Result Mark             */

	Route::get('/applicant-result', 'Admin\Admission\ApplicantResultController@index');
	Route::get('/add-applicant-result', 'Admin\Admission\ApplicantResultController@create');
	Route::post('/save-applicant-result', 'Admin\Admission\ApplicantResultController@store');
	Route::get('/edit-applicant-result/{id}', 'Admin\Admission\ApplicantResultController@edit');
	Route::post('/view-applicant-result/{id}', 'Admin\Admission\ApplicantResultController@show');
	Route::post('/update-applicant-result/{id}', 'Admin\Admission\ApplicantResultController@update');
	Route::post('/search-applicant-result', 'Admin\Admission\ApplicantResultController@search');


	/*           Applicant Registration             */

	Route::get('/teacher', 'Admin\Teacher\TeacherController@index');
	Route::get('/add-teacher', 'Admin\Teacher\TeacherController@create');
	Route::post('/save-teacher', 'Admin\Teacher\TeacherController@store');
	Route::get('/edit-teacher/{id}', 'Admin\Teacher\TeacherController@edit');
	Route::post('/view-teacher/{id}', 'Admin\Teacher\TeacherController@show');
	Route::post('/update-teacher/{id}', 'Admin\Teacher\TeacherController@update');
	Route::post('/delete-teacher/{id}', 'Admin\Teacher\TeacherController@destroy');

	/*           Subject Offer             */

	Route::get('/subject-offer', 'Admin\Subject\SubjectOfferController@index');
	Route::get('/add-subject-offer', 'Admin\Subject\SubjectOfferController@create');
	Route::post('/save-subject-offer', 'Admin\Subject\SubjectOfferController@store');
	Route::get('/edit-subject-offer/{id}', 'Admin\Subject\SubjectOfferController@edit');
	Route::post('/view-subject-offer/{id}', 'Admin\Subject\SubjectOfferController@show');
	Route::post('/update-subject-offer/{id}', 'Admin\Subject\SubjectOfferController@update');
	Route::post('/delete-subject-offer/{id}', 'Admin\Subject\SubjectOfferController@destroy');
	Route::post('/inactive-subject-offer/{id}', 'Admin\Subject\SubjectOfferController@inactiveStatus');
	Route::post('/active-subject-offer/{id}', 'Admin\Subject\SubjectOfferController@activeStatus');
	Route::post('/search-subject-offer', 'Admin\Subject\SubjectOfferController@search');

	/*           Merge Subject             */

	Route::get('/merge-subject', 'Admin\Subject\MergeSubjectController@index');
	Route::get('/add-merge-subject', 'Admin\Subject\MergeSubjectController@create');
	Route::post('/save-merge-subject', 'Admin\Subject\MergeSubjectController@store');
	Route::get('/edit-merge-subject/{id}', 'Admin\Subject\MergeSubjectController@edit');
	Route::post('/view-merge-subject/{id}', 'Admin\Subject\MergeSubjectController@show');
	Route::post('/update-merge-subject/{id}', 'Admin\Subject\MergeSubjectController@update');
	Route::post('/delete-merge-subject/{id}', 'Admin\Subject\MergeSubjectController@destroy');
	Route::post('/inactive-merge-subject/{id}', 'Admin\Subject\MergeSubjectController@inactiveStatus');
	Route::post('/active-merge-subject/{id}', 'Admin\Subject\MergeSubjectController@activeStatus');

	/*           student promotion             */

	Route::get('/student-promotion', 'Admin\Student\PromotionController@index');
	Route::get('/add-student-promotion', 'Admin\Student\PromotionController@create');
	Route::post('/save-student-promotion', 'Admin\Student\PromotionController@store');
	Route::get('/edit-student-promotion/{id}', 'Admin\Student\PromotionController@edit');
	Route::post('/view-student-promotion/{id}', 'Admin\Student\PromotionController@show');
	Route::post('/update-student-promotion/{id}', 'Admin\Student\PromotionController@update');
	Route::post('/delete-student-promotion/{id}', 'Admin\Student\PromotionController@destroy');
	Route::post('/search-promotion', 'Admin\Student\PromotionController@search');
	Route::post('/get_subject_offer_list', 'Admin\Student\PromotionController@getSubjectOfferList');

	/*            common            */
	Route::get('/getSubjectOfferListByProgramOfferId', 'Admin\CommonController@getSubjectOfferListByProgramOfferId');
	Route::get('/getProgramListByProgramLevelId', 'Admin\CommonController@getProgramListByProgramLevelId');

	/*               role        */
	Route::get('/role', 'Admin\User\RoleController@index');
	// Route::get('/role', ['middleware' => ['role:super-admin'], 'uses' => 'Admin\User\RoleController@index']);
	Route::get('/add-role', 'Admin\User\RoleController@create');
	Route::post('/save-role', 'Admin\User\RoleController@store');
	Route::get('/edit-role/{id}', 'Admin\User\RoleController@edit');
	Route::post('/update-role/{id}', 'Admin\User\RoleController@update');
	Route::post('/delete-role/{id}', 'Admin\User\RoleController@destroy');

	/*               permission        */
	Route::get('/permission', 'Admin\User\PermissionController@index');
	Route::get('/add-permission', 'Admin\User\PermissionController@create');
	Route::post('/save-permission', 'Admin\User\PermissionController@store');
	Route::get('/edit-permission/{id}', 'Admin\User\PermissionController@edit');
	Route::post('/update-permission/{id}', 'Admin\User\PermissionController@update');
	Route::post('/view-permission/{id}', 'Admin\User\PermissionController@show');
	Route::post('/delete-permission/{id}', 'Admin\User\PermissionController@destroy');

	/*                user         */
	Route::get('/user', 'Admin\User\UserController@index');
	Route::get('/add-user', 'Admin\User\UserController@create');
	Route::post('/save-user', 'Admin\User\UserController@store');
	Route::get('/edit-user/{id}', 'Admin\User\UserController@edit');
	Route::post('/update-user/{id}', 'Admin\User\UserController@update');
	Route::post('/inactive-user/{id}', 'Admin\User\UserController@inactiveStatus');
	Route::post('/active-user/{id}', 'Admin\User\UserController@activeStatus');
});

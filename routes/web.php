<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'LoginController@LoginPage')->name('login');
Route::get('/login-auth', 'LoginController@Auth')->name('login-auth');
Route::get('/logout', 'LoginController@LogOut')->name('logout-auth')->middleware('auth');
Route::get('/change-password', 'LoginController@ChangePasswordPage')->name('change-password')->middleware('auth');
Route::post('/change-password/change', 'LoginController@ChangePassword')->name('change-password-change')->middleware('auth');

Route::get('/profile', 'ProfileController@ProfilePage')->name('profile')->middleware('auth');
Route::get('/change-profile', 'ProfileController@ChangeProfilePage')->name('change-profile')->middleware('role:admin');
Route::post('/change-profile/change', 'ProfileController@ChangeProfile')->name('change-profile-change')->middleware('role:admin');


Route::get('/tests', 'TestController@TestPage')->name('test')->middleware('role:teacher');

Route::get('/tests/create', 'TestController@TestCreatePage')->name('test-create-page')->middleware('role:teacher');

Route::post('/tests/create/new-test', 'TestController@TestCreate')->name('test-create')->middleware('role:teacher');

Route::get('/tests/topics', 'TestController@TestTopicsGet')->name('test-topics-get');

Route::get('/tests/{id}', 'TestController@TestSingle')->name('test-single')->middleware('role:teacher');

Route::get('/testings', 'TestingController@TestingPage')->name('testing')->middleware('role:teacher,student');

Route::get('/testings/create', 'TestingController@TestingCreatePage')->name('testing-create-page')->middleware('role:teacher');

Route::get('/testings/create/new-testing', 'TestingController@TestingCreate')->name('testing-create')->middleware('role:teacher');

Route::get('/testings/groups', 'TestingController@TestingGetGroups')->name('testing-groups-get');

Route::get('/testings/subjects', 'TestingController@TestingGetSubjects')->name('testing-subjects-get');

Route::get('/testings/tests', 'TestingController@TestingGetTests')->name('testing-subjects-get');

Route::get('/groups', 'UserController@GroupPage')->name('group')->middleware('role:teacher');

Route::get('/subjects', 'SubjectController@SubjectPage')->name('subject')->middleware('role:teacher,student');

Route::get('/subjects/{id}', 'SubjectController@SubjectPageSingle')->name('subject-topic')->middleware('role:teacher');

Route::get('/subjects/{subject_id}/{topic_id}', 'SubjectController@TopicPageSingle')->name('subject-question')->middleware('role:teacher');

Route::get('/subjects/{subject_id}/{topic_id}/questions/create', 'QuestionController@QuestionCreatePage')->name('question-create-page')->middleware('role:teacher');

Route::get('/subjects/{subject_id}/{topic_id}/{question_id}', 'QuestionController@QuestionPageSingle')->name('question-page-single')->middleware('role:teacher');

Route::post('/questions/update', 'QuestionController@QuestionUpdate')->name('question-update')->middleware('role:teacher');

Route::get('/question-delete/{subject_id}/{topic_id}/{id}', 'QuestionController@QuestionDelete')->name('question-delete')->middleware('role:teacher');

Route::post('/questions/create/new-question', 'QuestionController@QuestionCreate')->name('question-create')->middleware('role:teacher');

Route::get('/curators', 'UserController@CuratorPage')->name('curator')->middleware('role:admin');

Route::get('/curators/create', 'UserController@CreateCuratorPage')->name('create-curator-page')->middleware('role:admin');

Route::post('/curators/create/new-curator', 'UserController@CreateCurator')->name('create-curator')->middleware('role:admin');

Route::get('/faculties', 'FacultyController@FacultyPage')->name('faculty')->middleware('role:admin');




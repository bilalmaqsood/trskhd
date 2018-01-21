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

    Route::middleware(['auth', 'status'])->group(function (){
    /************************ Teachers Routes ***********************************************/
        Route::get('salary/slip/{id}' , 'TeachersController@viewSalarySlip')->name('view_salary_slip');
        Route::get('download/salary/slip/{id}' , 'TeachersController@downloadSalarySlip')->name('download_salary_slip');
        Route::post('teacher/status/{id}' , 'TeachersController@status')->name('teacher.status');
    /************************ End Teachers Routes ***********************************************/


    /************************ Students Routes ***********************************************/

        Route::post('student/status/{id}' , 'StudentsController@status')->name('student.status');

        Route::get('student/{id}/slip' , 'StudentsController@rollNoSlip')->name('studentSlip');

        Route::get('student/{id}/download/slip' , 'StudentsController@downloadRollNoSlip')->name('student.downloadSlip');

        Route::get('student/{id}/fee/slip' , 'StudentsController@feeSlip')->name('studentFeeSlip');

        Route::get('result/{id}' , 'StudentsController@result')->name('student.result');

    /************************ End Students Routes ***********************************************/

    /************************ SMS Routes ***********************************************/

        Route::resource('sms' , 'SMSController');
        Route::get('single-sms' , 'SMSController@singleStudentSMS')->name('single.sms_view');
        Route::post('send/single-sms' , 'SMSController@sendSingleSMS')->name('single.sms');

    /************************* End SMS Routes *******************************************/

        Route::get('{name}/attendance' , 'AttendanceController@userAttendance')->name('attendance');
        Route::get('tests' , 'TestsController@userTests')->name('tests');
        Route::get('test/details/{id}' , 'StudentsController@testDetails')->name('test.details');

        Route::get('exams' , 'ExamsController@userExams')->name('exams');
        Route::get('exam/details/{id}' , 'StudentsController@examDetails')->name('exams.details');

    });
    /************************ Admin Routes ***********************************************/

        Route::middleware(['auth', 'status'])->prefix('admin')->group(function (){

            Route::resource('student' , 'StudentsController');
            Route::resource('teacher' , 'TeachersController');

            Route::middleware(['can:admin'])->group(function (){
                Route::resource('students/attendance' , 'AttendanceController');
                Route::get('attendance-select/class' , 'AttendanceController@showClasses')->name('attendance_classes');
                Route::get('all/class/students' , 'AttendanceController@showClassesStudents')->name('attendance_class_students');
                Route::post('add/students/attendance' , 'AttendanceController@addStudentsAttendance')->name('add_attendance');

                Route::get('all/teachers/attendance', 'AttendanceController@teachersAttendance')->name('teachersAttendance');
                Route::get('teachers/attendance' , 'AttendanceController@showTeachers')->name('teacher-attendance');
                Route::post('add/teachers/attendance' , 'AttendanceController@addTeacherAttendanceStatus')->name('add-teacher-attendance');

                /************************ Fee Routes ***********************************************/
                Route::resource('fee' , 'FeesController');
                Route::post('admin/edit/{id}', 'FeesController@updateFee')->name('edit_fee');
                Route::get('admin/delete/fee/{id}', 'FeesController@deleteFee')->name('delete_fee');
                Route::get('select-class' , 'FeesController@showClasses')->name('show_classes');
                Route::get('all/students' , 'FeesController@showClassesStudents')->name('class_students');
                Route::post('add/students/fee' , 'FeesController@addStudentsFee')->name('add_fees');
                /************************* End Fee Routes *******************************************/

                /************************ Classes Routes ***********************************************/
                Route::resource('classes' , 'ClassesController');
                Route::post('get/books/{id}' , 'ClassesController@getBooks')->name('get.books');
                Route::post('delete/books/{id}' , 'ClassesController@deleteBook')->name('delete.book');

                Route::prefix('classes')->group(function (){
                });
                /************************* End Classes Routes *******************************************/

                /************************ Exam Routes *****************************************/
                Route::resource('exam' , 'ExamsController');
                Route::get('exam/store/data' , 'ExamsController@examStoreData')->name('exam_store');
                Route::get('add/number/{exam}/{book}' , 'ExamsController@addNumbers')->name('addNumbers');
                Route::post('store/number/{exam}' , 'ExamsController@storeExamNumbers')->name('storeNumbers');
                Route::resource('test' , 'TestsController');
                Route::get('test/details/{id}' , 'TestsController@viewDetails')->name('testDetails');
                Route::post('test/details/{id}' , 'TestsController@addTestMarks')->name('addTestMarks');
                Route::post('test/details/update/{id}' , 'TestsController@updateTestMarks')->name('updateTestMarks');

                Route::get('report', 'TestsController@report')->name('test.report');

                Route::prefix('exams')->group(function (){

                    Route::get('report', 'ExamsController@report')->name('exam.report');

                });
                /************************* End Exam Routes *************************************/


                Route::get('change/logo' , 'HomeController@logo')->name('logo');
                Route::post('change/logo' , 'HomeController@changeLogo')->name('change.logo');

                Route::resource('sms' , 'SMSController');
                Route::get('all/staff/sms', 'SMSController@SendAllStaffSms')->name('SendAllStaffSms');
                Route::post('all/staff/sms', 'SMSController@staffAll')->name('staff.all');

                Route::get('all/student/sms', 'SMSController@SendAllStudentSms')->name('SendAllStudentsSms');
                Route::post('all/student/sms', 'SMSController@studentAll')->name('students.all');
            });

        });
    /************************ End Admin Routes ***********************************************/

    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('password/change', 'UsersController@passwordReset')->name('password.mobile');

    Route::get('calender', 'HomeController@calender')->name('calender');
    Route::post('calender/add-holiday', 'HomeController@calenderAddHoliday')->name('calenderAddHoliday');
    Route::post('calender/holidays', 'HomeController@calenderGetHolidays')->name('GetHolidays');

    Auth::routes();

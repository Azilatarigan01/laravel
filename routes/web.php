<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\ExaminationsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'AuthLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgotpassword');
Route::post('/forgot-password', [AuthController::class, 'PostForgotPassword'])->name('PostForgotPassword');

// Admin Routes
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::prefix('admin')->group(function () {
        Route::get('/list', [AdminController::class, 'list']);
        Route::get('/add', [AdminController::class, 'add']);
        Route::post('/add', [AdminController::class, 'insert']);
        Route::get('/edit/{id}', [AdminController::class, 'showEditForm'])->name('admin.edit');
        Route::post('/update/{id}', [AdminController::class, 'updateUser'])->name('admin.update');
        Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    });

    // Student Routes
    Route::prefix('student')->group(function () {
        Route::get('/list', [StudentController::class, 'list'])->name('admin.student.list');
        Route::get('/add', [StudentController::class, 'add'])->name('admin.student.add');
        Route::post('/add', [StudentController::class, 'insert'])->name('student.insert');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit'); 
        Route::put('/update/{id}', [StudentController::class, 'update'])->name('student.update');
        Route::delete('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
    });

    // Teacher Routes
    Route::prefix('teacher')->group(function () {
        Route::get('/list', [TeacherController::class, 'list'])->name('admin.teacher.list');
        Route::get('/add', [TeacherController::class, 'add'])->name('admin.teacher.add');
        Route::post('/add', [TeacherController::class, 'insert'])->name('teacher.insert');
        Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::put('/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
    });

    // Class Routes
    Route::prefix('class')->group(function () {
        Route::get('/list', [ClassController::class, 'list']);
        Route::get('/add', [ClassController::class, 'add']);
        Route::post('/add', [ClassController::class, 'insert']);
        Route::get('/edit/{id}', [ClassController::class, 'showEditForm'])->name('class.edit');
        Route::post('/update/{id}', [ClassController::class, 'updateUser'])->name('class.update');
        Route::delete('/delete/{id}', [ClassController::class, 'delete'])->name('class.delete');
    });

    // Subject Routes
    Route::prefix('subject')->group(function () {
        Route::get('/list', [SubjectController::class, 'list']);
        Route::get('/add', [SubjectController::class, 'add']);
        Route::post('/add', [SubjectController::class, 'insert']);
        Route::get('/edit/{id}', [SubjectController::class, 'showEditForm'])->name('subject.edit');
        Route::post('/update/{id}', [SubjectController::class, 'updateUser'])->name('subject.update');
        Route::delete('/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete');
    });

    // Class Subject Routes
    Route::prefix('assign_subject')->group(function () {
        Route::get('/list', [ClassSubjectController::class, 'list'])->name('assign_subject.list');
        Route::get('/add', [ClassSubjectController::class, 'add'])->name('assign_subject.add');
        Route::post('/insert', [ClassSubjectController::class, 'insert'])->name('assign_subject.insert');
        Route::get('/edit/{id}', [ClassSubjectController::class, 'showEditForm'])->name('assign_subject.edit');
        Route::put('/update/{id}', [ClassSubjectController::class, 'updateUser'])->name('assign_subject.update');
        Route::delete('/delete/{id}', [ClassSubjectController::class, 'delete'])->name('assign_subject.delete');
    });
// Group for Assign Class Teacher routes
Route::prefix('assign_class_teacher')->group(function () {
    Route::get('/list', [AssignClassTeacherController::class, 'list'])->name('assign_class_teacher.list');
    Route::get('/add', [AssignClassTeacherController::class, 'add'])->name('assign_class_teacher.add');
    Route::post('/insert', [AssignClassTeacherController::class, 'insert'])->name('assign_class_teacher.insert');
    Route::get('/edit/{id}', [AssignClassTeacherController::class, 'showEditForm'])->name('assign_class_teacher.edit');
    Route::put('/update/{id}', [AssignClassTeacherController::class, 'updateUser'])->name('assign_class_teacher.update');
    Route::delete('/delete/{id}', [AssignClassTeacherController::class, 'delete'])->name('assign_class_teacher.delete');
});

// Homework Routes for admin
Route::prefix('admin/homework')->group(function () {
    Route::get('/list', [HomeworkController::class, 'homework'])->name('admin.homework.list');
    Route::get('/add', [HomeworkController::class, 'add'])->name('admin.homework.add');
    Route::post('/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject'])->name('admin.ajax_get_subject');
    Route::post('/add', [HomeworkController::class, 'insert'])->name('admin.homework.insert');
    Route::get('/edit/{id}', [HomeworkController::class, 'showEditForm'])->name('admin.homework.edit');
    Route::put('/update/{id}', [HomeworkController::class, 'updateUser'])->name('admin.homework.update');
    Route::get('/delete/{id}', [HomeworkController::class, 'delete'])->name('admin.homework.delete');
    Route::get('/submitted/{id}', [HomeworkController::class, 'Submitted'])->name('admin.homework.submitted');
    
});


  // Group for Examinations routes
  Route::get('/examinations/exam/list', [ExaminationsController::class, 'exam_list'])->name('exam_list');
  Route::get('/examinations/exam/add', [ExaminationsController::class, 'exam_add'])->name('exam_add');
  Route::post('/examinations/exam/add', [ExaminationsController::class, 'exam_insert'])->name('exam_insert');
  Route::get('/examinations/exam/edit/{id}', [ExaminationsController::class, 'showEditForm'])->name('exam_edit');
  Route::put('/examinations/exam/update/{id}', [ExaminationsController::class, 'updateExam'])->name('exam_update');
  Route::delete('/examinations/exam/delete/{id}', [ExaminationsController::class, 'delete'])->name('exam_delete');

   // Group for Exam Schedule
  Route::get('/examinations/exam_schedule', [ExaminationsController::class, 'exam_schedule'])->name('exam_schedule');
  Route::get('/examinations/exam_schedule/add', [ExaminationsController::class, 'examschedule_add'])->name('exams_chedule_add');
  Route::post('/examinations/exam_schedule_insert', [ExaminationsController::class, 'exam_schedule_insert'])->name('exam_schedule_insert');
  Route::get('/examinations/exam_schedule/edit/{id}', [ExaminationsController::class, 'showEditForm'])->name('examschedule_edit');
  Route::put('/examinations/exam_schedule/update/{id}', [ExaminationsController::class, 'updateExamSchedule'])->name('examschedule_update');
  Route::delete('/examinations/exam_schedule/delete/{id}', [ExaminationsController::class, 'delete'])->name('examschedule_delete');

    // Assign Class Teacher Routes
   Route::prefix('teacher/assignments')->group(function () {
    Route::get('/list', [AssignmentsController::class, 'AssignmentsTeacher'])->name('teacher_assignments.list');
    Route::get('/add', [AssignmentsController::class, 'addTeacher'])->name('teacher_assignments.add');
    Route::post('/insert', [AssignmentsController::class, 'insertTeacher'])->name('teacher_assignments.insert');
    });
});

// My Account Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [UserController::class, 'showMyAccountForm'])->name('my_account');
    Route::put('/my-account/update/admin/{id}', [UserController::class, 'updateAdminAccount'])->name('update_admin_account');
    Route::put('/my-account/update/teacher/{id}', [UserController::class, 'updateTeacherAccount'])->name('update_teacher_account');
    Route::put('/my-account/update/student/{id}', [UserController::class, 'updateStudentAccount'])->name('update_student_account');
    Route::get('/account', [UserController::class, 'showMyAccountForm'])->name('admin.account');
});


// Teacher Routes
Route::middleware(['auth', 'teacher'])->prefix('teacher')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/account', [UserController::class, 'showMyAccountForm'])->name('teacher.account');
    Route::put('/account/{id}/update', [UserController::class, 'MyAccount'])->name('teacher.account.update');
    Route::get('/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject'])->name('teacher.myclasssubject');
    Route::get('/my_student', [StudentController::class, 'MyStudent'])->name('teacher.mystudent');

    Route::prefix('teacher/homework')->group(function () {
        Route::get('/list', [HomeworkController::class, 'TeacherHomework'])->name('teacher.homework.list');
        Route::get('/add', [HomeworkController::class, 'addHomeworkTeacher'])->name('teacher.homework.add');
        Route::post('/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject'])->name('teacher.ajax_get_subject');
        Route::post('/add', [HomeworkController::class, 'insertHomeworkTeacher'])->name('teacher.homework.insert');
        Route::get('/edit/{id}', [HomeworkController::class, 'showEditFormTeacher'])->name('teacher.homework.edit');
        Route::put('/update/{id}', [HomeworkController::class, 'updateTeacher'])->name('teacher.homework.update');
        Route::get('/delete/{id}', [HomeworkController::class, 'delete'])->name('teacher.homework.delete');
        Route::get('/submitted/{id}', [HomeworkController::class, 'SubmittedTeacher'])->name('teacher.homework.submitted');
        Route::get('/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetableTeacher'])->name('MyExamTimetableTeacher');


        
    });
});


// Student Routes
Route::middleware(['auth', 'student'])->prefix('student')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/account', [UserController::class, 'showMyAccountForm'])->name('student.account');
    Route::put('/account/{id}/update', [UserController::class, 'updateMyAccount'])->name('student.account.update');
    Route::get('/my_subject', [SubjectController::class, 'MySubject'])->name('MySubject');
    
    Route::prefix('student/homework')->group(function () {
        Route::get('/my_homework', [HomeworkController::class, 'StudentHomework'])->name('student.homework.list');
        Route::get('/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomework'])->name('student.my_homework.sumbit_homework');
        Route::post('/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomeworkInsert'])->name('student.my_homework.submit_homework.insert');
        Route::post('/ajax_get_subject', [HomeworkController::class, 'ajax_get_subject'])->name('student.ajax_get_subject');
        Route::post('/add', [HomeworkController::class, 'insert'])->name('teacher.homework.insert');
        Route::get('/edit/{id}', [HomeworkController::class, 'showEditForm'])->name('student.homework.edit');
        Route::put('/update/{id}', [HomeworkController::class, 'update'])->name('student.homework.update');
        Route::get('/delete/{id}', [HomeworkController::class, 'delete'])->name('student.homework.delete');
        Route::get('/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetable'])->name('MyExamTimetable');
        Route::get('/my_submitted_homework', [HomeworkController::class, 'StudentHomeworkSubmitted'])->name('student.my_submitted_homework.list');

       
    });

});

// Admin Profile Routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/profile/change_password', [UserController::class, 'showChangePasswordForm'])->name('admin.change_password');
    Route::post('/admin/profile/change_password', [UserController::class, 'changePassword'])->name('admin.change_password.post');
});

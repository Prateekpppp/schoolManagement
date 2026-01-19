<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDataController;
use App\Http\Controllers\AppdataController;
use App\Http\Controllers\DatasessionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassSectionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\StudenthomeworkController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverRouteController;
use App\Http\Controllers\ScRouteController;
use App\Http\Controllers\StudentRouteController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryCategoryController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\FeeinvoiceController;
use Illuminate\Support\Facades\Cookie;


// Admin routes

Route::middleware(['admin_auth_check_middleware','custom_admin_session_middleware'])->group(function () {
    
    Route::prefix('principal')->group(function () {
        
        // Salary Module
        Route::get('/salary', [SalaryController::class,'inventory'])->name('principal.pages.salary');

        Route::get('/salaryFilter', [SalaryController::class,'inventoryFilter'])->name('principal.pages.salaryFilter');

        Route::post('/createSalary', [SalaryController::class,'createInventory'])->name('principal.post.createSalary')->withoutMiddleware([VerifyCsrfToken::class]);

        Route::get('/updateSalary', [SalaryController::class,'updateInventory'])->name('principal.pages.updateSalary');

        Route::get('/printSalary', [SalaryController::class,'printSalary'])->name('principal.pages.printSalary');

        // Inventory Module
        Route::get('/inventory', [InventoryController::class,'inventory'])->name('principal.pages.inventory');

        Route::get('/inventoryFilter', [InventoryController::class,'inventoryFilter'])->name('principal.pages.inventoryFilter');

        Route::get('/allInventory', [InventoryController::class,'allInventory'])->name('principal.get.allInventory');

        Route::get('/addInventory', [InventoryController::class,'addInventory'])->name('principal.pages.addInventory');

        Route::post('/createInventory', [InventoryController::class,'createInventory'])->name('principal.post.createInventory')->withoutMiddleware([VerifyCsrfToken::class]);

        Route::get('/updateInventory', [InventoryController::class,'updateInventory'])->name('principal.pages.updateInventory');

        Route::get('/printInventory', [InventoryController::class,'printInventory'])->name('principal.pages.printInventory');

        // Inventory Category Module
        Route::get('/inventoryCategory', [InventoryCategoryController::class,'inventoryCategory'])->name('principal.pages.inventoryCategory');
          
        Route::get('/inventoryCategoryFilter', [InventoryCategoryController::class,'inventoryCategoryFilter'])->name('principal.pages.inventoryCategoryFilter');
        
        Route::post('/createInventoryCategory', [InventoryCategoryController::class,'createInventoryCategory'])->name('principal.post.createInventoryCategory')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateInventoryCategory', [InventoryCategoryController::class,'updateInventoryCategory'])->name('principal.pages.updateInventoryCategory');
        
        Route::post('/manageInventoryCategory', [InventoryCategoryController::class,'manageInventoryCategory'])->name('principal.post.manageInventoryCategory')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/getClassByInventoryCategory', [InventoryCategoryController::class,'getClassByInventoryCategory'])->name('principal.post.getClassByInventoryCategory')->withoutMiddleware([VerifyCsrfToken::class]);

        // StudentRoute Module
        Route::get('/assignedStudentRoute', [StudentRouteController::class,'assignedStudentRoute'])->name('principal.pages.assignedStudentRoute');

        Route::get('/assignStudentRoute', [StudentRouteController::class,'assignStudentRoute'])->name('principal.pages.assignStudentRoute');

        Route::post('/createStudentRoute', [StudentRouteController::class,'createStudentRoute'])->name('principal.post.createStudentRoute')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateStudentRoute', [StudentRouteController::class,'updateStudentRoute'])->name('principal.pages.updateStudentRoute');

        // RouteVehicle Module
        Route::get('/assignedRouteVehicle', [DriverRouteController::class,'assignedRouteVehicle'])->name('principal.pages.assignedRouteVehicle');

        Route::get('/assignRouteVehicle', [DriverRouteController::class,'assignRouteVehicle'])->name('principal.pages.assignRouteVehicle');

        Route::post('/assignRouteVehicleDriver', [DriverRouteController::class,'assignRouteVehicleDriver'])->name('principal.post.assignRouteVehicleDriver')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateAssignRouteVehicle', [DriverRouteController::class,'updateAssignRouteVehicle'])->name('principal.pages.updateAssignRouteVehicle');

        // ScRoute Module
        Route::get('/allRoutes', [ScRouteController::class,'driver'])->name('principal.pages.allRoutes');

        Route::get('/routeFilter', [ScRouteController::class,'staffFilter'])->name('principal.pages.routeFilter');

        Route::get('/aRoutes', [ScRouteController::class,'allDriver'])->name('principal.get.aRoutes');

        Route::get('/addRoute', [ScRouteController::class,'addDriver'])->name('principal.pages.addRoute');

        Route::post('/createRoute', [ScRouteController::class,'createDriver'])->name('principal.post.createRoute')->withoutMiddleware([VerifyCsrfToken::class]);

        Route::get('/updateRoute', [ScRouteController::class,'updateDriver'])->name('principal.pages.updateRoute');
        Route::post('/manageRoute', [ScRouteController::class,'manageDriver'])->name('principal.post.manageRoute')->withoutMiddleware([VerifyCsrfToken::class]);

        // Vehicle Module
        Route::get('/vehicle', [VehicleController::class,'driver'])->name('principal.pages.vehicle');

        Route::get('/vehicleFilter', [VehicleController::class,'staffFilter'])->name('principal.pages.vehicleFilter');

        Route::get('/allVehicle', [VehicleController::class,'allDriver'])->name('principal.get.allVehicle');

        Route::get('/addVehicle', [VehicleController::class,'addDriver'])->name('principal.pages.addVehicle');

        Route::post('/createVehicle', [VehicleController::class,'createDriver'])->name('principal.post.createVehicle')->withoutMiddleware([VerifyCsrfToken::class]);

        Route::get('/updateVehicle', [VehicleController::class,'updateDriver'])->name('principal.pages.updateVehicle');

        Route::post('/manageVehicle', [VehicleController::class,'manageDriver'])->name('principal.post.manageVehicle')->withoutMiddleware([VerifyCsrfToken::class]);

        // Driver Module
        Route::get('/driver', [DriverController::class,'driver'])->name('principal.pages.driver');
        
        Route::get('/driverFilter', [DriverController::class,'driverFilter'])->name('principal.pages.driverFilter');
        
        Route::get('/allDriver', [DriverController::class,'allDriver'])->name('principal.get.allDriver');
        
        Route::get('/addDriver', [DriverController::class,'addDriver'])->name('principal.pages.addDriver');
        
        Route::post('/createDriver', [DriverController::class,'createDriver'])->name('principal.post.createDriver')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/updateDriver', [DriverController::class,'updateDriver'])->name('principal.pages.updateDriver');

        Route::post('/manageDriver', [DriverController::class,'manageDriver'])->name('principal.post.manageDriver')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/driverDetail/{id}', [DriverController::class,'driverDetail'])->name('principal.pages.driverDetail');
       
       
        // Logout Route
        Route::get('/logout', function () {
            Session::flush();
            return redirect()->route('admin.login');
        })->name('admin.logout');

        Route::get('/', [AdminDataController::class,'index'])->name('principal.index');

        // Year Session Module
        Route::get('/dataSession', [DatasessionController::class,'dataSession'])->name('principal.pages.dataSession');
        
        Route::get('/allDatasession', [DatasessionController::class,'allDatasession'])->name('principal.get.allDatasession');
        
        Route::get('/addDatasession', [DatasessionController::class,'addDatasession'])->name('principal.pages.addDatasession');
        
        Route::post('/createDatasession', [DatasessionController::class,'createDatasession'])->name('principal.post.createDatasession')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/changeSession/{session_name}', [DatasessionController::class,'changeSession'])->name('principal.pages.changeSession');

        // Section Module
        Route::get('/section', [SectionController::class,'section'])->name('principal.pages.section');
        
        Route::get('/allSection', [SectionController::class,'allSection'])->name('principal.get.allSection');
        
        Route::get('/addSection', [SectionController::class,'addSection'])->name('principal.pages.addSection');
        
        Route::post('/createSection', [SectionController::class,'createSection'])->name('principal.post.createSection')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        Route::get('/manageSection/{id}', [SectionController::class,'manageSection'])->name('principal.pages.manageSection')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        Route::post('/getSectionsByClass', [SectionController::class,'getSectionsByClass'])->name('principal.post.getSectionsByClass')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        // Classes Module
        Route::get('/classes', [ClassesController::class,'classes'])->name('principal.pages.classes');
        
        Route::get('/allClasses', [ClassesController::class,'allClasses'])->name('principal.get.allClasses');
        
        Route::get('/addClass', [ClassesController::class,'addClass'])->name('principal.pages.addClass');
        
        Route::post('/createClass', [ClassesController::class,'createClass'])->name('principal.post.createClass')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/manageClass/{id}', [ClassesController::class,'manageClass'])->name('principal.pages.manageClass');
        
        Route::post('/updateClass', [ClassesController::class,'updateClass'])->name('principal.post.updateClass')->withoutMiddleware([VerifyCsrfToken::class]);  

        Route::post('/remove_cSection', [ClassesController::class,'remove_cSection'])->name('principal.post.remove_cSection')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/remove_cSubject', [ClassesController::class,'remove_cSubject'])->name('principal.post.remove_cSubject')->withoutMiddleware([VerifyCsrfToken::class]);

        // Subject Module
        Route::get('/subject', [SubjectController::class,'subject'])->name('principal.pages.subject');
        
        Route::get('/allSubject', [SubjectController::class,'allSubject'])->name('principal.get.allSubject');
        
        Route::get('/addSubject', [SubjectController::class,'addSubject'])->name('principal.pages.addSubject');
        
        Route::post('/createSubject', [SubjectController::class,'createSubject'])->name('principal.post.createSubject')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/editSubject/{id}', [SubjectController::class,'editSubject'])->name('principal.pages.editSubject');
        
        Route::post('/removeClass', [SubjectController::class,'removeClass'])->name('principal.post.removeClass')->withoutMiddleware([VerifyCsrfToken::class]);

        // Staff Module
        Route::get('/staff', [StaffController::class,'staff'])->name('principal.pages.staff');
        
        Route::get('/staffFilter', [StaffController::class,'staffFilter'])->name('principal.pages.staffFilter');
        
        Route::get('/allStaff', [StaffController::class,'allStaff'])->name('principal.get.allStaff');
        
        Route::get('/addStaff', [StaffController::class,'addStaff'])->name('principal.pages.addStaff');
        
        Route::post('/createStaff', [StaffController::class,'createStaff'])->name('principal.post.createStaff')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/updateStaff', [StaffController::class,'updateStaff'])->name('principal.pages.updateStaff');

        Route::post('/manageStaff', [StaffController::class,'manageStaff'])->name('principal.post.manageStaff')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/staffDetail/{id}', [StaffController::class,'staffDetail'])->name('principal.pages.staffDetail');

        // Student Module
        Route::get('/students', [StudentController::class,'students'])->name('principal.pages.students');
        
        Route::get('/inactiveStudents', [StudentController::class,'inactiveStudents'])->name('principal.pages.inactiveStudents');
        
        Route::get('/studentFilter', [StudentController::class,'studentFilter'])->name('principal.pages.studentFilter');
        
        Route::get('/allStudents', [StudentController::class,'allStudents'])->name('principal.get.allStudents');
        
        Route::get('/addStudent', [StudentController::class,'addStudent'])->name('principal.pages.addStudent');
        
        Route::post('/createStudent', [StudentController::class,'createStudent'])->name('principal.post.createStudent')->withoutMiddleware([VerifyCsrfToken::class]);
          
        Route::get('/updateStudent', [StudentController::class,'updateStudent'])->name('principal.pages.updateStudent');
        
        Route::get('/studentDetail/{id}', [StudentController::class,'studentDetail'])->name('principal.pages.studentDetail');
        
        Route::post('/studentDetailByEnrollNo', [StudentController::class,'studentDetailByEnrollNo'])->name('principal.post.studentDetailByEnrollNo')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/manageStudent', [StudentController::class,'manageStudent'])->name('principal.post.manageStudent')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Fee Module
        Route::get('/feeHead', [FeeController::class,'feeHead'])->name('principal.pages.feeHead');
          
        Route::get('/feeHeadFilter', [FeeController::class,'feeHeadFilter'])->name('principal.pages.feeHeadFilter');
        
        Route::get('/allFeeHead', [FeeController::class,'allFeeHead'])->name('principal.get.allFeeHead');
        
        Route::post('/createFeeHead', [FeeController::class,'createFeeHead'])->name('principal.post.createFeeHead')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateFeeHead', [FeeController::class,'updateFeeHead'])->name('principal.pages.updateFeeHead');
        
        // Fee Invoice Module
        Route::get('/generateFee', [FeeController::class,'generateFee'])->name('principal.pages.generateFee');
        
        Route::post('/genrateFeeInvoice', [FeeinvoiceController::class,'genrateFeeInvoice'])->name('principal.post.genrateFeeInvoice')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/filterGenerateFee', [FeeController::class,'filterGenerateFee'])->name('principal.pages.filterGenerateFee');
        
        Route::get('/feeInvoice', [FeeinvoiceController::class,'feeInvoice'])->name('principal.pages.feeInvoice');
        
        Route::post('/createFeeInvoice', [FeeinvoiceController::class,'createFeeInvoice'])->name('principal.post.createFeeInvoice')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateFeeInvoice', [FeeinvoiceController::class,'updateFeeInvoice'])->name('principal.pages.updateFeeInvoice');
        
        Route::post('/manageFeeInvoice', [FeeinvoiceController::class,'manageFeeInvoice'])->name('principal.post.manageFeeInvoice')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/assignFee', [FeeController::class,'assignFee'])->name('principal.post.assignFee')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/generatedFee', [FeeController::class,'generatedFee'])->name('principal.pages.generatedFee');
        
        Route::post('/collectFee', [FeeController::class,'collectFee'])->name('principal.post.collectFee')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Homework Module
        Route::get('/homework', [HomeworkController::class,'homework'])->name('principal.pages.homework');

        Route::get('/homeworkFilter', [HomeworkController::class,'homeworkFilter'])->name('principal.pages.homeworkFilter');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('principal.pages.addHomework');

        Route::get('/allHomework', [HomeworkController::class,'allHomework'])->name('principal.get.allHomework');
        
        Route::get('/addHomework', [HomeworkController::class,'addHomework'])->name('principal.pages.addHomework');
        
        Route::get('/updateHomework', [HomeworkController::class,'updateHomework'])->name('principal.pages.updateHomework');
        
        Route::post('/createHomework', [HomeworkController::class,'createHomework'])->name('principal.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Student Homework Module
        Route::get('/studentHomework', [StudenthomeworkController::class,'homework'])->name('principal.pages.homework');

        Route::get('/studentHomeworkFilter', [StudenthomeworkController::class,'homeworkFilter'])->name('principal.pages.homeworkFilter');
        
        Route::get('/allStudentHomework', [StudenthomeworkController::class,'allHomework'])->name('principal.get.allHomework');
        
        Route::get('/addStudentHomework', [StudenthomeworkController::class,'addHomework'])->name('principal.pages.addHomework');
        
        Route::get('/updateStudentHomework', [StudenthomeworkController::class,'updateHomework'])->name('principal.pages.updateHomework');
        
        Route::post('/createStudentHomework', [StudenthomeworkController::class,'createHomework'])->name('principal.post.createHomework')->withoutMiddleware([VerifyCsrfToken::class]);
        
        // Transaction Module
        Route::get('/receipt', [FeeController::class,'receipt'])->name('principal.pages.receipt');
        
        Route::get('/paymentHistory', [TransactionController::class,'paymentHistory'])->name('principal.pages.paymentHistory');
       
        Route::get('/print_invoice', [TransactionController::class,'print_invoice'])->name('principal.pages.print_invoice');

        Route::get('/print_receipt', [TransactionController::class,'print_receipt'])->name('principal.pages.print_receipt');

        // Exam Module
        Route::get('/exam', [ExamController::class,'exam'])->name('principal.pages.exam');
        
        Route::get('/allExam', [ExamController::class,'allExam'])->name('principal.get.allExam');
        
        Route::post('/createExam', [ExamController::class,'createExam'])->name('principal.post.createExam')->withoutMiddleware([VerifyCsrfToken::class]);        

        Route::get('/updateExam', [ExamController::class,'updateExam'])->name('principal.pages.updateExam');
        
        // Job Module
        Route::get('/jobs', [JobController::class,'jobs'])->name('principal.pages.jobs');
        
        Route::get('/allJobs', [JobController::class,'allJobs'])->name('principal.get.allJobs');
        
        Route::get('/addJobs', function () {
            return view('admin.pages.addJobs');
        })->name('principal.pages.addJobs');
        
        Route::post('/createJob', [JobController::class,'createJob'])->name('principal.post.createJob')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/updateJob', [JobController::class,'updateJob'])->name('principal.pages.updateJob');
        Route::get('/applicants', [ApplicantController::class,'applicants'])->name('principal.pages.applicants');
        
        Route::get('/contact', [ContactController::class,'contact'])->name('principal.pages.contact');
        
        Route::get('/setting', function () {
            return view('admin.pages.setting');
        })->name('principal.pages.setting');

        Route::get('/notice', [NoticeController::class,'notice'])->name('principal.pages.notice');
        
        Route::get('/allNotice', [NoticeController::class,'allNotice'])->name('principal.get.allNotice');
        
        Route::get('/addNotice', [NoticeController::class,'addNotice'])->name('principal.pages.addNotice');
        
        Route::post('/createNotice', [NoticeController::class,'createNotice'])->name('principal.post.createNotice')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/banner', [BannerController::class,'banner'])->name('principal.pages.banner');
        
        Route::get('/allBanner', [BannerController::class,'allBanner'])->name('principal.get.allBanner');
        
        Route::get('/addBanner', [BannerController::class,'addBanner'])->name('principal.pages.addBanner');
        
        Route::post('/createBanner', [BannerController::class,'createBanner'])->name('principal.post.createBanner')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::get('/gallery', [GalleryController::class,'gallery'])->name('principal.pages.gallery');
        
        Route::get('/allGallery', [GalleryController::class,'allGallery'])->name('principal.get.allGallery');
        
        Route::get('/addGallery', [GalleryController::class,'addGallery'])->name('principal.pages.addGallery');
        
        Route::post('/createGallery', [GalleryController::class,'createGallery'])->name('principal.post.createGallery')->withoutMiddleware([VerifyCsrfToken::class]);
        
        Route::post('/updateAppdata', [AppdataController::class,'updateAppdata'])->name('principal.post.updateAppdata')->withoutMiddleware([VerifyCsrfToken::class]);


        // delete operation
        Route::post('/delete', [AppdataController::class,'delete'])->name('principal.post.delete')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        Route::post('/inactive', [AppdataController::class,'inactive'])->name('principal.post.inactive')->withoutMiddleware([VerifyCsrfToken::class]);        
        
        Route::post('/restore', [AppdataController::class,'restore'])->name('principal.post.restore')->withoutMiddleware([VerifyCsrfToken::class]);        


        // Post Requests

        
    });
    
        // Post/Action requests end


});

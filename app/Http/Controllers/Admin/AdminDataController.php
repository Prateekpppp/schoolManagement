<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Schema;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\DynamicModel;
use App\Models\User;
use App\Models\Classes;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Job;
use App\Models\Notice;
use App\Models\Section;
use App\Models\Staff;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\Transaction;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\ScRoute;
use App\Models\StaffAttendance;
use App\Models\StudentAttendance;

class AdminDataController extends Controller
{
    //

    // function getModelByTablename($tableName) {
    //     return new 'App'.'\\'.studly_case(strtolower(str_singular($tableName)));
    // }

    public function checkMasterPassword($masterPassword){
            
        $user = User::getCurrentUser();
        if(!Hash::check($masterPassword,$user->password)){
            return false;
        }
        return true;
    }
    
    public function index(){
        $user = User::getCurrentUser();
        $classes = Classes::where('status',1)->count();
        $sections = Section::where('status',1)->count();
        $students = Student::where('status',1)->count();
        $inactiveStudents = Student::where('status',0)->count();
        $teachers = Staff::where('status',1)->count();
        $staff = Staff::where('status',2)->count();
        $totalInvoice = StudentFee::sum('fee');
        $paidInvoice = StudentFee::sum('paid');
        $duesInvoice = $totalInvoice - $paidInvoice;
        $totalDue = sprintf("%.2f", $duesInvoice);
        $transactions = Transaction::count();
        $totalSiblings = '';
        $female = Student::where('gender',2)->count();
        $males = Student::where('gender',1)->count();
        $jobs = Job::where('status',1)->count();
        $contactEnquiries = Contact::count();
        $sliders = Banner::where('status',1)->count();
        $gallery = Gallery::where('status',1)->count();
        $notice = Notice::where('status',1)->count();
        $driver = Driver::where('status',1)->count();
        $vehicle = Vehicle::where('status',1)->count();
        $routes = ScRoute::where('status',1)->count();

        // staff data


        // $totalSiblings = Student::whereNotNull('sibling_id')->count();
       if($user->status == 1 || $user->status == 2){
           return view('admin.pages.index',compact('classes','sections','students','teachers','staff','totalInvoice','paidInvoice','totalDue','transactions','inactiveStudents','totalSiblings','female','males','jobs','contactEnquiries','sliders','gallery','notice','driver','vehicle','routes'));
        } elseif ($user->status == 5){
            $present = StudentAttendance::where('student_id',$this->currentLogin->id)
            ->where('status',1)->count();

            $absent = StudentAttendance::where('student_id',$this->currentLogin->id)
            ->where('status',0)->count();

            return view('student.pages.index',compact('classes','sections','students','present','absent'));
                
        }else{
            $present = StaffAttendance::where('staff_id',$this->currentLogin->id)
            ->where('status',1)->count();

            $absent = StaffAttendance::where('staff_id',$this->currentLogin->id)
            ->where('status',0)->count();

            if ($user->status == 3) {
                return view('principal.pages.index',compact('classes','sections','present','absent'));
            } elseif ($user->status == 4) {
                return view('staff.pages.index',compact('classes','sections','students','present','absent'));
                
            }

        }
        
        
    }
    
    public function createData(Request $request){

        // $tableName = (new User())->getTable();

        $tableName = $request->tableName;

        $modelObject = new DynamicModel;
        $modelObject->setTable($tableName);

        $columns = Schema::getColumnListing($tableName);
        array_splice($columns, 0, 1);
        array_splice($columns, count($columns)-2, 2);

        foreach ($columns as $key => $value) {
            $modelObject->{$value} = $request->{$value};
        }

        $modelObject->save();

        return response()->json([
            // 'redirect'=> $request->previous_url,
            'response_code'=>'200',
            'message'=>'Data updated successfully'
        ]);
    }
    

}

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
use App\Models\DriverRoute;
use App\Models\Expanse;
use App\Models\Inventory;
use App\Models\Salary;
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

    public function accountant(){
        $user = $this->currentUser;

        $allTransactions = Transaction::select(
            'invoice_id',
            \DB::raw('sum(transaction_amount) as total_transaction_amount')
        )->groupBy('invoice_id');

        $fee = \DB::table('feeinvoices')
        ->join('students','students.id','feeinvoices.student_id')
        ->join('classes','students.class','classes.id')
        ->join('sections','students.section','sections.id')
        ->leftJoinSub($allTransactions,'allTransactions',function($join){
            $join->on('feeinvoices.feeinvoice_no','allTransactions.invoice_id');
        })
        ->select(
            'feeinvoices.id',
            'feeinvoices.invoice_date',
            'feeinvoices.month',
            'feeinvoices.total_amount',
            'feeinvoices.status',
            'students.name',
            'students.father_name',
            'students.admission_no',
            'classes.class',
            'sections.section',
            'allTransactions.total_transaction_amount'
        )
        ->orderBy('feeinvoices.id','desc');

        $fee = $fee->where('feeinvoices.session_id',session('session_id'));

        $todayInvoiceAmount = $fee->whereDate('feeinvoices.created_at', today())->sum('feeinvoices.total_amount');
        $todayPaidAmount = $fee->whereDate('feeinvoices.created_at', today())->sum('allTransactions.total_transaction_amount');
        $todayDueAmount = $todayInvoiceAmount - $todayPaidAmount;

        $totalInvoiceAmount = $fee->sum('feeinvoices.total_amount');
        $totalPaidAmount = $fee->sum('allTransactions.total_transaction_amount');
        $totalDueAmount = $totalInvoiceAmount - $totalPaidAmount;

        // dd($totalDueAmount,$totalPaidAmount);
        $fee = $fee->get();

        $expanse = Expanse::sum('amount');
        $todayExpanse = Expanse::whereDate('created_at', today())->sum('amount');
        $inventory = Inventory::sum('total_amount');

        $total_salary = Salary::sum('total_salary');
        $security_deposit = Salary::sum('security_deposit');

        return view('account.pages.index',compact('totalDueAmount','totalPaidAmount','expanse','inventory','total_salary','security_deposit','todayExpanse','todayPaidAmount','todayDueAmount'));
    }

    public function checkMasterPassword($masterPassword){
            
        $user = User::getCurrentUser();
        if(!Hash::check($masterPassword,$user->password)){
            return false;
        }
        return true;
    }
    
    public function index(){
        $user = User::getCurrentUser();
        if ($user->status == 7) {
            return redirect()->route('account.pages.dashboard');
            
        }
        $classes = Classes::where('status',1)->count();
        $sections = Section::where('status',1)->count();
        $students = Student::where('status',1)->where('session_id',session('session_id'))->count();
        $inactiveStudents = Student::where('status',0)->where('session_id',session('session_id'))->count();
        $teachers = Staff::where('status',4)->count();
        $staff = Staff::where('status',2)->count();
        $totalInvoice = StudentFee::where('session_id',session('session_id'))->sum('fee');
        $paidInvoice = StudentFee::where('session_id',session('session_id'))->sum('paid');
        $duesInvoice = $totalInvoice - $paidInvoice;
        $totalDue = sprintf("%.2f", $duesInvoice);
        $transactions = Transaction::where('session_id',session('session_id'))->count();
        $totalSiblings = '';
        $female = Student::where('gender',2)->where('session_id',session('session_id'))->count();
        $males = Student::where('gender',1)->where('session_id',session('session_id'))->count();
        $jobs = Job::where('status',1)->count();
        $contactEnquiries = Contact::count();
        $sliders = Banner::where('status',1)->count();
        $gallery = Gallery::where('status',1)->count();
        $notice = Notice::where('status',1)->count();
        $driver = Driver::where('status',1)->count();
        $vehicle = Vehicle::where('status',1)->count();
        $routes = ScRoute::where('status',1)->count();
        $expanse = Expanse::sum('amount');

        // staff data


        // $totalSiblings = Student::whereNotNull('sibling_id')->count();
       if($user->status == 1 || $user->status == 2){
           return view('admin.pages.index',compact('classes','sections','students','teachers','staff','totalInvoice','paidInvoice','totalDue','transactions','inactiveStudents','totalSiblings','female','males','jobs','contactEnquiries','sliders','gallery','notice','driver','vehicle','routes','expanse'));
        } elseif($user->status < 5){
            return redirect()->route('staff.pages.staffDetail',$this->currentLogin->id);

        }
        
        if ($user->status == 5){
            return redirect()->route('student.pages.studentDetail',$this->currentLogin->id);
            $present = StudentAttendance::where('student_id',$this->currentLogin->id)
            ->where('status',1)->count();

            $absent = StudentAttendance::where('student_id',$this->currentLogin->id)
            ->where('status',0)->count();

            return view('student.pages.index',compact('classes','sections','students','present','absent'));
                
        }

        if ($user->status == 6) {

            return $this->driver();

            return view('driver.pages.index',compact('classes','sections','students','present','absent'));
            
        }

        if ($user->status == 7) {
            return view('account.pages.index',compact('classes','sections','students','present','absent'));
            
        }
        
        
    }
    
    public function driver(){

        $student = Driver::where('id',$this->currentLogin->id)->first();
        $routes = DriverRoute::where('driver_id',$this->currentLogin->id)->count();
        return view('driver.pages.driverDetail',compact('student','routes'));
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

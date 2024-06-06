<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateIdService;
use App\Models\Admins;
use App\Models\Appointments;
use App\Models\Receipts;
use Illuminate\Http\Request;

class AdminPaymentControler extends Controller
{
    protected $generateId;

    public function __construct(IGenerateIdService $generateId) {
        $this->generateId = $generateId;
    }
    public function index($page) {
        $pendingPayments = Appointments::with('patients', 'doctors', 'services')
        ->where('status', 'To Pay')
        ->whereNotNull('patient')
        ->whereNotNull('doctor')
        ->get();
        $admin = Admins::find(session('logged_admin'));

        $paidPayments = Appointments::with('patients', 'doctors', 'services')
        ->where('status', 'Completed')
        ->whereNotNull('patient')
        ->whereNotNull('doctor')
        ->get();

        $admin = Admins::find(session('logged_admin'));
        
        $receipts = Receipts::with(['appointments', 'appointments.doctors', 'appointments.services'])->get();

        if(!$admin) {
            return redirect('/');
        }


        return view('Admin.Payment.index', [
            'pendingPayments' => $pendingPayments,
            'paidPayments' => $paidPayments,
            'page' => $page,
            'receipts' => $receipts
        ]);
    }

    public function addReceiptPost(Request $request) {
        $appointment = Appointments::find($request->appointmentId);

        if(!$appointment) {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid Appointment.'
            ]);
        }

        $appointment->status = 'Completed';

        
        $refNum = $this->generateId->generate(Receipts::class, 8);

        $receipt = new Receipts;
        $receipt->id = $refNum;
        $receipt->appointment = $request->appointmentId;
        $receipt->service_price = $request->service_price;
        $receipt->amount_paid = $request->amount_paid;
        $receipt->change = $request->change;

        if($receipt->save()) {
            $appointment->save();
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'reference_num' => $refNum,

            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'Something went wrong please try again later.'
            ]);
        }
    }
}

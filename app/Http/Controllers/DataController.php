<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exports\DataExport;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Data;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailOTP;
use Twilio\Rest\Client;
class DataController extends Controller
{
    public function insert(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            'pincode' => 'required|numeric',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'dob' => 'required',
            'type' => 'required',
            'firm_name' => 'required|string',
            'pancardImg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'aadharFimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'aadharBimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'drivingFimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'drivingBimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'voterIDFimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'voterIDBimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if (Data::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email already exists.']);
        }

        if ($request->type === 'aadhar') {
            $data['aadhar'] = $request->aadhar;
            $data['pancard'] = $request->pancard;

            if ($request->hasFile('aadharFimg')) {
                $aadharFimg = $request->file('aadharFimg');
                $aadharFimgName = date('YmdHis') . '_' . uniqid() . '.' . $aadharFimg->getClientOriginalExtension();
                $aadharFimg->move(public_path('upload'), $aadharFimgName);
                $data['aadharFimg'] = 'upload/' . $aadharFimgName;
            }

            if ($request->hasFile('aadharBimg')) {
                $aadharBimg = $request->file('aadharBimg');
                $aadharBimgName = date('YmdHis') . '_' . uniqid() . '.' . $aadharBimg->getClientOriginalExtension();
                $aadharBimg->move(public_path('upload'), $aadharBimgName);
                $data['aadharBimg'] = 'upload/' . $aadharBimgName;
            }

            if ($request->hasFile('pancardImg')) {
                $pancardImg = $request->file('pancardImg');
                $pancardImgName = date('YmdHis') . '_' . uniqid() . '.' . $pancardImg->getClientOriginalExtension();
                $pancardImg->move(public_path('upload'), $pancardImgName);
                $data['pancardImg'] = 'upload/' . $pancardImgName;
            }
        } elseif ($request->type === 'without_aadhar') {
            $data['pancard'] = $request->pancard;
            $data['driving'] = $request->driving;
            $data['voterID'] = $request->voterID;

            if ($request->hasFile('pancardImg')) {
                $pancardImg = $request->file('pancardImg');
                $pancardImgName = date('YmdHis') . '_' . uniqid() . '.' . $pancardImg->getClientOriginalExtension();
                $pancardImg->move(public_path('upload'), $pancardImgName);
                $data['pancardImg'] = 'upload/' . $pancardImgName;
            }

            if ($request->hasFile('drivingFimg')) {
                $drivingFimg = $request->file('drivingFimg');
                $drivingFimgName = date('YmdHis') . '_' . uniqid() . '.' . $drivingFimg->getClientOriginalExtension();
                $drivingFimg->move(public_path('upload'), $drivingFimgName);
                $data['drivingFimg'] = 'upload/' . $drivingFimgName;
            }

            if ($request->hasFile('drivingBimg')) {
                $drivingBimg = $request->file('drivingBimg');
                $drivingBimgName = date('YmdHis') . '_' . uniqid() . '.' . $drivingBimg->getClientOriginalExtension();
                $drivingBimg->move(public_path('upload'), $drivingBimgName);
                $data['drivingBimg'] = 'upload/' . $drivingBimgName;
            }

            if ($request->hasFile('voterIDFimg')) {
                $voterIDFimg = $request->file('voterIDFimg');
                $voterIDFimgName = date('YmdHis') . '_' . uniqid() . '.' . $voterIDFimg->getClientOriginalExtension();
                $voterIDFimg->move(public_path('upload'), $voterIDFimgName);
                $data['voterFimg'] = 'upload/' . $voterIDFimgName;
            }

            if ($request->hasFile('voterIDBimg')) {
                $voterIDBimg = $request->file('voterIDBimg');
                $voterIDBimgName = date('YmdHis') . '_' . uniqid() . '.' . $voterIDBimg->getClientOriginalExtension();
                $voterIDBimg->move(public_path('upload'), $voterIDBimgName);
                $data['voterBimg'] = 'upload/' . $voterIDBimgName;
            }
        } else {
            return redirect('/')->with('error', 'Invalid form submission');
        }

        $data['type'] = $request->type;
        $data['merchant_code'] = $this->generateRandomCode();
       // $otp = mt_rand(100000, 999999);
       // $data['email_otp'] = $otp;
        /* $mailData = [
            'title' => 'Saral Pe Verification OTP',
            'otp' => $otp,
        ];
        if (Mail::to($request->input('email'))->send(new EmailOTP($mailData))) {
            Data::create($data);
        }
        $request->session()->put('email', $request->email); */
        if ($data) {
            Data::create($data);
        return redirect('/inactive_users')->with('success', 'Form data submitted successfully!');
        }
        else {
            return redirect('/')->with('error', 'Invalid form submission');
        }
       
    }

    public function verificationFormSubmit(){
        $data = $request->validate([
            'name' => 'required|string|max:255',
           
            'pincode' => 'required|numeric',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'dob' => 'required',
            'type' => 'required',
            'firm_name' => 'required|string',
            'pancardImg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'aadharFimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'aadharBimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'drivingFimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'drivingBimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'voterIDFimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'voterIDBimg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (Data::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email already exists.']);
        }

        if ($request->type === 'aadhar') {
            $data['aadhar'] = $request->aadhar;
            $data['pancard'] = $request->pancard;

            if ($request->hasFile('aadharFimg')) {
                $aadharFimg = $request->file('aadharFimg');
                $aadharFimgName = date('YmdHis') . '_' . uniqid() . '.' . $aadharFimg->getClientOriginalExtension();
                $aadharFimg->move(public_path('upload'), $aadharFimgName);
                $data['aadharFimg'] = 'upload/' . $aadharFimgName;
            }

            if ($request->hasFile('aadharBimg')) {
                $aadharBimg = $request->file('aadharBimg');
                $aadharBimgName = date('YmdHis') . '_' . uniqid() . '.' . $aadharBimg->getClientOriginalExtension();
                $aadharBimg->move(public_path('upload'), $aadharBimgName);
                $data['aadharBimg'] = 'upload/' . $aadharBimgName;
            }

            if ($request->hasFile('pancardImg')) {
                $pancardImg = $request->file('pancardImg');
                $pancardImgName = date('YmdHis') . '_' . uniqid() . '.' . $pancardImg->getClientOriginalExtension();
                $pancardImg->move(public_path('upload'), $pancardImgName);
                $data['pancardImg'] = 'upload/' . $pancardImgName;
            }
        } elseif ($request->type === 'without_aadhar') {
            $data['pancard'] = $request->pancard;
            $data['driving'] = $request->driving;
            $data['voterID'] = $request->voterID;

            if ($request->hasFile('pancardImg')) {
                $pancardImg = $request->file('pancardImg');
                $pancardImgName = date('YmdHis') . '_' . uniqid() . '.' . $pancardImg->getClientOriginalExtension();
                $pancardImg->move(public_path('upload'), $pancardImgName);
                $data['pancardImg'] = 'upload/' . $pancardImgName;
            }

            if ($request->hasFile('drivingFimg')) {
                $drivingFimg = $request->file('drivingFimg');
                $drivingFimgName = date('YmdHis') . '_' . uniqid() . '.' . $drivingFimg->getClientOriginalExtension();
                $drivingFimg->move(public_path('upload'), $drivingFimgName);
                $data['drivingFimg'] = 'upload/' . $drivingFimgName;
            }

            if ($request->hasFile('drivingBimg')) {
                $drivingBimg = $request->file('drivingBimg');
                $drivingBimgName = date('YmdHis') . '_' . uniqid() . '.' . $drivingBimg->getClientOriginalExtension();
                $drivingBimg->move(public_path('upload'), $drivingBimgName);
                $data['drivingBimg'] = 'upload/' . $drivingBimgName;
            }

            if ($request->hasFile('voterIDFimg')) {
                $voterIDFimg = $request->file('voterIDFimg');
                $voterIDFimgName = date('YmdHis') . '_' . uniqid() . '.' . $voterIDFimg->getClientOriginalExtension();
                $voterIDFimg->move(public_path('upload'), $voterIDFimgName);
                $data['voterFimg'] = 'upload/' . $voterIDFimgName;
            }

            if ($request->hasFile('voterIDBimg')) {
                $voterIDBimg = $request->file('voterIDBimg');
                $voterIDBimgName = date('YmdHis') . '_' . uniqid() . '.' . $voterIDBimg->getClientOriginalExtension();
                $voterIDBimg->move(public_path('upload'), $voterIDBimgName);
                $data['voterBimg'] = 'upload/' . $voterIDBimgName;
            }
        } else {
            return redirect('/')->with('error', 'Invalid form submission');
        }

        $data['type'] = $request->type;
        $data['merchant_code'] = $this->generateRandomCode();
        $email = $request->input('email');
        $data = Data::where('email', $email)->first();

        if ($data) {
            
            $data->phone =$request->input('phone');
            $data->merchant_code =  $data['merchant_code']; 
            $data->save();
            return redirect('/dashboard')->with('success', 'Form data submitted successfully!');
        }
        else {
            return redirect('/')->with('error', 'Invalid form submission');
        }

    }

    public function verify_details(Request $request)
    {
        $email = $request->input('email');
         $email_otp = $request->input('email_otp');

        $data = Data::where('email', $email)->first();

        if ($data) {
            if ($data->email_otp == $email_otp) {
                $data->is_activated = true;
                $data->email_otp = null;
                $data->save();

                return redirect('/form2')->with(['message' => 'Details verified successfully', 'activated' => true]);
                exit();
            } else {
                return redirect()->back()->withInput()->withErrors(['email' => 'Invalid Email OTP.']);;
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'No data found Please Resubmit Form']);;
        }
    }
    public function mobile_verify_details(Request $request)
    {
        $email = $request->input('email');
        $mobile_otp = $request->input('mobile_otp');

        $data = Data::where('email', $email)->first();

        if ($data) {
            if ($data->mobile_otp == $mobile_otp) {
                $data->mobile_is_activated = true;
                $data->mobile_otp = null;
                $data->save();

                return redirect('/form4')->with(['message' => 'Details verified successfully', 'activated' => true]);
            } else {
                return redirect()->back()->withInput()->withErrors(['email' => 'Invalid Email OTP.']);;
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'No data found Please Resubmit Form']);;
        }
    }
    public function form_success()
    {

        session()->forget('email');
        return view('form_success');
    }

    public function edit(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            'pincode' => 'required|numeric',
            'state' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'dob' => 'required',
            'type' => 'required',
            'pancard' => 'required|string|max:255',
            'aadhar' => 'nullable|string|max:255',
        ]);

        $record = Data::find($id);

        if ($record) {
            $record->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'pincode' => $data['pincode'],
                'state' => $data['state'],
                'address' => $data['address'],
                'dob' => $data['dob'],
                'pancard' => $data['pancard'],
                'type' => $data['type'],
            ]);

            if ($data['type'] === 'aadhar') {
                $aadhar = $request->aadhar ?? '';
                $record->update(['aadhar' => $aadhar]);

                if ($request->hasFile('aadharFimg')) {
                    $aadharFimg = $request->file('aadharFimg');
                    $aadharFimgName = date('YmdHis') . '_' . uniqid() . '.' . $aadharFimg->getClientOriginalExtension();
                    $aadharFimg->move(public_path('upload'), $aadharFimgName);
                    $record->update(['aadharFimg' => 'upload/' . $aadharFimgName]);
                }

                if ($request->hasFile('aadharBimg')) {
                    $aadharBimg = $request->file('aadharBimg');
                    $aadharBimgName = date('YmdHis') . '_' . uniqid() . '.' . $aadharBimg->getClientOriginalExtension();
                    $aadharBimg->move(public_path('upload'), $aadharBimgName);
                    $record->update(['aadharBimg' => 'upload/' . $aadharBimgName]);
                }

                if ($request->hasFile('pancardImg')) {
                    $pancardImg = $request->file('pancardImg');
                    $pancardImgName = date('YmdHis') . '_' . uniqid() . '.' . $pancardImg->getClientOriginalExtension();
                    $pancardImg->move(public_path('upload'), $pancardImgName);
                    $record->update(['pancardImg' => 'upload/' . $pancardImgName]);
                }
                $record->update(['drivingFimg' => '']);
                $record->update(['drivingBimg' => '']);
                $record->update(['voterFimg' => '']);
                $record->update(['voterBimg' => '']);
                $record->update(['voterID' => '']);
                $record->update(['driving' => '']);
            } elseif ($data['type'] === 'without_aadhar') {
                $record->update(['voterID' => $request->voterID]);
                $record->update(['driving' => $request->driving]);

                if ($request->hasFile('pancardImg')) {
                    $pancardImg = $request->file('pancardImg');
                    $pancardImgName = date('YmdHis') . '_' . uniqid() . '.' . $pancardImg->getClientOriginalExtension();
                    $pancardImg->move(public_path('upload'), $pancardImgName);
                    $record->update(['pancardImg' => 'upload/' . $pancardImgName]);
                }

                if ($request->hasFile('drivingFimg')) {
                    $drivingFimg = $request->file('drivingFimg');
                    $drivingFimgName = date('YmdHis') . '_' . uniqid() . '.' . $drivingFimg->getClientOriginalExtension();
                    $drivingFimg->move(public_path('upload'), $drivingFimgName);
                    $record->update(['drivingFimg' => 'upload/' . $drivingFimgName]);
                }

                if ($request->hasFile('drivingBimg')) {
                    $drivingBimg = $request->file('drivingBimg');
                    $drivingBimgName = date('YmdHis') . '_' . uniqid() . '.' . $drivingBimg->getClientOriginalExtension();
                    $drivingBimg->move(public_path('upload'), $drivingBimgName);
                    $record->update(['drivingBimg' => 'upload/' . $drivingBimgName]);
                }

                if ($request->hasFile('voterIDFimg')) {
                    $voterIDFimg = $request->file('voterIDFimg');
                    $voterIDFimgName = date('YmdHis') . '_' . uniqid() . '.' . $voterIDFimg->getClientOriginalExtension();
                    $voterIDFimg->move(public_path('upload'), $voterIDFimgName);
                    $record->update(['voterFimg' => 'upload/' . $voterIDFimgName]);
                }

                if ($request->hasFile('voterIDBimg')) {
                    $voterIDBimg = $request->file('voterIDBimg');
                    $voterIDBimgName = date('YmdHis') . '_' . uniqid() . '.' . $voterIDBimg->getClientOriginalExtension();
                    $voterIDBimg->move(public_path('upload'), $voterIDBimgName);
                    $record->update(['voterBimg' => 'upload/' . $voterIDBimgName]);
                }
                $record->update(['aadharFimg' => '']);
                $record->update(['aadharBimg' => '']);
                $record->update(['aadhar' => '']);
            } else {
                return redirect('/')->with('error', 'Invalid form submission');
            }

            return redirect('/dashboard')->with('success', 'Form data updated successfully!');
        } else {
        }
    }



    public function fetchList()
    {
        $data = Data::where('is_activated', 1)->get();
        return response()->json($data);
    }

    public function fetchDataById($id)
    {
        $data = Data::find($id);
        if ($data) {
            return view('edit')->with('data', $data);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }
    public function generateRandomCode()
    {
        $prefix = 'SP';
        $startingNumber = 2501;
        $lastCode = Data::orderBy('id', 'desc')->pluck('merchant_code')->first();

        if (!$lastCode) {
            $codeNumber = $startingNumber;
        } else {
            $lastNumber = (int)substr($lastCode, strlen($prefix));
            if ($lastNumber < $startingNumber) {
                $codeNumber = $startingNumber;
            } else {
                $codeNumber = $lastNumber + 1;
            }
        }

        $newCode = $prefix . str_pad($codeNumber, 6, '0', STR_PAD_LEFT);

        return $newCode;
    }
    public function export()
    {
        return Excel::download(new DataExport, 'Data.csv');
    }

    public function import() 
    {
        Excel::import(new DataImport,request()->file('file'));
               
        return back();
    }
    public function delete($id)
    {
        $record = Data::find($id);
        if ($record) {
            $filePaths = [
                $record->pancardImg,
                $record->aadharFimg,
                $record->aadharBimg,
                $record->drivingFimg,
                $record->drivingBimg,
                $record->voterFimg,
                $record->voterBimg,
            ];
            foreach ($filePaths as $filePath) {
                if (File::exists(public_path($filePath))) {
                    File::delete(public_path($filePath));
                }
            }
            $record->delete();
            return redirect()->route('dashboard')->with('success', 'Form data Deleted successfully!');
        }

    }

    public function TwilioSMS(){
        $receiverNumber = "+919329939101";
        $message = "Otp verification code 123456";
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            dd('SMS Sent Successfully.');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    } 

    public function inactive_users(){
     return view("inactive_users");
    }
    public function inactive_users_data(){
        $data = Data::where('is_activated', 0)->get();
        return response()->json($data);
    }

    public function verfication_form(){
        return view("form1");
    }
 public function emailOtp(Request $request){
      $otp = mt_rand(100000, 999999);
      $data['email'] = $request->input('email');
        $data['email_otp'] = $otp;
         $mailData = [
            'title' => 'Saral Pe Verification OTP',
            'otp' => $otp,
        ];
        if (Mail::to($request->input('email'))->send(new EmailOTP($mailData))) {
           
        }
        $request->session()->put('email', $request->email); 
        if ($data) {
            Data::create($data);
        return redirect('/verify_details')->with('success', 'Form data submitted successfully!');
        }
        else {
            return redirect('/')->with('error', 'Invalid form submission');
        }



 }
 public function mobileOtp(Request $request){
    $otp = mt_rand(100000, 999999);
    $email = $request->input('email');
   $data = Data::where('email', $email)->first();
    $data['phone'] = $request->input('phone');
      $data['mobile_otp'] = $otp;
      $receiverNumber = "+919329939101";
      $message = "Otp verification code $otp";
      try {
  
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create($receiverNumber, [
            'from' => $twilio_number, 
            'body' => $message]);
            
            if ($data) {
               
                    $data->phone =$request->input('phone');
                    $data->mobile_otp =  $otp;
                    $data->save();
               
            return redirect('/mobile_verify_details')->with('success', 'Form data submitted successfully!');
            }
            else {
                return redirect('/')->with('error', 'Invalid form submission');
            }

    } catch (Exception $e) {
        dd("Error: ". $e->getMessage());
    }
      



}
 
 public function form2(){
    return view("form2");
 }
 public function form4(){
    return view("form4");
 }

}

<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class DataExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data::select('id','merchant_code', 'name', 'phone', 'email','firm_name', 'pincode', 'state', 'dob', 'address', 'type', 'pancard', 'pancardImg','aadhar', 'aadharFimg', 'aadharBimg','voterID','voterFimg','voterBimg','driving','drivingFimg','drivingBimg','created_at')->where('is_activated', 1)->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            "Merchant_code",
            "Name",
            "Phone",
            "Email",
            "Firm Name",
            "Pincode",
            "State",
            "DOB",
            "Address",
            "Type",
            "Pancard",
            "Pan Card Img",
            "Aadhar No.",
            "Aadhar Front",
            "Aadhar Back",
            "VoterID",
            "VoterID Front",
            "VoterID Back",
            "Driving Lic",
            "Driving Front",
            "Driving Back",
            "Created On"
        ];
    }
}

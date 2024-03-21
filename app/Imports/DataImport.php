<?php
  
namespace App\Imports;
use App\Http\DataController;
use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
  
class DataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row['merchant_code'] = $this->generateRandomCode();
        return new Data([
            'merchant_code'=> $row['merchant_code'],
            'name'    => $row['name'], 
            'phone'    => $row['phone'], 
            'email'    => $row['email'], 
            'firm_name'    => $row['firm_name'], 
            'pincode'    => $row['pincode'], 
            'is_activated'    => '0', 
            'state'    => $row['state'], 
            'dob'    => $row['dob'], 
            'address'    => $row['address'], 
            'type'    => $row['type'], 
            'pancard'    => $row['pancard'],
           'pancardImg' => $row['pancardimg'],
           'aadhar' => $row['aadhar'],
           'aadharFimg' => $row['aadharfimg'],
           'aadharBimg' => $row['aadharbimg'],
           'voterID' => $row['voterid'],
           'voterFimg' => $row['voterfimg'],
           'voterBimg' => $row['voterbimg'],
           'driving' => $row['driving'],
           'drivingFimg' => $row['drivingfimg'],
           'drivingBimg' => $row['drivingbimg'],
           
            
        ]);
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
}
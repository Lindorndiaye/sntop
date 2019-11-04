<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;  
use Excel;
use App\Tbl_customer;
  
class ImportExcelController extends Controller
{
    function index()
    {
     $data = DB::table('tbl_customers')->orderBy('CustomerID', 'DESC')->get();
     return view('import_excel', compact('data'));
    }

    function import(Request $request)
    {
      $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]); 

     if($request->hasFile('select_file')){

        $path = $request->file('select_file')->getRealPath();

        $data = \Excel::load($path)->get();
     //$path = $request->file('select_file')->getRealPath();

     //$data = Excel::load($path)->get();

     if($data->count())
     {
      foreach($data as $key => $value)
      {
        /* foreach($value as $value)
        { */
      
        $arr[] =  ['customer_name' => $value->customer_name, 'gender' => $value->gender,'addresse' => $value->addresse,'city' => $value->city,'postal_code' => $value->postal_code,'country' => $value->country
        ];
        /* $arr[] = array([
         'customer_name'  => $value['customer_name'],
         'gender'   => $value['gender'],
         'addresse'   => $value['addresse'],
         'city'    => $value['city'],
         'postal_code'  => $value['postal_code'],
         'country'   => $value['country']
         ]); */
    
      //}
    }
      if(!empty($arr))
      {
        Tbl_customer::insert($arr);
        //DB::table('tbl_customers')->insert($arr);

    }
     }
     
    }
     return back()->with('success', 'Excel Data Imported successfully.');
    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function exportFile($type){

        $data = Tbl_customer::get()->toArray();


        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download($type);

    }      
}
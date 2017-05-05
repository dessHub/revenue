<?php

namespace App\Http\Controllers;

use App\Report;
use Validator;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     function __construct() {
         $this->middleware('auth');
     }

     public function showReport(Request $request) {
         return view('report');

     }

     protected function postReport(Request $request)
     {

      $rules = array(
              'admNo' => 'required|max:255',
              'guardian_fname' => 'required|max:255',
              'guardian_lname' => 'required|max:255',
              'fname' => 'required|max:255',
              'lname' => 'required|max:255',
              'school' => 'required|max:255',
              'guardian_phone' => 'required|max:255',
              'user_id' => 'required|max:255',
              'complaint' => 'required|min:20'
          );

          $validator = Validator::make(Input::all(), $rules);

    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('report')
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        // create the data for report
        $report = new Report;
        $report->fname     = Input::get('fname');
        $report->lname    = Input::get('lname');
        $report->user_id = Input::get('user_id');
        $report->guardian_fname  = Input::get('guardian_fname');
        $report->guardian_lname  = Input::get('guardian_lname');
        $report->guardian_phone = Input::get('guardian_phone');
        $report->admNo  = Input::get('admNo');
        $report->school    = Input::get('school');
        $report->complaint = Input::get('complaint');

        // save report
        $report->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('report');

     }
   }

     public function myReports($user_id) {
         $name = Report::where('user_id','=',$user_id)->get();
         return view('myreports')->with('reports', $name);

     }




}
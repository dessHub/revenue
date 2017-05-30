<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use Validator;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use SMSProvider;

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

     public function repay(Request $request) {
         return view('repay');

     }

     protected function postProperty(Request $request)
     {

      $rules = array(
              'location' => 'required|max:255',
              'regNo' => 'required|max:255',
              'address' => 'required|max:255',
              'town' => 'required|max:255'
          );

          $validator = Validator::make(Input::all(), $rules);

    // check if the validator failed -----------------------
    if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::to('/')
            ->withErrors($validator);

    } else {
        // validation successful ---------------------------

        // report has passed all tests!
        // let him enter the database

        // create the data for report
        $property = new Property;
        $property->category     = Input::get('category');
        $property->location    = Input::get('location');
        $property->user_id = Input::get('user_id');
        $property->address  = Input::get('address');
        $property->town  = Input::get('town');

        // save report
        $report->save();

        // redirect ----------------------------------------
        // redirect our user back to the form so they can do it all over again
        return Redirect::to('/');

     }
   }

     public function myReports($user_id) {
         $name = Report::where('user_id','=',$user_id)->get();
         return view('myreports')->with('reports', $name);

     }

     public function viewPending() {
           $name = Report::where(['status'=> 'pending'])->get();
           return view('viewreports')->with('reports', $name);

      }

     public function receive(Request $request) {
        $report_obj = new Report();
        $report_obj->id = Request::input('id');
        $report = Report::find($report_obj->id); // Eloquent Model
        $report->update(Input::only('status'));
        return redirect('/pending');
    }

      public function allReports() {
          $name = Report::get();
          return view('reports')->with('reports', $name);

      }

      public function viewClosing() {
            $name = Report::where(['status'=> 'received'])->get();
            return view('closing')->with('reports', $name);

       }

      public function close(Request $request) {
         $report_obj = new Report();
         $report_obj->id = Request::input('id');
         $report = Report::find($report_obj->id); // Eloquent Model
         $report->update(Input::only('status'));
         return redirect('/close');
     }

     public function viewClosed() {
           $name = Report::where(['status'=> 'closed'])->get();
           return view('reports')->with('reports', $name);

      }

      public function viewUsers() {
            $name = User::where(['role'=> 'normal'])->get();
            return view('users')->with('users', $name);

       }

      public function makeAdmin(Request $request) {
         $user_obj = new User();
         $user_obj->id = Request::input('id');
         $user = User::find($user_obj->id); // Eloquent Model
         $user->update(Input::only('role'));
         return redirect('/admins');
     }

     public function viewAdmins() {
           $name = User::where(['role'=> 'admin'])->get();
           return view('admins')->with('users', $name);

      }






}

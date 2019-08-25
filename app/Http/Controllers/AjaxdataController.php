<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
use DataTables;

class AjaxdataController extends Controller
{
    function index()
    {
     return view('users.ajaxdata');
     //http://127.0.0:8000/ajaxdata
    }

    function getdata()
    {
     $students = User::select('id', 'name', 'email');
     return \DataTables::of($students)
            ->addColumn('action', function($student){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$student->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="#" class="btn btn-xs btn-danger delete" id="'.$student->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->addColumn('checkbox', '<input type="checkbox" name="student_checkbox[]" class="student_checkbox" value="{{$id}}" />')
            ->rawColumns(['checkbox','action'])
            ->make(true);
    }

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email'  => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $student = new User([
                    'name'    =>  $request->get('name'),
                    'email'     =>  $request->get('email'),
                    'password' => bcrypt('123456')
                ]);
                $student->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $student = User::find($request->get('id'));
                $student->name = $request->get('name');
                $student->email = $request->get('email');
                $student->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }

        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $student = User::find($id);
        $output = array(
            'name'    =>  $student->name,
            'email'     =>  $student->email
        );
        echo json_encode($output);
    }

    function removedata(Request $request)
    {
        $student = User::find($request->input('id'));
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }

    function massremove(Request $request)
    {
        $student_id_array = $request->input('id');
        $student = User::whereIn('id', $student_id_array);
        if($student->delete())
        {
            echo 'Data Deleted';
        }
    }
}

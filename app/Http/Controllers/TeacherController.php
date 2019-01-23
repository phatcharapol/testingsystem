<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestSubject;
use App\CodeAccess;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $subject_std=array();
        $testsubjects=TestSubject::where('created_by',getUser())->get();
        foreach($testsubjects->all() as $testsubject){
            $subject_std[$testsubject->id.'-'.$testsubject->subjectcode][$testsubject->name]=CodeAccess::where('subjectcode',$testsubject->subjectcode)->where('owner_subject',$testsubject->created_by)->count();
           
        } 
        return view('teacher.dashboard',compact('subject_std')) ;
    }
    public function showpeople($subjectcode){

        $peoples=CodeAccess::where('subjectcode',$subjectcode)->get();
        return view('teacher.people',compact('peoples')) ;
    }

}

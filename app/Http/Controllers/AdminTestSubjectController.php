<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestSubjectRequest;
use App\Http\Requests\TestSubjectUpdateRequest;
use App\TestSubject;
use App\TestContent;
use Session ;

class AdminTestSubjectController extends Controller
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
        $testsubjects=TestSubject::paginate(10) ;
        return view('admin.test.indexsubject',compact('testsubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestSubjectRequest $request)
    {
        $input=$request->all() ;
        $input['created_by'] = getUser() ;
        $input['updated_by'] = getUser() ;
        TestSubject::create($input) ;
        Session::flash('msg','Subject has been created..') ;
        return redirect('admin/subject/') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $testcontents=TestContent::where('subject_id',$id)->paginate(10) ;
        $testsubject=TestSubject::findOrFail($id);
        return view('admin.test.indexcontent',compact('testcontents','testsubject')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $testsubject=TestSubject::findOrFail($id) ;
        return view('admin.test.editsubject',compact('testsubject')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestSubjectUpdateRequest $request, $id)
    {
        //
        $testsubject=TestSubject::findOrFail($id);
        $input=$request->all();
        $input['updated_by'] = getUser() ;
        $testsubject->update($input) ;
        Session::flash('msg','Subject has been updated..') ;
        return redirect('admin/subject/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TestSubject::findOrFail($id)->delete();
        Session::flash('msg','Subject has been deleted..') ;
        return redirect('admin/subject/');
    }
}
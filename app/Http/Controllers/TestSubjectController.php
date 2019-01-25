<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\TestSubjectCreateRequest;
use App\TestSubject;
use Session ;

class TestSubjectController extends Controller
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
        $testsubjects=TestSubject::where('created_by',getUser())->paginate(10) ;
        return view('test.indexsubject',compact('testsubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestSubjectCreateRequest $request)
    {
        $input=$request->all() ;
        $input['created_by'] = getUser() ;
        $input['updated_by'] = getUser() ;
        TestSubject::create($input) ;
        Session::flash('msg','Subject has been created..') ;
        return redirect('test/subject/') ;
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
        $testsubject=TestSubject::findOrFail($id);
        $testcontents=$testsubject->TestContents()->paginate(10);
        return view('test.indexcontent',compact('testcontents','testsubject')) ;
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
        return view('test.editsubject',compact('testsubject')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $testsubject=TestSubject::findOrFail($id);
        $input=$request->all();
        $input['updated_by'] = getUser() ;
        $testsubject->update($input) ;
        Session::flash('msg','Subject has been updated..') ;
        return redirect('test/subject/');
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
        return redirect('test/subject/');
    }
}

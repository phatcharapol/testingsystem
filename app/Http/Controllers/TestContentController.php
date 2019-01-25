<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestContentCreateRequest;
use App\TestContent; 

use Session ;

class TestContentController extends Controller
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestContentCreateRequest $request)
    {
        //
        $input=$request->all();
        $input['created_by'] = getUser();
        $input['updated_by'] = getUser();
        TestContent::create($input) ;
        Session::flash('msg','Content has been created..') ;
        return redirect('test/subject/'.$input['subject_id']);
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
   
        $testcontent=TestContent::findOrFail($id) ;
        $testsubject=$testcontent->TestSubject()->get();
        $testquestions = $testcontent->TestQuestions()->get() ;

        $questions =array() ;
        foreach ($testquestions->all() as $key => $testquestion) {
            $testquestiondetails=$testquestion->TestQuestionDetails()->get() ;
            foreach ($testquestiondetails->all() as $key => $testquestiondetail) {
                  $questions[$testquestion->id][$testquestion->question_title][$testquestiondetail->SeqChoice]=$testquestiondetail->ChoiceDetail."-".$testquestiondetail->Score ;
              }  
            
        }
        $testsubject=$testsubject[0];
 
       
         return view('test.indexquestion',compact('testsubject','testcontent','questions'));


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
        $testcontent=TestContent::findOrFail($id) ;
        $testsubject=$testcontent->TestSubject()->get() ;
        $testsubject=$testsubject[0];
        return view('test.editcontent',compact('testsubject','testcontent')) ;
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
        $testcontent=TestContent::findOrFail($id);
        $input=$request->all();
        $input['updated_by'] = getUser() ;
        $testcontent->update($input) ;
        Session::flash('msg','Content has been updated..') ;
        return redirect('test/subject/'.$input['subject_id']);

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
        $testcontent=TestContent::findOrFail($id) ;
        $subject_id=$testcontent->subject_id ;
        $testcontent->delete() ;
        Session::flash('msg','Subject has been deleted..') ;
         return redirect('test/subject/'.$subject_id);
    
    }
}

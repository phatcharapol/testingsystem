<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestContentRequest;
use App\Http\Requests\TestContentUpdateRequest;
use App\TestContent; 
use App\TestSubject; 
use App\TestQuestion;
use App\TestQuestionDetail;
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
    public function store(TestContentRequest $request)
    {
        //
        dd($request->all());
        $input=$request->all();
        $input['created_by'] = getUser();
        $input['updated_by'] = getUser();
        TestContent::create($input) ;
        Session::flash('msg','Content has been created..') ;
        return redirect('test/content/') ;
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
        $testsubject=TestSubject::findOrFail($testcontent->subject_id) ;
        $testquestions = TestContent::findOrFail($id)->TestQuestions()->get() ;

        $questions =array() ;
        foreach ($testquestions->all() as $key => $testquestion) {
            $testquestiondetails=TestQuestion::findOrFail($testquestion->id)->TestQuestionDetails()->get() ;
            foreach ($testquestiondetails->all() as $key => $testquestiondetail) {
                  $questions[$testquestion->id][$testquestion->question_title][$testquestiondetail->SeqChoice]=$testquestiondetail->ChoiceDetail."-".$testquestiondetail->Score ;
              }  
            
        }

        // $testquestions = $testquestions->all() ;

        // $testquestions=TestQuestion::where('content_id',$id)
        //             ->where('subject_id',$testcontent->subject_id)
        //             ->get();
      
        // $testquestiondetails=TestQuestionDetail::where('content_id',$id)
        //             ->where('subject_id',$testcontent->subject_id)
        //             ->get();

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
        $testsubject=TestSubject::findOrFail($testcontent->subject_id) ;
        return view('test.editcontent',compact('testsubject','testcontent')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestContentUpdateRequest $request, $id)
    {
        //
        $testcontent=TestContent::findOrFail($id);
        $input=$request->all();
        $input['updated_by'] = getUser() ;
        $testcontent->update($input) ;
        Session::flash('msg','Content has been updated..') ;
        return redirect('test/content/');

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
        TestContent::findOrFail($id)->delete() ;
        Session::flash('msg','Subject has been deleted..') ;
        return redirect('test/content');
    }
}

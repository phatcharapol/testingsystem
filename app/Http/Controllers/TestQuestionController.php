<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestQuestion ;
use App\TestQuestionDetail;
use App\Http\Requests\TestQuestionRequest;
use App\Http\Requests\TestQuestionUpdateRequest;
use Session ;

class TestQuestionController extends Controller
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

  
    public function create()
    {
        //
        return view('test.createquestion') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestQuestionRequest $request)
    {
        //
        dd($request);
        $input=$request->all() ;
        TestQuestion::create([
            'question_title'=>$request->question_title,
            'created_by'=>getUser(),
            'updated_by'=>getUser()
        ]);
        TestQuestionDetail::where();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         $testquestion=TestQuestion::findOrFail($id);
         $testquestiondetails = TestQuestion::findOrFail($id)->TestQuestionDetails()->get();
        
         return view('test.test.editquestion',compact('testquestion','testquestiondetails'));
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

      
        $input=$request->all() ;
        $testquestion=TestQuestion::findOrFail($id) ;
        $testquestion->question_title = $input['question_title'] ;
        $testquestion->updated_by = getUser() ;
        $testquestion->save() ;
        
        $correct_ans = array("1"=>"0","2"=>"0","3"=>"0","4"=>"0") ;
        $correct_ans[$input['ChoiceCorrect']] = '1';
        for($i=1;$i<=4;$i++){
            TestQuestionDetail::where('question_id', '=', $id)->where('id','=',$input['C'.$i])
                    ->update([
                        'ChoiceDetail' => $input['ChoiceDetail'.$i],
                        'Score' => $correct_ans[$i],
                        'updated_by'=> getUser()
                    ]) ;
                   
        }

        Session::flash('msg','Question has been updated..') ;
        return redirect('test/content/'.$testquestion->content_id);
        

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
    }
}

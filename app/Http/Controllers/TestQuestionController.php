<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestSubject;
use App\TestContent;
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

  
    public function create($testsubject_id,$testcontent_id)
    {

        $testsubject=TestSubject::find($testsubject_id) ;
        $testcontent=TestContent::find($testcontent_id) ;
        //
        // dd($testsubject);
        return view('test.createquestion',compact('testsubject','testcontent')) ;
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
        // dd($request->all());
        $input=$request->all() ;
        TestQuestion::create([
            'subject_id'=>$request->subject_id,
            'content_id'=>$request->content_id,
            'question_title'=>$request->question_title,
            'created_by'=>getUser(),
            'updated_by'=>getUser()
        ]);
        $testquestion=\DB::table('test_questions')->orderBy('id','desc')->first();
        $correct_ans = array("1"=>"0","2"=>"0","3"=>"0","4"=>"0") ;
        $correct_ans[$request->ChoiceCorrect] = '1';
    
        for($i=1;$i<=4;$i++){
   
             TestQuestionDetail::create([
                    'subject_id'=>$input['subject_id'],
                    'content_id'=>$input['content_id'],
                    'question_id'=>$testquestion->id,
                    'SeqChoice'=>$input['C'.$i],
                    'ChoiceDetail'=>$input['ChoiceDetail'.$i],
                    'Score'=>$correct_ans[$i],
                    'created_by'=>getUser(),
                    'updated_by'=>getUser()
            ]);
        }
        
        Session::flash('msg','Question has been created..') ;
         return redirect('test/subject/content/'.$testquestion->content_id);
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
         $testsubject=TestSubject::find($testquestion->subject_id);
         $testcontent=TestContent::find($testquestion->content_id);
        
         return view('test.editquestion',compact('testquestion','testquestiondetails','testsubject','testcontent'));
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
        return redirect('test/subject/content/'.$testquestion->content_id);
        

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
        $testquestion=TestQuestion::findOrFail($id) ;
        $content_id=$testquestion->content_id ;
        $testquestion->delete() ;
        Session::flash('msg','Subject has been deleted..') ;
        return redirect('test/subject/content/'.$content_id);
    }
}

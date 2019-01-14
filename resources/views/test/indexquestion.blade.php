@extends('layouts.admin')

@section('content')
<div class="container">

{{ Breadcrumbs::render('test.content.show',$testsubject,$testcontent) }}

{{-- 	{{dd($questions)}} --}}

	{{-- Print Data Quesiton --}}


	<table width="100%">
		<tr>
			<td>
				<div align="left" style="float:left;display: inline;">
					<b style="font-size: 35px">{{$testcontent->name." Exam"}}</b>
				</div>
	 	 		<div align="right" style="padding-top: 15px">
	 	 			<form method="get" action="{{route('test.question.create',['testsubject_id'=>$testsubject->id,'testcontent_id'=>$testcontent->id])}}">
	 	 					@csrf
	 	 					{{-- <input type="text" name="testsubject_id" value="{{$testsubject->id}}">
	 	 					<input type="text" name="testcontent_id" value="{{$testcontent->id}}"> --}}
	 	 					<input type="submit" class="btn btn-primary" value="Add Quesiton">
	 	 			</form>
	 	 			{{-- <a class="btn btn-primary" href="{{route('test.question.create')}}" role="button" >Add Question</a> --}}
	 	 			{{-- <a class="btn btn-info" href="{{route('test.question.edit',$testcontent->id)}}" role="button" >Edit Question</a> --}}
	 	 	{{-- 		<a class="btn btn-danger" href="{{route('test.question.delete')}}" role="button" onclick ="confirmdelete()" >Delete Question</a> --}}
	 	 		</div>
			
	  		</td>
	 	</tr>
	 </table>
	 <br>
	  <table class="table">
	  	@foreach($questions as $qid => $question)
	  	<form method="POST" action="{{route('test.question.destroy',$qid)}}">
	  		@csrf
	  		<input type="hidden" name="_method" value="DELETE">
        	<thead>
	          <tr>
	          	@foreach($question as $qname =>$qdetail)
					 <th>Q: {{$qname}}</th> 
					 <th><a class="btn btn-info" href="{{route('test.question.edit',$qid)}}" role="button" >Edit</a><input type="submit" class="btn btn-danger" value="Delete" onclick ="confirmdelete()"></th>
					 
	          </tr>
	         </thead>
	         <tbody>
	          		@foreach($qdetail as $seqchoice => $value)

	          			<?php
	          			$val=explode("-",$value) ;
	          			?>
						 <tr>
				 			<td {{($val[1] == '1') ? "bgcolor=#00FF00" : ""}}>{{$seqchoice.") ".$val[0]}}</td>
				 		</tr>
	          		@endforeach
	          	@endforeach
	      	 </tbody>
	     </form>
	    @endforeach
      </table>

	  
</div>
<script type="text/javascript">
	function confirmdelete(){

        if (!confirm('Are you sure?')) {
        	event.preventDefault()
        }
	}
	
</script>

@endsection


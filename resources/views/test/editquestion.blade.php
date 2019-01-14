@extends('layouts.admin')

@section('content')
<div class="container">
	
	{{ Breadcrumbs::render('test.question.edit',$testsubject,$testcontent,$testquestion) }}
	
	{{-- Print Data Quesiton --}}

	<br>
	<table width="100%">
		<tr>
			<td>
				<div align="left" style="float:left;display: inline;">
					<b style="font-size: 35px">{{"Edit Question"}}</b>
				</div>
	 	 		<div align="right" style="padding-top: 15px">
	 	 			
	 	 			{{-- <a class="btn btn-info" href="{{route('test.question.update')}}" role="button" >Update Question</a> --}}
	 	 			{{-- <a class="btn btn-danger" href="{{route('test.content.create')}}" role="button" onclick ="confirmdelete()" >Delete Question</a> --}}
	 	 		</div>
			
	  		</td>
	 	</tr>
	 </table>
	 <br>
{{-- 	{{dd($testquestiondetails->all())}} --}}
	  <table class="table" width="100%">
				<form method="post" action="{{route('test.question.update',$testquestion->id)}}">
				@csrf
				<input type="hidden" name="_method" value="PUT">
		        	<thead>
		          	<tr>
		          		<th>Q:</th>
						 <th><input type="text" name="question_title" size="{{strlen($testquestion->question_title)}}" value="{{$testquestion->question_title}}" required></th>  
						 <th></th> 
		         	</tr>
		       		</thead>
		         	    <tbody>
			          		@foreach($testquestiondetails->all() as $k => $testquestiondetail)
								 <tr>
								 	<input type="hidden" name="C{{$testquestiondetail->SeqChoice}}" value="{{$testquestiondetail->id}}">
								 	<td width="3%">{{$testquestiondetail->SeqChoice.") "}}</td>
						 			<td>
						 				<input type="radio" name="ChoiceCorrect" value="{{$testquestiondetail->SeqChoice}}" {{($testquestiondetail->Score == "1") ? "checked" : ""}} required> 
						 				<input type="text" name="ChoiceDetail{{$testquestiondetail->SeqChoice}}" size="{{strlen($testquestiondetail->ChoiceDetail)}}" value="{{$testquestiondetail->ChoiceDetail}}" required>
						 			</td>
						 	
						 		</tr>
			          		@endforeach 
			          			<tr> 
			          				<td></td>
			          				<td></td>
			          				<td><input type="submit" class="btn btn-info" value="Update Question"></td>
			          			</tr> 
			             </tbody> 
			            
		        </form>
		      	 
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


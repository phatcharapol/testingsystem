@extends('layouts.admin')

@section('content')
<div class="container">

    {{ Breadcrumbs::render('test.question.create',$testsubject,$testcontent) }}
	   <br><h3>Create Question</h3><br>

    <table class="table" width="100%">
        <form method="POST" action="{{route('test.question.store')}}">
        @csrf
       
              <thead>
                <tr>
                   <th>Q:</th>
                   <th><input type="text" name="question_title" size="50" required></th>  
                   <th></th> 
              </tr>
              </thead>
                  <tbody>
                    @for($i=1;$i<=4;$i++)
                 <tr>
                  <input type="hidden" name="subject_id" value="{{$testsubject->id}}" >
                  <input type="hidden" name="content_id" value="{{$testcontent->id}}" >
                  <input type="hidden" name="C{{$i}}" value="{{$i}}" >
                  <td width="3%">{{$i.") "}}</td>
                  <td>
                    <input type="radio" name="ChoiceCorrect" value={{$i}}  required > 
                    <input type="text" name="ChoiceDetail{{$i}}" size="40" required>
                  </td>
                </tr>
                    @endfor 
                      <tr> 
                        <td></td>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" value="Create Question"></td>
                      </tr> 
                   </tbody> 
                  
            </form>
             
      </table>

  @include('include.error')

	 
   
</div>
@endsection

{{-- <script type="text/javascript">
  function CheckColor(){
    var checked=document.getElementsByName('ChoiceCorrect').checked ;
    var td=document.getElementsByTagName('td') ;
    for(i=0;i<td.length;i++){
        if(checked)
        td[i].style.backgroundColor = "red";
    }

  }
  


</script>
 --}}

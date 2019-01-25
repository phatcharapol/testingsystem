@extends('layouts.admin')

@section('content')
<div class="container">

    {{ Breadcrumbs::render('test.question.create',$testsubject,$testcontent) }}
	   <br><h3>Create Question</h3><br>

      <form onsubmit="return addQuestion()"">
       
          <label>Number of Question:</label>
          <input type="number" id="number" name="number" autocomplete="off" required>
          <input type="submit" class="btn btn-primary" value="Generate Questions" >
       
      </form>

        <br />

        <form  method="POST" action="{{route('test.question.store')}}">
           <table class="table" width="100%">
        @csrf
                  <input type="hidden" name="subject_id" value="{{$testsubject->id}}" >
                  <input type="hidden" name="content_id" value="{{$testcontent->id}}" >
                         <div class="form-group"></div>
                   {{--  <thead>
                      <tr>
                         <th>Q:</th>
                         <th><input type="text" name="question_title" size="50" required></th>  
                         <th></th> 
                    </tr>
                    </thead>
                        <tbody>
                          @for($i=1;$i<=4;$i++)
                       <tr>
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
                         </tbody>  --}}
              
             
                     </table>
            </form>
             
    

  @include('include.error')

	 <script type="text/javascript">

  function addQuestion(){
           
            var number = document.getElementById("number").value;
            var container = document.getElementsByClassName("form-group")[0];
                 
             
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (n=1;n<=number;n++){


                var thead = document.createElement("thead");
                var tr = document.createElement("tr");
                var th = document.createElement("th");


              var text = document.createTextNode("Q"+n+" : ");
                th.appendChild(text);
                tr.appendChild(th);
              
                var th = document.createElement("th"); 
               
              var i = document.createElement("input"); //input  text
                  i.setAttribute('type',"text");
                  i.setAttribute('name',"question_title[]");
                  i.setAttribute('size',"50");
                  i.setAttribute('autocomplete',"off");
                  i.setAttribute('required',"");
                th.appendChild(i);
                tr.appendChild(th);
                thead.appendChild(tr);

               


                container.appendChild(thead);
          
                var tBody=document.createElement("tbody");

                for (var j = 1; j <=4 ; j++) {

                  var tr = document.createElement("tr"); 
                  var i = document.createElement("input"); //input  hidden
                      i.setAttribute('type',"hidden");
                      i.setAttribute('name',n+"C[]");     
                      i.setAttribute('value',j);   
                  tr.appendChild(i);
              
                  var td = document.createElement("td");  
                  td.setAttribute('width','3%'); 
          
                  td.appendChild(document.createTextNode(j+" ) "));
                  tr.appendChild(td);
                  tBody.appendChild(tr);
     

                  var td = document.createElement("td");
                  var i = document.createElement("input"); //input radio
                      i.setAttribute('type',"radio");
                      i.setAttribute('name',n+"ChoiceCorrect");   
                      i.setAttribute('value',j);   
                      i.setAttribute('required',"");    
                  td.appendChild(i);
                  var i = document.createElement("input"); //input text
                      i.setAttribute('type',"text");
                      i.setAttribute('name',n+"ChoiceDetail[]");
                      i.setAttribute('size',"40");
                      i.setAttribute('autocomplete',"off");
                      i.setAttribute('required',"");
                  td.appendChild(i);
                  tr.appendChild(td);
                  tBody.appendChild(tr);
             
                  container.appendChild(tBody);
                }
               
            }
            var tr = document.createElement("tr");
            var td = document.createElement("td");
            var i = document.createElement("input"); //input  Submit button
            i.setAttribute('type',"submit");
            i.setAttribute('class',"btn btn-primary");
            i.setAttribute('value',"Create Question");
            td.appendChild(i)
            tr.appendChild(td);
            tBody.appendChild(tr);
            container.appendChild(tBody);

             var table = document.getElementsByTagName("table")[0] ;
             table.append(container);
        
             return false ;
           
        }

        


</script>
   
</div>
@endsection




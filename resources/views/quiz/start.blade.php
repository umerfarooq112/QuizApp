@extends('layout.app')

@section('content')
<div class="flex h-screen ">
    <div class="m-auto ">

        <div class="">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-2 " method="POST" id="quizform" action="{{url('start')}}">
                @csrf
              <div class="mb-2 ">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Question. {{$quiz->id}}
                </label>
                <p class="text-xl" >
                    {{$quiz->question}}
                </p>
              </div>
              <label class="block mb-4 text-gray-700 text-sm font-bold mb-1" for="username">
                Answer
              </label>
              <div class="mb-6">
                  <div>
                      <label class="">
                          <input type="radio" class="form-radio" name="option" value="option1" checked >
                          <span class="ml-2">{{$quiz->option1}}</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class=" ">
                            <input type="radio" class="form-radio" name="option" value="option2">
                            <span class="ml-2">{{$quiz->option2}}</span>
                        </label>
                    </div>               
                    <input type="hidden" name="id" value="{{ $id }}">
                    <input type="hidden" name="CorrectAnswers" value="{{ $CorrectAnswers }}">
              </div>
              <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                  Next
                </button>
                <div class="">
                  <span class="text-md font-light">Time Remaning: </span>
                  <span id="demo" class="rounded shadow-lg font-bold bg-red-400 text-white text-md p-4 ">10s</span>
                </div>
              </div>
            </form>      
          </div>
    </div>    
</div>

<script>
    var countDownDate = 10;
    var x = setInterval(function() {
        document.getElementById("demo").innerHTML =   countDownDate + "s " ;
        countDownDate-- 
        // If the count down is over, write some text 
        if (countDownDate < -1) {
        document.getElementById("demo").innerHTML = "0s";
        document.getElementById('quizform').submit();
        }
    }, 1000);
  </script>
@endsection
        

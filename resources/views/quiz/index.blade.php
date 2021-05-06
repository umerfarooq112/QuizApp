@extends('layout.app')

@section('content')
<div class=" pt-9">

<div class="flex h-screen flex-col pt-9">
    <img src="/img/question.svg" class="h-72 w-auto mb-4" alt="">
    <div class=" mx-auto">
        <form action="{{ url('start') }}" method="POST">
            @csrf
            <input type="submit" value="Start Quiz" class=" rounded-full border bg-white border-green-500 text-green-600 text-4xl  px-9 py-2 cursor-pointer hover:bg-green-500 hover:text-white" >
        </form>  

    </div>    
</div>
</div>

@if(Session::has('message'))
      <script>
          swal(
            '{{Session::get("message")}}',
            "Your Quiz Score is "+"{{Session::get('correct')}}/{{Session::get('totalCount')}}",
            'success'
          )
      </script>
@endif



@endsection
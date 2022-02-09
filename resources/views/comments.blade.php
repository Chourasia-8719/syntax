@extends('layout')
    @section('template_title')
    Comments
    @endsection
    @section('content')
    <form name="NewsForm" id="NewsForm" action="javascript:void(0)" method="post">
        @csrf   
        <input type="hidden" name="news_id" id="news_id" value="{{$id}}">
        <div class="form-group">
            <label for="">Enter First Name</label> 
            <input type="text" name="first_name" id="first" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Enter Last Name</label> 
            <input type="text" name="last_name" id="last" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Enter Email</label> 
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Enter Comment</label> 
            <input type="text" name="comment" id="comment" class="form-control" required>
        </div>
        <input class="btn btn-success" type="submit" value="Submit">
    </form>
@endsection
@section('footer_scripts')
<script>
$('#NewsForm').on('submit',function(e){
    e.preventDefault();

    let news_id = $("#news_id").val();
    let first_name = $('#first').val();
    let last_name = $('#last').val();
    let email = $('#email').val();
    let comment = $('#comment').val();
    
    $.ajax({
      url: "{{route('comment.save')}}",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        news_id:news_id,
        first_name:first_name,
        last_name:last_name,
        email:email,
        comment:comment,
      },
      success:function(response){
        console.log(response);
        window.location.href = "/";
      }
      });
    });
  </script>

@endsection
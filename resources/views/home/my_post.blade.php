<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    <style type="text/css">
    .post_design {
        padding: 30px;
        text-align: center;
        background-color: black;
    }
    .title_design {
        font-size: 30px;
        font-weight: bold;
        padding: 15px;
        color: whitesmoke;
    }
    .des_design {
        font-size: 18px;
        font-weight: bold;
        padding: 15px;
        color: whitesmoke;
    }
    .img_design {
        height: 200px;
        width: 300px;
        padding: 30px;
        margin: auto;
    }
    </style>
      @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
      
      @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
      </div>
      @endif
      @foreach($data as $data)

      <div class="post_design">
        <img class="img_design" src="/postimage/{{$data->image}}">
        <h4 class="title_design">{{$data->title}}</h4>
        <p class="des_design">{{$data->description}}</p>

        <a onclick="return confirm('are you sure to delete this')" href="{{url('my_post_delete', $data->id)}}" class="btn btn-danger">Delete</a>

        <a href="{{url('my_post_update', $data->id)}}" class="btn btn-primary">Update</a>
      </div>

      @endforeach
        
      @include('home.footer')
   </body>
</html>
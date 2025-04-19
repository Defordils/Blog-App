<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
      @include('home.homecss')

      <style type="text/css">
      .div_design {
         text-align: center;
         background-color: black;
      }
      .img_design {
         height: 150px;
         width: 250px;
         margin: auto;
      }
      label {
         font-size: 20px;
         font-weight: bold;
         color: white;
         width: 200px;
      }
      .input_design {
         padding: 30px;
      }
      .title_design {
         font-size: 30px;
         font-weight: bold;
         color: white;
         padding: 30px;

      }
      </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')

         <div class="div_design">
            @if(session()->has('message'))
            <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
               {{session()->get('message')}}
            </div>
            @endif
            <h1 class="title_design">Update Post</h1>
            <form action="{{url('update_post_data', $data->id)}}" method="POST" enctype="multipart/form-data">

               @csrf

                <div class="input_design">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>
                <div class="input_design">
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                <div class="input_design">
                  <label>Current Image</label>
                  <img class="img_design" src="/postimage/{{$data->image}}">
                </div>
                <div class="input_design">
                  <label>Update Image</label>
                  <input type="file" name="image">
                </div>
                <div class="input_design">
                  <input type="submit" class="btn btn-outline-secondary" value="Update">
                </div>
            </form>
         </div>
      @include('home.footer')
   </body>
</html>
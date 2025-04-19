<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    <style type="text/css">
    .div_design{
        text-align: center;
    }
    .title_design {
        font-size: 30px;
        font-weight: bold;
        color: white;
        padding: 30px;
    }
    label {
        display: inline-block;
        width: 200px;
        font-size: 18px;
        font-weight: bold;
        color: white;
    }
    .form_design {
        padding: 25px;
    }
    </style>
      @include('home.homecss')
   </head>
   <body>

    @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
      

      <div class="div_design">
        <h3 class="title_design">Add Post</h3>
        <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form_design">
                <label>Title</label>
                <input type="text" name="title">
            </div>

            <div class="form_design">
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>

            <div class="form_design">
                <label>Add Image</label>
                <input type="file" name="image">
            </div>

            <div class="form_design">
                <input class="btn btn-outline-secondary" type="submit" value="Add Post">
            </div>
        </form>
      </div>
      @include('home.footer')
   </body>
</html>
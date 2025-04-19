<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
      @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
      </div>
      
      <div class="col-md-12" style="text-align: center;">
         <div><img style="padding:20px; height:400px; width:550px; margin:auto;" src="/postimage/{{$post->image}}"></div>
         <h3><b>{{$post->title}}</b></h3>
         <h4>{{$post->description}}</h4>
         <p>Post by <b>{{$post->name}}</b></p>
      </div>
   </body>
</html>
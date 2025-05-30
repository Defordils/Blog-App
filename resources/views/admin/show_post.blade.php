<!DOCTYPE html>
<html>
  <head>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css')

    <style type="text/css">
        .title_design {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .table_design {
            border: 1px solid white;
            width: 80%;
            text-align: center;
            margin-left: 80px;
        }
        .th_design {
            background-color: skyblue;
        }
        .img_design {
            height: 100px;
            width: 150px;
            padding: 10px;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}

        </div>

        @endif
        <h1 class="title_design">All Post</h1>

        <table class="table_design">
            <tr class="th_design">
                <th>Post Title</th>
                <th>Description</th>
                <th>Post by</th>
                <th>Post Status</th>
                <th>User Type</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Status Accept</th>
                <th>Status Reject</th>
            </tr>
            @foreach ($post as $post)
                
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->post_status}}</td>
                <td>{{$post->usertype}}</td>
                <td>
                    <img class="img_design" src="postimage/{{$post->image}}">
                </td>
                <td>
                    <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                </td>
                <td>
                    <a href="{{url('edit_post', $post->id)}}" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('are you sure to accept this post ?')" href="{{url('accept_post', $post->id)}}" class="btn btn-outline-secondary">Accept</a>
                </td>
                <td>
                    <a onclick="return confirm('are you sure to reject this post ?')" href="{{url('reject_post', $post->id)}}" class="btn btn-primary">Reject</a>
                </td>
            </tr>
            @endforeach
        </table>
      </div>
    @include('admin.footer')

    <script type="text/javascript">
        function confirmation(ev)
        {
            ev.preventDefault();
            var urlToRedirect=ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title:"Are you delete this",
                text : "You won't be able to revert this delete",
                icon : "warning",
                buttons : true,
                dangerMode : true,
            })

            .then((willCancel)=>
            {
                if(willCancel)
                {
                    window.location.href=urlToRedirect;
                }
            });
        }
    </script>
  </body>
</html>
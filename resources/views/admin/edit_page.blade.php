<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
    <style>
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: #ffff;
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
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>
            @endif


            <h1 class="post_title">Update Post</h1>

            <div class="col-lg-6 mx-auto">
                <div class="block">

                    <div class="block-body">
                        <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Post Title</label>
                                <input type="text" name="title" class="form-control" value="{{$post->title}}">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Post Description</label>
                                <textarea class="form-control" name="description">{{$post->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Update Old Image</label>
                                <input class="form-control" type="file" name="image" value="{{$post->image}}" />
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Old Image</label>
                                        <img src="postimage/{{$post->image}}" alt="Old Image" class="rounded-circle mx-auto" style="width: 50px; height: 50px; margin:auto;" />
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <input type="submit" value="Update Post" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>
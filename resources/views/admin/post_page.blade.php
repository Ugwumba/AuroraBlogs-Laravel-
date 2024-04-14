<!DOCTYPE html>
<html>

<head>
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


            <h1 class="post_title">Add Post</h1>

            <div class="col-lg-6 mx-auto">
                <div class="block">

                    <div class="block-body">
                        <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Post Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Post Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Add Image</label>
                                <input class="form-control" type="file" name="image" />
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Add Post" class="btn btn-primary w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
</body>

</html>
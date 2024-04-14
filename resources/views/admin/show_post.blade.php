<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>
            @endif

            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Blogs </li>
                </ul>
            </div>
            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block margin-bottom-sm">
                                <div class="title"><strong>Basic Table</strong></div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Post Title</th>
                                                <th>Description</th>
                                                <th>Post By</th>
                                                <th>Post Status</th>
                                                <th>UserType</th>
                                                <th>Image</th>
                                                <th>Created At</th>
                                                <th>Delete</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($post as $singlePost)
                                            <tr>
                                                <td>{{$singlePost->title}}</td>
                                                <td>{{$singlePost->description}}</td>
                                                <td>{{$singlePost->name}}</td>
                                                <td>
                                                    @if ($singlePost->post_status == "active")
                                                    <button type="button" class="btn btn-success">Active</button>
                                                    @elseif ($singlePost->post_status == "inactive")
                                                    <button type="button" class="btn btn-danger">Inactive</button>
                                                    @endif
                                                </td>

                                                <td>{{$singlePost->usertype}}</td>
                                                <td>
                                                    <img src="postimage/{{$singlePost->image}}" alt="Image" style="max-width: 100px; max-height: 100px;" />
                                                </td>
                                                <td>{{ $singlePost->created_at->format('F j, Y h:i A') }}</td>
                                                <td>
                                                    <a href="{{url('delete_post', $singlePost->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                                                </td>
                                                <td>
                                                    <a href="{{url('edit_page', $singlePost->id)}}" class="btn btn-success">Edit</a>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item {{ $post->previousPageUrl() ? '' : 'disabled' }}">
                                                <a class="page-link" href="{{ $post->previousPageUrl() ?? '#' }}" tabindex="-1">Previous</a>
                                            </li>
                                            @foreach ($post->getUrlRange(1, $post->lastPage()) as $page => $url)
                                            <li class="page-item {{ $page == $post->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                            @endforeach
                                            <li class="page-item {{ $post->nextPageUrl() ? '' : 'disabled' }}">
                                                <a class="page-link" href="{{ $post->nextPageUrl() ?? '#' }}">Next</a>
                                            </li>
                                        </ul>
                                    </nav>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


        </div>
        @include('admin.footer')

        <script>
            function confirmation(ev) {
                ev.preventDefault();

                var urlToRedirect = ev.currentTarget.getAttribute('href');

                console.log(urlToRedirect);

                swal({
                        title: "Are you sure want to delete this ?",

                        text: "You won't be able to revert this delete",

                        icons: "warning",

                        buttons: true,
                        dangerMode: true,
                    })

                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect
                        }
                    });
            }
        </script>
</body>

</html>
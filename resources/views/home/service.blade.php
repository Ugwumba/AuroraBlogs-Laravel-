<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Blog Posts</h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">

               @foreach($post as $post)
                  <div class="col-md-4">
                     <div><img style="height:412px!important; width:360px!important; border:1px solid #2b2278; border-radius:20px;" src="postimage/{{$post->image}}" class="services_img"></div>

                     <h4>{{$post->title}}</h4>

                     <p>Post by <b>{{$post->usertype}}</b></p>
                     <div class="btn_main"><a href="{{url('post_details', $post->id)}}">Read More</a></div>
                  </div>
                  @endforeach
                 
                 
            </div>
         </div>
      </div>
    
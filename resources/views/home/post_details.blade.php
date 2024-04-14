<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
    <base href="/public">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-jgsKmZ56dvh6FvzOmGv3gqcWTM5AEcRGaZic+vfFUKHf5YUOtuAdaqC9NhR9rm8PKvq+22tQWMBt3g+qdLPnZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')

      </div>

      <div class="about_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital_main">
                     <h1 class="about_taital">{{$post->title}}</h1>
                     <p class="about_text">{{$post->description}} </p>
                     <p class="about_text"><img width="20" height="20" src="https://img.icons8.com/ios-glyphs/20/2b2278/administrator-male.png" alt="administrator-male"/> Post by <b>{{$post->usertype}}</b></p>

                  </div>
               </div>
               <div class="col-md-6 padding_right_0">
                  <div><img src="postimage/{{$post->image}}" class="about_img"></div>
               </div>
            </div>
         </div>
      </div>

      <!-- footer section start -->
      @include('home.footer')
   </body>
</html>
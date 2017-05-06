<header class="top-nav">
    <nav>
<ul>
    {{--if application`s first parameter is "Admin" then class will be active
    For example "www.laravelBlog.com/Admin"   --}}
   <li {{Request::is('Admin') ? 'class=active' : ''}} ><a href="{{route('admin.index')}}">Dashboard</a></li>
    {{--if application`s parameter structure like this "Admin/blog/post" and so on... then class will be active--}}
   <li {{Request::is('Admin/blog/post*') ? 'class=active' : ''}} ><a href="{{route('admin.blog.index')}}">Post</a></li>
   <li {{Request::is('Admin/blog/category*') || Request::is('Admin/blog/categories*') ? 'class=active' : ''}} ><a href="{{route('admin.blog.categories')}}">Categories</a></li>
   <li {{Request::is('Admin/contact*/') ? 'class=active' : ''}} ><a href="#">Contact messages</a></li>
   <li><a href="#">Log out</a></li>
</ul>
    </nav>
</header>
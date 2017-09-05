<header class="intro-header" style="background-image: url(@yield('header-background' , '/img/post-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1>@yield('post_heading')</h1>
                    <h2 class="subheading">@yield('post_subheading')</h2>
                    <span class="meta">@yield('meta')</span>
                </div>
            </div>
        </div>
    </div>
</header>
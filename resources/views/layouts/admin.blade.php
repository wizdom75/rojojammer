
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>Admin Panel - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale-1.0">



    <link rel="stylesheet" href="/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://use.fontawesome.com/b8eb7852c5.js"></script>



</head>

<body data-page-id="adminDashboard">


<!-- Sidebar Menu -->

<div class="off-canvas position-left reveal-for-large nav" id="offCanvas" data-off-canvas>

    <h3>Admin panel</h3>
    <ul class="vertical menu">
        <li><a href="/admin"><i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>&nbsp; Dashboard</a></li>
        <li><a href="/admin/categories"><i class="fa fa-industry fa-fw" aria-hidden="true"></i>&nbsp; Categories</a></li>
        <li><a href="/admin/products"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>&nbsp; Products</a></li>
        <li><a href="/admin/messages"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i>&nbsp; Messages</a></li>
        <li><a href="/admin/quotes"><i class="fa fa-question fa-fw" aria-hidden="true"></i>&nbsp; Quotations</a></li>
        <li><a href="/admin/users"><i class="fa fa-users fa-fw" aria-hidden="true"></i>&nbsp; Users</a></li>
        <li><a href="/admin/pages"><i class="fa fa-file-o fa-fw" aria-hidden="true"></i>&nbsp; Pages</a></li>
        <li><a href="/admin/banners"><i class="fa fa-picture-o fa-fw" aria-hidden="true"></i>&nbsp; Banners</a></li>
        <li><a href="/admin/videos"><i class="fa fa-youtube fa-fw" aria-hidden="true"></i>&nbsp; Videos</a></li>
        <li><a href="/admin/settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp; Settings</a></li>
        <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp;{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>


</div>

<!-- End of Sidebar Menu -->
<div class="off-canvas-content admin_title_bar" data-off-canvas-content>
    @if ($errors->any())
        <div class="callout warning">
            <ol>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    @if(session()->get('message'))
        <div class="callout success">
            {{ session()->get('message') }}
        </div>
    @endif
    @yield('content')
</div>

<script src="/js/all.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    $('textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
</script>

</body>
</html>
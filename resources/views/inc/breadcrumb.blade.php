
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light pl-0">
    @if(Request::is('browse/*'))
    <li class="breadcrumb-item"><a  class="text-dark" href="/"> <i class="fas fa-home text-success"></i></a></li>
    {{ makeBreadCrumb($category->id)}}
    @elseif(Request::is('product/*'))
    <li class="breadcrumb-item"><a  class="text-dark" href="/"><i class="fas fa-home text-success"></i></a></li>
    {{ makeBreadCrumb($product->category_id)}}
    <li class="breadcrumb-item active" aria-current="page">{!!$product->title!!}</li>
    @else
    <li class="breadcrumb-item"><a class="text-dark" href="/"><i class="fas fa-home text-success"></i></a></li>
    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
    @endif
  </ol>
</nav>
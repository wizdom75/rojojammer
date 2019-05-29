<div class="col-sm-12  col-md-6 col-lg-4 pl-1">
    <a href="" class="font-weight-bold b-0"  id="categoryDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Browse categories &nbsp; <i class="fas fa-angle-down"></i>
    </a>
    <div class="dropdown-menu rounded-0 mt-1 row" aria-labelledby="categoryDropdownMenu">
        <div class="p-1">
        <ul class="menu">
        @foreach (App\Category::where('parent_id', 0)->get(); as $category)
            <li>
            <a href="/browse/{{$category->slug}}" class="menu-container">
                {{ $category->title }} &nbsp; <span class="fas fa-angle-right text-success"></span> 
            </a>
                <div class="megadrop">
                <div class="col">
                    <h3>{{$category->title}}</h3>
                    <ul>
                        @foreach (App\Category::where('parent_id', $category->id)->get() as $child)
                        <li class="col"><a href="/browse/{{$child->slug}}">{{$child->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                </div>
            
            </li>
            @endforeach
        </ul>
        </div>
                  
    </div>
</div>

    <div class="collapse navbar-collapse mobile-menu" data-toggle="collapse" aria-labelledby="mobile-menu" id="mobile-menu">
        
            @foreach (App\Category::where('parent_id', 0)->get(); as $category)

                <div class="menu">
                        <a href="/browse/{{$category->slug}}" class="dropdown-item text-dark p-3 font-weight-bold" data-toggle="dropright_{{$category->id}}" id="droprightMenuButton" data-toggle="#dropright_{{$category->id}}" aria-haspopup="true" aria-expanded="false">
                            {{ $category->title }} &nbsp; <span class="fas fa-angle-right text-success"></span> 
                        </a>
                        
                        <div class="menu" id="dropright_{{$category->id}}">
                            <div>
                            @foreach (App\Category::where('parent_id', $category->id)->get(); as $child)
                            <div class="display-block p-2"><a class="dropdown-item pl-5" href="/browse/{{$child->slug}}">{{$child->title}}</a></div>
                            @endforeach
                            </div>
                        </div>
                </div>
  
            @endforeach


    </div>

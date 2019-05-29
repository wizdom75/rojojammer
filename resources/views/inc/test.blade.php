<div>
  <ul class="menu">
  @foreach (App\Category::where('parent_id', 0)->get(); as $category)
    <li>
      <a href="/browse/{{$category->slug}}" class="main-item text-dark pl-2">
        {{ $category->title }} &nbsp; <span class="fas fa-angle-right text-success"></span> 
    </a>
        <div class="megadrop">
          <div class="col">
            <h3>{{$category}}</h3>
            <ul>
                @foreach (App\Category::where('parent_id', $category->id)->get(); as $child)
                <li><a class="dropright-item pl-5" href="{{$child->slug}}">{{$child->title}}</a></li>
                @endforeach
              <li><a href="#">Sub-menu 1</a>
              </li>
              <li><a href="#">Sub-menu 2</a>
              </li>
              <li><a href="#">Sub-menu 3</a>
              </li>
            </ul>
          </div>
        </div>
      
      </li>
    @endforeach
  </ul>
</div>
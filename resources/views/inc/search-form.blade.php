<ul class="col ml-2 w-75 mb-0">
    <form method="GET" action="/results" accept-charset="UTF-8">
        <div class="input-group">
            <input id="sq" class="form-control form-control-lg  rounded-0" placeholder="Search" aria-label="search" aria-describedby="search-form" name="q" type="text" value="{{Request::get('q')}}">
            <div class="input-group-append">
                <button class="btn btn-secondary rounded-0 search-btn-bg" type="submit" id="search-form"><i class="fas fa-search fa-lg"></i></button>
            </div>
        </div>
    </form>                    
</ul>
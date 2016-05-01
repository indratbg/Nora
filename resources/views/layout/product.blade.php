<h1 class="lead">Categories</h1>

<ul class="list-unstyled">
    @foreach(App\Category::whereCategory_id1('product')->orderBy('category_name','asc')->get() as $row)
        <li><a href="{{ url('product/'.$row->category_name) }}">{{ $row->category_name }}
                <span class="badge"> {{ App\Products::whereCategory($row->category_id2)->count() }} </span></a></li>
    @endforeach

</ul>


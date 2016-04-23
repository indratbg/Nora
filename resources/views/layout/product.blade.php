<h1 class="lead">Categories</h1>

<ul class="list-unstyled">
    @foreach(App\Category::whereCategory_id1('product')->get() as $row)
        <li><a href="{{ url('product/'.$row->category_id2) }}">{{ $row->category_name }}
                <span class="badge"> {{ App\Products::whereCategory($row->category_id2)->count() }} </span></a></li>
    @endforeach

</ul>


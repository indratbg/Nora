<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <?php $x = 0;?>

            <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach(App\Picture::whereType('slide')->get() as $row)

            <li data-target="#carousel-example-generic" data-slide-to="$x" class="{{ $x=='0'?'active':'' }}"></li>
            <?php $x++;?>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php $x = 0;?>
        @foreach(App\Picture::whereType('slide')->get() as $row)
            <div class="item {{ $x=='0'?'active':''  }}">
                <img src="{{ asset('storage/app/public/slider/'.$row->filename) }}" class="slide" alt="{{ $row->title }}">

                <div class="carousel-caption">
                    <h2>{{ $row->title }}</h2>
                    <p>{{ $row->desc }}</p>
                </div>
            </div>

            <?php $x++;?>
        @endforeach


    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="home_slider">
    @foreach(App\Picture::whereType('slide')->get() as $row)
        <img src="{{ asset('storage/app/public/slider/'.$row->filename) }}"
             data-slidecaption="<h1>{{ $row->title }}</h1>{{ $row->desc }}"
             alt="{{ $row->desc }}">
    @endforeach
</div>
<script>
    $(document).ready(function () {
        $(".home_slider").nerveSlider({
            sliderWidth: "100%",
            sliderHeight: "500px",
            sliderResizable: true,
            slideTransitionSpeed: 1000,
            slideTransitionEasing: "easeOutExpo",
            // showLoadingOverlay:true,
            // showArrows:true,
            //  showTimer:false
        });
    });
</script>
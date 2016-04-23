
         <div class="posts">
            @foreach($data as $row)
            <h2 class=""><a href="#" class="link"> {{ $row->title  }}<small>{{ '&emsp;'.$row->subtitle  }}</small></a></h2>
            <small>{{ "Create at : " .$row->created_at }}</small>
            <p>{{ $row->body }}</p>
            @endforeach

            {!! $data->links() !!}
        </div>
   
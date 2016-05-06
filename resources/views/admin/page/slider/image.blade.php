<div class="list_image">


    {{--Image of Product--}}
    <div class="container">
        <div class="row">
            <?php $x = 0;?>
            @foreach($images as $image)

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <a href="javacript:void(0)" data-toggle="modal" data-target="#myModal-{{ $x }}">
                            <img class="img-responsive"
                                 src="{!! asset('storage/app/public/slider/'.$image->filename) !!}"
                                 alt="{{ $image->original_filename }}" width="100%" height="100%"/>
                        </a>

                        <div class="caption">
                            <button href="javascript:void(0)" onclick="delete_image('{{ $image->filename }}')"
                                    class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-dropbox" data-toggle="modal" data-target="#myModal-{{ $x }}"><i
                                        class="fa fa-eye"></i></button>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="myModal-{{ $x }}" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">{{ $image->original_filename }}</h4>
                            </div>
                            <div class="thumbnail">
                                <img class="img-rounded"
                                     src="{!! asset('storage/app/public/slider/'.$image->filename) !!}"
                                     alt="{{ $image->original_filename }}"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="javascript:void(0)" onclick="delete_image('{{ $image->filename }}')"
                                   class="btn btn-danger">Delete</a>

                            </div>
                        </div>
                    </div>
                </div>


                <?php $x++; ?>
            @endforeach
        </div>
    </div>


</div>
<table class="table table-striped table-bordered table-hover dataTable " >
    <thead>
    <tr bb-group>
        <th>
        </th>
    </tr>
    </thead>

    <tbody bb-data_holder>
    @isset($items)
        @foreach ($items as $comment)
            <tr>
                <td>
                    <p>{{$comment->body}}</p>
                    <p>Rating: {{$comment->rating}} Author:{{$comment->author->name}} Id:{{$comment->id}}</p>


                    <a target="_blank" href="{{route('comment.edit', ['comment' => $comment->id])}}" title="{{__('form.edit')}}"><span aria-hidden="true" class="icon-pencil"></span></a>

                    <a href="#" title="{{__('form.delete')}}" data-toggle="modal" data-target="#modal_delete" data-del_url="{{route('comment.destroy', ['comment' => $comment->id])}}">
                        <span aria-hidden="true" class="icon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    @endisset
    </tbody>
</table>

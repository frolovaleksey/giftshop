<table class="table table-striped table-bordered table-hover dataTable " >
    <thead>
    <tr bb-group>
        <th bb-order bb-name="id" class="sorting">
            id
        </th>
        <th></th>
        <th></th>
    </tr>
    </thead>

    <tbody bb-data_holder>
    @isset($items)
        @foreach ($items as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="{{route('users.edit', ['user' => $comment->id])}}" title="{{__('form.edit')}}"><span aria-hidden="true" class="icon-pencil"></span></a></td>
                <td>
                    <a href="#" title="{{__('form.delete')}}" data-toggle="modal" data-target="#modal_delete" data-del_url="{{route('users.destroy', ['user' => $comment->id])}}">
                        <span aria-hidden="true" class="icon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    @endisset
    </tbody>
</table>

@extends('global.table_wraper')

@section('table')
        <thead>
        <tr bb-group>
            <th>
                id
            </th>
            <th>
                {{__('global.name')}}
            </th>
            <th>
            </th>
            <th>
            </th>
        </tr>
        </thead>

        <tbody bb-data_holder>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td><a href="{{route('roles.edit', ['role' => $item->id])}}" title="{{__('form.edit')}}"><span aria-hidden="true" class="icon-pencil"></span></a></td>
                <td>
                    <a href="#" title="{{__('form.delete')}}" data-toggle="modal" data-target="#modal_delete" data-del_url="{{route('roles.destroy', ['role' => $item->id])}}">
                        <span aria-hidden="true" class="icon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
@endsection

@extends('global.table_wraper')

@section('table')
        <thead>
        <tr bb-group>
            <th bb-order bb-name="id" class="sorting">
                id
            </th>
            <th bb-order bb-name="slug" class="sorting">
                Slug
            </th>
            <th>
            </th>
            <th>
            </th>
        </tr>
        </thead>

        <tbody bb-data_holder>
        @isset($items)
        @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->slug}}</td>
                <td><a href="{{route($item::getBaseRoute().'.edit', [$item::getBaseRoute() => $item->id])}}" title="{{__('form.edit')}}"><span aria-hidden="true" class="icon-pencil"></span></a></td>
                <td>
                    <a href="#" title="{{__('form.delete')}}" data-toggle="modal" data-target="#modal_delete" data-del_url="{{route($item::getBaseRoute().'.destroy', [$item::getBaseRoute() => $item->id])}}">
                        <span aria-hidden="true" class="icon-trash"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        @endisset
        </tbody>

        <tfoot>
        <tr bb-group>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
@endsection

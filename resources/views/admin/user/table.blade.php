@extends('global.table_wraper')

@section('table')
        <thead>
        <tr bb-group>
            <th bb-order bb-name="id" class="sorting">
                id
            </th>
            <th bb-order bb-name="name" class="sorting">
                Name
            </th>
            <th bb-order bb-name="first_name" class="sorting">
                {{__('global.first_name')}}
            </th>
            <th bb-order bb-name="last_name" class="sorting">
                {{__('global.last_name')}}
            </th>
            <th bb-order bb-name="email" class="sorting">
                {{__('global.email')}}
            </th>
            <th bb-order bb-name="non_active" class="sorting">
                {{__('global.lock')}}
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
                <td>{{$item->name}}</td>
                <td>{{$item->first_name}}</td>
                <td>{{$item->last_name}}</td>
                <td>{{$item->email}}</td>
                <td>
                    @if($item->active)
                        <i class="fa fa-unlock"></i>
                    @else
                        <i class="fa fa-lock"></i>
                    @endif
                </td>
                <td><a href="{{route('users.edit', ['user' => $item->id])}}" title="{{__('form.edit')}}"><span aria-hidden="true" class="icon-pencil"></span></a></td>
                <td>
                    <a href="#" title="{{__('form.delete')}}" data-toggle="modal" data-target="#modal_delete" data-del_url="{{route('users.destroy', ['user' => $item->id])}}">
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
            <th></th>
            <th>
                {{Form::select('active',
                [
                    '' => __('global.lock'),
                    '0' => __('global.yes'),
                    '1' => __('global.no'),
                ],
                null, [
                'class' => 'form-control select',
                'bb-cahnge' => '',
                'bb-sg' => '',
                ])}}</th>


            <th></th>
            <th></th>
        </tr>
        </tfoot>
@endsection

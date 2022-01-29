@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @component('global.form')

        {!! Form::model($item, array('route' => array('users.update', $item->id), 'method' => 'PUT', 'class' => 'form-horizontal' )) !!}

        @include('admin.user.form')

    @endcomponent

</div></div></div></div>



    <div class="row">
        <div class="col-md-12">

            <div class="portlet light">

                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green-sharp bold uppercase">{{__('user.lock_user')}}</span>
                    </div>
                </div>

                <div class="portlet-body">
                    @if($item->active)
                        {!! Form::model($item, ['route' => ['users.lock', $item->id], 'method' => 'POST', 'class' => 'form-horizontal' ]) !!}
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-success" type="submit" value="save">{{__('user.lock')}}</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    @else
                        {!! Form::model($item, ['route' => ['users.unlock', $item->id], 'method' => 'POST', 'class' => 'form-horizontal' ]) !!}
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-danger" type="submit" value="save">{{__('user.unlock')}}</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="portlet light">

                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green-sharp bold uppercase">{{__('global.set_password')}}</span>
                    </div>
                </div>

                <div class="portlet-body">

                    {!! Form::model($item, array('route' => array('users_set_pass', $item->id), 'method' => 'PUT', 'class' => 'form-horizontal' )) !!}
                    <div class="form-body">

                        {!! FormHelper::form_group( 'password', 'password', __('global.password') )!!}

                        {!! FormHelper::form_group( 'password_confirmation', 'password', __('global.repeate_password') )!!}

                    </div>

                    @include('global.form_submit', ['cancel_url'=>route('users.index')])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="portlet light">

                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-green-sharp bold uppercase">{{__('user.roles')}}</span>
                    </div>
                </div>

                <div class="portlet-body">

                    {!! Form::model($item, array('route' => array('users_set_role', $item->id), 'method' => 'PUT', 'class' => 'form-horizontal' )) !!}
                    <div class="form-body">
                        <div class="form-group">

                            @foreach( $all_roles as $item_role )
                                <div class="row">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-4">
                                        @php
                                            $active_role = false;
                                        @endphp
                                        @foreach( $user_roles as $user_role )
                                            @if( $user_role->id == $item_role->id )
                                                @php
                                                    $active_role = true;
                                                @endphp
                                            @endif
                                        @endforeach
                                        {!! Form::checkbox('role[]', $item_role->name, $active_role ) !!}
                                        {{$item_role->name}}
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    @include('global.form_submit', ['cancel_url'=>route('users.index')])

    {!! Form::close() !!}


@endsection

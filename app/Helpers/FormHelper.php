<?php


namespace App\Helpers;

use Carbon;
use Illuminate\Support\Facades\URL;


class FormHelper
{
    public static function form_group( $name, $type, $label='', $required=false, $msg='', $options=false, $value=null )
    {
        $label = self::prepeare_label( $label, $required );
        $msg   = self::prepeare_msg($msg);

        if(!$options){
            $options = ['class' => 'form-control'];
        }

            $view_options = [
                'name' => $name,
                'type' => $type,
                'label' => $label,
                'required' => $required,
                'msg' => $msg,
                'options' => $options,
                'value' => $value,
            ];
            return view('form_helper.form_group', $view_options );
    }

    public static function form_group_select( $name, $options=array(), $label='', $required=false, $msg='', $value=false, $parametres=array() )
    {
        $label = self::prepeare_label($label, $required);
        $msg   = self::prepeare_msg($msg);

        if(count($parametres)===0){
            $parametres = ['class' => 'form-control'];
        }

        if(!$value){
            $value = null;
        }

        $view_options = [
            'name' => $name,
            'label' => $label,
            'select_options' => $options,
            'required' => $required,
            'msg' => $msg,
            'value' => $value,
            'parametres' => $parametres,
        ];
        return view('form_helper.form_group_select', $view_options );
    }

    public static function form_group_radio( $name, $selected_value=false, $options=array(), $label='', $required=false, $msg='' )
    {
        $label = self::prepeare_label($label, $required);
        $msg   = self::prepeare_msg($msg);

        $view_options = [
            'name' => $name,
            'label' => $label,
            'select_options' => $options,
            'required' => $required,
            'msg' => $msg,
            'selected_value' => $selected_value,
        ];
        return view('form_helper.form_group_radio', $view_options );
    }

    public static function form_group_file( $name, $file, $label='', $required=false, $msg='', $widget='link' )
    {
        $label = self::prepeare_label( $label, $required );
        $msg   = self::prepeare_msg($msg);

        $view_options = [
            'name' => $name,
            'label' => $label,
            'required' => $required,
            'msg' => $msg,
            'file' => $file,
            'widget' => $widget,
        ];
        return view('form_helper.form_group_file', $view_options );
    }

    public static function form_group_tel( $name, $label='', $required=false, $msg='', $prefix='+' )
    {
        $label = self::prepeare_label( $label, $required );
        $msg   = self::prepeare_msg($msg);

        $view_options = [
            'name' => $name,
            'label' => $label,
            'required' => $required,
            'msg' => $msg,
            'prefix' => $prefix,
        ];
        return view('form_helper.form_group_tel', $view_options );
    }

    public static function form_group_dob( $name, $value=null, $label='', $required=false, $msg='' )
    {
        $label = self::prepeare_label( $label, $required );
        $msg   = self::prepeare_msg($msg);

        if( $value!== null){
            $dob_d = Carbon::parse($value)->format('j');
            $dob_m = Carbon::parse($value)->format('n');
            $dob_y = Carbon::parse($value)->format('Y');
        }else{
            $dob_d = '';
            $dob_m = '';
            $dob_y = '';
        }

        $view_options = [
            'name' => $name,
            'name_d' => $name.'_d',
            'name_m' => $name.'_m',
            'name_y' => $name.'_y',
            'label' => $label,
            'required' => $required,
            'dob_d' => $dob_d,
            'dob_m' => $dob_m,
            'dob_y' => $dob_y,
            'msg' => $msg,
        ];
        return view('form_helper.form_group_dob', $view_options );
    }

    public static function form_group_wswg( $name, $label='', $required=false, $msg='' )
    {
        $label = self::prepeare_label( $label, $required );
        $msg   = self::prepeare_msg($msg);

        $view_options = [
            'name' => $name,
            'label' => $label,
            'required' => $required,
            'msg' => $msg,
        ];
        return view('form_helper.form_group_wswg', $view_options );
    }

    public static function form_group_lang( $name, $label='' )
    {
        $required = false;
        $label = self::prepeare_label( $label, $required );

        $view_options = [
            'name' => $name,
            'label' => $label,
        ];
        return view('form_helper.form_group_lang', $view_options );
    }

    public static function form_group_checkbox( $name, $value=1, $label='', $required=false, $msg='', $checked=false )
    {
        $label = self::prepeare_label( $label, $required );
        $msg   = self::prepeare_msg($msg);

        $view_options = [
            'name' => $name,
            'value' => $value,
            'label' => $label,
            'required' => $required,
            'msg' => $msg,
            'checked' => $checked,
        ];
        return view('form_helper.form_group_checkbox', $view_options );
    }

    public static function error( $name  )
    {
        $view_options = [
            'name' => $name,
        ];

        return view('form_helper.error', $view_options );
    }

    protected static function prepeare_label( $label, $required ){
        if($required){
            $label.='<span class="required"> * </span>';
        }
        return $label;
    }

    protected static function prepeare_msg( $msg ){
        if( $msg !== '' ){
            return view('form_helper.msg', ['msg' => $msg ] );
        }
        return '';
    }

    public static function date_prepeare( $request, $field_name='DOB' ){
        if( !isset($request->DOB_y) || !isset($request->DOB_m) || !isset($request->DOB_d)  ){
            return null;
        }

        $date = $request->DOB_y.'-'.$request->DOB_m.'-'.$request->DOB_d;
        return $date;
    }

    public static function form_currency( $name, $value )
    {
        $currency = config('system.currency');
        return view('form_helper.form_currency', ['name' => $name, 'currency' => $currency, 'value'=>$value ] );
    }

    public static function unique_token()
    {
        $token = md5(time().rand ( 1000 , 999999 )) . md5(URL::current().rand ( 1000 , 999999 ));
        echo '<input name="_unique_token" type="hidden" value="'.$token.'">';
    }


}

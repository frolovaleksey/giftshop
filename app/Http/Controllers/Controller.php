<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $perPage = 10;
    protected $searchFields = [];

    public function __construct()
    {

    }

    public function setPerPage( int $perPage )

    {
        if( $this->perPage !== false ){
            $this->perPage = $perPage;
        }
    }

    public function prepeareQuery( $query, Request $request )
    {
        // search
        $query = $this->prepeareSearchQuery($query, $request);

        // sort group
        $query = $this->prepeareSortQuery($query, $request);

        // order
        if ($request->has('order')) {
            $query->orders = null;
            $order = $request->input('order');
            foreach ($order as $order_key => $order_value ) {
                $query->orderBy( $order_key, $order_value );
            }
        }

        // per page
        if ($request->has('perPage')) {
            $this->setPerPage ($request->input('perPage'));
        }

        return $query;
    }

    public function prepeareSearchQuery( $query, Request $request )
    {
        if ( $search = $request->input('search') ) {
            foreach ($this->searchFields as $field_name ) {
                $query->orWhere( $field_name, 'like', '%'.$search.'%' );
            }
        }
        return $query;
    }

    public function prepeareSortQuery( $query, Request $request )
    {
        if ($request->has('sg')) {
            $sg = $request->input('sg');
            foreach ($sg as $sg_key => $sg_value ) {
                $query->where( $sg_key, 'like', '%'.$sg_value.'%' );
            }
        }

        if ($request->has('sgs')) {
            $sg = $request->input('sgs');
            foreach ($sg as $sg_key => $sg_value ) {
                $query->where( $sg_key, $sg_value );
            }
        }

        return $query;
    }

    protected function prepeareSpecialQuery($query, Request $request)
    {
        return $query;
    }



    protected static function test()
    {
        $request = \request();
        echo '<pre>';
        var_export($request->toArray());
        echo '</pre>';
        dd('stop');
    }
}

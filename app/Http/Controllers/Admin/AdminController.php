<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        // Permissions
        $this->checkPermissions();
    }

    protected function checkPermissions()
    {
        $current_class = get_class($this);
        $f = new \ReflectionClass( $current_class );
        foreach ($f->getMethods(\ReflectionMethod::IS_PUBLIC) as $m) {
            if ($m->class == $current_class ) {
                $temp_name = str_replace('\\', '_', $current_class);
                $this->middleware('permission:'.$temp_name.'_'.$m->name,   ['only' => [$m->name]]);
            }
        }
    }
}

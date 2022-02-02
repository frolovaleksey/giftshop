<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

abstract class NodeController extends Controller
{
    protected $nodeObj = null;

    public function __construct()
    {
        parent::__construct();

        $this->nodeObj = $this->getNodeObj();
    }

    abstract protected function getNodeObj();

    public function index(Request $request)
    {
        $query = $this->nodeObj::query();

        $items = null;
        if( $request->ajax() ){
            $query = $this->prepeareSpecialQuery($query, $request);
            $items = $this->prepeareQuery($query, $request)->paginate( $this->perPage );
        }

        $view_options = [
            'items' => $items,
            'nodeObj' => $this->nodeObj,
            'hide_search' => true,
            'add_url' => route($this->nodeObj::getBaseRoute(). '.create'),
            'add_text' => __( $this->nodeObj::getBaseLoc().'.add_item'),
            'page_title' => __($this->nodeObj::getBaseLoc().'.index_items'),
        ];

        if( $request->ajax() ){
            $result = view($this->nodeObj::getBaseViewFolder().'.table', $view_options) . view('global.pagination', $view_options);
            return $result;
        }

        return view($this->nodeObj::getBaseViewFolder().'.index', $view_options);
    }

    public function create()
    {
        $item = new $this->nodeObj();
        $view_options = [
            'page_title' => __($this->nodeObj::getBaseLoc().'.add_item'),
            'item' => $item,
        ];
        return view($this->nodeObj::getBaseViewFolder().'.create', $view_options);
    }

    public function store(Request $request)
    {
        $item = new $this->nodeObj();
        $this->validate($request, $item->getValidationRules() );
         $item->saveRequest($request);

        return redirect()->route($this->nodeObj::getBaseRoute().'.edit', [$this->nodeObj::getBaseRoute() => $item]);
    }

    public function edit($id)
    {
        $item = $this->nodeObj::findOrFail( $id );

        $view_options = [
            'item' => $item,
            'page_title' => __($this->nodeObj::getBaseLoc().'.edit_item'),
        ];
        return view($this->nodeObj::getBaseViewFolder().'.edit', $view_options);
    }

    public function update(Request $request, $id)
    {
        $item = $this->nodeObj::findOrFail( $id );

        $this->validate($request, $item->getValidationRules() );
        $item->saveRequest($request);

        return redirect()->route($this->nodeObj::getBaseRoute().'.edit', [$this->nodeObj::getBaseRoute() => $item]);
    }

    public function destroy($id)
    {
        $item = $this->nodeObj::findOrFail($id);
        $item->delete();
        return redirect()->route($this->nodeObj::getBaseRoute().'.index');
    }

}

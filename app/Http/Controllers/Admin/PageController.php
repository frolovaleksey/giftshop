<?php


namespace App\Http\Controllers\Admin;


use App\Page;
use App\Services\Pages\HomePage;
use Illuminate\Http\Request;

class PageController extends NodeController
{
    protected function getNodeObj()
    {
        return 'App\Page';
    }

    public function edit($id)
    {
        $item = Page::findItem($id);

        $view_options = [
            'item' => $item,
            'page_title' => __($this->nodeObj::getBaseLoc().'.edit_item'),
        ];
        return view($this->nodeObj::getBaseViewFolder().'.edit', $view_options);
    }

    public function update(Request $request, $id)
    {
        $item = Page::findItem($id);

        $this->validate($request, $item->getValidationRules() );
        $item->saveRequest($request);

        return redirect()->route($this->nodeObj::getBaseRoute().'.edit', [$this->nodeObj::getBaseRoute() => $item]);
    }
}

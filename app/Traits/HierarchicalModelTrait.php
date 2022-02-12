<?php


namespace App\Traits;


trait HierarchicalModelTrait
{
    public static function renderHierarchicalCheckbockses($selectesItems=null, $modelItems=null)
    {
        if($modelItems === null) {
            $tax = static::class;
            $modelItems = $tax::with('fields')->get();
        }

        $itemsArray = self::prepareItems($modelItems, $selectesItems);
        $list = self::renderLevel($itemsArray);

        return view('form_helper.hierarchical.block', ['list' => $list, 'loc' => static::getBaseLoc()] )->render();
    }

    public static function renderLevel($itemsArray)
    {
        $li = '';
        foreach ($itemsArray as $item) {
            $li.= view('form_helper.hierarchical.li', $item )->render();
        }

        return view('form_helper.hierarchical.ul', ['li' => $li] )->render();
    }

    public static function prepareItems($modelItems, $selectesItems)
    {

        $items = [];
        foreach ($modelItems as $taxItem){
            $items[$taxItem->id] = $taxItem;
        }

        $itemsByParent = [];
        foreach ($items as $key => $item) {
            if($item->parent_id === null || $item->parent_id == 0){

                $tempItem = $item;
                unset($items[$key]);

                if($selectesItems === null){
                    continue;
                }

                $selectedItem = $selectesItems->filter(function ($value, $key) use($item) {
                    return $value->id == $item->id;
                })->first();

                $selected = false;
                if($selectedItem !== null ){
                    $selected = true;
                }

                $children = self::findChildren($item, $key, $items, $selectesItems);
                $itemsByParent[$item->id] = [
                    'model' => $tempItem,
                    'selected' => $selected,
                    'children' => $children
                ];
            }
        }

        return $itemsByParent;
    }

    public static function findChildren($parentItem, $parentItemKey, &$items, $selectesItems)
    {
        $result = [];

        foreach ($items as $key => $item) {
            if($item->parent_id == $parentItem->id){
                $tempItem = $item;

                unset($items[$key]);

                $selectedItem = $selectesItems->filter(function ($value, $key) use($item) {
                    return $value->id == $item->id;
                })->first();

                $selected = false;
                if($selectedItem !== null ){
                    $selected = true;
                }

                $children = self::findChildren($item, $key, $items, $selectesItems);

                $result[$item->id] = [
                    'model' => $tempItem,
                    'selected' => $selected,
                    'children' => $children
                ];
            }
        }
        return $result;
    }
}

<?php


namespace App\Traits;


trait ParentTrait
{
    public $parrentable = false;

    public function getParentOptions()
    {
        $obj = get_class($this);
        $items = $obj::with(['fields' => function ($query) {
            $query->where('fkey', 'title');
        }])
            ->where('id', '!=', $this->id)->get();

        $options = [
            null => '--'
        ];
        foreach ($items as $item) {

            $field = $item->fields->first();

            if( $field !== null ){
                $options[$item->id] = $field->value;
            }else{
                $options[$item->id] = '(Empty title)';
            }
        }

        return $options;
    }
}

<?php


namespace App\Helpers\FormGroup;


use Illuminate\Http\Request;

abstract class FormGroupElement
{
    protected $name;
    protected $options=[];
    protected $label=null;
    protected $value=null;
    protected $attr= ['class' => 'form-control'];
    protected $errorKey=null;
    protected $msg=null;
    protected $required=false;
    protected $absoluteHtml=null;
    protected $thirdCol=null;
    protected $view=null;
    protected $validationRules=null;
    protected $media=false;
    protected $repeater=false;
    protected $relation = false;
    protected $fieldObj=null; // App\Field
    protected $filableItem=null; /// App\Page  App\Post ...

    public function __construct($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function isMedia()
    {
        return $this->media;
    }

    public function isRepeater()
    {
        return $this->repeater;
    }

    public function isRelation()
    {
        return $this->relation;
    }

    public function setOptions($options)
    {
        $this->options = $options;
        return $this;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function setRequired()
    {
        $this->required = true;
        return $this;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function setAttr(array $attr)
    {
        $this->attr = $attr;
        return $this;
    }

    public function setErrorKey($errorKey)
    {
        $this->errorKey = $errorKey;
        return $this;
    }

    public function setValidationRules($validationRules)
    {
        $this->validationRules = $validationRules;
        return $this;
    }

    public function setFieldObj($fieldObj)
    {
        $this->fieldObj = $fieldObj;
        return $this;
    }

    public function getFieldObj()
    {
        return $this->fieldObj;
    }

    public function setFilableItem($item)
    {
        $this->filableItem = $item;
        return $this;
    }

    public function getFilableItem()
    {
        return $this->filableItem;
    }

    public function getValidationRules()
    {
        if($this->validationRules !== null ){
            return [
                $this->getName() => $this->validationRules
            ];
        }

        return [];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValueFromRequest(Request $request)
    {
        $name = $this->getName();
        return $request->$name;
    }

    protected function prepeareLabel(){
        if($this->required){
            $this->label.='<span class="required"> * </span>';
        }
    }

    protected function prepeareMsg(){
        if( $this->msg !== null ){
            $this->msg = view('form_helper.msg', ['msg' => $this->msg ] );
        }
    }

    protected function prepeareErrorKey()
    {
        if( $this->errorKey === null ){
            $this->errorKey = $this->name;
        }
    }

    protected function prepeareThirdCol()
    {
        if( $this->absoluteHtml !== null ){
            $this->thirdCol = '<div class="bb_absolute">' . $this->absoluteHtml .  '</div>>';
        }
    }

    protected function prepareParametres()
    {
        $this->prepeareLabel();
        $this->prepeareMsg();
        $this->prepeareErrorKey();
        $this->prepeareThirdCol();
    }

    public function getViewOptions()
    {
        return $this->prepareViewOptions(
            [
            'name' => $this->name,
            'label' => $this->label,
            'select_options' => $this->options,
            'required' => $this->required,
            'msg' => $this->msg,
            'value' => $this->value,
            'parametres' => $this->attr,
            'errorKey' => $this->errorKey,
            'thirdCol' => $this->thirdCol,
            'fieldObj' => $this->fieldObj,
            'filableItem' => $this->filableItem,
        ]
        );
    }

    public function prepareViewOptions($viewOptions)
    {
        return $viewOptions;
    }

    public function renderView()
    {
        return view($this->view, $this->getViewOptions() );
    }

    public function get()
    {
        $this->prepareParametres();
        return $this->renderView();
    }
}

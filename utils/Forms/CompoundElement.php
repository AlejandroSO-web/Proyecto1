<?php
require_once __DIR__ . "/DataElement.php";
abstract class CompoundElement extends DataElement
{
    /**
     * Hijos del elemento
     *
     * @var array
     */
    protected $children;
    
	public function __construct()
	{
        $this->children = [];
        parent::__construct();
    }

    /**
     * @param Element $child
     * @return void
     */
    public function appendChild(Element $child){
        $this->children[] = $child;
        return $this;
    }
    /**
     *
     * @return array
     */
    public function getChildren(): array{
        return $this->children;
    }

    protected function hasChildOfClass(string $elementClass): bool{
        foreach ($this->getChildren() as $child) {
            if ( get_class($child) ==  $elementClass) {
                return true;
            }else{
                if (is_subclass_of($child, "CompoundElement")) {
                    return $child->hasChildOfClass($elementClass);                    	
                }
            }
        } 
        return false;
    }
    public function validate()
    {
        foreach ($this->getChildren() as $child) {
            if (is_subclass_of($child, "DataElement")) {
                $child->validate();
                if ($child->hasError()){
                    $this->errors = array_merge($this->errors, $child->getErrors());
                }	
            }
        } 
    }

    public function hasError(): bool
    {
        return (count($this->errors) > 0);
    }
    public function getErrors(): array
    {
        return $this->errors;
    }

    public function reset()
    {
        foreach ($this->getChildren() as $child) {
            if (is_subclass_of($child, "DataElement")) {
                $child->reset();
            }
        } 
    }

}
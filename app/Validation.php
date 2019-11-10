<?php

class Validation {
    protected $passed = false, $errors = [];

    public function check($source, $items = array()){
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){

                $value = trim($source[$item]);
                $item = sanitize($item);

                if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                }
                elseif(!empty($value)){
                    switch($rule){
                        case 'min':
                            if(strlen($value) < $rule_value){
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                        break;
                    }
                }
            }
        }
        if(empty($this->errors)){
            $this->passed = true;
        }
        return $this;
    }

    private function addError($error){
        $this->errors[] = $error;
    } 

    public function errors(){
        return $this->errors;
    }

    public function passed(){
        return $this->passed;
    }
}
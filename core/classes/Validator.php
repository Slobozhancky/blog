<?php

namespace Core\Classes;

class Validator {
    protected $errors = [];
    protected $data_items;

    /**
     * У змінній - rules_list, ми декларуємо всі назви методів, які будемо додавати у класі Validator, щоб можна було цей список використовувати при сплацюванні методу 
     * 
     */
    protected $rules_list = ['required', 'min', 'max', 'email', 'match'];
    protected $messages = [
        'required' => 'Поле :fieldname: повинно бути обов\'язковим',
        'min' => 'Поле :fieldname: повинно бути більше :rules: символів',
        'max' => 'Поле :fieldname: повинно бути меншe :rules: символів',
        'email' => 'Не валідне поле електроної адреси',
        'match' => 'Поле :fieldname: повинно бути рівним полю password',

    ];
    

    public function validate($data, $rules): object{

        $this->data_items = $data;

        foreach ($data as $fieldname => $value) {
            if (isset($rules[$fieldname])) {
                $this->checked([
                    'fieldname' => $fieldname,
                    'value' => $value,
                    'rules' => $rules[$fieldname],
                ]);
            }
        }

        d($this->getErrors()); 

        return $this;
    }

    protected function checked($field){

        foreach ($field['rules'] as $rule => $rule_value) {
            if (in_array($rule, $this->rules_list)) {
                if(!call_user_func_array([$this, $rule], [$field['value'], $rule_value])){
                    $this->addError($field['fieldname'], str_replace([":fieldname:", ":rules:"], [$field['fieldname'], $rule_value], $this->messages[$rule]));
                }
            }
        }
    }

    protected function addError($fieldname, $error){
        $this->errors[$fieldname][] = $error;
    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErrors(){
        return !empty($this->errors);
    }

    public function errorsList($fieldname){
        
        $output = '';
        if(isset($this->errors[$fieldname])){
            $output .= "<div class='invalid-feedback d-block'><ul class='list-unstyled'>";
                foreach ($this->errors[$fieldname] as $error) {
                $output .= "<li>{$error}</li>";
                }
            $output .= "</ul></div>";
        }

        return $output;
    }

    protected function required($value, $rule_value){
        return !empty(trim($value));
    }

    protected function min($value, $rule_value){
        return mb_strlen($value, 'UTF-8') >= $rule_value;
    }

    protected function max($value, $rule_value){
        return mb_strlen($value, 'UTF-8') <= $rule_value;
    }

    protected function email($value, $rule_value){
        $email_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($email_pattern, $value);
    }

    protected function match($value, $rule_value)
    {
        $match = false;
        
        if ($this->data_items['password'] === $this->data_items['repassword']) {
            $match = true;
        }

        return $match;

        // це короткий, більш кращий варіант запису, але я вже прям заплутався :) 
        
        // return $value === $this->data_items[$rule_value];
    }

}
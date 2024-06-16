<?php

class Validator {
    protected $errors = [];
    protected $rules_list = ['reqired', 'min', 'max', 'email'];
    protected $messages = [
        'required' => 'Поле :fieldname: повинно бути обов\'язковим',
        'min' => 'Поле :fieldname: повинно бути більше :rules: символів',
        'max' => 'Поле :fieldname: повинно бути меншe :rules: символів',
        'email' => 'Не валіаднеполе електроної адреси',
    ];
    

    public function validate($data, $rules): object{
        foreach ($data as $fieldname => $value) {
            if (in_array($fieldname, array_keys($rules))) {
                $this->checked([
                    'fieldname' => $fieldname,
                    'value' => $value,
                    'rules' => $rules[$fieldname],
                ]);
            }
        }

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

    protected function requiredField($value, $rule_value){
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

}
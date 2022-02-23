<?php
namespace Libraries\Validations;

trait Basic
{
    # 1 Public methods
    # 1.1 isEmpty
    public function isEmpty($Var): bool
    {
        if(empty($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.2 isNotEmpty
    public function isNotEmpty($Var): bool
    {
        if(!empty($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.3 isBool
    public function isBool($Var): bool
    {
        if($this->isBool($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 1.4 isValue
    public function isValue($Var, $Value): bool
    {
        if($Var == $Value)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.5 isNotValue
    public function isNotValue($Var, $Value): bool
    {
        if($Var != $Value)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.6 isOneOfValue
    public function isOneOfValues($Var, $ValueArray): bool
    {
        if(in_array($Var,$ValueArray))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.7 isNotOneOfValues
    public function isNotOneOfValues($Var, $ValueArray): bool
    {
        if(!in_array($Var,$ValueArray))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.8 isMail
    public function isMail($Var): bool
    {
        if(filter_var($Var, FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.9 isDate
    public function isDate($Var): bool
    {
        return true;
    }
}
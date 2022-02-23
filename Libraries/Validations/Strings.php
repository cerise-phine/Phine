<?php
namespace Libraries\Validations;

trait Strings
{
    # 1 Public methods
    # 1.1 isNumeric
    public function isNumeric($Var): bool
    {
        if(is_numeric($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.2 isNotNumeric
    public function isNotNumeric($Var): bool
    {
        if(!is_numeric($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.3 isAlpha
    public function isAlpha($Var): bool
    {
        if(ctype_alpha($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.4 isAlphaNumeric
    public function isAlphaNumeric($Var): bool
    {
        if(ctype_alnum($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 1.5 minLength
    public function minLength($Var, $Length = 1): bool
    {
        if(strlen($Var) >= $Length)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.5 maxLength
    public function maxLength($Var, $Length = 1): bool
    {
        if(strlen($Var) <= $Length)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
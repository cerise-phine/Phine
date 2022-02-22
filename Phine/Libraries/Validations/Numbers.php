<?php
namespace Libraries\Validations;

trait Numbers
{
    # 1 Public methods
    # 1.1 isInt
    public function isInt($Var): bool
    {
        if(is_int($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.2 isNotInt
    public function isNotInt($Var): bool
    {
        if(!is_int($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    # 1.3 isFloat
    public function isFloat($Var): bool
    {
        if($this->isFloat($Var))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
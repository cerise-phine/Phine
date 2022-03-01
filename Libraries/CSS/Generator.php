<?php
namespace Libraries\CSS;

class Generator
{
    # 1 Traits
    use GeneratorVariables;
    
    # 2 Public methods
    # 2.1 Generator
    public function Generator($Var = false): array
    {
        switch($Var)
        {
            case 'Attributes':
                return $this->Attributes;
                
            default:
                return array(
                    'Attributes'                    => $this->Attributes
                );
        }
    }
}
<?php
namespace Libraries\Validations;

class Validations
{
    # 1 Traits
    use Basic;
    use Numbers;
    use Strings;
    
    # 1 Magic methods
    # 1.1 __construct
    public function __construct()
    {
        
    }
    
    # 1.2 __get
    public function __get($Var): ?string
    {
        return 'CSS library yeeeey';
    }
    
    # 1.3 __debugInfo
    final public function __debugInfo(): array
    {
        $DebugOutput                                = array();
        
        $Methods                                    = new \ReflectionClass(__CLASS__);
        
        if($Methods !== false)
        {
            $DebugOutput                            = $Methods->getMethods();
        }
        
        return $DebugOutput;
    }
}
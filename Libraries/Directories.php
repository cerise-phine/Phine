<?php
namespace Libraries;

class Directories
{
    # 1 Variables and constants
    private         $Get                            = array();

    # 2 Magic methods
    # 2.1 __construct
    final public function __construct()
    {
        
    }
    
    # 2.2 __get
    final public function __get($Var): ?string
    {
        return 'CSS library yeeeey';
    }
    
    # 2.6 __debugInfo
    final public function __debugInfo(): array
    {
        $DebugOutput                                = array();
        
        return $DebugOutput;
    }
    
    # 4 Private methods
}
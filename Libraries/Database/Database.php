<?php
namespace Libraries\Database;

class Database
{
    # 1 Traits
    use Connect;
    use Delete;
    use Insert;
    use Select;
    use Update;
    
    # 2 Variables and constants
    private         $Config                         = array();
    private         $Database                       = array();
    private         $Defaults                       = array
                    (
                        'PDSN'                          => 'mysql',
                        'Ports'                         => array
                        (
                            'mysql'                         => 3306,
                            'pgsql'                         => 5432
                        ),
                        'Charset'                       => 'UTF8'
                    );

    # 2 Magic methods
    # 2.1 __construct
    final public function __construct($DatabaseConfig)
    {
        
    }
    
    # 2.2 __get
    final public function __get($Var): ?string
    {
        return 'CSS library yeeeey';
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): void
    {
        
    }
    
    # 2.6 __debugInfo
    final public function __debugInfo(): array
    {
        $DebugOutput                                = array();
        
        return $DebugOutput;
    }
    
    
    
    
    
    
    
    
    # 4 Private methods
    
    
    
}
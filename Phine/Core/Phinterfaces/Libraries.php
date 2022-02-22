<?php
namespace Core\Phinterfaces;

class Libraries extends \Core\Config\Constants
{
    # 1 Constants and variables
    private         $DynamicNamespace               = self::NAMESPACE_DYNAMIC_LIBRARIES;
    private         $DefaultNamespace               = self::NAMESPACE_DEFAULT_LIBRARIES;
    private         $Dynamic                        = array();
    private         $Default                        = array(
                        'CSS'                           => 'CSS\\CSS',
                        'HTML'                          => 'HTML\\HTML',
                        'JavaScript'                    => 'JavaScript\\JavaScript',
                        'Validations'                   => 'Validations\\Validations',
                        'CSV'                           => 'CSV',
                        'Cache'                         => 'Cache',
                        'DB'                            => 'Database',
                        'Directories'                   => 'Directories',
                        'EMail'                         => 'EMail',
                        'Files'                         => 'Files'
                    );
    private         $Instances                      = array();
    private static  $DebugMode                      = false;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct($DebugMode = false)#: void
    {
        if($DebugMode === true)
        {
            self::$DebugMode                        = true;
        }
    }
    
    # 2.2 __get
    final public function __get($Var): ?object
    {
        return $this->Libraries($Var);
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): void
    {
        
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $Debug['DebugMode']                         = self::$DebugMode;
        
        $Debug['DynamicNamespace']                  = $this->DynamicNamespace;
        $Debug['DefaultNamespace']                  = $this->DefaultNamespace;
        $Debug['Dynamic']                           = $this->Dynamic;
        $Debug['Default']                           = $this->Default;

        if(self::$DebugMode === true)
        {
            $Debug['Instances']                     = $this->Instances;
        }

        return $Debug;
    }
    
    # 2 Public Methods
    # 2.1 Libraries
    public function Libraries($Library): ?object
    {
        if($this->instanceLibrary($Library))
        {
            return $this->Instances[$Library];
        }
        else
        {
            return null;
        }
    }
    
    # 2.2 checkLibrary
    public function checkLibrary($Library): bool
    {
        if(isset($this->Default[$Library]) || isset($this->Dynamic[$Library]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 3 Private Methods
    # 3.1 instanceLibrary
    private function instanceLibrary($Library, $Alias = false): bool
    {
        if($Alias === false)
        {
            $Alias                                  = $Library;
        }
        
        if(!isset($this->Default[$Library]) && !isset($this->Dynamic[$Library]))
        {
            return false;
        }
        elseif
        (
            (isset($this->Default[$Library]) || isset($this->Dynamic[$Library]))
            && (isset($this->Instances[$Alias]) && is_object($this->Instances[$Alias]))
        )
        {
            return true;
        }
        elseif
        (
            (isset($this->Default[$Library]) || isset($this->Dynamic[$Library]))
            && (!isset($this->Instances[$Alias]))
        )
        {
            $LibraryWithNamespace                   = $this->DefaultNamespace . $this->Default[$Library];
            $this->Instances[$Alias]                = new $LibraryWithNamespace(self::$DebugMode);
            
            return true;
        }
    }
}
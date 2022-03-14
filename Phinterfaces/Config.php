<?php
namespace Phinterfaces;

class Config extends \Config\Constants
{
    # 1 Variables
    private         $Instances                      = array();
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct()#: void
    {
        
    }
    
    # 2.2 __get
    final public function __get($Config): ?object
    {
        if($this->instanceConfig($Config))
        {
            return $this->Instances[$Config];
        }
        else
        {
            return null;
        }
    }
    
    # 2.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        $Debug['DebugMode']                         = self::$DebugMode;
        
        if(self::$DebugMode === true)
        {
            $Debug['Instances']                     = $this->Instances;
        }

        return $Debug;
    }
    
    # 3 Public methods
    # 3.1 instanceConfig
    public function instanceConfig($Config): ?bool
    {
        if(isset($this->Instances[$Config]) && is_object($this->Instances[$Config]))
        {
            return true;
        }
        elseif(is_string($Config) && in_array($Config, self::CONFIGS))
        {
            $ConfigClass                        = self::NAMESPACE_DEFAULT_CONFIGS . $Config;
            $this->Instances[$Config]           = new $ConfigClass();
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 4 Private methods
    
}
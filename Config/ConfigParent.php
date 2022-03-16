<?php
namespace Config;

class ConfigParent extends \Config\Constants
{
    # 1 Variables
    private         $Config                         = null;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct()#: void
    {
        $this->initConfig();
    }
    
    # 2.2 __get
    final public function __get($Var)#: ?mixed
    {
        if(isset($this->Config[$Var]))
        {
            return $this->Config[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        return $this->getProperties();
    }
    
    # 3 Public methods
    public function Defaults($Var = false)#: ?mixed
    {
        $Defaults                               = $this->getProperties();
        
        if(isset($Defaults[$Var]))
        {
            return $Defaults[$Var];
        }
        elseif($Var === false)
        {
            return $Defaults;
        }
        else
        {
            return null;
        }
    }
    
    # 4 Private methods
    # 4.1 initConfig
    private function initConfig(): void
    {
        $initConfig                             = $this->getProperties();
        
        if($initConfig)
        {
            $this->Config                       = $initConfig;
        }
    }
    
    # 4.2 getProperties
    private function getProperties(): ?array
    {
        $getProperties                              = array();
        $ConfigClass                                = self::NAMESPACE_DEFAULT_CONFIGS . $this->ConfigClass;
        $ReflectionClass                            = new \ReflectionClass($ConfigClass);
        $Properties                                 = $ReflectionClass->getProperties();
        
        foreach($Properties as $Key => $Property)
        {
            $PropertyName                           = $Property->name;
            $ReflectionProperty                     = new \ReflectionProperty($ConfigClass, $PropertyName);
            
            if($ReflectionProperty->isStatic())
            {
                $PropertyValue                      = $ReflectionClass->getStaticPropertyValue($PropertyName);
                $getProperties[$PropertyName]       = $PropertyValue;
            }
        }
        
        return $getProperties;
    }
}
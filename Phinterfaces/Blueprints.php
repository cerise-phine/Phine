<?php
namespace Phinterfaces;

class Blueprints extends \Config\Constants
{
    # 1 Variables
    # 1.1 Variables for Phinterface
    public  static  $Phinterphace                   = array
                                                    (
                                                        
                                                    );
    private static  $Phinstance                     = false;
    
    # 1.2 Specific variables
    private         $Instances                      = null;
    private         $DefaultBlueprints              = null;
    private         $CustomBlueprints               = null;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct($DefaultBlueprints)#: void
    {
        
        $this->initBlueprints($DefaultBlueprints);
    }
    
    # 2.2 __get
    final public function __get($Blueprint): ?object
    {
        return $this->Blueprints($Blueprint);
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): void
    {
        
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $Debug['DebugMode']                         = self::$DebugMode;
        
        $Debug['DefaultBlueprints']                 = $this->DefaultBlueprints;
        $Debug['CustomBlueprints']                  = $this->CustomBlueprints;
        $Debug['Instances']                         = $this->Instances;
        
        return $Debug;
    }
    
    # 3 Public Methods
    # 3.1 Blueprints
    public function Blueprints($Blueprint): ?object
    {
        if($this->instanceBlueprint($Blueprint))
        {
            return $this->Instances[$Blueprint];
        }
        else
        {
            return null;
        }
    }
    
    # 4 Private Methods
    # 4.1 initBlueprints
    private function initBlueprints($DefaultBlueprints): void
    {
        $this->DefaultBlueprints                    = $DefaultBlueprints;
        
    }
    
    # 4.2 instanceBlueprint
    private function instanceBlueprint($Blueprint): bool
    {
        if(isset($this->Instances[$Blueprint]) && is_object($this->Instances[$Blueprint]))
        {
            return true;
        }
        else
        {
            $BlueprintFile                          = $this->getBlueprintFile($Blueprint);
            if(is_string($BlueprintFile))
            {
                $HelperClass                        = self::NAMESPACE_HELPERS . 'Blueprint\\Blueprint';
                $this->Instances[$Blueprint]        = new $HelperClass($BlueprintFile);
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    
    # 4.3 getBlueprintFile
    private function getBlueprintFile($Blueprint): ?string
    {
        if(is_string($Blueprint) && in_array($Blueprint, \Config\Defaults\Blueprints::$Defaults))
        {
            $BlueprintFile                              = $this->Constants('DirRoot');
            $BlueprintFile                              .= self::DIR_PHINE_ASSET_BLUEPRINTS;
            $BlueprintFile                              .= $Blueprint . '.json';
            
            if(file_exists($BlueprintFile))
            {
                return $BlueprintFile;
            }
            else
            {
                return null;
            }
        }
        else
        {
            return null;
        }
    }
}
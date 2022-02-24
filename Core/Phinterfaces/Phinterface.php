<?php
namespace Core\Phinterfaces;

trait Phinterface
{
    # 1 Constants and variables
    private         $Phinterface                    = null;

    # 2 Public Methods
    # 2.1 Phinterface
    public function Phinterface($Phinterface = false, $Set = false)#: mixed
    {
        if($Phinterface === 'Debug')
        {
            if(self::$DebugMode === true)
            {
                return array
                (
                    'PhinterfaceCount'              => count($this->Phinterface),
                    'Phinterfaces'                  => $this->Phinterface
                );
            }
            else
            {
                return null;
            }
        }
        elseif($Phinterface === 'all')
        {
            return array_keys($this->Phinterface);
        }
        elseif(is_string($Phinterface) && $Set === false)
        {
            return (isset($this->Phinterface[$Phinterface]) ? true : false);
        }
        elseif(
            is_string($Phinterface) && $Set === true
            && (
                isset($this->Phinterface[$Phinterface])
                && isset($this->Phinterface[$Phinterface][2])
                && $this->Phinterface[$Phinterface][2] === true
            )
        ) {
            return true;
        }
        else
        {
            return null;
        }
    }
    
    # 2.2 getPhinterface
    public function getPhinterface($Identifier)#: mixed
    {
        if(isset($this->Phinterface[$Identifier]))
        {
            $Phinterface                            = $this->Phinterface[$Identifier];
            $Call                                   = $this->checkPhinterfaceCall($Phinterface);
            
            if($this->checkPhinterfaceArguments($Phinterface[1]))
            {
                $Arguments                          = (is_string($Phinterface[1]) ? array($Phinterface[1]) : $Phinterface[1]);
            }
            else
            {
                $Arguments                          = array();
            }
            
            return call_user_func_array(array($this, $Call), $Arguments);
        }
        
        return null;
    }
    
    # 2.3 setPhinterface
    public function setPhinterface($Identifier, $Values): void
    {
        if($this->checkPhinterfaceSet($Identifier, $Values))
        {
            $Phinterface                            = $this->Phinterface[$Identifier];
            $Call                                   = $this->checkPhinterfaceCall($Phinterface);
            $this->getDebug($Values);
            #call_user_func(array($this, $this->Phinterface[$Call]), $Values);
        }
    }
    
    # 2.4 checkPhinterfaceCall
    public function checkPhinterfaceCall($Identifier)#: mixed
    {
        if
        (
            is_string($Identifier)
            && (
                method_exists($this, $Identifier)
            )
        )
        {
            return $Identifier;
        }
        
        elseif
        (
            is_array($Identifier)
            && (
                isset($Identifier[0])
                && is_string($Identifier[0])
                && method_exists($this, $Identifier[0])
            )
        )
        {
            return $Identifier[0];
        }
        
        else
        {
            #$this->setIncident('Error', 'failed to call ' . serialize($Call));
            return null;
        }
    }
    
    # 2.5 checkPhinterfaceArguments
    public function checkPhinterfaceArguments($Arguments): bool
    {
        if(
            (is_string($Arguments) && !empty($Arguments))
        )
        {
            #return $Arguments;
            return true;
        }
        else
        {
            #$this->setIncident('Error', 'Argument check failed');
            return false;
        }
    }
    
    # 2.6 checkPhinterfaceSet
    public function checkPhinterfaceSet($Identifier, $Value): bool
    {
        if(isset($this->Phinterface[$Identifier]) && isset($this->Phinterface[$Identifier][2]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 3 Private Methods
    # 3.1 initPhinterface
    private function initPhinterface($Reset = false): bool
    {
        if(is_null($this->Phinterface) || $Reset === true)
        {
            $this->Phinterface                      = array();
            $Phinterfaces                           = array();
            $Phinterfaces['Phinterface']            = array('Phinterface', 'PhinterfaceDebug');
            
            $ReflectionClass                        = new \ReflectionClass(__CLASS__);
            $Traits                                 = $ReflectionClass->getTraitNames();

            foreach($Traits AS $Trait)
            {
                if($Trait === 'Core\\Phinterface')
                {
                    continue;
                }
                else
                {
                    $Phinterfaces                   = $this->fetchPhinterface($Phinterfaces, $Trait);
                }
            }
            
            $Phinterfaces                           = $this->fetchPhinterface($Phinterfaces, 'Core\\Config\\Constants');
            
            if(is_array($Phinterfaces))
            {
                $this->Phinterface                  = $Phinterfaces;
                #$this->setIncident('Debug', '\\Core\\Phinterface initialized');
                return true;
            }
            else
            {
                #$this->setIncident('Warning', 'no Phinterfaces found');
                return false;
            }
        }
        elseif(is_array($this->Phinterface))
        {
            return true;
        }
        else
        {
            #$this->setIncident('Critical', 'Initialization of \\Core\\Phinterface failed');
            return false;
        }
    }
    
    # 3.2 fetchPhinterfaces
    private function fetchPhinterface($Phinterfaces, $Trait): ?array
    {
        if(!is_array($Phinterfaces))
        {
            return null;
        }
        
        $TraitName                          = str_replace('\\', '/', $Trait);
        $TraitPath                          = pathinfo($TraitName);
        $Method                             = (isset($TraitPath['filename']) ? $TraitPath['filename'] : false);

        if($TraitName !== 'Core\\Phinterface' && $Method !== false && method_exists($this, $Method))
        {
            $TraitPhinterfaces              = call_user_func_array(array($this, $Method), array('Phinterface'));
        }
        else
        {
            $TraitPhinterfaces              = null;
        }
        
        if(is_array($TraitPhinterfaces))
        {
            foreach($TraitPhinterfaces AS $TraitPhinterfaceKey => $TraitPhinterfaceCall)
            {
                if($this->checkPhinterfaceCall($TraitPhinterfaceCall))
                {
                    $Phinterfaces[$TraitPhinterfaceKey]       = $TraitPhinterfaceCall;
                }
            }
            
            #$this->setIncident('Debug', 'Phinterface of ' . $TraitName . ' fetched');
        }
        
        return $Phinterfaces;
    }
}
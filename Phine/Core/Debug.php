<?php
namespace Core;

trait Debug
{
    # 1 Constants and variables
    private         $DebugReports                   = null;
    
    # 2 Public Methods
    # 2.1 Debug
    public function Debug($Var = false)#: mixed
    {
        switch($Var)
        {
            case 'Debug':
                return array
                (
                    'DebugMode'                         => self::$DebugMode,
                    'Reports'                           => $this->DebugReports,
                    
                );
                
            case 'Phinterface':
                return array
                (
                    'Debug'                             => array('Debug',       'all'),
                    'DebugMode'                         => array('Debug',       'DebugMode'),
                    'DebugConstants'                    => array('Constants',   'Debug')
                );
                
            case 'Incidents':
                return array(
                    array('Debug',          'x204001'),
                    array('Debug',          'x204002')
                );
                
            case 'DebugMode':
                return self::$DebugMode;
                
            case 'all':
                return $this->getDebugReports();
            
            default:
                if(isset($this->DebugReports[$Var]))
                {
                    return $this->getDebugReport($Var);
                }
                else
                {
                    return null;
                }
        }
    }
    
    # 2.2 getDebugReport
    public function getDebugReport($Report)#: ?array
    {
        if(isset($this->DebugReports[$Report]) && method_exists($this, $this->DebugReports[$Report]))
        {
            return call_user_func_array(array($this, $this->DebugReports[$Report]), array('Debug'));
        }
        else
        {
            return null;
        }
    }
    
    # 2.3 getDebugReports
    public function getDebugReports()#: ?array
    {
        if($this->DebugReports === null || !is_array($this->DebugReports))
        {
            return null;
        }
        
        $getDebugReports                                = null;
        
        foreach($this->DebugReports AS $Report => $Var)
        {
            $getDebugReports[$Report]                   = $this->getDebugReport($Report);
        }
        
        return $getDebugReports;
    }
    
    # 2.4 printDebug
    public function printDebug($Debug): void
    {
        if(self::$DebugMode === true)
        {
            $TextareaStyle  = 'width:100%;height:300px;';
            
            echo '<!-- ##### Phine: Print Debug ##### -->' . $this->HTML->Break;
            echo $this->HTML->Tag('h2', array('_contains' => 'Phine: Print Debug')) . $this->HTML->Break;
            echo $this->HTML->open('textarea', array('style' => $TextareaStyle)) . $this->HTML->Break;
            print_r($Debug);
            echo $this->HTML->close('textarea') . $this->HTML->Break(3);
        }
    }
    
    # 2.5 setDebug
    public function setDebugLog($IncidentNumber, $Values = false): ?string
    {
        if(self::$DebugMode === true)
        {
            if($Values === false)
            {
                $DebugValues                            = array(
                    'Values'                                => $Values,
                    'Backtrace'                             => debug_backtrace()
                );
            }
            else
            {
                $DebugValues                            = debug_backtrace();
            }
            return $this->setIncident($IncidentNumber, $DebugValues);
        }
        else
        {
            return null;
        }
    }
    
    # 2.6 PhineInfo
    public function PhineInfo(): array
    {
        $PhineInfo                                  = array();
        $PhineReflectionClass                       = new \ReflectionClass(__CLASS__);
        
        # 2.6.1 Info about Phine
        $PhineInfo['Phine']                         = array(
            'Version'                                   => self::VERSION,
            'Traits'                                    => count($PhineReflectionClass->getTraitNames()),
            'Constants'                                 => count($this->Constants),
            'Properties'                                => count($PhineReflectionClass->getProperties()),
            'Phinterfaces'                              => $this->Phinterface('Debug')['PhinterfaceCount'],
            'Handlers'                                  => count($this->DefaultHandlers),
            'Libraries'                                 => count($this->DefaultLibraries)
        );
        
        # 2.6.2 Info about core traits
        foreach($PhineReflectionClass->getTraitNames() AS $Trait)
        {
            $TraitPath                              = pathinfo(str_replace('\\', '/', $Trait));
            if(isset($TraitPath['filename']))
            {
                $TraitName                          = $TraitPath['filename'];
                $TraitReflectionClass               = new \ReflectionClass($Trait);
                
                foreach($TraitReflectionClass->getMethods() AS $Method)
                {
                    $PhineInfo['Phine']['Core'][$TraitName]['Methods'][] = $Method->name;
                }
                
                foreach($TraitReflectionClass->getProperties() AS $Property)
                {
                    $PhineInfo['Phine']['Core'][$TraitName]['Properties'][] = $Property->name;
                }
                
                if(is_array($this->$TraitName('Phinterface')))
                {
                    foreach($this->$TraitName('Phinterface') AS $Phinterface => $Call)
                    {
                        if(is_array($Call))
                        {
                            $PhineInfo['Phine']['Core'][$TraitName]['Phinterface'][$Phinterface] = $Call[0] . '(' . $Call[1] . ')';
                        }
                        else
                        {
                            $PhineInfo['Phine']['Core'][$TraitName]['Phinterface'][$Phinterface] = $Call . '()';
                        }
                    }
                }
            }
        }
        
        # 2.6.3 Info about handlers
        $PhineInfo['Handlers']                      = null;
        
        # 2.6.4 Info about libraries
        $PhineInfo['Libraries']                     = null;
        
        return $PhineInfo;
    }
    
    # 3 Private Methods
    # 3.1 initDebug
    private function initDebug(): bool
    {
        if($this->DebugReports === null && self::$DebugMode === true)
        {
            $initDebug                                  = array();

            $ReflectionClass                            = new \ReflectionClass(__CLASS__);
            $Traits                                     = $ReflectionClass->getTraitNames();
            
            foreach($Traits AS $Trait)
            {
                $TraitName                              = str_replace('\\', '/', $Trait);
                $TraitPath                              = pathinfo($TraitName);
                $Method                                 = (isset($TraitPath['filename']) ? $TraitPath['filename'] : false);

                if(method_exists($this, $Method))
                {
                    $initDebug[$Method]                 = $Method;
                }
            }
            
            # add more Debug output
            $initDebug['Constants']                     = 'Constants';
            
            
            $this->DebugReports                         = $initDebug;
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 3.2 fetchDebugReport
    private function fetchDebugReport($Report): ?array
    {
        if(isset($this->DebugReports[$Report]))
        {
            
            
            #return call_user_func_array(array($this,'Debug'), null);
        }
        else
        {
            return null;
        }
    }
}
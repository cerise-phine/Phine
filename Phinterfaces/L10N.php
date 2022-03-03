<?php
namespace Phinterfaces;

class L10N extends \Config\Constants
{
    # 1 Constants and variables
    private         $Language                       = null;
    private         $Namespace                      = null;
    private         $Instances                      = null;
    private         $DefaultFiles                   = array
                    (
                        'Admin', 'Debug', 'Incidents', 'Installer', 'Phine'
                    );
    private static  $DebugMode                      = false;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct($Language, $DebugMode = false)#: void
    {
        if($DebugMode === true)
        {
            self::$DebugMode                        = true;
        }
        
        $this->initL10N($Language);
    }
    
    # 2.2 __get
    final public function __get($Var): ?object
    {
        return $this->L10N($Var);
    }
    
    # 2.3 __set
    final public function __set($Var, $Value): void
    {
        
    }
    
    # 2.4 __debugInfo
    final public function __debugInfo(): ?array
    {
        $Debug['DebugMode']                         = self::$DebugMode;
        
        $Debug['Language']                          = $this->Language;
        $Debug['Namespace']                         = $this->Namespace;
        $Debug['Instances']                         = $this->Instances;
        $Debug['DefaultFiles']                      = $this->DefaultFiles;

        return $Debug;
    }
    
    # 1 Public Methods
    # 1.1 L10N
    public function L10N($Var): ?object
    {
        if($this->instanceL10NFile($Var))
        {
            return $this->Instances[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2 Private methods
    # 2.1 initL10N
    private function initL10N($Language): bool
    {
        if($Language !== false && !empty($Language)) # check if l10n folder exists
        {
            $this->Language                         = $Language;
            
            $Namespace                              = $this->Constants('NAMESPACE_DEFAULT_L10N');
            $Namespace                              .= $this->Language . '\\';
            $this->Namespace                        = $Namespace;
            
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 2.2 instanceL10NFile
    private function instanceL10NFile($File): bool
    {
        if(isset($this->Instances[$File]) && is_object($this->Instances[$File]))
        {
            return true;
        }
        elseif(!isset($this->Instances[$File]) && in_array($File, $this->DefaultFiles))
        {
            $L10NFileWithNamespace                  = $this->Namespace . $File;
            $this->Instances[$File]                 = new $L10NFileWithNamespace($L10NFileWithNamespace);
            
            return true;
        }
        else
        {
            return false;
        }
    }
}
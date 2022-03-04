<?php
namespace Config;

class Constants
{
    # 1 System wide constants
    # 1.1 Constants for phine.io itself
    const PHINE                                     = 'phine.io';
    const VERSION                                   = '0.4';
    const VERSION_DATE                              = '2022-02-11';
    const VERSION_INFO                              = 'https://phine.io/Versions.html';
    
    # 1.2 Constants for directories
    const DIR_PHINE                                 = 'phine/';
    const DIR_PHINE_ASSETS                          = self::DIR_PHINE . 'Assets/';
    const DIR_PHINE_ASSET_BLUEPRINTS                = self::DIR_PHINE_ASSETS . 'Blueprints/';
    const DIR_PHINE_ASSET_JAVASCRIPT                = self::DIR_PHINE_ASSETS . 'JavaScript/';
    const DIR_PHINE_CORE                            = self::DIR_PHINE . 'Core/';
    const DIR_PHINE_CORE_CONFIG                     = self::DIR_PHINE . 'Config/';
    const DIR_PHINE_CORE_PHINTERFACES               = self::DIR_PHINE . 'Phinterfaces/';
    const DIR_PHINE_HANDLERS                        = self::DIR_PHINE . 'Handlers/';
    const DIR_PHINE_HELPERS                         = self::DIR_PHINE . 'Helpers/';
    const DIR_PHINE_L10N                            = self::DIR_PHINE . 'L10N/';
    const DIR_PHINE_LIBRARIES                       = self::DIR_PHINE . 'Libraries/';
    const DIR_PHINE_MODELS                          = self::DIR_PHINE . 'Models/';
    
    const DIR_CUSTOM                                = 'custom/';
    const DIR_CUSTOM_BLUEPRINTS                     = self::DIR_CUSTOM . 'Blueprints/';
    const DIR_CUSTOM_CACHE                          = self::DIR_CUSTOM . 'Cache/';
    const DIR_CUSTOM_CONFIGS                        = self::DIR_CUSTOM . 'Configs/';
    const DIR_CUSTOM_CONTENT                        = self::DIR_CUSTOM . 'Content/';
    const DIR_CUSTOM_LIBRARIES                      = self::DIR_CUSTOM . 'Libraries/';
    const DIR_CUSTOM_MODULES                        = self::DIR_CUSTOM . 'Modules/';
    const DIR_CUSTOM_TEMPLATES                      = self::DIR_CUSTOM . 'Templates/';
    
    const DIR_PUBLIC                                = 'public/';
    const DIR_PUBLIC_CACHE                          = self::DIR_PUBLIC . 'cache/';
    const DIR_PUBLIC_CONTENT                        = self::DIR_PUBLIC . 'content/';
    
    # 1.3 Constants for namespaces
    const NAMESPACE_PHINTERFACES                    = 'Phinterfaces\\';
    const NAMESPACE_HANDLERS                        = 'Handlers\\';
    const NAMESPACE_DEFAULT_LIBRARIES               = 'Libraries\\';
    const NAMESPACE_DYNAMIC_LIBRARIES               = '';
    const NAMESPACE_HELPERS                         = 'Helpers\\';
    const NAMESPACE_DEFAULT_MODULES                 = 'Assets\\Modules\\';
    const NAMESPACE_DYNAMIC_MODULES                 = '';
    const NAMESPACE_DEFAULT_L10N                    = 'L10N\\';
    
    # 1.4 Constants for script
    const TRAIT_RETURN_DEBUG                        = 'Debug';
    const TRAIT_RETURN_PHINTERFACE                  = 'Phinterface';
    const TRAIT_RETURN_INCIDENTS                    = 'Incidents';
    
    const MODUS_OPERANDI_HTML                       = 'HTML';
    const MODUS_OPERANDI_AJAX                       = 'AJAX';
    const MODUS_OPERANDI_API                        = 'API';
    const MODUS_OPERANDI_CLI                        = 'CLI';
    const MODUS_OPERANDI_CRON                       = 'CRON';
    
    const ACCESS_LEVEL_ANONYMOUS                    = 'ANONYMOUS';
    const ACCESS_LEVEL_USER                         = 'USER';
    const ACCESS_LEVEL_ADMIN                        = 'ADMIN';
    
    const CRUD_CREATE                               = 'CREATE';
    const CRUD_READ                                 = 'READ';
    const CRUD_UPDATE                               = 'UPDATE';
    const CRUD_DELETE                               = 'DELETE';
    
    const CHARSET                                   = 'utf-8';
    
    # 2 Variables
    private         $Constants                      = null;
    private         $DirRoot                        = null;
    private         $DirPhine                       = null;
    private         $DirCustom                      = null;
    private         $DirPublic                      = null;

    # 3 Public methods
    # 3.1 Constants
    public function Constants($Constant = 'all')#: mixed
    {
        $this->initConstants();
        
        switch($Constant)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return array
                (
                    'Constants'                     => $this->Constants,
                    'DirRoot'                       => $this->DirRoot,
                    'DirPhine'                      => $this->DirPhine,
                    'DirCustom'                     => $this->DirCustom,
                    'DirPublic'                     => $this->DirPublic
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'Constants'                     => array('Constants', 'all'),
                    'DirRoot'                       => array('Constants', 'DirRoot'),
                    'DirPhine'                      => array('Constants', 'DirPhine'),
                    'DirCustom'                     => array('Constants', 'DirCustom'),
                    'DirPublic'                     => array('Constants', 'DirPublic')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
            case 'all':
                return $this->Constants;
                
            case 'DirRoot':
                return $this->DirRoot;
                
            case 'DirPhine':
                return $this->DirPhine;
                
            case 'DirCustom':
                return $this->DirCustom;
                
            case 'DirPublic':
                return $this->DirPublic;
                
            default:
                if(isset($this->Constants[$Constant]))
                {
                    return $this->Constants[$Constant];
                }
                else
                {
                    return null;
                }
        }
    }
    
    # 4 Private methods
    # 4.1 initConstants
    private function initConstants(): void
    {
        if(is_null($this->Constants))
        {
            $Constants                              = new \ReflectionClass(__CLASS__);
            $this->Constants                        = $Constants->getConstants();
            
            $ThisAbsoluteDir                        = __DIR__ . '/';
            $this->DirRoot                          = str_replace(self::DIR_PHINE_CORE_CONFIG, '', $ThisAbsoluteDir);
            $this->DirPhine                         = $this->DirRoot . self::DIR_PHINE;
            $this->DirCustom                        = $this->DirRoot . self::DIR_CUSTOM;
            $this->DirPublic                        = $this->DirRoot . self::DIR_PUBLIC;
        }
    }
}
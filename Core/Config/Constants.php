<?php
namespace Core\Config;

class Constants
{
    # 1 System wide constants
    # 1.1 Constants for phine.io itself
    const PHINE                                     = 'phine.io';
    const VERSION                                   = '0.4';
    const VERSION_DATE                              = '2022-02-11';
    const VERSION_INFO                              = 'https://phine.io/Versions.html';
    
    # 1.2 Constants for directories
    const DIR_ROOT                                  = '../';
    const DIR_PHINE                                 = self::DIR_ROOT . 'Phine/';
    const DIR_PHINE_ASSETS                          = self::DIR_PHINE . 'Assets/';
    const DIR_PHINE_ASSET_BLUEPRINTS                = self::DIR_PHINE_ASSETS . 'Blueprints/';
    const DIR_PHINE_ASSET_CSS                       = self::DIR_PHINE_ASSETS . 'CSS/';
    const DIR_PHINE_ASSET_HTML                      = self::DIR_PHINE_ASSETS . 'HTML/';
    const DIR_PHINE_ASSET_JavaScript                = self::DIR_PHINE_ASSETS . 'JavaScript/';
    const DIR_PHINE_CORE                            = self::DIR_PHINE . 'Core/';
    const DIR_PHINE_HANDLERS                        = self::DIR_PHINE . 'Handlers/';
    const DIR_PHINE_HELPERS                         = self::DIR_PHINE . 'Helpers/';
    const DIR_PHINE_L10N                            = self::DIR_PHINE . 'L10N/';
    const DIR_PHINE_LIBRARIES                       = self::DIR_PHINE . 'Libraries/';
    const DIR_PHINE_MODELS                          = self::DIR_PHINE . 'Models/';
    
    const DIR_CUSTOM                                = self::DIR_ROOT . 'Custom/';
    const DIR_CUSTOM_BLUEPRINT                      = self::DIR_CUSTOM . 'Blueprints/';
    const DIR_CUSTOM_CACHE                          = self::DIR_CUSTOM . 'Cache/';
    const DIR_CUSTOM_CONFIGS                        = self::DIR_CUSTOM . 'Configs/';
    const DIR_CUSTOM_CONTENT                        = self::DIR_CUSTOM . 'Content/';
    const DIR_CUSTOM_LIBRARIES                      = self::DIR_CUSTOM . 'Libraries/';
    const DIR_CUSTOM_MODULES                        = self::DIR_CUSTOM . 'Modules/';
    const DIR_CUSTOM_TEMPLATES                      = self::DIR_CUSTOM . 'Templates/';
    
    const DIR_PUBLIC                                = self::DIR_ROOT . 'public/';
    const DIR_PUBLIC_CACHE                          = self::DIR_PUBLIC . 'cache/';
    const DIR_PUBLIC_CONTENT                        = self::DIR_PUBLIC . 'content/';
    
    # 1.3 Constants for namespaces
    const NAMESPACE_PHINTERFACES                    = 'Core\\Phinterfaces\\';
    const NAMESPACE_HANDLERS                        = 'Handlers\\';
    const NAMESPACE_DEFAULT_LIBRARIES               = 'Libraries\\';
    const NAMESPACE_DYNAMIC_LIBRARIES               = '';
    const NAMESPACE_DEFAULT_L10N                    = 'L10N\\';
    
    # 1.4 Constants for script
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
    
    # 3 Public methods
    # 3.1 Constants
    public function Constants($Constant = false)#: mixed
    {
        $this->initConstants();
        
        if(isset($this->Constants[$Constant]))
        {
            return $this->Constants[$Constant];
        }
        elseif($Constant === 'Phinterface')
        {
            return array
            (
                'Constants'                         => array('Constants', 'Debug')
            );
        }
        elseif($Constant === 'Debug')
        {
            return $this->Constants;
        }
        else
        {
            return null;
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
        }
    }
}
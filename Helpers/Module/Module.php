<?php
namespace Helpers\Module;

class Module extends \Config\Constants
{
    # 1 Traits
    use CRUD;
    use Config;
    use Model;
    
    # 2 Constants and variables
    private static  $Phinstance                     = null;
    private         $File                           = null;
    private         $Blueprint                      = null;
    private         $Version                        = null;
    private         $Author                         = null;
    private         $HTML                           = null;
    private         $CSS                            = null;
    private         $JavaScript                     = null;
    private         $Placeholders                   = null;
    private         $TabBase                        = 0;

    # 3 Magic Methods
    # 3.1 __construct
    final public function __construct($Module)#: void
    {
        self::$Phinstance                           = \Phine::Phinstance();
        $this->initBlueprint($Module);
    }
    
    # 3.2 __get
    final public function __get($Var)#: mixed
    {
        switch($Var)
        {
            case 'File':
                return $this->File;
                
            case 'Blueprint':
                return $this->Blueprint;
                
            case 'Version':
                return $this->Version;
                
            case 'Author':
                return $this->Author;
                
            case 'HTML':
                return $this->HTML;
                
            case 'CSS':
                return $this->CSS;
                
            case 'JavaScript':
                return $this->JavaScript;
                
            case 'Placeholders':
                return $this->Placeholders;
                
            case 'TabBase':
                return $this->TabBase;
                
            case 'createHTML':
                return $this->createHTML();
                
            case 'createCSS':
                return null;
                
            case 'createJavaScript':
                return null;
                
            default:
                return null;
        }
    }
    
    # 3.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        return array
        (
            'Phinstance'                            => (is_object(self::$Phinstance) ? true : false),
            'File'                                  => $this->File,
            'Blueprint'                             => $this->Blueprint,
            'Version'                               => $this->Version,
            'Author'                                => $this->Author,
            'HTML'                                  => $this->HTML,
            'CSS'                                   => $this->CSS,
            'JavaScript'                            => $this->JavaScript,
            'Placeholders'                          => $this->Placeholders,
            'TabBase'                               => $this->TabBase
        );
    }
    
    # 4 Public methods
    
    # 5 Private methods
    # 5.1 initBlueprint
    private function initBlueprint($BlueprintFile): void
    {
        if(file_exists($BlueprintFile))
        {
            $this->File                             = $BlueprintFile;
            
            $Blueprint                              = json_decode(file_get_contents($BlueprintFile), TRUE);
            if(is_array($Blueprint))
            {
                $this->Blueprint                    = (isset($Blueprint['Blueprint']) ? $Blueprint['Blueprint'] : null);
                $this->Version                      = (isset($Blueprint['Version']) ? $Blueprint['Version'] : null);
                $this->Author                       = (isset($Blueprint['Author']) ? $Blueprint['Author'] : null);
                $this->HTML                         = (isset($Blueprint['HTML']) ? $Blueprint['HTML'] : null);
                $this->CSS                          = (isset($Blueprint['CSS']) ? $Blueprint['CSS'] : null);
                $this->JavaScript                   = (isset($Blueprint['JavaScript']) ? $Blueprint['JavaScript'] : null);
            
                return;
            }
        }
        
        self::$Phinstance                           = null;
    }
}
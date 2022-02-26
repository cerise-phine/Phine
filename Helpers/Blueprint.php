<?php
namespace Helpers;

class Blueprint extends \Core\Config\Constants
{
    # 1 Constants and variables
    private         $Blueprint                      = null;
    private         $HTML                           = null;
    private         $CSS                            = null;
    private         $Placeholders                   = null;
    private static  $Phinstance                     = null;
    
    # 2 Magic Methods
    # 2.1 __construct
    final public function __construct($Blueprint = false)#: void
    {
        self::$Phinstance                           = \Phine::Phinstance();
        $this->Blueprint                            = $Blueprint;
        $this->initBlueprint();
    }
    
    # 2.2 __get
    final public function __get($Var)#: mixed
    {
        switch($Var)
        {
            case 'Blueprint':
                return $this->Blueprint;
                
            case 'HTML':
                return $this->createHTML();
                
            case 'CSS':
                return $this->CSS;
                
            case 'BlueprintHTML':
                return $this->HTML;
                
            case 'BlueprintCSS':
                return $this->CSS;
                
            case 'Placeholders':
                return $this->Placeholders;
                
            default:
                return null;
        }
    }
    
    # 2.3 __debugInfo
    final public function __debugInfo(): ?array
    {
        return array
        (
            'Phinstance'                            => (is_object(self::$Phinstance) ? true : false),
            'HTML'                                  => $this->HTML,
            'CSS'                                   => $this->CSS,
            'Placeholders'                          => $this->Placeholders,
            'Blueprint'                             => $this->Blueprint
        );
    }
    
    # 3 Public methods
    # 3.1 setPlaceholder
    public function setPlaceholder($Placeholder): void
    {
        if(isset($this->Placeholders[$Placeholder]) && is_string($Placeholder))
        {
            $this->Placeholders[$Placeholder]       = $Placeholder;
        }
    }
    
    # 3.2 setPlaceholders
    public function setPlaceholders($Placeholders): void
    {
        if(is_array($Placeholders))
        {
            foreach($Placeholders AS $Placeholder)
            {
                if(isset($Placeholder[0]) && isset($Placeholder[1]))
                {
                    $this->setPlaceholder($Placeholder);
                }
            }
        }
    }
    
    # 4 Private methods
    # 4.1 initBlueprint
    private function initBlueprint(): bool
    {
        $BlueprintFile                              = $this->Constants('DirRoot') . self::DIR_PHINE_ASSET_BLUEPRINTS . $this->Blueprint . '.json';
        
        if(file_exists($BlueprintFile))
        {
            $Blueprint                              = json_decode(file_get_contents($BlueprintFile), TRUE);
            $this->HTML                             = (isset($Blueprint['HTML']) ? $Blueprint['HTML'] : null);
            $this->CSS                              = (isset($Blueprint['CSS']) ? $Blueprint['CSS'] : null);
            $this->fetchPlaceholders();
            
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 4.2 createHTML
    private function createHTML($Element = false, $Tab = 0): ?string
    {
        $createElement                              = null;
        
        foreach($this->createHTMLData($Element) AS $Tag => $Attributes)
        {
            if(!isset(self::$Phinstance->HTML->Generator('Tags')[$Tag]))
            {
                continue;
            }
            
            if(
                is_array($Attributes)
                && 
                (
                    isset($Attributes['_contains'])
                    && is_array($Attributes['_contains'])
                )
            )
            {
                $Contains                           = $Attributes['_contains'];
                $Attributes['_contains']            = null;
            }
            else
            {
                $Contains                           = null;
            }
            
            $createElement                          .= self::$Phinstance->HTML->Tab($Tab);
            $createElement                          .= self::$Phinstance->HTML->open($Tag, $Attributes);
            
            if(!is_null($Contains))
            {
                $NewTab                             = $Tab + 1;
                $createElement                      .= self::$Phinstance->HTML->Break;
                $createElement                      .= $this->createHTML($Contains, $NewTab);
                $createElement                      .= self::$Phinstance->HTML->Tab($Tab);
            }
            
            $createElement                          .= self::$Phinstance->HTML->close($Tag);
            $createElement                          .= ($Element !== false ? self::$Phinstance->HTML->Break : '');
        }
        
        return $createElement;
    }
    
    # 4.3 createHTMLData
    private function createHTMLData($Element): array
    {
        if($Element === false && is_array($this->HTML))
        {
            return $this->HTML;
        }
        elseif($Element !== false && is_array($Element))
        {
            return $Element;
        }
        else
        {
            return array();
        }
    }
    
    # 4.4 createCSS
    private function createCSS(): ?string
    {
        
    }
    
    # 4.5 createCSSData
    private function createCSSData(): ?string
    {
        
    }
    
    # 4.6 fetchPlaceholders
    private function fetchPlaceholders($Element = false): void
    {
        foreach($this->createHTMLData($Element) AS $Tag => $Attributes)
        {
            if(is_string($Attributes))
            {
                if(preg_match('/##(.*?)##/', $Attributes))
                {
                    $Placeholders                   = FALSE;
                    preg_match_all('/##(.*?)##/', $Attributes, $Placeholders);
                    foreach($Placeholders[1] AS $Placeholder)
                    {
                        $this->Placeholders[]       = $Placeholder;
                    }
                }
            }
            elseif(is_array($Attributes))
            {
                foreach($Attributes AS $AttributeKey => $AttributeValue)
                {
                    if(is_string($AttributeValue) && preg_match('/##(.*?)##/', $AttributeValue))
                    {
                        $Placeholders               = FALSE;
                        preg_match_all('/##(.*?)##/', $AttributeValue, $Placeholders);
                        foreach($Placeholders[1] AS $Placeholder)
                        {
                            $this->Placeholders[]   = $Placeholder;
                        }
                    }
                    elseif(is_array($AttributeValue))
                    {
                        $this->fetchPlaceholders($AttributeValue);
                    }
                }
            }
        }
        
        
        
    }
}
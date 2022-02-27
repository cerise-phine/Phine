<?php
namespace Helpers\Blueprint;

trait HTML
{
    # 1 Private methods
    # 1.1 createHTML
    private function createHTML($Element = false, $TabBase = false): ?string
    {
        $createHTML                                 = '';
        $Tab                                        = (is_int($TabBase) ? $TabBase : $this->TabBase);
        
        foreach($this->createHTMLData($Element) AS $TagID => $Attributes)
        {
            if(
                isset($Attributes['_tag'])
                && isset(self::$Phinstance->HTML->Generator('Tags')[$Attributes['_tag']]))
            {
                $createHTML                         .= $this->createHTMLElement($Attributes['_tag'], $Attributes, $Tab);
            }
        }
        
        return $createHTML;
    }
    
    # 1.2 createHTMLData
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
    
    # 1.3 createHTMLElement
    private function createHTMLElement($Tag, $Attributes, $Tab): ?string
    {
        $createHTMLElement                          = '';
        
        if(is_string($Attributes))
        {
            $createHTMLElement                      .= self::$Phinstance->HTML->Tab($Tab);
            $createHTMLElement                      .= self::$Phinstance->HTML->open($Tag);
            $createHTMLElement                      .= $this->replacePlaceholder($Attributes);
            $createHTMLElement                      .= self::$Phinstance->HTML->close($Tag);
            $createHTMLElement                      .= self::$Phinstance->HTML->Break;
        }
        elseif(is_array($Attributes))
        {
            $ElementAttributes                      = $this->createHTMLAttributes($Attributes);
            
            $createHTMLElement                      .= self::$Phinstance->HTML->Tab($Tab);
            $createHTMLElement                      .= self::$Phinstance->HTML->open($Tag, $ElementAttributes);
            
            if(isset($Attributes['_contains']) && is_array($Attributes['_contains']))
            {
                $NewTab                             = $Tab + 1;
                $createHTMLElement                  .= self::$Phinstance->HTML->Break;
                $createHTMLElement                  .= $this->createHTML($Attributes['_contains'], $NewTab);
                $createHTMLElement                  .= self::$Phinstance->HTML->Tab($Tab);
            }
            elseif(isset($Attributes['_contains']) && is_string($Attributes['_contains']))
            {
                $replacedContains                   = $this->replacePlaceholder($Attributes['_contains']);
                $createHTMLElement                  .= $replacedContains;
                
                if(strpos($replacedContains, "\r\n") !== false)
                {
                    $createHTMLElement              .= self::$Phinstance->HTML->Tab($Tab);
                }
            }
            
            $createHTMLElement                      .= self::$Phinstance->HTML->close($Tag);
            $createHTMLElement                      .= self::$Phinstance->HTML->Break;
        }
        
        return $createHTMLElement;
    }
    
    # 1.4 createHTMLAttributes
    private function createHTMLAttributes($Attributes): ?array
    {
        $createHTMLAttributes                       = array();
        
        if(is_array($Attributes))
        {
            foreach($Attributes AS $Attribute => $Value)
            {
                if(is_string($Value))
                {
                    $createHTMLAttributes[$Attribute] = $this->replacePlaceholder($Value);
                }
            }
        }
        
        return $createHTMLAttributes;
    }
}
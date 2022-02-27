<?php
namespace Helpers\Blueprint;

trait Placeholders
{
    # 1 Public methods
    # 1.1 setPlaceholder
    public function setPlaceholder($Placeholder, $Value): void
    {
        if(is_string($Placeholder) && is_string($Value))
        {
            $this->Placeholders[$Placeholder]       = $Value;
        }
    }
    
    # 1.2 setPlaceholders
    public function setPlaceholders($Placeholders): void
    {
        if(is_array($Placeholders))
        {
            foreach($Placeholders AS $Placeholder)
            {
                if(is_array($Placeholder) && isset($Placeholder[0]) && isset($Placeholder[1]))
                {
                    $this->setPlaceholder($Placeholder[0], $Placeholder[1]);
                }
            }
        }
    }
    
    # 2 Private methods
    # 2.1 replacePlaceholder
    private function replacePlaceholder($String): ?string
    {
        if(is_string($String) && preg_match('/##(.*?)##/', $String))
        {
            $String                                 = $this->replacePhinterfacePlaceholder($String);
            $String                                 = $this->replaceBlueprintPlaceholder($String);
            
            return $String;
        }
        else
        {
            return $String;
        }
    }
    
    # 2.2 replaceBlueprintPlaceholder
    private function replaceBlueprintPlaceholder($String): string
    {
        $Placeholders                               = array();
        $Values                                     = array();
        
        foreach($this->Placeholders AS $Placeholder => $Value)
        {
            $Placeholders[]                         = '##' . $Placeholder . '##';
            $Values[]                               = $Value;
        }
        
        $String                                     = str_replace($Placeholders, $Values, $String);
        
        return $String;
    }
    
    # 2.3 replacePhinterfacePlaceholder
    private function replacePhinterfacePlaceholder($String): string
    {
        
        return $String;
    }
}
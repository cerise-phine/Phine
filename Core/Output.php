<?php
namespace Core;

trait Output
{
    # 1 Public Methods
    # 1.1 __get method
    public function Output($Mode = false)#: mixed
    {
        switch($Mode)
        {
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array
                (
                    'Output'                    => array('Output', 'Auto'),
                    'OutputAuto'                => array('Output', 'Auto'),
                    'OutputHTML'                => array('Output', self::MODUS_OPERANDI_HTML),
                    'OutputAJAX'                => array('Output', self::MODUS_OPERANDI_AJAX),
                    'OutputAPI'                 => array('Output', self::MODUS_OPERANDI_API),
                    'OutputCLI'                 => array('Output', self::MODUS_OPERANDI_CLI),
                    'DebugOutput'               => array('Output', 'Debug'),
                );
                
            case 'Incidents':
                return array(
                    array('Notice',         'x213001'),
                    array('Debug',          'x213002')
                );
                
            case 'Auto':
                return $this->OutputAuto();
            
            case self::MODUS_OPERANDI_HTML:
                return $this->OutputHTML();
                
            case self::MODUS_OPERANDI_AJAX:
                return $this->OutputAJAX();
            
            case self::MODUS_OPERANDI_API:
                return $this->OutputAPI();
            
            case self::MODUS_OPERANDI_CLI:
                return $this->OutputCLI();
                
            default:
                return null;
        }
    }
    
    # 1.2 OutputModule
    public function OutputModule(): void
    {
        
    }
    
    # 2 Private Methods
    # 2.1 OutputAuto
    private function OutputAuto(): void
    {
        switch($this->ModusOperandi)
        {
            case self::MODUS_OPERANDI_HTML:
                $this->OutputHTML();
                break;
                
            case self::MODUS_OPERANDI_AJAX:
                $this->OutputAJAX();
                break;
                
            case self::MODUS_OPERANDI_API:
                $this->OutputAPI();
                break;
        }
    }
    
    # 2.2 OutputHTML
    private function OutputHTML(): void
    {
        # 2.2.1 If Bootstrap(HTML) was successful
        if($this->Bootstrap(self::MODUS_OPERANDI_HTML))
        {
            # 2.2.1.1 Output doctype
            echo $this->HTML->DocType . $this->HTML->Break;
            
            # 2.2.1.2 Prepare blueprint variables
            echo $this->Blueprints->Base->HTML;
            
            
            
            
            $this->printDebug($this->Blueprints->Base->Placeholders);
            $this->printDebug($this->Blueprints->Base->BlueprintHTML);
            
            
        }
        
        # 2.2.2 If Bootstrap(HTML) returned an error
        else
        {
            $this->setIncident('x212001');
        }
    }
    
    # 2.3 OutputAJAX
    private function OutputAJAX(): void
    {
        if($this->Bootstrap(self::MODUS_OPERANDI_AJAX))
        {
            
        }
        else
        {
            echo 'Bootstrap AJAX failed';
        }
    }
    
    # 2.4 OutputAPI
    private function OutputAPI(): void
    {
        if($this->Bootstrap(self::MODUS_OPERANDI_API))
        {
            
        }
        else
        {
            echo 'Bootstrap API failed';
        }
    }
    
    # 2.5 OutputCLI
    private function OutputCLI(): void
    {
        if($this->Bootstrap(self::MODUS_OPERANDI_CLI))
        {
            
        }
        else
        {
            echo 'Bootstrap AJAX failed';
        }
    }
}
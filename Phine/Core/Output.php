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
        $this->OutputHTML();
    }
    
    # 2.2 OutputHTML
    private function OutputHTML(): void
    {
        # 2.2.1 If Bootstrap(HTML) was successful
        if($this->Bootstrap(self::MODUS_OPERANDI_HTML))
        {
            $this->Cache('HTMLHeader');
            
            $this->Cache('HTMLFooter');
            
            
            # 2.2.1.1 Open HTML
            echo $this->HTML->DocType . $this->HTML->Break;
            echo $this->HTML->open('html', array('language' => $this->L10N('Language'))) . $this->HTML->Break;
            
                # 2.2.1.2 HTML Header
                echo $this->HTML->Tab . $this->HTML->open('head') . $this->HTML->Break;
                
                    echo $this->HTML->Tab(2) . $this->HTML->Tag('title', array('_contains' => $this->Site['Title'])) . $this->HTML->Break;
                    echo $this->getSiteMetaHTML();
                    
                echo $this->HTML->Tab . $this->HTML->close('head') . $this->HTML->Break;
            
                # 2.2.1.3 HTML Body
                echo $this->HTML->Tab . $this->HTML->open('body') . $this->HTML->Break(2);
            
                    echo $this->HTML->Tab(2) . $this->HTML->open('div', array('id' => 'PhineScrollWrapper')) . $this->HTML->Break;
                        echo $this->HTML->Tab(3) . $this->HTML->open('div', array('id' => 'PhineContentWrapper')) . $this->HTML->Break(10);

                        
                        
                        
                        
                        $this->printDebug($this);
                        
                        if(self::$DebugMode === true)
                        {
                            
                        }
                            
                        echo $this->HTML->Tab(3) . $this->HTML->close('div') . $this->HTML->Break;
                    echo $this->HTML->Tab(2) . $this->HTML->close('div') . $this->HTML->Break(2);
            
                echo $this->HTML->Tab . $this->HTML->close('body') . $this->HTML->Break;
                
            # 2.2.1.4 Close HTML
            echo $this->HTML->close('html');
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
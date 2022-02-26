<?php
namespace Core;

trait Bootstrap
{
    # 1 Public Methods
    # 1.1 Bootstrap
    public function Bootstrap($Mode = false)
    {
        switch($Mode)
        {
            # 2.1.1 Phine output
            case 'Debug':
                return null;
                
            case 'Phinterface':
                return array
                (
                    'BootstrapHTML'                 => array('Bootstrap', 'HTML'),
                    'BootstrapAJAX'                 => array('Bootstrap', 'AJAX'),
                    'BootstrapAPI'                  => array('Bootstrap', 'API'),
                    'BootstrapCLI'                  => array('Bootstrap', 'CLI'),
                    'DebugBootstrap'                => array('Bootstrap', 'Debug')
                );
                
            case 'Incidents':
                return array(
                    array('Debug',          'x203001'),
                    array('Error',          'x203002'),
                    array('Error',          'x203003'),
                    array('Error',          'x203004'),
                    array('Error',          'x203005'),
                    array('Error',          'x203006')
                );
                
            # 2.1.2 Specific output
            case self::MODUS_OPERANDI_HTML:
                return $this->initBootstrapHTML();
            
            case self::MODUS_OPERANDI_AJAX:
                return $this->initBootstrapAJAX();
                
            case self::MODUS_OPERANDI_API:
                return $this->initBootstrapAPI();
                
            case self::MODUS_OPERANDI_CLI:
                return $this->initBootstrapCLI();
                
            case self::MODUS_OPERANDI_CRON:
                return $this->initBootstrapCRON();
            
            default:
                return null;
        }
    }
    
    # 2 Private Methods
    # 2.1 initBootstrapHTML
    private function initBootstrapHTML(): bool
    {
        return true;
    }
    
    # 2.2 initBootstrapAJAX
    private function initBootstrapAJAX(): bool
    {
        return true;
    }
    
    # 2.3 initBootstrapAPI
    private function initBootstrapAPI(): bool
    {
        return true;
    }
    
    # 2.4 initBootstrapCLI
    private function initBootstrapCLI(): bool
    {
        return true;
    }
    
    # 2.5 initBootstrapCRON
    private function initBootstrapCRON(): bool
    {
        return true;
    }
}
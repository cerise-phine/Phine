<?php
namespace Core;

trait Bootstrap
{
    # 1 Variables
    private         $Bootstrap                      = array
                    (
                        'Content'                       => '',
                        'Language'                      => null,
                        'Title'                         => null,
                        'Meta'                          => null,
                        'HeaderCSS'                     => null,
                        'HeaderJavaScript'              => null,
                        'FooterJavaScript'              => null
                    );
    
    # 2 Public Methods
    # 2.1 Bootstrap
    public function Bootstrap($Mode = false)
    {
        switch($Mode)
        {
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return array
                (
                    'Bootstrap'                     => $this->Bootstrap
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array
                (
                    'BootstrapHTML'                 => array('Bootstrap', 'HTML'),
                    'BootstrapAJAX'                 => array('Bootstrap', 'AJAX'),
                    'BootstrapAPI'                  => array('Bootstrap', 'API'),
                    'BootstrapCLI'                  => array('Bootstrap', 'CLI'),
                    'DebugBootstrap'                => array('Bootstrap', 'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return array
                (
                    array('Debug',                  'x203001'),
                    array('Error',                  'x203002'),
                    array('Error',                  'x203003'),
                    array('Error',                  'x203004'),
                    array('Error',                  'x203005'),
                    array('Error',                  'x203006')
                );
                
            # 2.1.2 Specific output
            case self::MODUS_OPERANDI_HTML:
                return $this->BootstrapHTML();
            
            case self::MODUS_OPERANDI_AJAX:
                return $this->BootstrapAJAX();
                
            case self::MODUS_OPERANDI_API:
                return $this->BootstrapAPI();
                
            case self::MODUS_OPERANDI_CLI:
                return $this->BootstrapCLI();
                
            case self::MODUS_OPERANDI_CRON:
                return $this->BootstrapCRON();
            
            default:
                return null;
        }
    }
    
    # 3 Private Methods
    # 3.1 resetBootstrap
    private function resetBootstrap(): void
    {
        $this->Bootstrap                            = array
        (
            'Content'                                   => '',
            'Language'                                  => null,
            'Title'                                     => null,
            'Meta'                                      => null,
            'HeaderCSS'                                 => null,
            'HeaderJavaScript'                          => null,
        );
    }
    
    # 3.2 BootstrapHTML
    private function BootstrapHTML(): bool
    {
        $IncidentID                                 = $this->setIncident('x203001');
        
        $this->Bootstrap['Content']                 = $this->HTML->Break;
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        # 3.2.1.x Procedure module
        
        # 3.2.1.x Generate content from module
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        # 3.2.1.x Admin GUI
        if($this->UserAccessLevel === self::ACCESS_LEVEL_ADMIN)
        {
            #$this->Blueprints->AdminGUI->setTabBase(4);
            #$Content                               .= $this->Blueprints->AdminGUI->createHTML;
        }
        
        # 3.2.1.x Debug GUI
        if(self::$DebugMode === true)
        {
            #$this->Blueprints->DebugGUI->setTabBase(4);
            #$Content                               .= $this->Blueprints->DebugGUI->createHTML;
        }
        
        
        
        
        
        
        # 3.2.1.x Set base HTML
        $BaseHTML                                   = array
        (
            array('LANGUAGE',                       $this->Bootstrap['Language']),
            array('TITLE',                          $this->Bootstrap['Title']),
            array('META',                           $this->Bootstrap['Meta']),
            array('HEADERCSS',                      $this->Bootstrap['HeaderCSS']),
            array('HEADERJS',                       $this->Bootstrap['HeaderJavaScript']),
            array('HEADERJS',                       $this->Bootstrap['FooterJavaScript']),
            array('CONTENT',                        $this->Bootstrap['Content'])
        );
        $this->Blueprints->Base->setPlaceholders($BaseHTML);
        
        $this->resetBootstrap();
        $this->setIncidentStop($IncidentID);
        return true;
    }
    
    # 3.3 BootstrapAJAX
    private function BootstrapAJAX(): bool
    {
        return true;
    }
    
    # 3.4 BootstrapAPI
    private function BootstrapAPI(): bool
    {
        return true;
    }
    
    # 3.5 BootstrapCLI
    private function BootstrapCLI(): bool
    {
        return true;
    }
    
    # 3.6 BootstrapCRON
    private function BootstrapCRON(): bool
    {
        return true;
    }
}
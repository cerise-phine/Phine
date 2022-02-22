<?php
namespace Core;

trait Sitemap
{
    # 1 Constants and variables
    private         $Sitemap                        = null;
    
    # 2 Public Methods
    # 2.1 Sitemap
    public function Sitemap($Var)
    {
        if(is_null($this->Sitemap) && !$this->initSitemap())
        {
            return null;
        }
        
        switch($Var)
        {
            case 'Debug':
                return $this->Sitemap;
                
            case 'Phinterface':
                return array
                (
                    'Sitemap'                       => array('Sitemap', 'all'),
                    'DebugSitemap'                  => array('Sitemap', 'Debug')
                );
                
            case 'Incidents':
                return null;
                
            case 'all':
                return $this->Sitemap;
                
            default:
                return null;
        }
    }
    
    # 2.2 checkSitemap
    public function checkSitemap($Site): bool
    {
        if(!empty($Site) && (is_array($this->Sitemap) || $this->initSitemap()))
        {
            foreach($this->Sitemap AS $Sitemap)
            {
                echo strpos($Sitemap, $Site);
            }
            
            return true;
        }
        else
        {
            return false;
        }
    }
    
    # 3 Private Methods
    # 3.1 initSitemap
    private function initSitemap($Reload = false): bool
    {
        if(is_null($this->Sitemap) || $Reload === true)
        {
            # 3.1.1 Init default sites
            foreach($this->Config('Defaults')['Sites'] AS $SitePath => $Site)
            {
                $this->Sitemap[]                    = $SitePath;
            }
            
            # 3.1.2 Init flatfile sites
            
            
            # 3.1.3 Init database sites
            
            #$this->setIncident('Debug', 'Phine\\Core\\Sitemap::initSitemap() initialized');
        }
        
        return true;
    }
}
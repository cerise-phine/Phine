<?php
namespace Core;

trait Site
{
    # 1 Constants and variables
    private         $Site                           = array
                    (
                        'Title'                         => 'Default SiteTitle',
                        'CharSet'                       => null,
                        'Language'                      => null,
                        'Module'                        => 'index'
                    );
    private         $SiteMeta                       = null;
    private         $SiteAssets                     = array(
                        'CSS'                           => array(),
                        'JavaScript'                    => array(),
                        'Favicon'                       => array()
                    );
    
    # 2 Public Methods
    # 2.1 Site
    public function Site($Var)#: mixed
    {
        switch($Var)
        {
            # 2.1.1 Phine output
            case 'Debug':
                return array
                (
                    'Site'                          => $this->Site,
                    'SiteMeta'                      => $this->SiteMeta,
                    'SiteAssets'                    => $this->SiteAssets
                );
                
            case 'Phinterface':
                return array
                (
                    'Site'                          => array('Site', 'Site'),
                    'SiteMeta'                      => array('Site', 'Meta'),
                    'SiteAssets'                    => array('Site', 'Assets'),
                    'DebugSite'                     => array('Site', 'Debug')
                );
                
            case 'Incidents':
                return array(
                    array('Debug',                  'x216001')
                );
                
            # 2.1.2 Specific output
            case 'Site':
                return $this->Site;
                
            case 'Meta':
                return $this->SiteMeta;
                
            case 'Assets':
                return $this->SiteAssets;
                
            default:
                return null;
        }
    }
    
    # 2.2 getSite
    public function getSite($Var = false)#: mixed
    {
        if(isset($this->Site[$Var]))
        {
            return $this->Site[$Var];
        }
        else
        {
            return $this->Site;
        }
    }
    
    # 2.3 getSiteMeta
    public function getSiteMeta($Var = false): ?array
    {
        if(isset($this->SiteMeta[$Var]))
        {
            return $this->SiteMeta[$Var];
        }
        else
        {
            return $this->SiteMeta;
        }
    }
    
    # 2.4 getSiteAssets
    public function getSiteAssets(): array
    {
        return $this->SiteAssets;
    }
    
    # 2.5 getSiteAssetsCSS
    public function getSiteAssetsCSS(): ?array
    {
        return $this->SiteAssets['CSS'];
    }
    
    # 2.6 getSiteAssetsJavaScript
    public function getSiteAssetsJavaScript(): ?array
    {
        return $this->SiteAssets['JavaScript'];
    }
    
    # 2.7 getSiteMetaHTML
    public function getSiteMetaHTML(): ?string
    {
        $getSiteMetaHTML                            = '';
        
        if(is_array($this->SiteMeta) && count($this->SiteMeta) > 0)
        {
            foreach($this->SiteMeta AS $MetaID => $MetaAttributes)
            {
                $getSiteMetaHTML                    .= $this->HTML->getMetaTag($MetaAttributes, 2);
            }
        }
        
        return $getSiteMetaHTML;
    }
    
    # 2.8 getSiteAssetsCSSHTML
    public function getSiteAssetsCSSHTML(): ?string
    {
        $getSiteAssetsCSSHTML                       = '';
        
        return $getSiteAssetsCSSHTML;
    }
    
    # 2.9 getSiteAssetsJavaScriptHTML
    public function getSiteAssetsJavaScriptHTML(): ?string
    {
        $getSiteAssetsJavaScriptHTML                = '';
        
        return $getSiteAssetsJavaScriptHTML;
    }
    
    # 2.10 setSite
    public function setSite($Var, $Value): void
    {
        if(isset($this->Site[$Var]))
        {
            $this->Site[$Var]                       = $Value;
        }
        elseif($Var === 'Favicon')
        {
            $this->SiteAssets['Favicon']            = $Value;
        }
    }
    
    # 211 setSiteMeta
    public function setSiteMeta($Meta, $Values): void
    {
        $this->SiteMeta[$Meta]                      = $Values;
    }
    
    # 2.12 setSiteAssetsCSS
    public function setSiteAssetsCSS($CSS, $Values): void
    {
        $this->SiteAssets['CSS'][$CSS]              = $Values;
    }
    
    # 2.13 setSiteAssetsJavaScript
    public function setSiteAssetsJavaScript($JS, $Values): void
    {
        $this->SiteAssets['JavaScript'][$JS]        = $Values;
    }
    
    # 3 Private Methods
    # 3.1 initSite
    private function initSite(): bool
    {
        $this->SiteMeta                             = $this->DefaultMeta;
        return true;
    }
}
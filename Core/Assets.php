<?php
namespace Core;

trait Assets
{
    # 1 Constants and variables
    private         $AssetsCSS                      = null;
    private         $AssetsFonts                    = null;
    private         $AssetsJavaScript               = null;
    
    # 2 Public Methods
    # 2.1 Assets
    public function Assets($Var = false)
    {
        switch($Var)
        {
            case 'Debug':
                return array
                (
                    'CSS'                           => $this->AssetsCSS,
                    'Fonts'                         => $this->AssetsFonts,
                    'JavaScript'                    => $this->AssetsJavaScript
                );
                
            case 'Phinterface':
                return array(
                    'AssetsCSS'                     => array('Assets', 'CSS'),
                    'AssetsFonts'                   => array('Assets', 'Fonts'),
                    'AssetsJavaScript'              => array('Assets', 'JavaScript'),
                    'DebugAssets'                   => array('Assets', 'Debug')
                );
                
            case 'Incidents':
                return null;
                
            case 'CSS':
                return $this->AssetsCSS;
                
            case 'Fonts':
                return $this->Fonts;
                
            case 'JavaScript':
                return $this->JavaScript;
                
            default:
                return null;
        }
    }
    
    # 2.2 setAssetCSS
    public function setAssetCSS($CSS): void
    {
        
    }
    
    # 2.3 setAssetFont
    public function setAssetFont($Font): void
    {
        
    }
    
    # 2.4 setAssetJavaScript
    public function setAssetJavaScript($JavaScript): void
    {
        
    }
}
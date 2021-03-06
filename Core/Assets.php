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
            # 2.1.1 Phine output
            case self::TRAIT_RETURN_DEBUG:
                return array
                (
                    'CSS'                           => $this->AssetsCSS,
                    'Fonts'                         => $this->AssetsFonts,
                    'JavaScript'                    => $this->AssetsJavaScript
                );
                
            case self::TRAIT_RETURN_PHINTERFACE:
                return array(
                    'AssetsCSS'                     => array('Assets', 'CSS'),
                    'AssetsFonts'                   => array('Assets', 'Fonts'),
                    'AssetsJavaScript'              => array('Assets', 'JavaScript'),
                    'DebugAssets'                   => array('Assets', 'Debug')
                );
                
            case self::TRAIT_RETURN_INCIDENTS:
                return null;
                
            # 2.1.2 Specific output
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
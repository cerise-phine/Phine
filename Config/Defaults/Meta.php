<?php
namespace Config\Defaults;

class Meta extends \Config\ConfigParent
{
    # 1 Config variables
    public          $ConfigClass                    = 'Meta';
    
    # 2 Default meta tags
    public  static  $Defaults                        = array
                    (
                        'Charset'                       => array(
                            'charset'                       => self::CHARSET
                        ),
                        'Viewport'                      => array(
                            'name'                          => 'viewport',
                            'content'                       => 'width=device-width, initial-scale=1.0, minimum-scale=1.0'
                        ),
                        'FormatDetection'               => array(
                            'name'                          => 'format-detection',
                            'content'                       => 'telephone=yes'
                        ),
                        'HandheldFriendly'              => array(
                            'name'                          => 'handheldfriendly',
                            'content'                       => 'yes'
                        ),
                        'AppleMobileWebApp'             => array(
                            'name'                          => 'apple-mobile-web-app-capable',
                            'content'                       => 'yes'
                        )
                    );
}
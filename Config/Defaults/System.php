<?php
namespace Config\Defaults;

class System extends \Config\ConfigParent
{
    # 1 Config variables
    public          $ConfigClass                    = 'System';
    
    # 2 Common system settings
    public  static  $Language                       = 'en';
    public  static  $CharSet                        = self::CHARSET;
    
    # 3 Date and Time
    public  static  $TimeOffset                     = 0;
    public  static  $TimeFormatDate                 = 'Y-m-d';
    public  static  $TimeFormatDateTime             = 'Y-m-d i:H:s';
    
    # 4 Phine functions
    public  static  $UseAJAX                        = true;
    public  static  $UseAPI                         = true;
    public  static  $UseCLI                         = true;
    public  static  $UseRepos                       = true;
    public  static  $UseCache                       = true;
    
    # 5 Cookies
    public  static  $CookieLifeTime                 = 60 * 60 * 24 * 30;
    
    # 6 Security
    public  static  $PWMinLength                    = 8;
    public  static  $PWHashCost                     = 10;
    public  static  $AllowAccess                    = array
                    (
                        '*'                             => true,
                        '127.0.0.1'                     => true,
                        'localhost'                     => true
                    );
    
    # 7 Cache
    public  static  $CacheLifeTime                  = 60 * 60 * 24 * 10;
}
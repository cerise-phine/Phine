<?php
namespace Config\Defaults;

class Modules extends \Config\ConfigParent
{
    # 1 Config variables
    public          $ConfigClass                    = 'Modules';
    
    # 2 Default modules
    public  static  $Defaults                       = array
                    (
                        'Admin'                         => true,
                        'Content'                       => true,
                        'Debug'                         => true,
                        'Register'                      => false,
                        'Setup'                         => true,
                        'User'                          => true
                    );
}
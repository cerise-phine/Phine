<?php
namespace Config\Defaults;

class Modules extends \Config\ConfigParent
{
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
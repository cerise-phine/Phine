<?php
namespace Config\Defaults;

class Sites extends \Config\ConfigParent
{
    public  static  $Defaults                       = array
                    (
                        'index'                         => array
                        (
                            'Title'                         => 'Index',
                            'Module'                        => 'Content'
                        ),
                        'Login'                         => array
                        (
                            'Title'                         => 'Login',
                            'Module'                        => 'Content'
                        ),
                        'Setup'                         => array
                        (
                            'Title'                         => 'Setup',
                            'Module'                        => 'Setup'
                        ),
                        'Admin'                         => array
                        (
                            'Title'                         => 'Admin',
                            'Module'                        => 'Admin'
                        ),
                        'Debug'                         => array
                        (
                            'Title'                         => 'Debug',
                            'Module'                        => 'Debug'
                        )
                    );
}
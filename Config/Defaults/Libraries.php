<?php
namespace Config\Defaults;

class Libraries extends \Config\ConfigParent
{
    public  static  $Phinterfaces                   = array
                    (
                        'CSS'                           => array('Libraries', 'CSS'),
                        'HTML'                          => array('Libraries', 'HTML'),
                        'JavaScript'                    => array('Libraries', 'JavaScript'),
                        'Validations'                   => array('Libraries', 'Validations'),
                        'CSV'                           => array('Libraries', 'CSV'),
                        'Database'                      => array('Libraries', 'Database'),
                        'Directories'                   => array('Libraries', 'Directories'),
                        'EMail'                         => array('Libraries', 'EMail'),
                        'Files'                         => array('Libraries', 'Files')
                    );
}
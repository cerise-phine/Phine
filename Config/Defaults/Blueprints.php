<?php
namespace Config\Defaults;

class Blueprints extends \Config\ConfigParent
{
    # 1 Config variables
    public          $ConfigClass                    = 'Blueprints';
    
    # 2 Default blueprints
    public  static  $Defaults                       = array
                    (
                        'Base',
                        'DebugGUI',
                        'AdminGUI'
                    );
}
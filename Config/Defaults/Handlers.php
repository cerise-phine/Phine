<?php
namespace Config\Defaults;

class Handlers extends \Config\ConfigParent
{
    # 1 Config variables
    public          $ConfigClass                    = 'Handlers';
    
    # 2 Phinterfaces
    public  static  $Phinterfaces                   = array
                    (
                        'Client'                        => array('Handlers', 'Client'),
                        'Cookies'                       => array('Handlers', 'Cookies', true),
                        'ENV'                           => array('Handlers', 'ENV'),
                        'Get'                           => array('Handlers', 'Get'),
                        'HTTP'                          => array('Handlers', 'HTTP'),
                        'Post'                          => array('Handlers', 'Post'),
                        'Server'                        => array('Handlers', 'Server'),
                        'Session'                       => array('Handlers', 'Session', true),
                        'Uploads'                       => array('Handlers', 'Uploads'),
                    );
}
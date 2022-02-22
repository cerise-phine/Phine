<?php
namespace Core\Config;

trait Defaults
{
    # 1 Constants and variables
    private         $DefaultConfig                  = array
                    (
                        'System'                        => array
                        (
                            'Language'                      => 'en',
                            'CharSet'                       => self::CHARSET,
                            'TimeOffset'                    => 0,
                            'TimeFormatDatabase'            => 'Y-m-d i:H:s',
                            'TimeFormatDate'                => 'Y-m-d',
                            'UseAJAX'                       => true,
                            'UseAPI'                        => true,
                            'UseCLI'                        => true,
                            'UseRepos'                      => true,
                            'UseCache'                      => true,
                            'Template'                      => false
                        ),
        
                        'Repositories'                  => array
                        (
                            'https://repo.phine.io/'        => true
                        ),
        
                        'Security'                      => array
                        (
                            'PWMinLength'                   => 8,
                            'PWHashCost'                    => 10,
                            'AllowAccess'                   => array
                            (
                                '*'                             => array('HTML', 'AJAX'),
                                '127.0.0.1'                     => true
                            ),
                        ),
        
                        'Cache'                         => array
                        (
                            'Private'                       => '',
                            'Public'                        => self::DIR_PUBLIC_CACHE,
                            'LifeTime'                      => 0
                        )
                    );
    
    private         $DefaultSites                   = array
                    (
                        'index'                         => array
                        (
                            'Title'                         => 'Index',
                            'Module'                        => 'Content'
                        ),
                        'Login'                         => array
                        (
                            'Title'                         => 'Login',
                            'Module'                        => 'Login'
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
                        'Devel'                         => array
                        (
                            'Title'                         => 'Devel',
                            'Module'                        => 'Devel'
                        ),
                        'Debug'                         => array
                        (
                            'Title'                         => 'Debug',
                            'Module'                        => 'Debug'
                        )
                    );
    
    private         $DefaultMeta                    = array
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
    
    private         $DefaultModules                 = array
                    (
                        'DebugGUI'                      => '',
                        'AdminGUI'                      => '',
                        'SetupGUI'                      => '',
                        'EmptyGUI'                      => '',
                        'Content'                       => '',
                        'Cookie'                        => '',
                        'Login'                         => '',
                        'PasswordReset'                 => '',
                        'Register'                      => ''
                    );
    
    private         $DefaultHandlers                = array
                    (
                        'Client'                        => array('Handlers', 'Client'),
                        'Cookies'                       => array('Handlers', 'Cookies', true),
                        'Data'                          => array('Handlers', 'Data'),
                        'ENV'                           => array('Handlers', 'ENV'),
                        'Get'                           => array('Handlers', 'Get'),
                        'HTTP'                          => array('Handlers', 'HTTP'),
                        'Post'                          => array('Handlers', 'Post'),
                        'Server'                        => array('Handlers', 'Server'),
                        'Session'                       => array('Handlers', 'Session', true),
                        'Uploads'                       => array('Handlers', 'Uploads'),
                    );
    
    private         $DefaultLibraries               = array
                    (
                        'CSS'                           => array('Libraries', 'CSS'),
                        'Cache'                         => array('Libraries', 'Cache'),
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
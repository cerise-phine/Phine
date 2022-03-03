<?php
spl_autoload_register(function($ClassName) {
    $ClassRelativePath                              = str_replace("\\", DIRECTORY_SEPARATOR, $ClassName) . '.php';
    $ClassAbsolutePath                              = __DIR__ . DIRECTORY_SEPARATOR . $ClassRelativePath;

    require($ClassAbsolutePath);
});

try
{
    $PhineDebugMode                                 = (isset($PhineDebug) ? true : false);
    $Phine                                          = Phine::Phinstance($PhineDebugMode);
}
catch (Exception $e)
{
    print_r($e);
}
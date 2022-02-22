<?php
namespace Handlers;

class Post
{
    # 1 Variables and constants
    private         $Post                           = array();

    # 2 Magic methods
    # 2.1 __construct
    final public function __construct()
    {
        $this->initPost();
    }
    
    # 2.2 __get
    final public function __get($Var = 'all'): ?string
    {
        if($Var === 'all')
        {
            return $this->Post;
        }
        elseif(isset($this->Post[$Var]))
        {
            return $this->Post[$Var];
        }
        else
        {
            return null;
        }
    }
    
    # 2.6 __debugInfo
    final public function __debugInfo(): ?array
    {
        return $this->Post;
    }
    
    # 3 Private methods
    # 3.1 initPost
    private function initPost()
    {
        $this->Post                                 = filter_input_array(INPUT_POST);
    }
}
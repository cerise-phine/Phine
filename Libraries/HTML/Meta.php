<?php
namespace Libraries\HTML;

trait Meta
{
    # 1 Public methods
    # 1.1 getMetaTag
    public function getMetaTag($Attributes, $Tabs = 0): ?string
    {
        $getMetaTag                                 = '';
        
        if($Tabs !== 0 && is_int($Tabs))
        {
            $getMetaTag                             .= $this->Tab($Tabs);
        }
        
        $getMetaTag                                 .= $this->Tag('meta', $Attributes);
        
        $getMetaTag                                 .= $this->Break;
        
        return $getMetaTag;
    }
}
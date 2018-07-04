<?php

namespace Simrishamn\Controller;

use \Simrishamn\Theme\PageHierarchy;

class Sitemap extends \Municipio\Controller\BaseController
{
    public function init()
    {
        $pageHierarchy = new \Simrishamn\Theme\PageHierarchy();
        $this->data["pages"] = $pageHierarchy->getArray();
    }
}

<?php

namespace Gadi\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GadiUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

<?php

namespace Parallalax\SynchroBundle;

use Parallalax\SynchroBundle\DependencyInjection\ParallalaxSynchroExtension;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ParallalaxSynchroBundle extends Bundle {

    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new ParallalaxSynchroExtension();
        }
        return $this->extension;
    }

}
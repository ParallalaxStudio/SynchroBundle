<?php

namespace Parallalax\SynchroBundle;

use Parallalax\SynchroBundle\DependencyInjection\ParallalaxSynchroExtension;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ParallalaxSynchroBundle extends Bundle {

    public function getContainerExtension(): ?\Symfony\Component\DependencyInjection\Extension\ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new ParallalaxSynchroExtension();
        }
        return $this->extension;
    }

}

<?php

/**
 * TphPro Observer model
 *
 * @author Alessandro Ronchi <aronchi at webgriffe.com>
 */
class Webgriffe_TphPro_Model_Observer {

    public function addTemplateHints($observer) {
        $event = $observer->getEvent();
        $block = $event->getBlock();
        #$isRootBlock = $block->getNameInLayout() == 'root';
        $transport = $event->getTransport();
        $html = '<magento '
                #. ($isRootBlock ? 'handles="' . implode(",", $block->getLayout()->getUpdate()->getHandles()) . '"' : '')
                . ' block="' . get_class($block) . '"'
                #. ' template="' . $block->getTemplate() . '"'
                . (!strcmp($block->getTemplate(), '') ? '' : ' template_file="' . $block->getTemplateFile() . '"' )
                . ' name="' . $block->getNameInLayout() . '"'
                . ' alias="' . $block->getBlockAlias() . '"'
                . '>' . $transport->getHtml() . '</magento>';
        $transport->setHtml($html);
    }

}
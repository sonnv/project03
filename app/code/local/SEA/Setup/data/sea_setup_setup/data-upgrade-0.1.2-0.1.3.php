<?php
try {

    $installer = $this;
    $installer->startSetup();

    $content = <<<EOD
<div class="footer-link-col footer-link-col2">
<h6>Store Policles &amp; Info</h6>
<ul>
<li><a href="http://www.verbenaproducts.com/shipping">Shipping</a></li>
<li><a href="http://www.verbenaproducts.com/returns">Returns</a></li>
<li><a href="http://www.verbenaproducts.com/faqs">Faqs</a></li>
<li><a href="http://www.verbenaproducts.com/privacy-policy">Privacy Policy</a></li>
<li><a href="http://www.verbenaproducts.com/security-policy">Security</a></li>
<li><a href="http://www.verbenaproducts.com/trademarks">Trademarks</a></li>
</ul>
</div>
EOD;
    $staticBlock = array(
        'title' => 'Store Policles & Info',
        'identifier' => 'store-policles',
        'content' => $content,
        'is_active' => 1,
        'stores' => array(4)
    );
    $block = Mage::getModel('cms/block')->load('store-policles');
    if (!$block->getId()) {
        Mage::getModel('cms/block')->setData($staticBlock)->save();
    } else {
        $block->setContent($content)->save();
    }
    /////////////////////
    $content = <<<EOD
EOD;
    $installer->endSetup();
} catch (Excpetion $e) {
    Mage::logException($e);
    Mage::log("ERROR IN SETUP " . $e->getMessage());
}
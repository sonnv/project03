<?php
try {

    $installer = $this;
    $installer->startSetup();

    $content = <<<EOD
<div class="footer-link-col footer-link-col3">
<h6>Helpful Links</h6>
<ul>
<li><a href="http://www.verbenaproducts.com/about-us">About Us </a></li>
<li><a href="http://www.verbenaproducts.com/catalog/seo_sitemap/category">Site Map</a></li>
</ul>
</div>
EOD;
    $staticBlock = array(
        'title' => 'Helpful Links',
        'identifier' => 'helpful-links',
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
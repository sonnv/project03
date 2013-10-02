<?php
try {

    $installer = $this;
    $installer->startSetup();

    $content = <<<EOD
  <div class="footer-link-col footer-link-col1">
<h6>Customer Service</h6>
<ul>
<li><a href="http://www.verbenaproducts.com/contacts">Contact Us</a></li>
<li><a href="http://www.verbenaproducts.com/sales/order/history/">Order Tracking</a></li>
<li><a href="http://www.verbenaproducts.com/">Press &amp; Media</a></li>
<li><a href="http://www.verbenaproducts.com/wishlist/">Wishlist</a></li>
<li><a href="http://www.verbenaproducts.com/customer/account">Your Account</a></li>
</ul>
</div>
EOD;
    $staticBlock = array(
        'title' => 'Customer Service',
        'identifier' => 'customer-service',
        'content' => $content,
        'is_active' => 1,
        'stores' => array(4)
    );
    $block = Mage::getModel('cms/block')->load('customer-service');
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
<?php
try {

    $installer = $this;

    $installer->startSetup();

    $content = <<<EOD
<script type="text/javascript">// <![CDATA[
    jQuery(document).ready(function(){
	jQuery('.bxslider').bxSlider({
	  auto: true,
	  autoControls: true
	});
    });
// ]]></script>
<ul class="bxslider">
<li><img src="http://www.verbenaproducts.com/media/wysiwyg/home-banner/background-slider1.jpg" alt="" /></li>
<li><img src="http://www.verbenaproducts.com/media/wysiwyg/home-banner/background-slider2.jpg" alt="" /></li>
<li><img src="http://www.verbenaproducts.com/media/wysiwyg/home-banner/background-slider3.jpg" alt="" /></li>
</ul>
EOD;

    $block = Mage::getModel('cms/block')->load('home');
    if ($block->getId()) {
        $block->setContent($content)->save();
    }

    $content2 = <<<EOD
EOD;
    $cmsPage = array(
        'title' => 'Home page',
        'identifier' => 'home',
        'content' => $content2,
        'is_active' => 1,
        'stores' => array(0),
        'root_template' => 'one_column'
    );
    $home = Mage::getModel('cms/page')->load('home');
    if(!$home->getId()){
        Mage::getModel('cms/page')->setData($cmsPage)->save();
    }else{
        $home->setContent($content2)->setRootTemplate('one_column')->save();
    }

    $installer->endSetup();

} catch (Excpetion $e) {
    Mage::logException($e);
    Mage::log("ERROR IN SETUP " . $e->getMessage());
}
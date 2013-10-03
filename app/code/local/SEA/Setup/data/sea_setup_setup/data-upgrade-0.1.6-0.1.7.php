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
<li><img class="de1" style="margin: 0px; padding: 0px; color: #638ca8;" src="http://www.verbenaproducts.com/media/wysiwyg/home-banner/background-slider3.jpg" alt="" /></li>
</ul>
<div class="product">
<h1>Featured Products</h1>
<div class="featured-products">{{block type="catalog/product_list" category_id="9" template="catalog/product/featured.phtml"}}</div>
<h1>peatured-big-products</h1>
<div class="featured-big-products">{{block type="catalog/product_list" category_id="10" template="catalog/product/featured_big.phtml"}}</div>
</div>
EOD;
    $cmsPage = array(
        'title' => 'Home page',
        'identifier' => 'home',
        'content' => $content,
        'is_active' => 1,
        'stores' => array(0),
        'root_template' => 'one_column'
    );
    $privacy = Mage::getModel('cms/page')->load('home');
    if(!$privacy->getId()){
        Mage::getModel('cms/page')->setData($cmsPage)->save();
    }else{
        $privacy->setContent($content)->setRootTemplate('one_column')->save();
    }


    $installer->endSetup();

} catch (Excpetion $e) {
    Mage::logException($e);
    Mage::log("ERROR IN SETUP " . $e->getMessage());
}
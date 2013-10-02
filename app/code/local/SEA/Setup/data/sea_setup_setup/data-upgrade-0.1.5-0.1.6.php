<?php
try {

    $installer = $this;

    $installer->startSetup();

    $content = <<<EOD
    <script>
    jQuery(document).ready(function(){
	jQuery('.bxslider').bxSlider({
	  auto: true,
	  autoControls: true
	});
    });

</script>
</head>
<body>
<ul class="bxslider">
  <li><img src="http://www.verbenaproducts.com/media/wysiwyg/home-banner/background-slider1.jpg"/></li>
  <li><img src="http://www.verbenaproducts.com/media/wysiwyg/home-banner/background-slider2.jpg" /></li>
  <li><img src="http://www.verbenaproducts.com/media/wysiwyg/home-banner/background-slider3.jpg" /></li>
</ul>
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
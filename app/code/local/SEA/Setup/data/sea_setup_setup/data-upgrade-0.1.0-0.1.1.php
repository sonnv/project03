<?php
/**
 * Created by JetBrains PhpStorm.
 * User: NguyenSon
 * Date: 01/10/2013
 * Time: 13:57
 * To change this template use File | Settings | File Templates.
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

//Config theme in magento
$config = new Mage_Core_Model_Config();

$config->saveConfig("design/theme/template","training");
$config->saveConfig("design/theme/skin","training");
$config->saveConfig("design/theme/layout","training");
$config->saveConfig("design/theme/default","default");

$installer->endSetup();
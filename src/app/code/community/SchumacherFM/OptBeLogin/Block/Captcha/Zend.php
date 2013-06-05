<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition License
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magentocommerce.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Captcha
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */

/**
 * Captcha block
 *
 * @category   Core
 * @package    Mage_Captcha
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class SchumacherFM_OptBeLogin_Block_Captcha_Zend extends Mage_Captcha_Block_Captcha_Zend
{
    protected $_minTemplate = 'optbelogin/minimal/captcha/zend.phtml';

    protected $_allowedFormIds = array(
        'backend_forgotpassword' => 1,
        'backend_login'          => 1,
    );

    /**
     * Returns template path
     *
     * @return string
     */
    public function getTemplate()
    {
        /** @var SchumacherFM_OptBeLogin_Helper_Data $helper */
        $helper = Mage::helper('optbelogin');
        if ($this->_isAllowed() && $helper->isMinimalLogin()) {
            return $this->getIsAjax() ? '' : $this->_minTemplate;
        }
        return $this->getIsAjax() ? '' : $this->_template;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return isset($this->_allowedFormIds[$this->getData('form_id')]);
    }

}

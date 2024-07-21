<?php
/**
 * Mavenbird Technologies Private Limited
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://mavenbird.com/Mavenbird-Module-License.txt
 *
 * =================================================================
 *
 * @category   Mavenbird
 * @package    Mavenbird_Whatsapp
 * @author     Mavenbird Team
 * @copyright  Copyright (c) 2018-2024 Mavenbird Technologies Private Limited ( http://mavenbird.com )
 * @license    http://mavenbird.com/Mavenbird-Module-License.txt
 */
namespace Mavenbird\WhatsApp\ViewModel;

class WhatsApp implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Mavenbird\WhatsApp\Helper\Data
     */
    private $helper;

    /**
     * @var \Magento\Framework\Module\Manager
     */
    private $moduleManager;

    /**
     * Initialize constructor
     * @param \Mavenbird\WhatsApp\Helper\Data $helper
     * @param \Magento\Framework\Module\Manager $moduleManager
     */
    public function __construct(
        \Mavenbird\WhatsApp\Helper\Data $helper,
        \Magento\Framework\Module\Manager $moduleManager
    ) {
        $this->helper = $helper;
        $this->moduleManager = $moduleManager;
    }

    /**
     * Get helper
     *
     * @return \Mavenbird\WhatsApp\Helper\Data
     */
    public function getHelper()
    {
        return $this->helper;
    }

    /**
     * Is Enabled
     *
     * @param string $path
     * @return boolean
     */
    public function isEnabled($path)
    {
        return $this->moduleManager->isEnabled($path);
    }
}

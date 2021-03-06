<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 10.09.17
 * Time: 01:46
 */

namespace OCA\Passwords\Helper\Preview;

use OCA\Passwords\Services\HelperService;
use OCA\Passwords\Services\WebsitePreviewService;

/**
 * Class ScreenShotMachineHelper
 *
 * @package OCA\Passwords\Helper\Preview
 */
class ScreenShotMachineHelper extends AbstractPreviewHelper {

    /**
     * @var string
     */
    protected $prefix = HelperService::PREVIEW_SCREEN_SHOT_MACHINE;

    /**
     * @param string $domain
     * @param string $view
     *
     * @return string
     */
    protected function getPreviewUrl(string $domain, string $view): string {
        $apiKey = $this->config->getAppValue('service/preview/ssm/key');

        if($view === WebsitePreviewService::VIEWPORT_DESKTOP) {
            return "http://api.screenshotmachine.com/?key={$apiKey}&dimension=".self::WIDTH_DESKTOP."xfull&device=desktop&format=jpg&url={$domain}";
        }

        return "http://api.screenshotmachine.com/?key={$apiKey}&dimension=".self::WIDTH_MOBILE."xfull&device=phone&format=jpg&url={$domain}";
    }
}
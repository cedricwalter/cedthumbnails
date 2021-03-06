<?php
/**
 * @package     cedThumbnails
 * @subpackage  mod_articles_latest_thumb
 *
 * @copyright   Copyright (C) 2013-2016 galaxiis.com All rights reserved.
 * @license     The author and holder of the copyright of the software is Cédric Walter. The licensor and as such issuer of the license and bearer of the
 *              worldwide exclusive usage rights including the rights to reproduce, distribute and make the software available to the public
 *              in any form is Galaxiis.com
 *              see LICENSE.txt
 * @id 1c7495e0-ayx7-11e3-8b68-0800200c9a66
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';
require_once JPATH_SITE . '/components/com_cedthumbnails/helpers/helper.php';

$cachePathId = JPath::clean(trim(str_replace(" ", "", $module->title)));
$list            = modArticlesLatestThumbsHelper::getList($params, $cachePathId);

if (!count($list)) {
    return;
}

$layout = $params->get('layout', 'default');
modArticlesLatestThumbsHelper::addStyleSheet($layout);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_articles_latest_thumb', $layout);
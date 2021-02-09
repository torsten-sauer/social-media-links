<?php
namespace Grav\Plugin;

use Grav\Common\Data\Blueprints;
use Grav\Common\Plugin;
use Grav\Common\Page\Page;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class SocialMediaLinksPlugin
 * @package Grav\Plugin
 */
class SocialMediaLinksPlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
       		$this->active = false;
            return;
        }
		if ($this->config->get('plugins.social-media-links.enabled')) {
			$this->enable([
				'onTwigTemplatePaths'   => ['onTwigTemplatePaths', 0],
				'onTwigPageVariables'   => ['onTwigPageVariables', 0],
				'onTwigSiteVariables'   => ['onTwigSiteVariables', 0],
				'onAssetsInitialized'   => ['onAssetsInitialized', 0]
			]);
        }
	}

	/**
	* We set twig variable in case the template is included in a page and not in a theme template
	*
	* @param Event $e
	*/
	public function onTwigPageVariables(Event $e) {
        $this->onTwigSiteVariables();
	}
	
	/**
	* Set variables for the template
	*/
	public function onTwigSiteVariables() 
	{
		$twig = $this->grav['twig'];
		$pages = $this->config->get('plugins.social-media-links.social_pages.pages');	
		uasort($pages, function($a, $b) {
			return $a['position'] < $b['position'] ? -1 : ($a['position'] == $b['position'] ? 0 : 1);
        });
        $twig->twig_vars['social_pages'] = $pages;
	}

	public function onTwigTemplatePaths()
				    {
		$this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
	}
	
	public function onAssetsInitialized()
    {
        if ($this->config->get('plugins.social-media-links.built_in_css')) {
            $this->grav['assets']->add('plugin://social-media-links/assets/css/social-media-links.css');
        }
	}
}

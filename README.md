# Social Media Links Plugin

The **Social Media Links** Plugin is for [Grav CMS](http://github.com/getgrav/grav). Add links to social media sites

## Installation

Installing the Social Media Links plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install social-media-links

This will install the Social Media Links plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/social-media-links`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `social-media-links`. You can find these files on [GitHub](https://github.com/torsten-sauer/grav-plugin-social-media-links) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/social-media-links
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

### Admin Plugin

If you use the admin plugin, you can install directly through the admin plugin by browsing the `Plugins` tab and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/social-media-links/social-media-links.yaml` to `user/config/plugins/social-media-links.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true  			# enables the plugin
built_in_css: true		# include the default css
social_pages:
  pages:			# the pages that can be used
    facebook:
      icon: facebook		# the fontawesome icon (fa- is added automatically)
      title: Facebook		# the text that is displayed as title for the link
      position: 1		# the ordering position the icon is arranged
    twitter:
      icon: twitter
      title: Twitter
      position: 2
    instagram:
      icon: instagram
      title: Instagram
      position: 3
    pinterest:
      icon: pinterest
      title: Pinterest
      position: 4
    github:
      icon: github
      title: GitHub
      position: 5
    linkedin:
      icon: linkedin
      title: LinkedIn
      position: 6
```

Note that if you use the admin plugin, a file with your configuration, and named social-media-links.yaml will be saved in the `user/config/plugins/` folder once the configuration is saved in the admin.

## Usage
Just include the partial template from the plugin wherever you want it to show in your page or template.

```
{% include 'partials/socialmedia.html.twig' %}
```

If you inlcude this code on a page, don't forget to activate Twig processing in advanced options so the code above is processed.

## Credits
Inspired by the aboutme-plugin from Sébastien Viallemonteil (https://github.com/birssan/grav-plugin-about-me).

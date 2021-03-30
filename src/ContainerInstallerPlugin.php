<?php

namespace apiato\installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Class ContainerInstallerPlugin
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class ContainerInstallerPlugin implements PluginInterface
{
	/**
	 * @param Composer $composer
	 * @param IOInterface $io
	 */
	public function activate(Composer $composer, IOInterface $io)
	{
		$installer = new ContainerInstaller($io, $composer);
		$composer->getInstallationManager()->addInstaller($installer);
	}

	/**
	 * Remove any hooks from Composer
	 *
	 * This will be called when a plugin is deactivated before being
	 * uninstalled, but also before it gets upgraded to a new version
	 * so the old one can be deactivated and the new one activated.
	 *
	 * @param Composer $composer
	 * @param IOInterface $io
	 */
	public function deactivate(Composer $composer, IOInterface $io)
	{
	}

	/**
	 * Prepare the plugin to be uninstalled
	 *
	 * This will be called after deactivate.
	 *
	 * @param Composer $composer
	 * @param IOInterface $io
	 */
	public function uninstall(Composer $composer, IOInterface $io)
	{
	}
}

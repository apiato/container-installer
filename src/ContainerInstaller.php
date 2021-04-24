<?php

namespace apiato\installer;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class ContainerInstaller extends LibraryInstaller
{
	/**
	 * {@inheritDoc}
	 */
	public function getInstallPath(PackageInterface $package)
	{
		$containerName = $package->getPrettyName();
		$extras = json_decode(json_encode($package->getExtra()));
		if (isset($extras->apiato->container->name)) {
			$containerName = $extras->apiato->container->name;
		}
		return "app/Vendor/" . $containerName;
	}

	/**
	 * {@inheritDoc}
	 */
	public function supports($packageType)
	{
		return ('apiato-container' === $packageType);
	}
}

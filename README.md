Description
===========

HttpClientInfoProvider is a simple component that acts as a wrapper in front of the Symfony2 Framework's Service Container and its Request class to provide some basic information about the client and the browser. This is a workaround to some limitations in Symfony2 framework's Request component itself.

HttpClientInfoProviderBundle registers an instance of HttpClientInfoProvider as a service (client_info) to Symfony's service container.

Enabling the Bundle in Symfony2
===============================

1. Copy directories HttpClientInfoProvider and HttpClientInfoProviderBundle into your preferred place in Symfony2 project (vendor/eventio-httpclientinfoprovider)?
2. Add HttpClientInfoProviderBundle to your AppKernel.php:

		public function registerBundles()
		{
			$bundles = array(
				// (...)
				new Eventio\HttpClientInfoProviderBundle\EventioHttpClientInfoProviderBundle(),
				// (...)
			);
		}
	
3. Add a dummy configuration varible to activate the extension in config.yml

		eventio_http_client_info_provider: ~
	

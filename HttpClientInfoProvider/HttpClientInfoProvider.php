<?php
/**
 */
namespace Eventio\HttpClientInfoProvider;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * HttpClientInfoProvider
 *
 * @author Ville Mattila <ville@eventio.fi>
 */
class HttpClientInfoProvider {

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;
    
    /**
     * @param Symfony\Component\DependencyInjection\ContainerInterface $serviceContainer Symfony's service container
     */
    public function __construct(ContainerInterface $serviceContainer) {
        $this->request = $serviceContainer->get('request');
    }
    
    /**
     * Returns the client IP address.
     * 
     * This function simplifies the usage of Symfony's own Request::getClientIp()
     * function. The function checks out the existence of HTTP_X_FORWARDED_FOR
     * header and passes a proper argument to getClientIp()
     * 
     * Currently retrieving the actual IP address is done by Request::getClientIp()
     * 
     * @returns string Client's IP address (as reported by Request::getClientIp())
     */
    public function getClientIp() {
        
        $behindProxy = $this->request->server->has('HTTP_X_FORWARDED_FOR');
        
        return $this->request->getClientIp($behindProxy);
    }
	
	/**
	 * @returns Browser Browser object, giving information about the user's browser.
	 */
	public function getBrowser() {
		return new Browser($this->request->server->get('HTTP_USER_AGENT'));
	}
}
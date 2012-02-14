<?php
/**
 */
namespace Eventio\HttpClientInfoProvider;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Browser object provides information about the user's browser
 *
 * @author Ville Mattila <ville@eventio.fi>
 */
class Browser {

	/**
	 * @var string
	 */
	protected $userAgentString = null;
	    
    /**
	 * @param string $userAgentString
     */
    public function __construct($userAgentString) {
        $this->userAgentString = $userAgentString;
    }
    
	/**
	 * @returns bool
	 */
	public function isMSIE() {
		return (preg_match('/msie/i', $this->userAgentString));
	}
	
	/**
	 * @returns bool
	 */
	public function isFirefox() {
		return (preg_match('/firefox/i', $this->userAgentString));
	}
}
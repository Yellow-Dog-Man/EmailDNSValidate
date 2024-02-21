<?php

namespace EmailDNSValidate;

use MediaWiki\Auth\AbstractPreAuthenticationProvider;
use Status;

class EmailDNSValidate extends AbstractPreAuthenticationProvider {
	/**
	 *
	 * {@inheritDoc}
	 * @see \MediaWiki\Auth\AbstractPreAuthenticationProvider::testForAccountCreation()
	 *
	 * @param \User $user
	 * @param \User $creator
	 * @param array $reqs
	 * @return Status
	 */
	public function testForAccountCreation( $user, $creator, array $reqs ) {
		// extract domain from email :
		$email = $user->getEmail();

		if ( strpos( $email, '@' ) === false ) {
			return $this->makeError( wfMessage( 'emaildnsvalidate-formatvalfail' ) );
		}

		$domain = substr( $email, strpos( $email, '@' ) + 1 );

		// check if the domain is actually an IP address
		if (filter_var($domain, FILTER_VALIDATE_IP))
		{
			// reject private or reserved (includes loopback) IPs
			if (!filter_var($domain, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE))
			{
				return $this->makeError( wfMessage( 'emaildnsvalidate-ipprivres' ) );
			}

			// other IP addresses are ok
			return Status::newGood();
		}

		// domains should actually end in a . to prevent checkdnsrr from trying to lookup the domain
		// as a relative domain, see https://php.net/manual/en/function.checkdnsrr.php#119969
		if ($domain[-1] != ".")
		{
			$domain .= ".";
		}

		// Does it have an MX record
		if (checkdnsrr($domain, "MX"))
		{
			return Status::newGood();
		}

		// Otherwise no dice
		return $this->makeError( wfMessage( 'emaildnsvalidate-nxdomain' ) );
	}
}
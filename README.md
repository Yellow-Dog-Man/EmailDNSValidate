# email-dns-validate
MediaWiki extension which enables you to validate the existence of the domain part of an email address.

## Fork Notes
This extension is very old but we couldn't find similar functionality elsewhere so we decided to refactor it to use the new AuthManager stack on MediaWiki.

We're not that familiar with PHP or MediaWiki Extensions so feel free to PR/Update if there are issues. 

## Installation

1. Clone the extension from GitHub to your wiki's extensions folder: `git clone https://github.com/YellowDogMan/EmailDNSValidate.git`
2. Enable the extension by adding it to your LocalSettings.php file: `wfLoadExtension('EmailDNSValidate');`

## What it Does

MediaWiki by default validates only the format of an email address. 

This extension extends that validation to also verify the existence of the domain component.

The domain name must Have an active MX DNS Record OR be a Public IP

## Bugs Reports and Feature Requests

Bugs Reports and Feature Requests can be made by creating an Issue on GitHub. Pull requests for
changes are also welcome.


## Fork References
This fork was updated using the following links as references/information:
- https://github.com/somadeaki/RestrictEmailDomain
- https://github.com/dokit/mediawiki-MailDomainRestriction
- https://github.com/rphsoftware/mw-discord-oauth2
- https://www.mediawiki.org/wiki/Manual:SessionManager_and_AuthManager
- https://doc.wikimedia.org/mediawiki-core/master/php/classMediaWiki_1_1Auth_1_1AbstractPreAuthenticationProvider.html

We were primarily searching for "stop account creation and display message" so this is also included in the hopes it helps with search.
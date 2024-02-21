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

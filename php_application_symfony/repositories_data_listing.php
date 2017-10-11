<?php

require_once 'vendor/autoload.php';

/**
 * Listing all the repository in symfony using php github api 2.0 (https://github.com/KnpLabs/php-github-api/blob/master/doc/repos.md).
 */
class repositoriesListing
{
	public function __construct()
    {
    }
	/*
     * Get extended information about a repository .
     *
     * @param integer $id   repository id is passed to get the repository details
     *
     * @return array information about a repository 
     *
     * @throws \RuntimeException When an invalid option is provided
     */ 
	public function repositoryListingById($id)//ex : id = 458058
    {
		$client = new \Github\Client();			
		$repo = $client->api('repo')->showById($id);
		if(empty($repo))
		{
			throw new \RuntimeException(sprintf('Unrecognized id "%s"', $id));
		}
		else
		{
			return array('repositories'=>array($repo));
		}
	}
	
	/*
     * Get extended information about a repository .
     *
     * @param string $url  url is passed to get the repository details
     *
     * @return array information about a repository 
     *
     * @throws \RuntimeException When an invalid option is provided
     */
	public function repositoryListingByUrl($repo_url) // Ex : repo_url = 'https://github.com/symfony'
    {
		$client = new \Github\Client();			
		$repo = $client->api('repo')->find($repo_url);
		if(empty($repo))
		{
			throw new \RuntimeException(sprintf('Unrecognized url "%s"', $repo_url));
		}
		else
		{
			return $repo;
		}
	}
	
	/*
     * Get extended information about a repository .
     *
     * @param string $name  name of repository is passed to get the repository details
     *
     * @return array information about a repository 
     *
     * @throws \RuntimeException When an invalid option is provided
     */
	public function repositoryListingByName($name) //Ex : name = symfony 
    {
		$client = new \Github\Client();			
		$repo = $client->api('repo')->find($name);
		if(empty($repo))
		{
			throw new \RuntimeException(sprintf('Unrecognized name "%s"', $name));
		}
		else
		{
			return $repo;
		}
	}
	
}
	

	
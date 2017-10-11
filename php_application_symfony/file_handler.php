<?php
    require_once("repositories_data_listing.php");

	//creating a object for class repositoriesListing
    $repositoriesListing = new repositoriesListing();
	
	//fetching repo data  on bases of parameter passed 
	if(!empty($_POST['repo_id']))
	{
		print_r(json_encode($repositoriesListing->repositoryListingById($_POST['repo_id'])));
	}
    else if(!empty($_POST['repo_url']))
	{
		print_r(json_encode($repositoriesListing->repositoryListingByUrl($_POST['repo_url'])));
	}
	else
	{
		print_r(json_encode($repositoriesListing->repositoryListingByName($_POST['repo_name'])));
	}
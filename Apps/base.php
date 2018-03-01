<?php

if (isset($_SESSION['id']))
{
	require('Views/baseadmin.phtml');
}
else
{
	require('Views/baseuser.phtml');	
}

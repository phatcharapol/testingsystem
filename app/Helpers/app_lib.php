<?php
use Illuminate\Support\Facades\Auth;

function getUser(){
	return auth::user()->firstname." ".auth::user()->lastname ;
}

?>
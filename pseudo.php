<?php

class CDatabase
{ 
	$dsn = UPPKOPPLINGSINSTÄLLNINGAR
	$username = ANVÄNDARNAMN
	$password = LÖSENORD
	$options = DATABAS/FIL 
	$PDO = DATABASKOPPLING 

	public function __construct()
	{
		if($options == FIL)
			ANSLUT DATABASFIL
		else
			ANSLUT DATABAS
	}

	public function prepare($sql)
	{
		return DATABASKOPPLING->prepare($sql);
	}
}

===========================================================================================================

class CSQLFileMenu
{
	public function __construct()
	{
		LETA ALLA FILER I MAPPEN SQL
		VÄLJER FIL UTIFRÅN $_POST['P']
	}
	
	public function getContent()
	{
		FYLL <CONTENT> MED INNEHÅLL
	}

	public function getNavigation()
	{
		RETURNERAR NAVIAGIONSMENY (BREADCRUMBS)
		ANVÄNDER __FILE__ IFALL DEN INTE VISAR HELA SÖKVÄGEN FÖR ATT LÄMNA BRÖDSMULOR
	}

	private function getMainMenu()
	{
		SÖK MAPPAR I MAPPEN PAGES
		RETURNERAR HUVUDMENYN UTIFRÅN MAPPARNA
	}

	private function getSubMenu()
	{
		SÖK FILER I NUVARANDE MAPP
		RETURNERAR UNDERMENYN UTIFRÅN FILNAMNEN I VALD MAPP
	}
}


===============================================================================================================


class CSQLFile
{
	public function __counstruct(TA EMOT FILNAMN)
	{
		KOPPLA UPP MOT FILEN OCH DATABASEN
	}

	private function readFileParts()
	{
		ANVÄND FILE FÖR ATT LÄSA IN KOMMANDONA SPARA I ARRAY
	}

	private function executeStatements()
	{
		KÖR SQL KOMMANDONA IFRÅN readFileParts MOT DATABASEN 
	}

	private function generateHTMLTableResult(TA EMOT ARRAY)
	{
		SKAPA TABELL MHA FOREACHLOOP 
		RETURNERAR TABELLEN
	}

	public function getDescription()
	{
		SÖK EFTER TECKENKOMBINATION:  'ΞΞΞΞΞΞΞΞΞΞ----ΞΞΞΞΞΞΞΞΞΞ'
		RETURNERAR BESKRIVNING
	}

	public function getSQL()
	{
		ANROPA executeStatements
		RETURNERAR executeStatements VÄRDE
	}

	public function getResult()
	{
		ANROPA executeStatements, ANROPA generateHTMLTableResult
		RETURNERAR VÄRDET
	}
}
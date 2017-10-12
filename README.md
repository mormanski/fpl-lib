About

PHP Library to access the undocumented Fantasy Premier League API

Using the library

    use Mormanski\FplLib\FplLib;

    $fpl = new FplLib();
    $client = $fpl->getClient();

API Endpoints

https://fantasy.premierleague.com/drf/bootstrap-static
    
    $bootstrapStatic = $client->bootstrapStatic();

https://fantasy.premierleague.com/drf/leagues-classic-standings/{leagueId}

    $leagueClassicStandings = $client->leagueClassicStandings(['leagueId' => $leagueId]);

https://fantasy.premierleague.com/drf/entry/{entryId}
        
    $entry = $client->entry(['entryId' => '1234567']);

https://fantasy.premierleague.com/drf/entry/{entryId}/history

    $entryHistory = $client->entryHistory(['entryId' => '1234567']);
    
https://fantasy.premierleague.com/drf/entry/{id}/event/{eventId}/picks

    $data = $client->entryPicks(['entryId' => $entryId, 'eventId' => $eventId]);

https://fantasy.premierleague.com/drf/element-summary/{elementId}

    $elementSummary = $client->elementSummary(['elementId' => '123']);
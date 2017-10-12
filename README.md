About

PHP Library to access the undocumented Fantasy Premier League API

Using the library

    use Mormanski\FplLib\FplLib;

    $fpl = new FplLib();
    $client = $fpl->getClient();

API Endpoints

https://fantasy.premierleague.com/drf/bootstrap-static
    
    $data = $client->bootstrapStatic;

https://fantasy.premierleague.com/drf/leagues-classic-standings/{leagueId}

    $data = $client->entryPicks(['leagueId' => $leagueId]);

https://fantasy.premierleague.com/drf/entry/{entryId}

    $data = $client->entry(['entryId' => $entryId]);

https://fantasy.premierleague.com/drf/entry/{entryId}/history

    $data = $client->entryHistory(['entryId' => $entryId]);
    
https://fantasy.premierleague.com/drf/entry/{id}/event/{gw}/picks

    $data = $client->entryPicks(['entryId' => $entryId]);

https://fantasy.premierleague.com/drf/element-summary/{elementId}

    $data = $client->elementSummary(['elementId' => $elementId]);

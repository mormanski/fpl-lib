About

PHP Library to access the undocumented Fantasy Premier League API

Using the library

    use Mormanski\FplLib\FplLib;

    $fpl = new FplLib();
    $client = $fpl->getClient();

API Endpoints

https://fantasy.premierleague.com/drf/entry/{entryId}/history

    $client->playerHistory(['id' => $player_id])

https://fantasy.premierleague.com/drf/element-summary/{id}
https://fantasy.premierleague.com/drf/entry/{id}
https://fantasy.premierleague.com/drf/entry/{id}/event/{gw}/picks
https://fantasy.premierleague.com/drf/bootstrap-static
https://fantasy.premierleague.com/drf/element-summary/{id}
https://fantasy.premierleague.com/drf/leagues-classic-standings/{leagueId}

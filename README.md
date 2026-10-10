FplLib, PHP library for the Fantasy Premier League API
-------------------------------------------------------

PHP Library to access the undocumented https://fantasy.premierleague.com API

## Installation

### Using composer

    composer require mormanski/fpl-lib

### Using github repository

    {
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/mormanski/fpl-lib"
            }
        ],
        "require": {
            "mormasnki/fpl-lib": "master"
        }
    }

## Using the library

    use Mormanski\FplLib\FplLib;

    $fpl = new FplLib();

## API Endpoints

https://fantasy.premierleague.com/api/bootstrap-static
    
    $bootstrapStatic = $fpl->bootstrapStatic();

https://fantasy.premierleague.com/api/leagues-classic-standings/{leagueId}

    $leaguesClassicStandings = $fpl->leaguesClassicStandings(123123);

https://fantasy.premierleague.com/api/entry/{entryId}
        
    $entry = $fpl->entry(1234567);

https://fantasy.premierleague.com/api/entry/{entryId}/history

    $entryHistory = $fpl->entryHistory(1234567);
    
https://fantasy.premierleague.com/api/entry/{id}/event/{eventId}/picks

    $data = $fpl->entryPicks($entryId, $eventId);

https://fantasy.premierleague.com/api/element-summary/{elementId}

    $elementSummary = $fpl->elementSummary(123);
    
## Terminology

* An entry is equivalent to a contestant in the competition
* An element is equivalent to a player
* An event is equivalent to a game week, for instance eventId => 2 denotes game week 2.
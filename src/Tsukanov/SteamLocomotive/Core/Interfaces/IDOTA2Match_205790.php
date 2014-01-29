<?php
namespace Tsukanov\SteamLocomotive\Core\Interfaces;

use Tsukanov\SteamLocomotive\Core\WebInterface;
use Tsukanov\SteamLocomotive\Core;

class IDOTA2Match_205790 extends WebInterface
{

    public function GetMatchDetails($match_id)
    {
        $params = array(
            'match_id' => $match_id
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetTeamInfoByTeamID($start_at_team_id = NULL, $teams_requested = NULL)
    {
        $params = array(
            'start_at_team_id' => $start_at_team_id,
            'teams_requested' => $teams_requested
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetLiveLeagueGames()
    {
        return self::get(self::getClassName($this), __FUNCTION__, 1);
    }

    public function GetLeagueListing()
    {
        return self::get(self::getClassName($this), __FUNCTION__, 1);
    }

    public function GetMatchHistoryBySequenceNum($start_at_match_seq_num = NULL, $matches_requested = NULL)
    {
        $params = array(
            'start_at_match_seq_num' => $start_at_match_seq_num,
            'matches_requested' => $matches_requested
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetScheduledLeagueGames($date_min = NULL, $date_max = NULL)
    {
        $params = array(
            'date_min' => $date_min,
            'date_max' => $date_max
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetTournamentPlayerStats($account_id,
                                             $match_id = NULL,
                                             $hero_id = NULL,
                                             $league_id = NULL,
                                             $time_frame = NULL)
    {
        $params = array(
            'account_id' => $account_id,
            'match_id' => $match_id,
            'hero_id' => $hero_id,
            'league_id' => $league_id,
            'time_frame' => $time_frame,
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetMatchHistory($matches_requested = NULL,
                                    $start_at_match_id = NULL,
                                    $account_id = NULL,
                                    $date_max = NULL,
                                    $date_min = NULL,
                                    $skill = NULL,
                                    $hero_id = NULL,
                                    $league_id = NULL,
                                    $tournament_games_only = NULL,
                                    $min_players = NULL,
                                    $game_mode = NULL)
    {
        $params = array(
            'match_id' => $matches_requested,
            'start_at_match_id' => $start_at_match_id,
            'account_id' => $account_id,
            'date_min' => $date_min,
            'date_max' => $date_max,
            'skill' => $skill,
            'hero_id' => $hero_id,
            'league_id' => $league_id,
            'tournament_games_only' => $tournament_games_only,
            'min_players' => $min_players,
            'game_mode' => $game_mode,
        );
        return self::get(self::getClassName($this), __FUNCTION__, 1, $params);
    }

}

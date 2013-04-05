<?php
namespace Locomotive\WebInterfaces;

class IDOTA2Match_205790 extends WebInterface
{

    public function GetMatchDetails($match_id)
    {
        $params = array(
            'match_id' => $match_id
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetTeamInfoByTeamID($start_at_team_id = NULL, $teams_requested = NULL)
    {
        $params = array(
            'start_at_team_id' => $start_at_team_id,
            'teams_requested' => $teams_requested
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetLiveLeagueGames()
    {
        return self::get(getClassName($this), __FUNCTION__, 1);
    }

    public function GetLeagueListing()
    {
        return self::get(getClassName($this), __FUNCTION__, 1);
    }

    public function GetMatchHistoryBySequenceNum($start_at_match_seq_num = NULL, $matches_requested = NULL)
    {
        $params = array(
            'start_at_match_seq_num' => $start_at_match_seq_num,
            'matches_requested' => $matches_requested
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

    public function GetMatchHistory($matches_requested = NULL,
                                    $start_at_match_id = NULL,
                                    $account_id = NULL,
                                    $date_max = NULL,
                                    $date_min = NULL,
                                    $skill = NULL,
                                    $hero_id = NULL,
                                    $league_id = NULL,
                                    $player_name = NULL)
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
            'player_name' => $player_name,
        );
        return self::get(getClassName($this), __FUNCTION__, 1, $params);
    }

}

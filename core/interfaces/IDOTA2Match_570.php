<?php

class IDOTA2Match_570 extends API_Interface
{

    /**
     * @param $match_id string Match ID
     * @return mixed
     * @throws SteamAPIUnavailableException
     */
    public function GetMatchDetails($match_id)
    {
        $params = array(
            'match_id' => $match_id
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
    }

    public function GetTeamInfoByTeamID($start_at_team_id, $teams_requested)
    {
        $params = array(
            'start_at_team_id' => $start_at_team_id,
            'teams_requested' => $teams_requested
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
    }

    public function GetLiveLeagueGames()
    {
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
    }

    public function GetLeagueListing()
    {
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
    }

    public function GetMatchHistoryBySequenceNum($start_at_match_seq_num, $matches_requested)
    {
        $params = array(
            'start_at_match_seq_num' => $start_at_match_seq_num,
            'matches_requested' => $matches_requested
        );
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
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
        $contents = self::getContent(__CLASS__, __FUNCTION__, 1, $params);
        if ($contents === FALSE) throw new SteamAPIUnavailableException($contents);
        $json = json_decode($contents);
        return $json->result;
    }

}

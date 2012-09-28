<?php

class CommunityAPI {

    public function getAppsForUser($community_id) {
        $url = 'http://steamcommunity.com/profiles/'.$community_id.'/games?tab=all&xml=1';
        $contents = @file_get_contents($url);
        // TODO: Return more informative info about errors
        if ($contents === FALSE) {
            throw new SteamAPIUnavailableException();
        } else {
            try {
                $xml = new SimpleXMLElement($contents);
                if (isset($xml->error)) {
                    // TODO: Make sure right exception is thrown
                    throw new SteamAPIUnavailableException();
                } else {
                    return $xml->games->game;
                }
            } catch (Exception $e) {
                // Catching XML parsing errors
                // TODO: Handle this properly
                throw new SteamAPIUnavailableException();
            }
        }
    }

}
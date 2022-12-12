<?php

namespace App\Service;

use App\Entity\Program;


class ProgramDuration
{
public function calculate(Program $program): string
{
    $duration = [];
    $seasons = $program -> getSeasons();
    foreach ($seasons as $season)  {
        $episodes = $season -> getEpisodes();
        foreach ($episodes as $episode) {
            $duration[] = $episode -> getDuration();
        }
    }
    $minutes = array_sum($duration);
    $days =floor($minutes / 1440);
    $hours = floor(($minutes % 1440) / 60);
    $minutes = $minutes % 60;


    return " $days jours, $hours heures, $minutes minutes. ";
}

}
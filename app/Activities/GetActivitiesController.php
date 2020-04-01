<?php

namespace App\Http\Controllers;

use App\Activities\Activity;
use App\Activities\Day;
use App\Activities\Hour;
use App\Activities\Level;
use App\Activities\Zone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class GetActivitiesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $activitiesGroupByZone = app(Activity::class)->all()
            ->sortBy(['day_id', 'hour_id', 'level_id'])->groupBy(["zone_id"])->toArray();

        $ret = [];
        foreach ($activitiesGroupByZone as $activitiesArray) {
            $zone = [];
            foreach ($activitiesArray as $activity) {
                $current = collect($activity)->only([
                    "id", "day_name", "hour_formatted",
                ])->toArray();
                $zone[] = $current;
            }
            $dayColumn = $this->deleteNextDuplicate(array_column($zone, "day_name", "id"));
            $hourColumn = $this->deleteNextDuplicate(array_column($zone, "hour_formatted", "id"));

            foreach ($dayColumn as $key => $day) {
                $activity = Activity::find($key);
                /* @var Activity $activity */
                $ret[] = [
                    "Día" => $day,
                    "Hora" => $hourColumn[$key],
                    "Instructor" => $activity->getInstructorNameAttribute(),
                    "Nivel" => $activity->getLevelNameAttribute(),
                    "Zona" => $activity->getZoneNameAttribute(),
                    "Inscríbete" => $activity->toArray(),
                ];
            }
            $ret[] = ["Día" => "separator"];
        }
        array_pop($ret);
        return response()->json($ret);
    }

    private function deleteNextDuplicate(array $array): array
    {
        $current = "";
        foreach ($array as $key => & $item) {
            if (@$array[$key-1] == $item || $current === $item) {
                $item = "";
            } else {
                $current = $item;
            }
        }
        return $array;
    }
}

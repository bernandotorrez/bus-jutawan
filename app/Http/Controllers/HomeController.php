<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\PunishmentRepository;
use App\Repository\Eloquent\RewardsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    protected $rewards, $punishments;

    public function __construct(
        RewardsRepository $rewards,
        PunishmentRepository $punishments
    ) {
        $this->rewards = $rewards;
        $this->punishments = $punishments;
    }

    public function index()
    {
        $rewards = $this->rewards->allActive()->toArray();
        $punishments = $this->punishments->allActive()->toArray();

        $rewardsAndPunishments = array_merge($rewards, $punishments);
        shuffle($rewardsAndPunishments);
        $rewardsAndPunishments = array_chunk($rewardsAndPunishments, 4);

        return view('pages.home.index', compact('rewardsAndPunishments'));
    }

    /**
     * @author Bernand
     * @param string id
     * Get Reward Data
     */
    public function getReward($id)
    {
        $data = $this->rewards->getByUuid($id);
        $category = 'Reward';
        $color = 'purple';

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'success',
            'data' => asset($data->image_reward)
        ], 200);
        //return view('pages.home.reward_or_punishment', compact('data', 'category', 'color'));
    }

    /**
     * @author Bernand
     * @param string id
     * Get Punishment Data
     */
    public function getPunishment($id)
    {
        $data = $this->punishments->getByUuid($id);
        $category = 'Punishment';
        $color = 'red';

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'success',
            'data' => asset($data->image_punishment)
        ], 200);
        //return view('pages.home.reward_or_punishment', compact('data', 'category', 'color'));
    }

    public function getAll() {
        $punishments = $this->punishments->allActive()->toArray();
        $rewards = $this->rewards->allActive()->toArray();

        $data = array_merge($punishments, $rewards);
        shuffle($data);

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    public function configCache()
    {
        Artisan::call("config:cache");
    }

    public function configClear()
    {
        Artisan::call("config:clear");
    }

    public function optimizeClear()
    {
        Artisan::call("optimize:clear");
    }

    public function migrateFresh()
    {
        Artisan::call("migrate:fresh");
    }

    public function migrate()
    {
        Artisan::call("migrate");
    }

    public function migrateRollback()
    {
        Artisan::call("migrate:rollback");
    }

    public function optimize()
    {
        Artisan::call('optimize');
    }
}

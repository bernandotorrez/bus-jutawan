<?php

use App\Models\Rewards;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class CreateTblReward extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tbl_rewards')) {
            Schema::create('tbl_rewards', function (Blueprint $table) {
                $table->id('id_reward');
                $table->string('uuid_reward', 100);
                $table->string('reward', 200);
                $table->string('image_reward', 200);
                $table->enum('status', ['0', '1'])->default('1');
                $table->timestamps();
            });

            $this->insertData();
        }
    }

    private function insertData()
    {
        Rewards::insert(
            [
                [
                    'uuid_reward' => Uuid::uuid4(),
                    'reward' => 'Bonus Rp 2 Juta',
                    'image_reward' => 'assets/reward/reward_bonus_2jt.png'
                ],
                [
                    'uuid_reward' => Uuid::uuid4(),
                    'reward' => 'Buang 2 Jawaban',
                    'image_reward' => 'assets/reward/reward_buang_2_jawaban.png'
                ],
                [
                    'uuid_reward' => Uuid::uuid4(),
                    'reward' => 'Reward Guru',
                    'image_reward' => 'assets/reward/reward_guru.png'
                ],
                [
                    'uuid_reward' => Uuid::uuid4(),
                    'reward' => 'Jackpot!',
                    'image_reward' => 'assets/reward/reward_jackpot.png'
                ],
                [
                    'uuid_reward' => Uuid::uuid4(),
                    'reward' => 'Keberuntungan',
                    'image_reward' => 'assets/reward/reward_keberuntungan.png'
                ],
                [
                    'uuid_reward' => Uuid::uuid4(),
                    'reward' => 'Tanya Murid',
                    'image_reward' => 'assets/reward/reward_tanya_murid.png'
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_rewards');
    }
}

<?php

use App\Models\Punishments;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class CreateTblPunishments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tbl_punishments')) {
            Schema::create('tbl_punishments', function (Blueprint $table) {
                $table->id('id_punishment');
                $table->string('uuid_punishment', 100);
                $table->string('punishment', 200);
                $table->string('image_punishment', 200);
                $table->enum('status', ['0', '1'])->default('1');
                $table->timestamps();
            });

            $this->insertData();
        }

    }

    private function insertData()
    {
        Punishments::insert(
            [
                [
                    'uuid_punishment' => Uuid::uuid4(),
                    'punishment' => 'Essay',
                    'image_punishment' => 'assets/punishment/punishment_essay.png'
                ],
                [
                    'uuid_punishment' => Uuid::uuid4(),
                    'punishment' => 'Game Over',
                    'image_punishment' => 'assets/punishment/punishment_game_over.png'
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
        Schema::dropIfExists('tbl_punishments');
    }
}

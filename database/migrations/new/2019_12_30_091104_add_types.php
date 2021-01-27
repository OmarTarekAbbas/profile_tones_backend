<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('types')->insert(
            array(
                array (
                    'id' => 8,
                    'title' => 'input_color',
                    'created_at' => '2019-12-31 13:18:52',
                    'updated_at' => '2019-12-31 13:18:52',
                ),
                array (
                    'id' => 9,
                    'title' => 'page',
                    'created_at' => '2019-12-31 13:19:52',
                    'updated_at' => '2019-12-31 13:19:52',
                ),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

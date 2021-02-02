<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("ALTER TABLE `rbt_codes` ADD `image` VARCHAR(191) NULL DEFAULT NULL AFTER `operator_id`;");
        \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'enable_delete', '0', NULL, NULL, '7', NULL)");
        \DB::statement("INSERT INTO `content_types` (`id`, `title`, `created_at`, `updated_at`) VALUES (4, 'Audio', '2019-02-14 11:06:34', '2019-02-14 11:06:34');");
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

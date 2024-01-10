<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('ALTER TABLE list_kua MODIFY latitude VARCHAR(255)');
        \DB::statement('ALTER TABLE list_kua MODIFY longitude VARCHAR(255)');

        \DB::statement('ALTER TABLE pendaftaran_pernikahan MODIFY latitude VARCHAR(255)');
        \DB::statement('ALTER TABLE pendaftaran_pernikahan MODIFY longitude VARCHAR(255)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('ALTER TABLE list_kua MODIFY latitude DOUBLE');
        \DB::statement('ALTER TABLE list_kua MODIFY longitude DOUBLE');

        \DB::statement('ALTER TABLE pendaftaran_pernikahan MODIFY latitude DOUBLE');
        \DB::statement('ALTER TABLE pendaftaran_pernikahan MODIFY longitude DOUBLE');
    }
};

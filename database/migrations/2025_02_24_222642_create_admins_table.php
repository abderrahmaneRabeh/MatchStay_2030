<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("CREATE TABLE admins () INHERITS (users);");
        DB::statement('ALTER TABLE admins ADD CONSTRAINT admins_id_pkey PRIMARY KEY (id);');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS admins CASCADE;");
    }
};

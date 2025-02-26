<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTouristesTable extends Migration
{
    public function up()
    {
        DB::statement("CREATE TABLE touristes () INHERITS (users);");

        DB::statement('ALTER TABLE touristes ADD CONSTRAINT touristes_id_pkey PRIMARY KEY (id);');
    }

    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS touristes CASCADE;");
    }
}

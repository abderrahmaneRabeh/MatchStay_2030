<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTouristesTable extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE TABLE touristes (
                id SERIAL PRIMARY KEY,
                CONSTRAINT touristes_id_unique UNIQUE (id)
            ) INHERITS (users);
        ");
    }

    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS touristes CASCADE;");
    }
}

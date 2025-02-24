<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProprietairesTable extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE TABLE proprietaires (
                id SERIAL PRIMARY KEY,
                CONSTRAINT proprietaires_id_unique UNIQUE (id)
            ) INHERITS (users);
        ");
    }

    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS proprietaires CASCADE;");
    }
}

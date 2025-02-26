<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProprietairesTable extends Migration
{
    public function up()
    {
        DB::statement("CREATE TABLE proprietaires () INHERITS (users);");
        DB::statement('ALTER TABLE proprietaires ADD CONSTRAINT proprietaires_id_pkey PRIMARY KEY (id);');
    }

    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS proprietaires CASCADE;");
    }
}

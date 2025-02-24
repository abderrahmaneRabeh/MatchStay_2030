<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Étape 1 : Créer le type ENUM si ce n'est pas encore fait
        DB::statement("
            DO $$ BEGIN
            IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'user_role') THEN
            CREATE TYPE user_role AS ENUM ('admin', 'proprietaire', 'touriste');
            END IF;
            END $$;
");

        // Étape 2 : Créer la table `users`
        DB::statement("
            CREATE TABLE users (
            id SERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            email_verified_at TIMESTAMP NULL,
            password VARCHAR(255) NOT NULL,
            role user_role,
            photo VARCHAR(255) NULL,
            remember_token VARCHAR(100) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ");
    }

    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS users CASCADE;");
        DB::statement("DROP TYPE IF EXISTS user_role CASCADE;");
    }
}

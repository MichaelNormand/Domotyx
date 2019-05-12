<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomotyxMysqlFunctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "CREATE FUNCTION a_enfants(page_id INTEGER UNSIGNED) RETURNS BOOLEAN
        BEGIN
	        DECLARE fetched_lines INTEGER;
	        SELECT COUNT(*)INTO fetched_lines FROM menu WHERE menu.parent_id = page_id;
                IF fetched_lines > 0 THEN
                	RETURN TRUE;
                ELSE
    	            RETURN FALSE;
                END IF;
        END";
        DB::unprepared("DROP FUNCTION IF EXISTS a_enfants");
        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP FUNCTION IF EXISTS a_enfants");
    }
}

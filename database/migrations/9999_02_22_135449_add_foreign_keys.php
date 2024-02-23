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
        Schema::table('projects', function (Blueprint $table) {

            $table->foreignId('type_id')->constrained();
        });
        Schema::table('project_technology', function (Blueprint $table) {

            $table->foreignId('project_id')->constrained();
            $table->foreignId('technology_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn('type_id');
        });
        Schema::table('project_technology', function (Blueprint $table) {

            $table->dropForeign('project_technology_project_id_foreign');
            $table->dropColumn('project_id');

            $table->dropForeign('project_technology_technology_id_foreign');
            $table->dropColumn('technology_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->foreignId('ticket_type_id')->nullable()->constrained('ticket_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['ticket_type_id']);
            $table->dropColumn('ticket_type_id');
        });
    }
};

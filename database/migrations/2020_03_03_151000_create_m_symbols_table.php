<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSymbolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_symbols', function (Blueprint $table) {
            $table->bigIncrements('m_symbols_id');
            $table->integer('symbol_id')->unsigned()->unique();
            $table->char('symbol_name', 50);
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('m_symbols')->insert(
            array(
                'symbol_id' => 1,
                'symbol_name' => 'EUR/USD',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_symbols');
    }
}

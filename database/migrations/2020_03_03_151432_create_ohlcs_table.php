<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOhlcsTable extends Migration
{

    // "symbol": "EUR/USD",
    // "candle": {
    //    "o": "1.1118", // Open
    //    "h": "1.112", // High
    //    "l": "1.1116", // Low
    //    "c": "1.1117", // Close
    //    "t": 1583244000000, // Time Unix Format (UTC)
    //    "tm": "2020-03-03 14:00:00" // Date Time (UTC)
    // }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ohlcs', function (Blueprint $table) {
            $table->bigIncrements('ohlc_id');
            $table->integer('symbol_id');
            $table->decimal('open',6,4);
            $table->decimal('high',6,4);
            $table->decimal('low',6,4);
            $table->decimal('close',6,4);
            $table->bigInteger('uts');
            $table->datetime('utc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ohlcs');
    }
}

<?php

use App\Models\Consultor;
use App\Models\Service;
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
        Schema::create('consultor_service', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Consultor::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Service::class)->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('consultor_service');
    }
};

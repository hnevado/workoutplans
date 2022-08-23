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
        Schema::create('workouts', function (Blueprint $table) {

            //El Feedback del atleta 0 será la carita triste :(  1 carita normal :|  y el 2 será la carita sonriente :)

            $table->id();

            $table->date('start_date');
            $table->date('end_date');

            $table->unsignedBigInteger('coach'); //Qué entrenador ha creado ese plan de entrenamiento 
            $table->unsignedBigInteger('athlete')->nullable(); //A qué atleta va ese entrenamiento. Si es nulo, ese plan de entrenamiento será público

            $table->longText('comments_coach')->nullable();
            $table->longText('comments_athlete')->nullable();

            $table->longText('training_monday')->nullable();
            $table->smallInteger('feedback_monday')->nullable(); 
            $table->longText('training_tuesday')->nullable();
            $table->smallInteger('feedback_tuesday')->nullable(); 
            $table->longText('training_wednesday')->nullable();
            $table->smallInteger('feedback_wednesday')->nullable(); 
            $table->longText('training_thursday')->nullable();
            $table->smallInteger('feedback_thursday')->nullable(); 
            $table->longText('training_friday')->nullable();
            $table->smallInteger('feedback_friday')->nullable(); 
            $table->longText('training_saturday')->nullable();
            $table->smallInteger('feedback_saturday')->nullable(); 
            $table->longText('training_sunday')->nullable();
            $table->smallInteger('feedback_sunday')->nullable(); 

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
        Schema::dropIfExists('workout');
    }
};

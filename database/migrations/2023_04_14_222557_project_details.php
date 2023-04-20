<!-- <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('project_details', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('id_project');
        //     $table->foreign('id_project')->references('id')->on('projects')->onDelete('cascade');
        //     $table->string('Section', 999);
        //     $table->string('Status', 50);
        //     $table->date('end_Date')->nullable();
        //     $table->text('description')->nullable();
        //     $table->string('user',300);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('project_details');
    }
}; 

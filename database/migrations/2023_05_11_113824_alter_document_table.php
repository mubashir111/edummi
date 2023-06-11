<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document', function (Blueprint $table) {
            
             $table->string('9th_Marksheet_url')->nullable();
             $table->string('10th_Marksheet_url')->nullable();
             $table->string('11th_Marksheet_url')->nullable();
             $table->string('12th_Marksheet_url')->nullable();
             $table->string('bachlors_marksheet_url')->nullable();
             $table->string('consolidate_marksheet_url')->nullable();
             $table->string('acadamic_transcript_url')->nullable();
             $table->string('final_degree_url')->nullable();
             $table->string('application_form_url')->nullable();
             $table->string('passport_file_url')->nullable();
             $table->string('statment_purpose_url')->nullable();
             $table->string('cv_url')->nullable();
             $table->string('latter_of_recomentation_url')->nullable();
             $table->string('english_certificate_url')->nullable();
             $table->string('bank_balance_url')->nullable();
             $table->string('financial_affidavit_url')->nullable();
             $table->string('gap_explanation_letter_url')->nullable();
             $table->string('Online_Submission_Configaration_url')->nullable();
             $table->string('sat_file_url')->nullable();
             $table->string('gre_url')->nullable();
             $table->string('gmat_url')->nullable();
             $table->string('toefl_url')->nullable();
             $table->string('ielts_file_url')->nullable();
             $table->string('pte_url')->nullable();
             $table->string('exempyion_certificate_url')->nullable();
             $table->string('additional_documents_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
Schema::table('document', function (Blueprint $table) {
$table->dropColumn('9th_Marksheet_url');
$table->dropColumn('10th_Marksheet_url');
$table->dropColumn('11th_Marksheet_url');
$table->dropColumn('12th_Marksheet_url');
$table->dropColumn('bachlors_marksheet_url');
$table->dropColumn('consolidate_marksheet_url');
$table->dropColumn('acadamic_transcript_url');
$table->dropColumn('final_degree_url');
$table->dropColumn('application_form_url');
$table->dropColumn('passport_file_url');
$table->dropColumn('statment_purpose_url');
$table->dropColumn('cv_url');
$table->dropColumn('latter_of_recomentation_url');
$table->dropColumn('english_certificate_url');
$table->dropColumn('bank_balance_url');
$table->dropColumn('financial_affidavit_url');
$table->dropColumn('gap_explanation_letter_url');
$table->dropColumn('Online_Submission_Configaration_url');
$table->dropColumn('sat_file_url');
$table->dropColumn('gre_url');
$table->dropColumn('gmat_url');
$table->dropColumn('toefl_url');
$table->dropColumn('ielts_file_url');
$table->dropColumn('pte_url');
$table->dropColumn('exempyion_certificate_url');
$table->dropColumn('additional_documents_url');
});
}
}

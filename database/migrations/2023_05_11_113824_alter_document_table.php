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
             $table->string('Bachlors_Individual_Marksheets_url')->nullable();
             $table->string('Consolidated_Marksheet_url')->nullable();
             $table->string('academic_Marksheet_url')->nullable();
             $table->string('Degree_Certificate_url')->nullable();
             $table->string('application_form_url')->nullable();
             $table->string('copy_of_Passport_url')->nullable();
             $table->string('statment_of_purpose_url')->nullable();
             $table->string('cv_url')->nullable();
             $table->string('latter_of_recommendation_url')->nullable();
             $table->string('english_language_certificate_url')->nullable();
             $table->string('bank_balance_certificate_url')->nullable();
             $table->string('financial_affidavit_url')->nullable();
             $table->string('gap_explanation_latter_url')->nullable();
             $table->string('online_submission_configaration_page_url')->nullable();
             $table->string('SAT_url')->nullable();
             $table->string('GRE_url')->nullable();
             $table->string('GMAT_url')->nullable();
             $table->string('TOEFL_url')->nullable();
             $table->string('IELTS_url')->nullable();
             $table->string('PTE_url')->nullable();
             $table->string('exemption_url')->nullable();
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
$table->dropColumn('Bachlors_Individual_Marksheets_url');
$table->dropColumn('Consolidated_Marksheet_url');
$table->dropColumn('academic_Marksheet_url');
$table->dropColumn('Degree_Certificate_url');
$table->dropColumn('application_form_url');
$table->dropColumn('copy_of_Passport_url');
$table->dropColumn('statment_of_purpose_url');
$table->dropColumn('cv_url');
$table->dropColumn('latter_of_recommendation_url');
$table->dropColumn('english_language_certificate_url');
$table->dropColumn('bank_balance_certificate_url');
$table->dropColumn('financial_affidavit_url');
$table->dropColumn('gap_explanation_latter_url');
$table->dropColumn('online_submission_configaration_page_url');
$table->dropColumn('SAT_url');
$table->dropColumn('GRE_url');
$table->dropColumn('GMAT_url');
$table->dropColumn('TOEFL_url');
$table->dropColumn('IELTS_url');
$table->dropColumn('PTE_url');
$table->dropColumn('exemption_url');
$table->dropColumn('additional_documents_url');
});
}
}

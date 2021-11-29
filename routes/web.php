<?php
use App\Agence;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

// All my routes that needs a logged in
/**
 * ----
 * Navbar routes
 * ---
 */
Route::get('backoffice/accueil', ['as' => 'backoffice_accueil', 'uses' => 'AccueilController@index']);
Route::get('backoffice/referentiel', ['as' => 'backoffice_referentiel', 'uses' => 'ReferentielController@index']);
/**
 * ---
 * Entreprise Routes
 * ---
 */
Route::get('backoffice/entreprise', ['as' => 'backoffice_entreprise', 'uses' => 'EntrepriseController@index']);
Route::patch('backoffice/entreprise', ['as' => 'backoffice_entreprise_modifier','middleware'=>'permission:Modifier', 'uses' => 'EntrepriseController@update']);
/**
 * ---
 * Pays
 * ---
 */
Route::get('backoffice/pays', ['as' => 'backoffice_pays', 'uses' => 'PaysController@index']);
Route::post('backoffice/pays', ['as' => 'backoffice_pays_ajouter','middleware'=>'permission:Créer', 'uses' => 'PaysController@store']);
Route::patch('backoffice/pays', ['as' => 'backoffice_pays_modifier','middleware'=>'permission:Modifier', 'uses' => 'PaysController@update']);
Route::delete('backoffice/pays', ['as' => 'backoffice_pays_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'PaysController@destroy']);
/**
 * ---
 * Villes
 * ---
 */
Route::get('backoffice/villes', ['as' => 'backoffice_villes', 'uses' => 'VillesController@index']);
Route::post('backoffice/villes', ['as' => 'backoffice_villes_ajouter','middleware'=>'permission:Créer', 'uses' => 'VillesController@store']);
Route::patch('backoffice/villes', ['as' => 'backoffice_villes_modifier','middleware'=>'permission:Modifier', 'uses' => 'VillesController@update']);
Route::delete('backoffice/villes', ['as' => 'backoffice_villes_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'VillesController@destroy']);
/**
 * ---
 * Bank
 * ---
 */
Route::get('backoffice/banques', ['as' => 'backoffice_banques', 'uses' => 'BanquesController@index']);
Route::get('backoffice/ajout_banque', ['as' => 'backoffice_banque_ajouter', 'uses' => 'AjoutBanqueController@index']);
Route::get('backoffice/modifier_banque/{id}', ['as' => 'backoffice_banque_modifier', 'uses' => 'ModifierBanqueController@index']);
Route::post('backoffice/banques', ['as' => 'backoffice_banques_ajouter','middleware'=>'permission:Créer', 'uses' => 'BanquesController@store']);
Route::patch('backoffice/banques', ['as' => 'backoffice_banques_modifier','middleware'=>'permission:Modifier', 'uses' => 'BanquesController@update']);
Route::delete('backoffice/banques', ['as' => 'backoffice_banques_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'BanquesController@destroy']);
/**
 * ---
 * Agences bancaires
 * ---
 */
Route::get('backoffice/agences_bancaires', ['as' => 'backoffice_agences', 'uses' => 'AgencesController@index']);
Route::get('backoffice/ajout_agence', ['as' => 'backoffice_agence_ajout', 'uses' => 'AjoutAgenceController@index']);
Route::get('backoffice/modifier_agence/{id}', ['as' => 'backoffice_agence_modifier', 'uses' => 'ModifierAgenceController@index']);
Route::post('backoffice/agences_bancaires', ['as' => 'backoffice_agences_ajouter','middleware'=>'permission:Créer', 'uses' => 'AgencesController@store']);
Route::patch('backoffice/agences_bancaires', ['as' => 'backoffice_agences_modifier','middleware'=>'permission:Modifier', 'uses' => 'AgencesController@update']);
Route::delete('backoffice/agences_bancaires', ['as' => 'backoffice_agences_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'AgencesController@destroy']);
/**
 * ---
 * Comptes bancaires
 * ---
 */
Route::get('backoffice/comptes_bancaires', ['as' => 'backoffice_comptes', 'uses' => 'ComptesController@index']);
Route::get('backoffice/ajout_compte', ['as' => 'backoffice_compte_ajout', 'uses' => 'AjoutCompteController@index']);
Route::get('backoffice/modifier_compte/{id}', ['as' => 'backoffice_compte_modifier', 'uses' => 'ModifierCompteController@index']);
Route::post('backoffice/comptes_bancaires', ['as' => 'backoffice_comptes_ajouter','middleware'=>'permission:Créer', 'uses' => 'ComptesController@store']);
Route::patch('backoffice/comptes_bancaires', ['as' => 'backoffice_comptes_modifier','middleware'=>'permission:Modifier', 'uses' => 'ComptesController@update']);
Route::delete('backoffice/comptes_bancaires', ['as' => 'backoffice_comptes_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ComptesController@destroy']);
/**
 * Ajax: Dynamic select (Banque / Agence)
 */
Route::get('agences/get/{id}', 'AjoutCompteController@getAgences');
/**
 * ---
 * Categories postes
 * ---
 */
Route::get('backoffice/categories_postes', ['as' => 'backoffice_cat_postes', 'uses' => 'CategoriesPostesController@index']);
Route::post('backoffice/categories_postes', ['as' => 'backoffice_cat_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesPostesController@store']);
Route::patch('backoffice/categories_postes', ['as' => 'backoffice_cat_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesPostesController@update']);
Route::delete('backoffice/categories_postes', ['as' => 'backoffice_cat_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesPostesController@destroy']);
/**
 * ---
 * Contrats 
 * ---
 */
Route::get('backoffice/types_contrats', ['as' => 'backoffice_contrat', 'uses' => 'TypesContratsController@index']);
Route::post('backoffice/types_contrats', ['as' => 'backoffice_contrat_ajouter', 'uses' => 'TypesContratsController@store']);
Route::patch('backoffice/types_contrats', ['as' => 'backoffice_contrat_modifier', 'uses' => 'TypesContratsController@update']);
Route::delete('backoffice/types_contrats', ['as' => 'backoffice_contrat_supprimer', 'uses' => 'TypesContratsController@destroy']);
/**
 * ---
 * Types Postes
 * ---
 */
Route::get('backoffice/types_postes', ['as' => 'backoffice_poste', 'uses' => 'TypesPostesController@index']);
Route::post('backoffice/types_postes', ['as' => 'backoffice_poste_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesPostesController@store']);
Route::patch('backoffice/types_postes', ['as' => 'backoffice_poste_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesPostesController@update']);
Route::delete('backoffice/types_postes', ['as' => 'backoffice_poste_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesPostesController@destroy']);
/**
 * ---
 * Rubriques
 * ---
 */
Route::get('backoffice/rubriques', ['as' => 'backoffice_rubrique', 'uses' => 'RubriquesController@index']);
Route::post('backoffice/rubriques', ['as' => 'backoffice_rubrique_ajouter','middleware'=>'permission:Créer', 'uses' => 'RubriquesController@store']);
Route::patch('backoffice/rubriques', ['as' => 'backoffice_rubrique_modifier','middleware'=>'permission:Modifier', 'uses' => 'RubriquesController@update']);
Route::delete('backoffice/rubriques', ['as' => 'backoffice_rubrique_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'RubriquesController@destroy']);
/**
 * ---
 * Absences
 * ---
 */
Route::get('backoffice/types_absences', ['as' => 'backoffice_absence', 'uses' => 'TypesAbsencesController@index']);
Route::post('backoffice/types_absences', ['as' => 'backoffice_absence_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesAbsencesController@store']);
Route::patch('backoffice/types_absences', ['as' => 'backoffice_absence_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesAbsencesController@update']);
Route::delete('backoffice/types_absences', ['as' => 'backoffice_absence_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesAbsencesController@destroy']);
/**
 * ---
 * Manage Users  
 * ---
 */
Route::get('backoffice/utilisateurs', ['as' => 'backoffice_utilisateurs','middleware'=>'role:Administrateur', 'uses' => 'UtilisateursController@index']);
Route::post('backoffice/utilisateurs', ['as' => 'backoffice_user_ajouter', 'uses' => 'UtilisateursController@store']);
Route::patch('backoffice/utilisateurs', ['as' => 'backoffice_user_modifier', 'uses' => 'UtilisateursController@update']);
Route::delete('backoffice/utilisateurs', ['as' => 'backoffice_user_supprimer', 'uses' => 'UtilisateursController@destroy']);
/**
 * ---
 * Roles 
 * ---
 */
Route::get('backoffice/roles', ['as' => 'backoffice_roles', 'uses' => 'RoleController@index']);
Route::post('backoffice/roles', ['as' => 'backoffice_role_ajouter', 'uses' => 'RoleController@store']);
Route::patch('backoffice/roles', ['as' => 'backoffice_role_modifier', 'uses' => 'RoleController@update']);
Route::delete('backoffice/roles', ['as' => 'backoffice_role_supprimer', 'uses' => 'RoleController@destroy']);
/**
 * ---
 * Details Accident 
 * ---
 */
Route::get('backoffice/categories_details_accident', ['as' => 'backoffice_cat_details_accident', 'uses' => 'CategoriesDetailsAccidentController@index']);
Route::post('backoffice/categories_details_accident', ['as' => 'backoffice_cat_details_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesDetailsAccidentController@store']);
Route::patch('backoffice/categories_details_accident', ['as' => 'backoffice_cat_details_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesDetailsAccidentController@update']);
Route::delete('backoffice/categories_details_accident', ['as' => 'backoffice_cat_details_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesDetailsAccidentController@destroy']);
/**
 * ---
 * Types details accident
 * ---
 */
Route::get('backoffice/types_details_accident', ['as' => 'backoffice_types_details_accident', 'uses' => 'TypesDetailsAccidentController@index']);
Route::post('backoffice/types_details_accident', ['as' => 'backoffice_types_details_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesDetailsAccidentController@store']);
Route::patch('backoffice/types_details_accident', ['as' => 'backoffice_types_details_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesDetailsAccidentController@update']);
Route::delete('backoffice/types_details_accident', ['as' => 'backoffice_types_details_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesDetailsAccidentController@destroy']);
/**
 * ---
 * Types Degats 
 * ---
 */
Route::get('backoffice/types_degats', ['as' => 'backoffice_types_degats', 'uses' => 'TypesDegatsController@index']); 
Route::post('backoffice/types_degats', ['as' => 'backoffice_degat_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesDegatsController@store']);
Route::patch('backoffice/types_degats', ['as' => 'backoffice_degat_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesDegatsController@update']);
Route::delete('backoffice/types_degats', ['as' => 'backoffice_degat_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesDegatsController@destroy']);
/**
 * ---
 * Types Visite Techniques 
 * ---
 */
Route::get('backoffice/types_visite_techniques', ['as' => 'backoffice_types_vt', 'uses' => 'TypesVTController@index']); 
Route::post('backoffice/types_visite_techniques', ['as' => 'backoffice_typevt_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesVTController@store']);
Route::patch('backoffice/types_visite_techniques', ['as' => 'backoffice_typevt_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesVTController@update']);
Route::delete('backoffice/types_visite_techniques', ['as' => 'backoffice_typevt_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesVTController@destroy']);
/**
 * ---
 * Fréquences Visite Technique
 * ---
 */
Route::get('backoffice/frequences_visite_techniques', ['as' => 'backoffice_freq_vt', 'uses' => 'FrequencesVTController@index']); 
Route::post('backoffice/frequences_visite_techniques', ['as' => 'backoffice_freqvt_ajouter','middleware'=>'permission:Créer', 'uses' => 'FrequencesVTController@store']);
Route::patch('backoffice/frequences_visite_techniques', ['as' => 'backoffice_freqvt_modifier','middleware'=>'permission:Modifier', 'uses' => 'FrequencesVTController@update']);
Route::delete('backoffice/frequences_visite_techniques', ['as' => 'backoffice_freqvt_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'FrequencesVTController@destroy']);
/**
 * ---
 * Societes d'assurance
 * ---
 */
Route::get('backoffice/societes_assurance', ['as' => 'backoffice_societes_assurance', 'uses' => 'SocietesAssurancesController@index']); 
Route::get('backoffice/ajout_societe_assurance', ['as' => 'backoffice_societe_ajout', 'uses' => 'AjoutSocieteController@index']);
Route::post('backoffice/societes_assurance', ['as' => 'backoffice_societes_ajouter','middleware'=>'permission:Créer', 'uses' => 'SocietesAssurancesController@store']);
Route::get('backoffice/modifier_societe_assurance/{id}', ['as' => 'backoffice_societe_modifier', 'uses' => 'ModifierSocieteController@index']);
Route::patch('backoffice/societes_assurance', ['as' => 'backoffice_societes_modifier','middleware'=>'permission:Modifier', 'uses' => 'SocietesAssurancesController@update']);
Route::delete('backoffice/societes_assurance', ['as' => 'backoffice_societies_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'SocietesAssurancesController@destroy']);
Route::get('backoffice/visualiser_societe_assurance/{id}', ['as' => 'backoffice_societe_visualiser', 'uses' => 'VisualiserSocieteController@index']);
/**
 * Ajax: Dynamic select (Pays / Villes)
 */
Route::get('villes/get/{id}', 'AjoutSocieteController@getVilles');
/**
 * ---
 * Courtiers d'assurance
 * ---
 */
Route::get('backoffice/courtiers_assurance', ['as' => 'backoffice_courtiers_assurance', 'uses' => 'CourtiersAssurancesController@index']); 
Route::get('backoffice/ajout_courtier_assurance', ['as' => 'backoffice_courtier_ajout', 'uses' => 'AjoutCourtierController@index']);
Route::post('backoffice/courtiers_assurance', ['as' => 'backoffice_courtiers_ajouter','middleware'=>'permission:Créer', 'uses' => 'CourtiersAssurancesController@store']);
Route::get('backoffice/modifier_courtier_assurance/{id}', ['as' => 'backoffice_courtier_modifier', 'uses' => 'ModifierCourtierController@index']);
Route::patch('backoffice/courtiers_assurance', ['as' => 'backoffice_courtiers_modifier','middleware'=>'permission:Modifier', 'uses' => 'CourtiersAssurancesController@update']);
Route::delete('backoffice/courtiers_assurance', ['as' => 'backoffice_courtiers_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CourtiersAssurancesController@destroy']);
Route::get('backoffice/visualiser_courtier_assurance/{id}', ['as' => 'backoffice_courtier_visualiser', 'uses' => 'VisualiserCourtierController@index']);
/**
 * ---
 * Types d'infractions
 * ---
 */
Route::get('backoffice/types_infractions', ['as' => 'backoffice_types_infractions', 'uses' => 'TypesInfractionsController@index']); 
Route::post('backoffice/types_infractions', ['as' => 'backoffice_type_inf_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesInfractionsController@store']);
Route::patch('backoffice/types_infractions', ['as' => 'backoffice_type_inf_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesInfractionsController@update']);
Route::delete('backoffice/types_infractions', ['as' => 'backoffice_type_inf_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesInfractionsController@destroy']);
/**
 * ---
 * Infractions
 * ---
 */
Route::get('backoffice/infractions', ['as' => 'backoffice_infractions', 'uses' => 'InfractionsController@index']); 
Route::post('backoffice/infractions', ['as' => 'backoffice_infraction_ajouter','middleware'=>'permission:Créer', 'uses' => 'InfractionsController@store']);
Route::patch('backoffice/infractions', ['as' => 'backoffice_infraction_modifier','middleware'=>'permission:Modifier', 'uses' => 'InfractionsController@update']);
Route::delete('backoffice/infractions', ['as' => 'backoffice_infraction_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'InfractionsController@destroy']);
/**
 * ---
 * Centres Medicaux 
 * ---
 */
Route::get('backoffice/centres_medicaux', ['as' => 'backoffice_centres_medicaux', 'uses' => 'CentreMedicalController@index']); 
Route::post('backoffice/centres_medicaux', ['as' => 'backoffice_centre_medical_ajouter','middleware'=>'permission:Créer', 'uses' => 'CentreMedicalController@store']);
Route::patch('backoffice/centres_medicaux', ['as' => 'backoffice_centre_medical_modifier','middleware'=>'permission:Modifier', 'uses' => 'CentreMedicalController@update']);
Route::delete('backoffice/centres_medicaux', ['as' => 'backoffice_centre_medical_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CentreMedicalController@destroy']);
/**
 * ---
 * Centres de formation 
 * ---
 */
Route::get('backoffice/centres_formation', ['as' => 'backoffice_centres_formation', 'uses' => 'CentresFormationController@index']); 
Route::post('backoffice/centres_formation', ['as' => 'backoffice_centre_formation_ajouter','middleware'=>'permission:Créer', 'uses' => 'CentresFormationController@store']);
Route::patch('backoffice/centres_formation', ['as' => 'backoffice_centre_formation_modifier','middleware'=>'permission:Modifier', 'uses' => 'CentresFormationController@update']);
Route::delete('backoffice/centres_formation', ['as' => 'backoffice_centre_formation_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CentresFormationController@destroy']);
/**
 * ---
 * Nationalites
 * ---
 */
Route::get('backoffice/nationalites', ['as' => 'backoffice_nationalites', 'uses' => 'NationaliteController@index']); 
Route::post('backoffice/nationalites', ['as' => 'backoffice_nationalite_ajouter','middleware'=>'permission:Créer', 'uses' => 'NationaliteController@store']);
Route::patch('backoffice/nationalites', ['as' => 'backoffice_nationalite_modifier','middleware'=>'permission:Modifier', 'uses' => 'NationaliteController@update']);
Route::delete('backoffice/nationalites', ['as' => 'backoffice_nationalite_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'NationaliteController@destroy']);
/**
 * ---
 * Situations
 * ---
 */
Route::get('backoffice/situations', ['as' => 'backoffice_situations', 'uses' => 'SituationController@index']); 
Route::post('backoffice/situations', ['as' => 'backoffice_situation_ajouter','middleware'=>'permission:Créer', 'uses' => 'SituationController@store']);
Route::patch('backoffice/situations', ['as' => 'backoffice_situation_modifier','middleware'=>'permission:Modifier', 'uses' => 'SituationController@update']);
Route::delete('backoffice/situations', ['as' => 'backoffice_situation_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'SituationController@destroy']);
/**
 * ---
 * Situations Familiales
 * ---
 */
Route::get('backoffice/situations_familiales', ['as' => 'backoffice_situations_familiales', 'uses' => 'SituationsFamilialesController@index']); 
Route::post('backoffice/situations_familiales', ['as' => 'backoffice_situation_ajouter','middleware'=>'permission:Créer', 'uses' => 'SituationsFamilialesController@store']);
Route::patch('backoffice/situations_familiales', ['as' => 'backoffice_situation_modifier','middleware'=>'permission:Modifier', 'uses' => 'SituationsFamilialesController@update']);
Route::delete('backoffice/situations_familiales', ['as' => 'backoffice_situation_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'SituationsFamilialesController@destroy']);
/**
 * ---
 * Equipement de protection individuelle
 * ---
 */
Route::get('backoffice/equipement_protection_individuelle', ['as' => 'backoffice_epi', 'uses' => 'EPIController@index']); 
Route::post('backoffice/equipement_protection_individuelle', ['as' => 'backoffice_epi_ajouter','middleware'=>'permission:Créer', 'uses' => 'EPIController@store']);
Route::patch('backoffice/equipement_protection_individuelle', ['as' => 'backoffice_epi_modifier','middleware'=>'permission:Modifier', 'uses' => 'EPIController@update']);
Route::delete('backoffice/equipement_protection_individuelle', ['as' => 'backoffice_epi_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'EPIController@destroy']);
/**
 * ---
 * Types de promotion
 * ---
 */
Route::get('backoffice/types_promotion', ['as' => 'backoffice_types_promotion', 'uses' => 'TypesPromotionsController@index']); 
Route::post('backoffice/types_promotion', ['as' => 'backoffice_promotion_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesPromotionsController@store']);
Route::patch('backoffice/types_promotion', ['as' => 'backoffice_promotion_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesPromotionsController@update']);
Route::delete('backoffice/types_promotion', ['as' => 'backoffice_promotion_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesPromotionsController@destroy']);
/**
 * ---
 * Types de sanctions
 * ---
 */
Route::get('backoffice/types_sanctions', ['as' => 'backoffice_types_sanctions', 'uses' => 'TypesSanctionsController@index']); 
Route::post('backoffice/types_sanctions', ['as' => 'backoffice_sanction_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesSanctionsController@store']);
Route::patch('backoffice/types_sanctions', ['as' => 'backoffice_sanction_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesSanctionsController@update']);
Route::delete('backoffice/types_sanctions', ['as' => 'backoffice_sanction_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesSanctionsController@destroy']);
/**
 * ---
 * Opération -Journal d'evenements-
 * ---
 */
Route::get('backoffice/opération', ['as' => 'backoffice_operation','middleware'=>'role:Administrateur', 'uses' => 'AccesController@index']);
/**
 * ---
 * Liste des caisses
 * ---
 */
Route::get('backoffice/caisses', ['as' => 'backoffice_caisses', 'uses' => 'ListeCaissesController@index']); 
Route::post('backoffice/caisses', ['as' => 'backoffice_caisse_ajouter','middleware'=>'permission:Créer', 'uses' => 'ListeCaissesController@store']);
Route::patch('backoffice/caisses', ['as' => 'backoffice_caisse_modifier','middleware'=>'permission:Modifier', 'uses' => 'ListeCaissesController@update']);
Route::delete('backoffice/caisses', ['as' => 'backoffice_caisse_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ListeCaissesController@destroy']);
/**
 * ---
 * Catégories motifs encaissement
 * ---
 */
Route::get('backoffice/catégories_motifs_encaissement', ['as' => 'backoffice_categories_motifs_encaissement', 'uses' => 'CategoriesMotifsEncaissementController@index']); 
Route::post('backoffice/catégories_motifs_encaissement', ['as' => 'backoffice_cat_motif_encaissement_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesMotifsEncaissementController@store']);
Route::patch('backoffice/catégories_motifs_encaissement', ['as' => 'backoffice_cat_motif_encaissement_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesMotifsEncaissementController@update']);
Route::delete('backoffice/catégories_motifs_encaissement', ['as' => 'backoffice_cat_motif_encaissement_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesMotifsEncaissementController@destroy']);
/**
 * ---
 * Catégories motifs decaissement
 * ---
 */
Route::get('backoffice/catégories_motifs_decaissement', ['as' => 'backoffice_categories_motifs_decaissement', 'uses' => 'CategoriesMotifsDecaissementController@index']); 
Route::post('backoffice/catégories_motifs_decaissement', ['as' => 'backoffice_cat_motif_decaissement_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesMotifsDecaissementController@store']);
Route::patch('backoffice/catégories_motifs_decaissement', ['as' => 'backoffice_cat_motif_decaissement_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesMotifsDecaissementController@update']);
Route::delete('backoffice/catégories_motifs_decaissement', ['as' => 'backoffice_cat_motif_decaissement_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesMotifsDecaissementController@destroy']);
/**
 * ---
 * Motifs d'encaissement
 * ---
 */
Route::get('backoffice/motifs_encaissement', ['as' => 'backoffice_motifs_encaissement', 'uses' => 'MotifsEncaissementController@index']); 
Route::post('backoffice/motifs_encaissement', ['as' => 'backoffice_motifs_encaissement_ajouter','middleware'=>'permission:Créer', 'uses' => 'MotifsEncaissementController@store']);
Route::patch('backoffice/motifs_encaissement', ['as' => 'backoffice_motifs_encaissement_modifier','middleware'=>'permission:Modifier', 'uses' => 'MotifsEncaissementController@update']);
Route::delete('backoffice/motifs_encaissement', ['as' => 'backoffice_motifs_encaissement_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'MotifsEncaissementController@destroy']);
/**
 * ---
 * Motifs dencaissement
 * ---
 */
Route::get('backoffice/motifs_decaissement', ['as' => 'backoffice_motifs_decaissement', 'uses' => 'MotifsDecaissementController@index']); 
Route::post('backoffice/motifs_decaissement', ['as' => 'backoffice_motifs_decaissement_ajouter','middleware'=>'permission:Créer', 'uses' => 'MotifsDecaissementController@store']);
Route::patch('backoffice/motifs_decaissement', ['as' => 'backoffice_motifs_decaissement_modifier','middleware'=>'permission:Modifier', 'uses' => 'MotifsDecaissementController@update']);
Route::delete('backoffice/motifs_decaissement', ['as' => 'backoffice_motifs_decaissement_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'MotifsDecaissementController@destroy']);
/**
 * ---
 * Type TVA
 * ---
 */
Route::get('backoffice/types_tva', ['as' => 'backoffice_type_tva', 'uses' => 'TypeTvaController@index']); 
Route::post('backoffice/types_tva', ['as' => 'backoffice_type_tva_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypeTvaController@store']);
Route::patch('backoffice/types_tva', ['as' => 'backoffice_type_tva_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypeTvaController@update']);
Route::delete('backoffice/types_tva', ['as' => 'backoffice_type_tva_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypeTvaController@destroy']);
/**
 * ---
 * TVA
 * ---
 */
Route::get('backoffice/tva', ['as' => 'backoffice_tva', 'uses' => 'TvaController@index']); 
Route::post('backoffice/tva', ['as' => 'backoffice_tva_ajouter','middleware'=>'permission:Créer', 'uses' => 'TvaController@store']);
Route::patch('backoffice/tva', ['as' => 'backoffice_tva_modifier','middleware'=>'permission:Modifier', 'uses' => 'TvaController@update']);
Route::delete('backoffice/tva', ['as' => 'backoffice_tva_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TvaController@destroy']);
/**
 * ---
 * Lieux
 * ---
 */
Route::get('backoffice/lieux', ['as' => 'backoffice_lieux', 'uses' => 'LieuxController@index']); 
Route::post('backoffice/lieux', ['as' => 'backoffice_lieu_ajouter','middleware'=>'permission:Créer', 'uses' => 'LieuxController@store']);
Route::patch('backoffice/lieux', ['as' => 'backoffice_lieu_modifier','middleware'=>'permission:Modifier', 'uses' => 'LieuxController@update']);
Route::delete('backoffice/lieux', ['as' => 'backoffice_lieu_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'LieuxController@destroy']);
/**
 * ---
 * Trajet
 * ---
 */
Route::get('backoffice/trajets', ['as' => 'backoffice_trajets', 'uses' => 'TrajetController@index']);
Route::get('backoffice/ajout_trajet', ['as' => 'backoffice_trajet_ajout', 'uses' => 'AjoutTrajetController@index']);
Route::get('backoffice/modifier_trajet/{id}', ['as' => 'backoffice_trajets_modifier', 'uses' => 'ModifierTrajetController@index']);
Route::post('backoffice/trajets', ['as' => 'backoffice_trajet_ajouter','middleware'=>'permission:Créer', 'uses' => 'TrajetController@store']);
Route::patch('backoffice/trajets', ['as' => 'backoffice_trajet_modifier','middleware'=>'permission:Modifier', 'uses' => 'TrajetController@update']);
Route::delete('backoffice/trajets', ['as' => 'backoffice_trajet_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TrajetController@destroy']);
Route::get('backoffice/visualiser_trajet/{id}', ['as' => 'backoffice_trajet_visualiser', 'uses' => 'VisualiserTrajetController@index']);
/**
 * ---
 * Categorie des Trajets
 * ---
 */
Route::get('backoffice/categorie_trajets', ['as' => 'backoffice_categorie_trajet', 'uses' => 'CategorieTrajetController@index']); 
Route::post('backoffice/categorie_trajets', ['as' => 'backoffice_categorie_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategorieTrajetController@store']);
Route::patch('backoffice/categorie_trajets', ['as' => 'backoffice_categorie_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategorieTrajetController@update']);
Route::delete('backoffice/categorie_trajets', ['as' => 'backoffice_categorie_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategorieTrajetController@destroy']);
/**
 * ---
 * Details des Trajets
 * ---
 */
Route::get('backoffice/details_trajets', ['as' => 'backoffice_detail_trajet', 'uses' => 'DetailsTrajetController@index']); 
Route::get('backoffice/ajout_detail_trajets', ['as' => 'backoffice_detail_ajout', 'uses' => 'AjoutDetailsTrajetController@index']);
Route::get('backoffice/modifier_detail_trajets/{id}', ['as' => 'backoffice_detail_modif', 'uses' => 'ModifierDetailsTrajetController@index']);
Route::post('backoffice/details_trajets', ['as' => 'backoffice_detail_ajouter','middleware'=>'permission:Créer', 'uses' => 'DetailsTrajetController@store']);
Route::patch('backoffice/details_trajets', ['as' => 'backoffice_detail_modifier','middleware'=>'permission:Modifier', 'uses' => 'DetailsTrajetController@update']);
Route::delete('backoffice/details_trajets', ['as' => 'backoffice_detail_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DetailsTrajetController@destroy']);
Route::get('backoffice/visualiser_detail_trajets/{id}', ['as' => 'backoffice_detail_visualiser', 'uses' => 'VisualiserDetailsTrajetController@index']);
/**
 * ---
 * Types Marchandises
 * ---
 */
Route::get('backoffice/types_marchandises', ['as' => 'backoffice_type_marchandise', 'uses' => 'TypesMarchandisesController@index']); 
Route::post('backoffice/types_marchandises', ['as' => 'backoffice_type_mar_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesMarchandisesController@store']);
Route::patch('backoffice/types_marchandises', ['as' => 'backoffice_type_mar_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesMarchandisesController@update']);
Route::delete('backoffice/types_marchandises', ['as' => 'backoffice_type_mar_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesMarchandisesController@destroy']);
/**
 * ---
 * Unités
 * ---
 */
Route::get('backoffice/unites', ['as' => 'backoffice_unites', 'uses' => 'UnitesController@index']); 
Route::post('backoffice/unites', ['as' => 'backoffice_unite_ajouter','middleware'=>'permission:Créer', 'uses' => 'UnitesController@store']);
Route::patch('backoffice/unites', ['as' => 'backoffice_unite_modifier','middleware'=>'permission:Modifier', 'uses' => 'UnitesController@update']);
Route::delete('backoffice/unites', ['as' => 'backoffice_unite_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'UnitesController@destroy']);
/**
 * ---
 * Marchandises
 * ---
 */
Route::get('backoffice/marchandises', ['as' => 'backoffice_marchandises', 'uses' => 'MarchandisesController@index']); 
Route::post('backoffice/marchandises', ['as' => 'backoffice_marchandise_ajouter','middleware'=>'permission:Créer', 'uses' => 'MarchandisesController@store']);
Route::patch('backoffice/marchandises', ['as' => 'backoffice_marchandise_modifier','middleware'=>'permission:Modifier', 'uses' => 'MarchandisesController@update']);
Route::delete('backoffice/marchandises', ['as' => 'backoffice_marchandise_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'MarchandisesController@destroy']);
/**
 * ---
 * Directions
 * ---
 */
Route::get('backoffice/directions', ['as' => 'backoffice_directions', 'uses' => 'DirectionController@index']); 
Route::post('backoffice/directions', ['as' => 'backoffice_direction_ajouter','middleware'=>'permission:Créer', 'uses' => 'DirectionController@store']);
Route::patch('backoffice/directions', ['as' => 'backoffice_direction_modifier','middleware'=>'permission:Modifier', 'uses' => 'DirectionController@update']);
Route::delete('backoffice/directions', ['as' => 'backoffice_direction_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DirectionController@destroy']);
/**
 * ---
 * Departement
 * ---
 */
Route::get('backoffice/departements', ['as' => 'backoffice_departements', 'uses' => 'DepartementController@index']); 
Route::post('backoffice/departements', ['as' => 'backoffice_departement_ajouter','middleware'=>'permission:Créer', 'uses' => 'DepartementController@store']);
Route::patch('backoffice/departements', ['as' => 'backoffice_departement_modifier','middleware'=>'permission:Modifier', 'uses' => 'DepartementController@update']);
Route::delete('backoffice/departements', ['as' => 'backoffice_departement_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DepartementController@destroy']);
/**
 * ---
 * Services
 * ---
 */
Route::get('backoffice/services', ['as' => 'backoffice_services', 'uses' => 'ServiceController@index']); 
Route::post('backoffice/services', ['as' => 'backoffice_service_ajouter','middleware'=>'permission:Créer', 'uses' => 'ServiceController@store']);
Route::patch('backoffice/services', ['as' => 'backoffice_service_modifier','middleware'=>'permission:Modifier', 'uses' => 'ServiceController@update']);
Route::delete('backoffice/services', ['as' => 'backoffice_service_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ServiceController@destroy']);
/**
 * ---
 * Gravites
 * ---
 */
Route::get('backoffice/gravites_des_demandes_dintervention', ['as' => 'backoffice_gravites', 'uses' => 'GraviteController@index']); 
Route::post('backoffice/gravites_des_demandes_dintervention', ['as' => 'backoffice_gravite_ajouter','middleware'=>'permission:Créer', 'uses' => 'GraviteController@store']);
Route::patch('backoffice/gravites_des_demandes_dintervention', ['as' => 'backoffice_gravite_modifier','middleware'=>'permission:Modifier', 'uses' => 'GraviteController@update']);
Route::delete('backoffice/gravites_des_demandes_dintervention', ['as' => 'backoffice_gravite_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'GraviteController@destroy']);
/**
 * ---
 * Urgences
 * ---
 */
Route::get('backoffice/urgences_des_demandes_dintervention', ['as' => 'backoffice_urgences', 'uses' => 'UrgenceController@index']); 
Route::post('backoffice/urgences_des_demandes_dintervention', ['as' => 'backoffice_urgence_ajouter','middleware'=>'permission:Créer', 'uses' => 'UrgenceController@store']);
Route::patch('backoffice/urgences_des_demandes_dintervention', ['as' => 'backoffice_urgence_modifier','middleware'=>'permission:Modifier', 'uses' => 'UrgenceController@update']);
Route::delete('backoffice/urgences_des_demandes_dintervention', ['as' => 'backoffice_urgence_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'UrgenceController@destroy']);
/**
 * ---
 * Catégories des demandes d'intervention
 * ---
 */
Route::get('backoffice/categories_des_demandes_dintervention', ['as' => 'backoffice_categories_interventions', 'uses' => 'CategoriesDInterventionController@index']); 
Route::post('backoffice/categories_des_demandes_dintervention', ['as' => 'backoffice_categorie_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesDInterventionController@store']);
Route::patch('backoffice/categories_des_demandes_dintervention', ['as' => 'backoffice_categorie_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesDInterventionController@update']);
Route::delete('backoffice/categories_des_demandes_dintervention', ['as' => 'backoffice_categorie_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesDInterventionController@destroy']);
/**
 * ---
 * Garages
 * ---
 */
Route::get('backoffice/garages', ['as' => 'backoffice_garages', 'uses' => 'GarageController@index']); 
Route::post('backoffice/garages', ['as' => 'backoffice_garage_ajouter','middleware'=>'permission:Créer', 'uses' => 'GarageController@store']);
Route::patch('backoffice/garages', ['as' => 'backoffice_garage_modifier','middleware'=>'permission:Modifier', 'uses' => 'GarageController@update']);
Route::delete('backoffice/garages', ['as' => 'backoffice_garage_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'GarageController@destroy']);
/**
 * ---
 * Centres de visite technique
 * ---
 */
Route::get('backoffice/centres_visite_technique', ['as' => 'backoffice_fournisseurs', 'uses' => 'FournisseurController@index']); 
Route::get('backoffice/ajout_centre_VT', ['as' => 'backoffice_fournisseur_ajout', 'uses' => 'AjoutFournisseurController@index']);
Route::get('backoffice/modifier_centre_VT/{id}', ['as' => 'backoffice_fournisseur_modif', 'uses' => 'ModifierFournisseurController@index']);
Route::post('backoffice/centres_visite_technique', ['as' => 'backoffice_fournisseur_ajouter','middleware'=>'permission:Créer', 'uses' => 'FournisseurController@store']);
Route::patch('backoffice/centres_visite_technique', ['as' => 'backoffice_fournisseur_modifier','middleware'=>'permission:Modifier', 'uses' => 'FournisseurController@update']);
Route::delete('backoffice/centres_visite_technique', ['as' => 'backoffice_fournisseur_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'FournisseurController@destroy']);
Route::get('backoffice/visualiser_centre_VT/{id}', ['as' => 'backoffice_fournisseur_visualiser', 'uses' => 'VisualiserFournisseurController@index']);
/**
* ---
* Familles d'intervention
* ---
*/
Route::get('backoffice/familles_intervention', ['as' => 'backoffice_familles_intervention', 'uses' => 'FamillesInterController@index']); 
Route::post('backoffice/familles_intervention', ['as' => 'backoffice_famille_intervention_ajouter','middleware'=>'permission:Créer', 'uses' => 'FamillesInterController@store']);
Route::patch('backoffice/familles_intervention', ['as' => 'backoffice_famille_intervention_modifier','middleware'=>'permission:Modifier', 'uses' => 'FamillesInterController@update']);
Route::delete('backoffice/familles_intervention', ['as' => 'backoffice_famille_intervention_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'FamillesInterController@destroy']);
/**
* ---
* Categories famille d'intervention
* ---
*/
Route::get('backoffice/categories_famille_intervention', ['as' => 'backoffice_categories_famille', 'uses' => 'CategoriesFamilleController@index']); 
Route::post('backoffice/categories_famille_intervention', ['as' => 'backoffice_categories_fam_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesFamilleController@store']);
Route::patch('backoffice/categories_famille_intervention', ['as' => 'backoffice_categories_fam_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesFamilleController@update']);
Route::delete('backoffice/categories_famille_intervention', ['as' => 'backoffice_categories_fam_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesFamilleController@destroy']);
/**
* ---
* Sous categories famille d'intervention
* ---
*/
Route::get('backoffice/sous_categories_famille_intervention', ['as' => 'backoffice_sous_categories_famille', 'uses' => 'SousCategorieFamilleInterventionController@index']); 
Route::post('backoffice/sous_categories_famille_intervention', ['as' => 'backoffice_sous_categories_fam_ajouter','middleware'=>'permission:Créer', 'uses' => 'SousCategorieFamilleInterventionController@store']);
Route::patch('backoffice/sous_categories_famille_intervention', ['as' => 'backoffice_sous_categories_fam_modifier','middleware'=>'permission:Modifier', 'uses' => 'SousCategorieFamilleInterventionController@update']);
Route::delete('backoffice/sous_categories_famille_intervention', ['as' => 'backoffice_sous_categories_fam_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'SousCategorieFamilleInterventionController@destroy']);
/**
* ---
* Categorie prise en charge
* ---
*/
Route::get('backoffice/categorie_prise_en_charge', ['as' => 'backoffice_categorie_priseencharge', 'uses' => 'CategoriesPriseEnChargeController@index']); 
Route::post('backoffice/categorie_prise_en_charge', ['as' => 'backoffice_categorie_priseencharge_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesPriseEnChargeController@store']);
Route::patch('backoffice/categorie_prise_en_charge', ['as' => 'backoffice_categorie_priseencharge_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesPriseEnChargeController@update']);
Route::delete('backoffice/categorie_prise_en_charge', ['as' => 'backoffice_categorie_priseencharge_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesPriseEnChargeController@destroy']);
/**
* ---
* Intervenants
* ---
*/
Route::get('backoffice/intervenants', ['as' => 'backoffice_intervenants', 'uses' => 'IntervenantController@index']); 
Route::post('backoffice/intervenants', ['as' => 'backoffice_intervenant_ajouter','middleware'=>'permission:Créer', 'uses' => 'IntervenantController@store']);
Route::patch('backoffice/intervenants', ['as' => 'backoffice_intervenant_modifier','middleware'=>'permission:Modifier', 'uses' => 'IntervenantController@update']);
Route::delete('backoffice/intervenants', ['as' => 'backoffice_intervenant_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'IntervenantController@destroy']);
/**
* ---
* Categories Intervenants
* ---
*/
Route::get('backoffice/categories_intervenants', ['as' => 'backoffice_categories_intervenants', 'uses' => 'CategorieIntervenantController@index']); 
Route::post('backoffice/categories_intervenants', ['as' => 'backoffice_categorie_intervenant_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategorieIntervenantController@store']);
Route::patch('backoffice/categories_intervenants', ['as' => 'backoffice_categorie_intervenant_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategorieIntervenantController@update']);
Route::delete('backoffice/categories_intervenants', ['as' => 'backoffice_categorie_intervenant_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategorieIntervenantController@destroy']);
/**
* ---
* Stations
* ---
*/
Route::get('backoffice/stations', ['as' => 'backoffice_stations', 'uses' => 'StationController@index']); 
Route::get('backoffice/ajout_station', ['as' => 'backoffice_station_ajout', 'uses' => 'AjoutStationController@index']);
Route::get('backoffice/modifier_station/{id}', ['as' => 'backoffice_station_modif', 'uses' => 'ModifierStationController@index']);
Route::post('backoffice/stations', ['as' => 'backoffice_station_ajouter','middleware'=>'permission:Créer', 'uses' => 'StationController@store']);
Route::patch('backoffice/stations', ['as' => 'backoffice_station_modifier','middleware'=>'permission:Modifier', 'uses' => 'StationController@update']);
Route::delete('backoffice/stations', ['as' => 'backoffice_station_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'StationController@destroy']);
Route::get('backoffice/visualiser_station/{id}', ['as' => 'backoffice_station_visualiser', 'uses' => 'VisualiserStationController@index']);
/**
* ---
* Fournisseurs de carburant
* ---
*/
Route::get('backoffice/fournisseurs_carburant', ['as' => 'backoffice_fournisseurs_carburant', 'uses' => 'FournisseurCarburantController@index']); 
Route::get('backoffice/ajout_fournisseur_carburant', ['as' => 'backoffice_fournisseur_carb_ajout', 'uses' => 'AjoutFournisseurCarburantController@index']);
Route::get('backoffice/modifier_fournisseur_carburant/{id}', ['as' => 'backoffice_fournisseur_carb_modif', 'uses' => 'ModifierFournisseurCarburantController@index']);
Route::post('backoffice/fournisseurs_carburant', ['as' => 'backoffice_fournisseur_carb_ajouter','middleware'=>'permission:Créer', 'uses' => 'FournisseurCarburantController@store']);
Route::patch('backoffice/fournisseurs_carburant', ['as' => 'backoffice_fournisseur_carb_modifier','middleware'=>'permission:Modifier', 'uses' => 'FournisseurCarburantController@update']);
Route::delete('backoffice/fournisseurs_carburant', ['as' => 'backoffice_fournisseur_carb_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'FournisseurCarburantController@destroy']);
Route::get('backoffice/visualiser_fournisseur_carburant/{id}', ['as' => 'backoffice_fournisseur_carb_visualiser', 'uses' => 'VisualiserFournisseurCarburantController@index']);
/**
* ---
* Types de paiement
* ---
*/
Route::get('backoffice/types_paiement', ['as' => 'backoffice_types_paiement', 'uses' => 'TypesPaiementController@index']); 
Route::post('backoffice/types_paiement', ['as' => 'backoffice_type_paiement_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesPaiementController@store']);
Route::patch('backoffice/types_paiement', ['as' => 'backoffice_type_paiement_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesPaiementController@update']);
Route::delete('backoffice/types_paiement', ['as' => 'backoffice_type_paiement_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesPaiementController@destroy']);
/**
* ---
* Types de produit citerne
* ---
*/
Route::get('backoffice/types_produit_citerne', ['as' => 'backoffice_types_produit_citerne', 'uses' => 'TypesProduitCiterneController@index']); 
Route::post('backoffice/types_produit_citerne', ['as' => 'backoffice_type_produit_citerne_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesProduitCiterneController@store']);
Route::patch('backoffice/types_produit_citerne', ['as' => 'backoffice_type_produit_citerne_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesProduitCiterneController@update']);
Route::delete('backoffice/types_produit_citerne', ['as' => 'backoffice_type_produit_citerne_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesProduitCiterneController@destroy']);
/**
* ---
* Service-station
* ---
*/
Route::get('backoffice/service_station', ['as' => 'backoffice_service_station', 'uses' => 'ServiceStationController@index']); 
Route::post('backoffice/service_station', ['as' => 'backoffice_service_station_ajouter','middleware'=>'permission:Créer', 'uses' => 'ServiceStationController@store']);
Route::patch('backoffice/service_station', ['as' => 'backoffice_service_station_modifier','middleware'=>'permission:Modifier', 'uses' => 'ServiceStationController@update']);
Route::delete('backoffice/service_station', ['as' => 'backoffice_service_station_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ServiceStationController@destroy']);
/**
* ---
* Tarifs gasoil
* ---
*/
Route::get('backoffice/tarifs_gasoil', ['as' => 'backoffice_tarifs_gasoil', 'uses' => 'TarifsGasoilController@index']); 
Route::get('backoffice/ajout_tarifs_gasoil', ['as' => 'backoffice_tarifs_gasoil_ajout', 'uses' => 'AjoutTarifsGasoilController@index']);
Route::get('backoffice/modifier_tarifs_gasoil/{id}', ['as' => 'backoffice_tarifs_gasoil_modif', 'uses' => 'ModifierTarifsGasoilController@index']);
Route::post('backoffice/tarifs_gasoil', ['as' => 'backoffice_tarifs_gasoil_ajouter','middleware'=>'permission:Créer', 'uses' => 'TarifsGasoilController@store']);
Route::patch('backoffice/tarifs_gasoil', ['as' => 'backoffice_tarifs_gasoil_modifier','middleware'=>'permission:Modifier', 'uses' => 'TarifsGasoilController@update']);
Route::delete('backoffice/tarifs_gasoil', ['as' => 'backoffice_tarifs_gasoil_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TarifsGasoilController@destroy']);
Route::get('backoffice/visualiser_tarifs_gasoil/{id}', ['as' => 'backoffice_tarifs_gasoil_visualiser', 'uses' => 'VisualiserTarifsGasoilController@index']);
/**
* ---
* Categorie véhicule
* ---
*/
Route::get('backoffice/categories_vehicules', ['as' => 'backoffice_categories_vehicules', 'uses' => 'CategoriesVehiculeController@index']); 
Route::post('backoffice/categories_vehicules', ['as' => 'backoffice_categorie_vehicule_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesVehiculeController@store']);
Route::patch('backoffice/categories_vehicules', ['as' => 'backoffice_categorie_vehicule_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesVehiculeController@update']);
Route::delete('backoffice/categories_vehicules', ['as' => 'backoffice_categorie_vehicule_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesVehiculeController@destroy']);
/**
* ---
* Fournisseurs de cartes
* ---
*/
Route::get('backoffice/fournisseur_cartes', ['as' => 'backoffice_fournisseur_cartes', 'uses' => 'FournisseurCartesController@index']); 
Route::get('backoffice/ajout_fournisseur_carte', ['as' => 'backoffice_fournisseur_carte_ajout', 'uses' => 'AjoutFournisseurCartesController@index']);
Route::get('backoffice/modifier_fournisseur_carte/{id}', ['as' => 'backoffice_fournisseur_carte_modif', 'uses' => 'ModifierFournisseurCartesController@index']);
Route::post('backoffice/fournisseur_cartes', ['as' => 'backoffice_fournisseur_carte_ajouter','middleware'=>'permission:Créer', 'uses' => 'FournisseurCartesController@store']);
Route::patch('backoffice/fournisseur_cartes', ['as' => 'backoffice_fournisseur_carte_modifier','middleware'=>'permission:Modifier', 'uses' => 'FournisseurCartesController@update']);
Route::delete('backoffice/fournisseur_cartes', ['as' => 'backoffice_fournisseur_carte_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'FournisseurCartesController@destroy']);
Route::get('backoffice/visualiser_fournisseur_carte/{id}', ['as' => 'backoffice_fournisseur_carte_visualiser', 'uses' => 'VisualiserFournisseurCartesController@index']);
/**
* ---
* Categories dépenses véhicules
* ---
*/
Route::get('backoffice/categories_depenses_vehicules', ['as' => 'backoffice_categories_depenses_vehicules', 'uses' => 'CategoriesDepensesVehiculeController@index']); 
Route::post('backoffice/categories_depenses_vehicules', ['as' => 'backoffice_categorie_depense_vehicule_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesDepensesVehiculeController@store']);
Route::patch('backoffice/categories_depenses_vehicules', ['as' => 'backoffice_categorie_depense_vehicule_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesDepensesVehiculeController@update']);
Route::delete('backoffice/categories_depenses_vehicules', ['as' => 'backoffice_categorie_depense_vehicule_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesDepensesVehiculeController@destroy']);
/**
* ---
* Péages autoroute
* ---
*/
Route::get('backoffice/peages_autoroute', ['as' => 'backoffice_peages_autoroute', 'uses' => 'PeagesAutorouteController@index']); 
Route::post('backoffice/peages_autoroute', ['as' => 'backoffice_peage_autoroute_ajouter','middleware'=>'permission:Créer', 'uses' => 'PeagesAutorouteController@store']);
Route::patch('backoffice/peages_autoroute', ['as' => 'backoffice_peage_autoroute_modifier','middleware'=>'permission:Modifier', 'uses' => 'PeagesAutorouteController@update']);
Route::delete('backoffice/peages_autoroute', ['as' => 'backoffice_peage_autoroute_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'PeagesAutorouteController@destroy']);
/**
* ---
* Tarifs autoroute
* ---
*/
Route::get('backoffice/tarifs', ['as' => 'backoffice_tarifs', 'uses' => 'TarifsAutorouteController@index']); 
Route::get('backoffice/ajout_tarifs', ['as' => 'backoffice_tarifs_ajout', 'uses' => 'AjoutTarifsAutorouteController@index']);
Route::get('backoffice/modifier_tarifs/{id}', ['as' => 'backoffice_tarifs_modif', 'uses' => 'ModifierTarifsAutorouteController@index']);
Route::post('backoffice/tarifs', ['as' => 'backoffice_tarifs_ajouter','middleware'=>'permission:Créer', 'uses' => 'TarifsAutorouteController@store']);
Route::patch('backoffice/tarifs', ['as' => 'backoffice_tarifs_modifier','middleware'=>'permission:Modifier', 'uses' => 'TarifsAutorouteController@update']);
Route::delete('backoffice/tarifs', ['as' => 'backoffice_tarifs_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TarifsAutorouteController@destroy']);
Route::get('backoffice/visualiser_tarifs/{id}', ['as' => 'backoffice_tarifs_visualiser', 'uses' => 'VisualiserTarifsAutorouteController@index']);
/**
* ---
* Type d'equipement de vehicule
* ---
*/
Route::get('backoffice/types_equipement_vehicule', ['as' => 'backoffice_types_equipement_vehicule', 'uses' => 'TypeEquipementVehiculeController@index']); 
Route::post('backoffice/types_equipement_vehicule', ['as' => 'backoffice_type_equipement_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypeEquipementVehiculeController@store']);
Route::patch('backoffice/types_equipement_vehicule', ['as' => 'backoffice_type_equipement_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypeEquipementVehiculeController@update']);
Route::delete('backoffice/types_equipement_vehicule', ['as' => 'backoffice_type_equipement_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypeEquipementVehiculeController@destroy']);
/**
* ---
* Equipement de vehicule
* ---
*/
Route::get('backoffice/equipement_vehicule', ['as' => 'backoffice_equipement_vehicule', 'uses' => 'EquipementVehiculeController@index']); 
Route::post('backoffice/equipement_vehicule', ['as' => 'backoffice_equipement_ajouter','middleware'=>'permission:Créer', 'uses' => 'EquipementVehiculeController@store']);
Route::patch('backoffice/equipement_vehicule', ['as' => 'backoffice_equipement_modifier','middleware'=>'permission:Modifier', 'uses' => 'EquipementVehiculeController@update']);
Route::delete('backoffice/equipement_vehicule', ['as' => 'backoffice_equipement_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'EquipementVehiculeController@destroy']);
/**
* ---
* Reformes
* ---
*/
Route::get('backoffice/reformes', ['as' => 'backoffice_reformes', 'uses' => 'ReformeController@index']); 
Route::post('backoffice/reformes', ['as' => 'backoffice_reforme_ajouter','middleware'=>'permission:Créer', 'uses' => 'ReformeController@store']);
Route::patch('backoffice/reformes', ['as' => 'backoffice_reforme_modifier','middleware'=>'permission:Modifier', 'uses' => 'ReformeController@update']);
Route::delete('backoffice/reformes', ['as' => 'backoffice_reforme_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ReformeController@destroy']);
/**
* ---
* Fournisseurs de véhicules
* ---
*/
Route::get('backoffice/fournisseur_vehicules', ['as' => 'backoffice_fournisseur_vehicules', 'uses' => 'FournisseurVehiculeController@index']); 
Route::get('backoffice/ajout_fournisseur_vehicule', ['as' => 'backoffice_fournisseur_vehicule_ajout', 'uses' => 'AjoutFournisseurVehiculeController@index']);
Route::get('backoffice/modifier_fournisseur_vehicule/{id}', ['as' => 'backoffice_fournisseur_vehicule_modif', 'uses' => 'ModifierFournisseurVehiculeController@index']);
Route::post('backoffice/fournisseur_vehicules', ['as' => 'backoffice_fournisseur_vehicule_ajouter','middleware'=>'permission:Créer', 'uses' => 'FournisseurVehiculeController@store']);
Route::patch('backoffice/fournisseur_vehicules', ['as' => 'backoffice_fournisseur_vehicule_modifier','middleware'=>'permission:Modifier', 'uses' => 'FournisseurVehiculeController@update']);
Route::delete('backoffice/fournisseur_vehicules', ['as' => 'backoffice_fournisseur_vehicule_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'FournisseurVehiculeController@destroy']);
Route::get('backoffice/visualiser_fournisseur_vehicule/{id}', ['as' => 'backoffice_fournisseur_vehicule_visualiser', 'uses' => 'VisualiserFournisseurVehiculeController@index']);
/**
* ---
* Type d'acquisition
* ---
*/
Route::get('backoffice/types_acquisition', ['as' => 'backoffice_types_acquisition', 'uses' => 'TypesAcquisitionController@index']); 
Route::post('backoffice/types_acquisition', ['as' => 'backoffice_type_acquisition_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesAcquisitionController@store']);
Route::patch('backoffice/types_acquisition', ['as' => 'backoffice_type_acquisition_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesAcquisitionController@update']);
Route::delete('backoffice/types_acquisition', ['as' => 'backoffice_type_acquisition_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesAcquisitionController@destroy']);
/**
* ---
* Parcs
* ---
*/
Route::get('backoffice/parcs', ['as' => 'backoffice_parcs', 'uses' => 'ParcController@index']); 
Route::post('backoffice/parcs', ['as' => 'backoffice_parcs_ajouter','middleware'=>'permission:Créer', 'uses' => 'ParcController@store']);
Route::patch('backoffice/parcs', ['as' => 'backoffice_parcs_modifier','middleware'=>'permission:Modifier', 'uses' => 'ParcController@update']);
Route::delete('backoffice/parcs', ['as' => 'backoffice_parcs_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ParcController@destroy']);
/**
* ---
* Marques
* ---
*/
Route::get('backoffice/marques', ['as' => 'backoffice_marques', 'uses' => 'MarqueController@index']); 
Route::post('backoffice/marques', ['as' => 'backoffice_marque_ajouter','middleware'=>'permission:Créer', 'uses' => 'MarqueController@store']);
Route::patch('backoffice/marques', ['as' => 'backoffice_marque_modifier','middleware'=>'permission:Modifier', 'uses' => 'MarqueController@update']);
Route::delete('backoffice/marques', ['as' => 'backoffice_marque_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'MarqueController@destroy']);
/**
* ---
* Confort
* ---
*/
Route::get('backoffice/conforts', ['as' => 'backoffice_conforts', 'uses' => 'ConfortController@index']); 
Route::post('backoffice/conforts', ['as' => 'backoffice_confort_ajouter','middleware'=>'permission:Créer', 'uses' => 'ConfortController@store']);
Route::patch('backoffice/conforts', ['as' => 'backoffice_confort_modifier','middleware'=>'permission:Modifier', 'uses' => 'ConfortController@update']);
Route::delete('backoffice/conforts', ['as' => 'backoffice_confort_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ConfortController@destroy']);
/**
* ---
* Energie
* ---
*/
Route::get('backoffice/energies', ['as' => 'backoffice_energies', 'uses' => 'EnergieController@index']); 
Route::post('backoffice/energies', ['as' => 'backoffice_energie_ajouter','middleware'=>'permission:Créer', 'uses' => 'EnergieController@store']);
Route::patch('backoffice/energies', ['as' => 'backoffice_energie_modifier','middleware'=>'permission:Modifier', 'uses' => 'EnergieController@update']);
Route::delete('backoffice/energies', ['as' => 'backoffice_energie_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'EnergieController@destroy']);
/**
* ---
* Gamme
* ---
*/
Route::get('backoffice/gammes', ['as' => 'backoffice_gammes', 'uses' => 'GammeController@index']); 
Route::post('backoffice/gammes', ['as' => 'backoffice_gamme_ajouter','middleware'=>'permission:Créer', 'uses' => 'GammeController@store']);
Route::patch('backoffice/gammes', ['as' => 'backoffice_gamme_modifier','middleware'=>'permission:Modifier', 'uses' => 'GammeController@update']);
Route::delete('backoffice/gammes', ['as' => 'backoffice_gamme_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'GammeController@destroy']);
/**
* ---
* Modèles
* ---
*/
Route::get('backoffice/modeles', ['as' => 'backoffice_modeles', 'uses' => 'ModeleController@index']); 
Route::get('backoffice/ajout_modele', ['as' => 'backoffice_modele_ajout', 'uses' => 'AjoutModeleController@index']);
Route::get('backoffice/modifier_modele/{id}', ['as' => 'backoffice_modele_modif', 'uses' => 'ModifierModeleController@index']);
Route::post('backoffice/modeles', ['as' => 'backoffice_modele_ajouter','middleware'=>'permission:Créer', 'uses' => 'ModeleController@store']);
Route::patch('backoffice/modifier_modele/{id}', ['as' => 'backoffice_modele_modifier','middleware'=>'permission:Modifier', 'uses' => 'ModeleController@update']);
Route::delete('backoffice/modeles', ['as' => 'backoffice_modele_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ModeleController@destroy']);
Route::get('backoffice/visualiser_modele/{id}', ['as' => 'backoffice_modele_visualiser', 'uses' => 'VisualiserModeleController@index']);
/**
* ---
* Echeances
* ---
*/
Route::get('backoffice/echeances', ['as' => 'backoffice_echeances', 'uses' => 'EcheanceController@index']); 
Route::post('backoffice/echeances', ['as' => 'backoffice_echeance_ajouter','middleware'=>'permission:Créer', 'uses' => 'EcheanceController@store']);
Route::patch('backoffice/echeances', ['as' => 'backoffice_echeance_modifier','middleware'=>'permission:Modifier', 'uses' => 'EcheanceController@update']);
Route::delete('backoffice/echeances', ['as' => 'backoffice_echeance_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'EcheanceController@destroy']);
/**
* ---
* Client
* ---
*/
Route::get('backoffice/clients', ['as' => 'backoffice_clients', 'uses' => 'ClientController@index']); 
Route::get('backoffice/ajout_client', ['as' => 'backoffice_client_ajout', 'uses' => 'AjoutClientController@index']);
Route::get('backoffice/modifier_client/{id}', ['as' => 'backoffice_client_modif', 'uses' => 'ModifierClientController@index']);
Route::post('backoffice/clients', ['as' => 'backoffice_client_ajouter','middleware'=>'permission:Créer', 'uses' => 'ClientController@store']);
Route::patch('backoffice/clients', ['as' => 'backoffice_client_modifier','middleware'=>'permission:Modifier', 'uses' => 'ClientController@update']);
Route::delete('backoffice/clients', ['as' => 'backoffice_client_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ClientController@destroy']);
Route::get('backoffice/visualiser_client/{id}', ['as' => 'backoffice_client_visualiser', 'uses' => 'VisualiserClientController@index']);
/**
* ---
* Contact Client
* ---
*/
Route::get('backoffice/contact/{id}', ['as' => 'backoffice_contact', 'uses' => 'ContactController@index']);
Route::post('backoffice/contact', ['as' => 'backoffice_contact_ajouter','middleware'=>'permission:Créer', 'uses' => 'ContactController@store']);
Route::patch('backoffice/contact', ['as' => 'backoffice_contact_modifier','middleware'=>'permission:Modifier', 'uses' => 'ContactController@update']);
Route::delete('backoffice/contact', ['as' => 'backoffice_contact_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ContactController@destroy']);
/**
* ---
* Appel Client
* ---
*/
Route::get('backoffice/appel/{id}', ['as' => 'backoffice_appel', 'uses' => 'AppelController@index']);
Route::post('backoffice/appel', ['as' => 'backoffice_appel_client_ajouter','middleware'=>'permission:Créer', 'uses' => 'AppelController@store']);
Route::patch('backoffice/appel', ['as' => 'backoffice_appel_client_modifier','middleware'=>'permission:Modifier', 'uses' => 'AppelController@update']);
Route::delete('backoffice/appel', ['as' => 'backoffice_appel_client_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'AppelController@destroy']);
/**
* ---
* RendezVous Client
* ---
*/
Route::get('backoffice/rendez_vous/{id}', ['as' => 'backoffice_rendez_vous', 'uses' => 'RendezVousController@index']);
Route::post('backoffice/rendez_vous', ['as' => 'backoffice_rendez_vous_ajouter','middleware'=>'permission:Créer', 'uses' => 'RendezVousController@store']);
Route::patch('backoffice/rendez_vous', ['as' => 'backoffice_rendez_vous_modifier','middleware'=>'permission:Modifier', 'uses' => 'RendezVousController@update']);
Route::delete('backoffice/rendez_vous', ['as' => 'backoffice_rendez_vous_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'RendezVousController@destroy']);
/**
 * ---
 * Calendar
 * ---
 */
Route::get('backoffice/calendrier', ['as' => 'backoffice_calendar', 'uses' => 'EventController@index']);
Route::get('backoffice/liste_evenements', ['as' => 'backoffice_event_list', 'uses' => 'EventListController@index']);
Route::post('backoffice/calendrier', ['as' => 'backoffice_event_ajout', 'uses' => 'EventController@store']);
Route::patch('backoffice/calendrier', ['as' => 'backoffice_event_modifier', 'uses' => 'EventController@update']);
Route::delete('backoffice/calendrier', ['as' => 'backoffice_event_supprimer', 'uses' => 'EventController@destroy']);
/**
* ---
* Liste des fournisseurs
* ---
*/
Route::get('backoffice/liste_fournisseurs', ['as' => 'backoffice_liste_fournisseurs', 'uses' => 'ListeFournisseursController@index']);
Route::get('backoffice/liste_fournisseurs_ajouter', ['as' => 'backoffice_liste_fournisseurs_ajout', 'uses' => 'AjoutListeFournisseursController@index']);
Route::get('backoffice/liste_fournisseurs_modifier/{id}', ['as' => 'backoffice_liste_fournisseurs_modif', 'uses' => 'ModifierListeFournisseursController@index']);
Route::post('backoffice/liste_fournisseurs', ['as' => 'backoffice_liste_fournisseurs_ajouter','middleware'=>'permission:Créer', 'uses' => 'ListeFournisseursController@store']);
Route::patch('backoffice/liste_fournisseurs', ['as' => 'backoffice_liste_fournisseurs_modifier','middleware'=>'permission:Modifier', 'uses' => 'ListeFournisseursController@update']);
Route::delete('backoffice/liste_fournisseurs', ['as' => 'backoffice_liste_fournisseurs_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ListeFournisseursController@destroy']);
Route::get('backoffice/liste_fournisseurs_visualiser/{id}', ['as' => 'backoffice_liste_fournisseurs_visualiser', 'uses' => 'VisualiserListeFournisseursController@index']);
/**
* ---
* Contact Fournisseur
* ---
*/
Route::get('backoffice/contact_fournisseur/{id}', ['as' => 'backoffice_contact_fournisseur', 'uses' => 'ContactFournisseursController@index']);
Route::post('backoffice/contact_fournisseur', ['as' => 'backoffice_contact_ajouter_fournisseur','middleware'=>'permission:Créer', 'uses' => 'ContactFournisseursController@store']);
Route::patch('backoffice/contact_fournisseur', ['as' => 'backoffice_contact_modifier_fournisseur','middleware'=>'permission:Modifier', 'uses' => 'ContactFournisseursController@update']);
Route::delete('backoffice/contact_fournisseur', ['as' => 'backoffice_contact_supprimer_fournisseur','middleware'=>'permission:Supprimer', 'uses' => 'ContactFournisseursController@destroy']);
/**
* ---
* Appel Fournisseur
* ---
*/
Route::get('backoffice/appel_fournisseur/{id}', ['as' => 'backoffice_appel_fournisseur', 'uses' => 'AppelFournisseursController@index']);
Route::post('backoffice/appel_fournisseur', ['as' => 'backoffice_appel_ajouter_fournisseur','middleware'=>'permission:Créer', 'uses' => 'AppelFournisseursController@store']);
Route::patch('backoffice/appel_fournisseur', ['as' => 'backoffice_appel_modifier_fournisseur','middleware'=>'permission:Modifier', 'uses' => 'AppelFournisseursController@update']);
Route::delete('backoffice/appel_fournisseur', ['as' => 'backoffice_appel_supprimer_fournisseur','middleware'=>'permission:Supprimer', 'uses' => 'AppelFournisseursController@destroy']);
/**
* ---
* RendezVous Fournisseur
* ---
*/
Route::get('backoffice/rendez_vous_fournisseur/{id}', ['as' => 'backoffice_rendez_vous_fournisseur', 'uses' => 'RendezVousFournisseursController@index']);
Route::post('backoffice/rendez_vous_fournisseur', ['as' => 'backoffice_rendez_vous_ajouter_fournisseur','middleware'=>'permission:Créer', 'uses' => 'RendezVousFournisseursController@store']);
Route::patch('backoffice/rendez_vous_fournisseur', ['as' => 'backoffice_rendez_vous_modifier_fournisseur','middleware'=>'permission:Modifier', 'uses' => 'RendezVousFournisseursController@update']);
Route::delete('backoffice/rendez_vous_fournisseur', ['as' => 'backoffice_rendez_vous_supprimer_fournisseur','middleware'=>'permission:Supprimer', 'uses' => 'RendezVousFournisseursController@destroy']);
/**
* ---
* Transitaire
* ---
*/
Route::get('backoffice/transitaires', ['as' => 'backoffice_transitaires', 'uses' => 'TransitaireController@index']); 
Route::get('backoffice/ajout_transitaire', ['as' => 'backoffice_transitaire_ajout', 'uses' => 'AjoutTransitaireController@index']);
Route::get('backoffice/modifier_transitaire/{id}', ['as' => 'backoffice_transitaire_modif', 'uses' => 'ModifierTransitaireController@index']);
Route::post('backoffice/transitaires', ['as' => 'backoffice_transitaire_ajouter','middleware'=>'permission:Créer', 'uses' => 'TransitaireController@store']);
Route::patch('backoffice/transitaires', ['as' => 'backoffice_transitaire_modifier','middleware'=>'permission:Modifier', 'uses' => 'TransitaireController@update']);
Route::delete('backoffice/transitaires', ['as' => 'backoffice_transitaire_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TransitaireController@destroy']);
Route::get('backoffice/visualiser_transitaire/{id}', ['as' => 'backoffice_transitaire_visualiser', 'uses' => 'VisualiserTransitaireController@index']);
/**
* ---
* Monnaie & Devise
* ---
*/
Route::get('backoffice/monnaie_devise', ['as' => 'backoffice_monnaie_devise', 'uses' => 'MonnaieDeviseController@index']); 
Route::post('backoffice/monnaie_devise', ['as' => 'backoffice_monnaie_devise_ajouter','middleware'=>'permission:Créer', 'uses' => 'MonnaieDeviseController@store']);
Route::patch('backoffice/monnaie_devise', ['as' => 'backoffice_monnaie_devise_modifier','middleware'=>'permission:Modifier', 'uses' => 'MonnaieDeviseController@update']);
Route::delete('backoffice/monnaie_devise', ['as' => 'backoffice_monnaie_devise_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'MonnaieDeviseController@destroy']);
/**
* ---
* Tracteurs / Gallerie / Liste des photos / Documents Tracteur
* ---
*/
Route::get('backoffice/tracteurs', ['as' => 'backoffice_tracteurs', 'uses' => 'TracteurController@index']); 
Route::get('backoffice/ajout_tracteur', ['as' => 'backoffice_tracteur_ajout', 'uses' => 'AjoutTracteurController@index']);
Route::get('backoffice/modifier_tracteur/{id}', ['as' => 'backoffice_tracteur_modif', 'uses' => 'ModifierTracteurController@index']);
Route::post('backoffice/tracteurs', ['as' => 'backoffice_tracteur_ajouter','middleware'=>'permission:Créer', 'uses' => 'TracteurController@store']);
Route::patch('backoffice/tracteurs', ['as' => 'backoffice_tracteur_modifier','middleware'=>'permission:Modifier', 'uses' => 'TracteurController@update']);
Route::delete('backoffice/tracteurs', ['as' => 'backoffice_tracteur_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TracteurController@destroy']);
Route::get('backoffice/visualiser_tracteur/{id}', ['as' => 'backoffice_tracteur_visualiser', 'uses' => 'VisualiserTracteurController@index']);
Route::get('backoffice/gallerie_tracteur/{id}', ['as' => 'backoffice_tracteur_gallerie', 'uses' => 'GallerieTracteurController@index']);
Route::post('backoffice/gallerie_tracteur/{id}', ['as' => 'backoffice_tracteur_gallerie_ajouter','middleware'=>'permission:Créer', 'uses' => 'GallerieTracteurController@store']);
Route::get('backoffice/liste_photos_tracteur/{id}', ['as' => 'backoffice_photo_tracteur_list', 'uses' => 'ListePhotosTracteurController@index']);
Route::patch('backoffice/liste_photos_tracteur', ['as' => 'backoffice_photo_tracteur_modifier','middleware'=>'permission:Modifier', 'uses' => 'GallerieTracteurController@update']);
Route::delete('backoffice/liste_photos_tracteur', ['as' => 'backoffice_photo_tracteur_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'GallerieTracteurController@destroy']);
Route::get('backoffice/documents_tracteur/{id}', ['as' => 'backoffice_documents_tracteur', 'uses' => 'DocumentsTracteurController@index']);
Route::post('backoffice/documents_tracteur/{id}', ['as' => 'backoffice_documents_tracteur_ajouter', 'uses' => 'DocumentsTracteurController@store']);
Route::patch('backoffice/documents_tracteur', ['as' => 'backoffice_documents_tracteur_modifier','middleware'=>'permission:Modifier', 'uses' => 'DocumentsTracteurController@update']);
Route::delete('backoffice/documents_tracteur', ['as' => 'backoffice_documents_tracteur_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DocumentsTracteurController@destroy']);
Route::get('backoffice/imprimer_informations/{id}', ['as' => 'backoffice_imprime_info', 'uses' => 'TracteurController@ToPDF']); 
/**
* ---
* Prestataire
* ---
*/
Route::get('backoffice/prestataires', ['as' => 'backoffice_prestataires', 'uses' => 'PrestataireController@index']); 
Route::get('backoffice/ajout_prestataire', ['as' => 'backoffice_prestataire_ajout', 'uses' => 'AjoutPrestataireController@index']);
Route::get('backoffice/modifier_prestataire/{id}', ['as' => 'backoffice_prestataire_modif', 'uses' => 'ModifierPrestataireController@index']);
Route::post('backoffice/prestataires', ['as' => 'backoffice_prestataire_ajouter','middleware'=>'permission:Créer', 'uses' => 'PrestataireController@store']);
Route::patch('backoffice/prestataires', ['as' => 'backoffice_prestataire_modifier','middleware'=>'permission:Modifier', 'uses' => 'PrestataireController@update']);
Route::delete('backoffice/prestataires', ['as' => 'backoffice_prestataire_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'PrestataireController@destroy']);
Route::get('backoffice/visualiser_prestataire/{id}', ['as' => 'backoffice_prestataire_visualiser', 'uses' => 'VisualiserPrestataireController@index']);
/**
* ---
* Exportateur & Importateur
* ---
*/
Route::get('backoffice/exportateurs_importateurs', ['as' => 'backoffice_exportateurs_importateurs', 'uses' => 'ExportateurImportateurController@index']); 
Route::get('backoffice/ajout_exportateur_importateur', ['as' => 'backoffice_exportateur_importateur_ajout', 'uses' => 'AjoutExportateurImportateurController@index']);
Route::get('backoffice/modifier_exportateur_importateur/{id}', ['as' => 'backoffice_exportateur_importateur_modif', 'uses' => 'ModifierExportateurImportateurController@index']);
Route::post('backoffice/exportateurs_importateurs', ['as' => 'backoffice_exportateur_importateur_ajouter','middleware'=>'permission:Créer', 'uses' => 'ExportateurImportateurController@store']);
Route::patch('backoffice/exportateurs_importateurs', ['as' => 'backoffice_exportateur_importateur_modifier','middleware'=>'permission:Modifier', 'uses' => 'ExportateurImportateurController@update']);
Route::delete('backoffice/exportateurs_importateurs', ['as' => 'backoffice_exportateur_importateur_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ExportateurImportateurController@destroy']);
Route::get('backoffice/visualiser_exportateur_importateur/{id}', ['as' => 'backoffice_exportateur_importateur_visualiser', 'uses' => 'VisualiserExportateurImportateurController@index']);
/**
* ---
* Types Semi-remorques
* ---
*/
Route::get('backoffice/types_semi_remorques', ['as' => 'backoffice_types_semi_remorques', 'uses' => 'TypesSemiRemorqueController@index']); 
Route::post('backoffice/types_semi_remorques', ['as' => 'backoffice_type_semi_remorque_ajouter','middleware'=>'permission:Créer', 'uses' => 'TypesSemiRemorqueController@store']);
Route::patch('backoffice/types_semi_remorques', ['as' => 'backoffice_type_semi_remorque_modifier','middleware'=>'permission:Modifier', 'uses' => 'TypesSemiRemorqueController@update']);
Route::delete('backoffice/types_semi_remorques', ['as' => 'backoffice_type_semi_remorque_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'TypesSemiRemorqueController@destroy']);
/**
* ---
* Semi-remorques / Gallerie / Liste des photos / Documents semi-remorques
* ---
*/
Route::get('backoffice/semi_remorques', ['as' => 'backoffice_semi_remorques', 'uses' => 'SemiRemorqueController@index']); 
Route::get('backoffice/ajout_semi_remorque', ['as' => 'backoffice_semi_remorque_ajout', 'uses' => 'AjoutSemiRemorqueController@index']);
Route::get('backoffice/modifier_semi_remorque/{id}', ['as' => 'backoffice_semi_remorque_modif', 'uses' => 'ModifierSemiRemorqueController@index']);
Route::post('backoffice/semi_remorques', ['as' => 'backoffice_semi_remorque_ajouter','middleware'=>'permission:Créer', 'uses' => 'SemiRemorqueController@store']);
Route::patch('backoffice/semi_remorques', ['as' => 'backoffice_semi_remorque_modifier','middleware'=>'permission:Modifier', 'uses' => 'SemiRemorqueController@update']);
Route::delete('backoffice/semi_remorques', ['as' => 'backoffice_semi_remorque_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'SemiRemorqueController@destroy']);
Route::get('backoffice/visualiser_semi_remorque/{id}', ['as' => 'backoffice_semi_remorque_visualiser', 'uses' => 'VisualiserSemiRemorqueController@index']);
Route::get('backoffice/gallerie_semi_remorque/{id}', ['as' => 'backoffice_semi_remorque_gallerie', 'uses' => 'GallerieSemiRemorqueController@index']);
Route::post('backoffice/gallerie_semi_remorque/{id}', ['as' => 'backoffice_semi_remorque_gallerie_ajouter','middleware'=>'permission:Créer', 'uses' => 'GallerieSemiRemorqueController@store']);
Route::get('backoffice/liste_photos_semi_remorque/{id}', ['as' => 'backoffice_photo_semi_remorque_list', 'uses' => 'ListePhotosSemiRemorqueController@index']);
Route::patch('backoffice/liste_photos_semi_remorque', ['as' => 'backoffice_photo_semi_remorque_modifier','middleware'=>'permission:Modifier', 'uses' => 'GallerieSemiRemorqueController@update']);
Route::delete('backoffice/liste_photos_semi_remorque', ['as' => 'backoffice_photo_semi_remorque_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'GallerieSemiRemorqueController@destroy']);
Route::get('backoffice/documents_semi_remorque/{id}', ['as' => 'backoffice_documents_semi_remorque', 'uses' => 'DocumentsSemiRemorqueController@index']);
Route::post('backoffice/documents_semi_remorque/{id}', ['as' => 'backoffice_documents_semi_remorque_ajouter', 'uses' => 'DocumentsSemiRemorqueController@store']);
Route::patch('backoffice/documents_semi_remorque', ['as' => 'backoffice_documents_semi_remorque_modifier','middleware'=>'permission:Modifier', 'uses' => 'DocumentsSemiRemorqueController@update']);
Route::delete('backoffice/documents_semi_remorque', ['as' => 'backoffice_documents_semi_remorque_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DocumentsSemiRemorqueController@destroy']);
Route::get('backoffice/imprimer_informations_semi_remorque/{id}', ['as' => 'backoffice_imprime_info_semi_remorque', 'uses' => 'SemiRemorqueController@ToPDF']); 
/**
* ---
* Voitures de service / Gallerie / Liste des photos / Documents voitures de service
* ---
*/
Route::get('backoffice/voitures_service', ['as' => 'backoffice_voitures_service', 'uses' => 'VoitureServiceController@index']); 
Route::get('backoffice/ajout_voiture_service', ['as' => 'backoffice_voiture_service_ajout', 'uses' => 'AjoutVoitureServiceController@index']);
Route::get('backoffice/modifier_voiture_service/{id}', ['as' => 'backoffice_voiture_service_modif', 'uses' => 'ModifierVoitureServiceController@index']);
Route::post('backoffice/voitures_service', ['as' => 'backoffice_voiture_service_ajouter','middleware'=>'permission:Créer', 'uses' => 'VoitureServiceController@store']);
Route::patch('backoffice/voitures_service', ['as' => 'backoffice_voiture_service_modifier','middleware'=>'permission:Modifier', 'uses' => 'VoitureServiceController@update']);
Route::delete('backoffice/voitures_service', ['as' => 'backoffice_voiture_service_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'VoitureServiceController@destroy']);
Route::get('backoffice/visualiser_voiture_service/{id}', ['as' => 'backoffice_voiture_service_visualiser', 'uses' => 'VisualiserVoitureServiceController@index']);
Route::get('backoffice/gallerie_voiture_service/{id}', ['as' => 'backoffice_voiture_service_gallerie', 'uses' => 'GallerieVoitureServiceController@index']);
Route::post('backoffice/gallerie_voiture_service/{id}', ['as' => 'backoffice_voiture_service_gallerie_ajouter','middleware'=>'permission:Créer', 'uses' => 'GallerieVoitureServiceController@store']);
Route::get('backoffice/liste_photos_voiture_service/{id}', ['as' => 'backoffice_photo_voiture_service_list', 'uses' => 'ListePhotosVoitureServiceController@index']);
Route::patch('backoffice/liste_photos_voiture_service', ['as' => 'backoffice_photo_voiture_service_modifier','middleware'=>'permission:Modifier', 'uses' => 'GallerieVoitureServiceController@update']);
Route::delete('backoffice/liste_photos_voiture_service', ['as' => 'backoffice_photo_voiture_service_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'GallerieVoitureServiceController@destroy']);
Route::get('backoffice/documents_voiture_service/{id}', ['as' => 'backoffice_documents_voiture_service', 'uses' => 'DocumentsVoitureServiceController@index']);
Route::post('backoffice/documents_voiture_service/{id}', ['as' => 'backoffice_documents_voiture_service_ajouter', 'uses' => 'DocumentsVoitureServiceController@store']);
Route::patch('backoffice/documents_voiture_service', ['as' => 'backoffice_documents_voiture_service_modifier','middleware'=>'permission:Modifier', 'uses' => 'DocumentsVoitureServiceController@update']);
Route::delete('backoffice/documents_voiture_service', ['as' => 'backoffice_documents_voiture_service_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DocumentsVoitureServiceController@destroy']);
Route::get('backoffice/imprimer_informations_voiture_service/{id}', ['as' => 'backoffice_imprime_info_voiture_service', 'uses' => 'VoitureServiceController@ToPDF']); 
/**
* ---
* Contrats leasing 
* ---
*/
Route::get('backoffice/contrats_leasing', ['as' => 'backoffice_contrats_leasing', 'uses' => 'ContratsLeasingController@index']); 
Route::get('backoffice/ajout_contrat_leasing', ['as' => 'backoffice_contrat_leasing_ajout', 'uses' => 'AjoutContratsLeasingController@index']);
Route::get('backoffice/modifier_contrat_leasing/{id}', ['as' => 'backoffice_contrat_leasing_modif', 'uses' => 'ModifierContratsLeasingController@index']);
Route::post('backoffice/contrats_leasing', ['as' => 'backoffice_contrat_leasing_ajouter','middleware'=>'permission:Créer', 'uses' => 'ContratsLeasingController@store']);
Route::patch('backoffice/contrats_leasing', ['as' => 'backoffice_contrat_leasing_modifier','middleware'=>'permission:Modifier', 'uses' => 'ContratsLeasingController@update']);
Route::delete('backoffice/contrats_leasing', ['as' => 'backoffice_contrat_leasing_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ContratsLeasingController@destroy']);
Route::get('backoffice/visualiser_contrat_leasing/{id}', ['as' => 'backoffice_contrat_leasing_visualiser', 'uses' => 'VisualiserContratsLeasingController@index']);
/**
* ---
* Contrats achat 
* ---
*/
Route::get('backoffice/contrats_achat', ['as' => 'backoffice_contrats_achat', 'uses' => 'ContratAchatController@index']); 
Route::get('backoffice/ajout_contrat_achat', ['as' => 'backoffice_contrat_achat_ajout', 'uses' => 'AjoutContratAchatController@index']);
Route::get('backoffice/modifier_contrat_achat/{id}', ['as' => 'backoffice_contrat_achat_modif', 'uses' => 'ModifierContratAchatController@index']);
Route::post('backoffice/contrats_achat', ['as' => 'backoffice_contrat_achat_ajouter','middleware'=>'permission:Créer', 'uses' => 'ContratAchatController@store']);
Route::patch('backoffice/contrats_achat', ['as' => 'backoffice_contrat_achat_modifier','middleware'=>'permission:Modifier', 'uses' => 'ContratAchatController@update']);
Route::delete('backoffice/contrats_achat', ['as' => 'backoffice_contrat_achat_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ContratAchatController@destroy']);
Route::get('backoffice/visualiser_contrat_achat/{id}', ['as' => 'backoffice_contrat_achat_visualiser', 'uses' => 'VisualiserContratAchatController@index']);
/**
* ---
* Contrats location 
* ---
*/
Route::get('backoffice/contrats_location', ['as' => 'backoffice_contrats_location', 'uses' => 'ContratLocationController@index']); 
Route::get('backoffice/ajout_contrat_location', ['as' => 'backoffice_contrat_location_ajout', 'uses' => 'AjoutContratLocationController@index']);
Route::get('backoffice/modifier_contrat_location/{id}', ['as' => 'backoffice_contrat_location_modif', 'uses' => 'ModifierContratLocationController@index']);
Route::post('backoffice/contrats_location', ['as' => 'backoffice_contrat_location_ajouter','middleware'=>'permission:Créer', 'uses' => 'ContratLocationController@store']);
Route::patch('backoffice/contrats_location', ['as' => 'backoffice_contrat_location_modifier','middleware'=>'permission:Modifier', 'uses' => 'ContratLocationController@update']);
Route::delete('backoffice/contrats_location', ['as' => 'backoffice_contrat_location_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'ContratLocationController@destroy']);
Route::get('backoffice/visualiser_contrat_location/{id}', ['as' => 'backoffice_contrat_location_visualiser', 'uses' => 'VisualiserContratLocationController@index']);
/**
* ---
* Vehicules Reformés 
* ---
*/
Route::get('backoffice/vehicules_reformes', ['as' => 'backoffice_vehicules_reformes', 'uses' => 'VehiculeReformeController@index']); 
Route::post('backoffice/vehicules_reformes', ['as' => 'backoffice_vehicules_reformes_ajouter','middleware'=>'permission:Créer', 'uses' => 'VehiculeReformeController@store']);
Route::patch('backoffice/vehicules_reformes', ['as' => 'backoffice_vehicules_reformes_modifier','middleware'=>'permission:Modifier', 'uses' => 'VehiculeReformeController@update']);
Route::delete('backoffice/vehicules_reformes', ['as' => 'backoffice_vehicules_reformes_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'VehiculeReformeController@destroy']);
/**
* ---
* Piece jointes 
* ---
*/
Route::get('backoffice/pieces_jointes', ['as' => 'backoffice_pieces_jointes', 'uses' => 'PiecesJointesController@index']); 
Route::post('backoffice/pieces_jointes', ['as' => 'backoffice_pieces_jointes_ajouter','middleware'=>'permission:Créer', 'uses' => 'PiecesJointesController@store']);
Route::patch('backoffice/pieces_jointes', ['as' => 'backoffice_pieces_jointes_modifier','middleware'=>'permission:Modifier', 'uses' => 'PiecesJointesController@update']);
Route::delete('backoffice/pieces_jointes', ['as' => 'backoffice_pieces_jointes_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'PiecesJointesController@destroy']);
/**
* ---
* Equipements vehicules
* ---
*/
Route::get('backoffice/equipements_vehicules', ['as' => 'backoffice_equipements_vehicules', 'uses' => 'EquipementsDesVehiculesController@index']);
Route::get('backoffice/equipements_vehicules_ajouter', ['as' => 'backoffice_equipements_vehicules_ajout', 'uses' => 'AjoutEquipementsDesVehiculesController@index']);
Route::get('backoffice/equipements_vehicules_modifier/{id}', ['as' => 'backoffice_equipements_vehicules_modif', 'uses' => 'ModifierEquipementsDesVehiculesController@index']);
Route::post('backoffice/equipements_vehicules', ['as' => 'backoffice_equipements_vehicules_ajouter','middleware'=>'permission:Créer', 'uses' => 'EquipementsDesVehiculesController@store']);
Route::patch('backoffice/equipements_vehicules', ['as' => 'backoffice_equipements_vehicules_modifier','middleware'=>'permission:Modifier', 'uses' => 'EquipementsDesVehiculesController@update']);
Route::delete('backoffice/equipements_vehicules', ['as' => 'backoffice_equipements_vehicules_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'EquipementsDesVehiculesController@destroy']);
Route::get('backoffice/equipements_vehicules_visualiser/{id}', ['as' => 'backoffice_equipements_vehicules_visualiser', 'uses' => 'VisualiserEquipementsDesVehiculesController@index']);
/**
 * Ajax: Dynamic select (Type d'equipement / equipement)
 */
Route::get('equipements/get/{id}', 'AjoutEquipementsDesVehiculesController@getEquipements');
/**
* ---
* Personnels
* ---
*/
Route::get('backoffice/personnels', ['as' => 'backoffice_personnels', 'uses' => 'PersonnelsController@index']);
Route::get('backoffice/personnels_ajouter', ['as' => 'backoffice_personnels_ajout', 'uses' => 'AjoutPersonnelsController@index']);
Route::get('backoffice/personnels_modifier/{id}', ['as' => 'backoffice_personnels_modif', 'uses' => 'ModifierPersonnelsController@index']);
Route::post('backoffice/personnels', ['as' => 'backoffice_personnels_ajouter','middleware'=>'permission:Créer', 'uses' => 'PersonnelsController@store']);
Route::patch('backoffice/personnels', ['as' => 'backoffice_personnels_modifier','middleware'=>'permission:Modifier', 'uses' => 'PersonnelsController@update']);
Route::delete('backoffice/personnels', ['as' => 'backoffice_personnels_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'PersonnelsController@destroy']);
Route::get('backoffice/personnels_visualiser/{id}', ['as' => 'backoffice_personnels_visualiser', 'uses' => 'VisualiserPersonnelsController@index']);
Route::get('backoffice/imprimer_informations_personnels/{id}', ['as' => 'backoffice_imprime_info_personnels', 'uses' => 'PersonnelsController@ToPDF']); 
Route::get('backoffice/documents_personnels/{id}', ['as' => 'backoffice_documents_personnels', 'uses' => 'DocumentsPersonnelsController@index']);
Route::post('backoffice/documents_personnels/{id}', ['as' => 'backoffice_documents_personnels_ajouter', 'uses' => 'DocumentsPersonnelsController@store']);
Route::patch('backoffice/documents_personnels', ['as' => 'backoffice_documents_personnels_modifier','middleware'=>'permission:Modifier', 'uses' => 'DocumentsPersonnelsController@update']);
Route::delete('backoffice/documents_personnels', ['as' => 'backoffice_documents_personnels_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DocumentsPersonnelsController@destroy']);
/**
* ---
* Sinistres
* ---
*/
Route::get('backoffice/sinistres', ['as' => 'backoffice_sinistres', 'uses' => 'SinistresController@index']);
Route::get('backoffice/ajout_sinistre', ['as' => 'backoffice_sinistres_ajout', 'uses' => 'AjoutSinistresController@index']);
Route::get('backoffice/modifier_sinistre/{id}', ['as' => 'backoffice_sinistres_modif', 'uses' => 'ModifierSinistresController@index']);
Route::post('backoffice/sinistres', ['as' => 'backoffice_sinistres_ajouter','middleware'=>'permission:Créer', 'uses' => 'SinistresController@store']);
Route::patch('backoffice/sinistres', ['as' => 'backoffice_sinistres_modifier','middleware'=>'permission:Modifier', 'uses' => 'SinistresController@update']);
Route::delete('backoffice/sinistres', ['as' => 'backoffice_sinistres_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'SinistresController@destroy']);
Route::get('backoffice/visualiser_sinistre/{id}', ['as' => 'backoffice_sinistres_visualiser', 'uses' => 'VisualiserSinistresController@index']);
/**
* ---
* Autorisations d'absences
* ---
*/
Route::get('backoffice/autorisations_absences', ['as' => 'backoffice_autorisations_absences', 'uses' => 'AutorisationsAbsencesController@index']);
Route::post('backoffice/autorisations_absences', ['as' => 'backoffice_autorisations_absences_ajouter','middleware'=>'permission:Créer', 'uses' => 'AutorisationsAbsencesController@store']);
Route::patch('backoffice/autorisations_absences', ['as' => 'backoffice_autorisations_absences_modifier','middleware'=>'permission:Modifier', 'uses' => 'AutorisationsAbsencesController@update']);
Route::delete('backoffice/autorisations_absences', ['as' => 'backoffice_autorisations_absences_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'AutorisationsAbsencesController@destroy']);
/**
* ---
* Demandes d'nterventions
* ---
*/
Route::get('backoffice/demandes_interventions', ['as' => 'backoffice_demandes_interventions', 'uses' => 'DemandesInterventionsController@index']);
Route::get('backoffice/ajout_demande_intervention', ['as' => 'backoffice_demandes_interventions_ajout', 'uses' => 'AjoutDemandesInterventionsController@index']);
Route::get('backoffice/modifier_demande_intervention/{id}', ['as' => 'backoffice_demandes_interventions_modif', 'uses' => 'ModifierDemandesInterventionsController@index']);
Route::post('backoffice/demandes_interventions', ['as' => 'backoffice_demandes_interventions_ajouter','middleware'=>'permission:Créer', 'uses' => 'DemandesInterventionsController@store']);
Route::patch('backoffice/demandes_interventions', ['as' => 'backoffice_demandes_interventions_modifier','middleware'=>'permission:Modifier', 'uses' => 'DemandesInterventionsController@update']);
Route::delete('backoffice/demandes_interventions', ['as' => 'backoffice_demandes_interventions_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DemandesInterventionsController@destroy']);
Route::get('backoffice/visualiser_demande_intervention/{id}', ['as' => 'backoffice_demandes_interventions_visualiser', 'uses' => 'VisualiserDemandesInterventionsController@index']);
Route::get('backoffice/imprimer_informations_demande_intervention/{id}', ['as' => 'backoffice_imprime_info_demandes_interventions', 'uses' => 'DemandesInterventionsController@ToPDF']); 
/**
* ---
* Familles de pièces
* ---
*/
Route::get('backoffice/familles', ['as' => 'backoffice_familles', 'uses' => 'FamillesPiecesController@index']);
Route::post('backoffice/familles', ['as' => 'backoffice_familles_ajouter','middleware'=>'permission:Créer', 'uses' => 'FamillesPiecesController@store']);
Route::patch('backoffice/familles', ['as' => 'backoffice_familles_modifier','middleware'=>'permission:Modifier', 'uses' => 'FamillesPiecesController@update']);
Route::delete('backoffice/familles', ['as' => 'backoffice_familles_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'FamillesPiecesController@destroy']);
/**
* ---
* Categories de pièces
* ---
*/
Route::get('backoffice/categories_pieces', ['as' => 'backoffice_categories_pieces', 'uses' => 'CategoriesPieceController@index']);
Route::post('backoffice/categories_pieces', ['as' => 'backoffice_categories_pieces_ajouter','middleware'=>'permission:Créer', 'uses' => 'CategoriesPieceController@store']);
Route::patch('backoffice/categories_pieces', ['as' => 'backoffice_categories_pieces_modifier','middleware'=>'permission:Modifier', 'uses' => 'CategoriesPieceController@update']);
Route::delete('backoffice/categories_pieces', ['as' => 'backoffice_categories_pieces_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'CategoriesPieceController@destroy']);
/**
* ---
* Natures de pièces
* ---
*/
Route::get('backoffice/natures_pieces', ['as' => 'backoffice_natures_pieces', 'uses' => 'NaturesPiecesController@index']);
Route::post('backoffice/natures_pieces', ['as' => 'backoffice_natures_pieces_ajouter','middleware'=>'permission:Créer', 'uses' => 'NaturesPiecesController@store']);
Route::patch('backoffice/natures_pieces', ['as' => 'backoffice_natures_pieces_modifier','middleware'=>'permission:Modifier', 'uses' => 'NaturesPiecesController@update']);
Route::delete('backoffice/natures_pieces', ['as' => 'backoffice_natures_pieces_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'NaturesPiecesController@destroy']);
/**
* ---
* Marques de pièces
* ---
*/
Route::get('backoffice/marques_pieces', ['as' => 'backoffice_marques_pieces', 'uses' => 'MarquesPiecesController@index']);
Route::post('backoffice/marques_pieces', ['as' => 'backoffice_marques_pieces_ajouter','middleware'=>'permission:Créer', 'uses' => 'MarquesPiecesController@store']);
Route::patch('backoffice/marques_pieces', ['as' => 'backoffice_marques_pieces_modifier','middleware'=>'permission:Modifier', 'uses' => 'MarquesPiecesController@update']);
Route::delete('backoffice/marques_pieces', ['as' => 'backoffice_marques_pieces_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'MarquesPiecesController@destroy']);
/**
* ---
* Magasins
* ---
*/
Route::get('backoffice/magasins', ['as' => 'backoffice_magasins', 'uses' => 'MagasinsPiecesController@index']);
Route::post('backoffice/magasins', ['as' => 'backoffice_magasins_ajouter','middleware'=>'permission:Créer', 'uses' => 'MagasinsPiecesController@store']);
Route::patch('backoffice/magasins', ['as' => 'backoffice_magasins_modifier','middleware'=>'permission:Modifier', 'uses' => 'MagasinsPiecesController@update']);
Route::delete('backoffice/magasins', ['as' => 'backoffice_magasins_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'MagasinsPiecesController@destroy']);
/**
* ---
* Diagnostic
* ---
*/
Route::get('backoffice/diagnostic', ['as' => 'backoffice_diagnostic', 'uses' => 'DiagnosticController@index']);
Route::get('backoffice/ajout_diagnostic/{id}', ['as' => 'backoffice_diagnostic_ajout', 'uses' => 'AjoutDiagnosticController@index']);
Route::get('backoffice/modifier_diagnostic/{id}', ['as' => 'backoffice_diagnostic_modif', 'uses' => 'ModifierDiagnosticController@index']);
Route::post('backoffice/diagnostic', ['as' => 'backoffice_diagnostic_ajouter','middleware'=>'permission:Créer', 'uses' => 'DiagnosticController@store']);
Route::patch('backoffice/diagnostic', ['as' => 'backoffice_diagnostic_modifier','middleware'=>'permission:Modifier', 'uses' => 'DiagnosticController@update']);
Route::delete('backoffice/diagnostic', ['as' => 'backoffice_diagnostic_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DiagnosticController@destroy']);
Route::get('backoffice/visualiser_diagnostic/{id}', ['as' => 'backoffice_diagnostic_visualiser', 'uses' => 'VisualiserDiagnosticController@index']);
Route::get('backoffice/imprimer_informations_diagnostic/{id}', ['as' => 'backoffice_imprime_info_diagnostic', 'uses' => 'DiagnosticController@ToPDF']); 
Route::get('backoffice/diagnostic_ve/{id}', ['as' => 'backoffice_pdf_diagnostic', 'uses' => 'DiagnosticController@ToPDF']); 
/**
 * Ajax: Dynamic select (Famille/ categorie)
 */
Route::get('categories/get/{id}', 'AjoutDiagnosticController@getCategories');
Route::get('pieces/get/{id}', 'AjoutDiagnosticController@getPieces');

/**
* ---
* Pieces
* ---
*/
Route::get('backoffice/pieces', ['as' => 'backoffice_pieces', 'uses' => 'PiecesController@index']);
Route::post('backoffice/pieces', ['as' => 'backoffice_pieces_ajouter','middleware'=>'permission:Créer', 'uses' => 'PiecesController@store']);
Route::patch('backoffice/pieces', ['as' => 'backoffice_pieces_modifier','middleware'=>'permission:Modifier', 'uses' => 'PiecesController@update']);
Route::delete('backoffice/pieces', ['as' => 'backoffice_pieces_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'PiecesController@destroy']);
Route::get('backoffice/gallerie_pieces/{id}', ['as' => 'backoffice_pieces_gallerie', 'uses' => 'PhotosPieceController@index']);
Route::post('backoffice/gallerie_pieces/{id}', ['as' => 'backoffice_pieces_gallerie_ajouter','middleware'=>'permission:Créer', 'uses' => 'PhotosPieceController@store']);
Route::get('backoffice/liste_photos_pieces/{id}', ['as' => 'backoffice_photo_pieces_list', 'uses' => 'ListePhotosPiecesController@index']);
Route::patch('backoffice/liste_photos_pieces', ['as' => 'backoffice_photo_pieces_modifier','middleware'=>'permission:Modifier', 'uses' => 'PhotosPieceController@update']);
Route::delete('backoffice/liste_photos_pieces', ['as' => 'backoffice_photo_pieces_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'PhotosPieceController@destroy']);
Route::get('backoffice/documents_pieces/{id}', ['as' => 'backoffice_documents_pieces', 'uses' => 'DocumentsPiecesController@index']);
Route::post('backoffice/documents_pieces/{id}', ['as' => 'backoffice_documents_pieces_ajouter', 'uses' => 'DocumentsPiecesController@store']);
Route::patch('backoffice/documents_pieces', ['as' => 'backoffice_documents_pieces_modifier','middleware'=>'permission:Modifier', 'uses' => 'DocumentsPiecesController@update']);
Route::delete('backoffice/documents_pieces', ['as' => 'backoffice_documents_pieces_supprimer','middleware'=>'permission:Supprimer', 'uses' => 'DocumentsPiecesController@destroy']);
Route::get('backoffice/imprimer_informations_pieces/{id}', ['as' => 'backoffice_imprime_info_pieces', 'uses' => 'PiecesController@ToPDF']); 
Route::get('backoffice/rapport_piece', ['as' => 'backoffice_rapport_piece', 'uses' => 'PiecesController@Rapport']); 







});
/**
 * Auth
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


<?php

use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

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

Route::get('/','HomeController@index')->name('home')->middleware('auth');

// Route::resource('photo_candidat','PhotoCandidatController');
// Route::get('/photo_candidat/par_ecole/{id}','PhotoCandidatController@photo_par_ecole')->name('photo_par_ecole');
// Route::post('/store_photo_candidat','PhotoCandidatController@store_photo_candidat')->name('store_photo_candidat');
// Route::resource('controle','ControleController');
// Route::post('store_liste_controler','ControleController@store_liste_controler')->name('store_liste_controler');
// Route::get('/candidat_trouver','ControleController@candidat_trouver')->name('candidat_trouver');
// Route::get('/candidat_non_trouver','ControleController@candidat_non_trouver')->name('candidat_non_trouver');
// Route::get('/remove_photo_candidat','PhotoCandidatController@remove_photo_candidat')->name('remove_photo_candidat');
// Route::get('/remove_controle','ControleController@remove_controle')->name('remove_controle');


/**
 * Gestion Judiciare Tribunal de Dixinn
 */

Route::resource('dossier','DossierController');
Route::resource('document','DocumentController');

/**
 * Gestion des dossiers par catégorie
 */

Route::resource('dossier_affaire_civil','DossierAffaireCivilController');
Route::resource('dossier_flagrant_delit','DossierFlagrantDelitController');

/**
 * Gestion des actes
 */
Route::resource('certificat_nationalite','CertificatNationaliteController')->middleware('auth');
Route::resource('casier_judiciare','CasierJudiciareController')->middleware('auth');
Route::resource('jugement_suppletif','JugementSuppletifController')->middleware('auth');
Route::get('/all_jugement','JugementSuppletifController@all_jugement')->name('all_jugement')->middleware('auth');
Route::post('/jugement_suppletif/par_mois','JugementSuppletifController@jugement_par_mois')->name('jugement_par_mois')->middleware('auth');
Route::post('/jugement_suppletif/par_jour','JugementSuppletifController@jugement_par_jour')->name('jugement_par_jour')->middleware('auth');
Route::post('/certificat_nationalite/par_mois','CertificatNationaliteController@certificat_par_mois')->name('certificat_par_mois')->middleware('auth');
Route::post('/certificat_nationalite/par_jour','CertificatNationaliteController@certificat_par_jour')->name('certificat_par_jour')->middleware('auth');
Route::resource('orientation_dossier','OrientationDossierController')->middleware('auth');
Route::post('/remove/orientation_dossier/{id}','OrientationDossierController@remove_orientation')->name('remove_orientation')->middleware('auth');
Route::resource('document_affaire_civil','DocumentAffaireCivilController')->middleware('auth');
Route::resource('scelle','ScelleController')->middleware('auth');
Route::resource('rg_appel','RgAppelController')->middleware('auth');
Route::resource('doc_appel','DocAppelController')->middleware('auth');
Route::put('/send_appel/{id}','RgAppelController@send_appel')->name('send_appel')->middleware('auth');
Route::put('/revok_appel/{id}','RgAppelController@revok_appel')->name('revok_appel')->middleware('auth');
Route::resource('rg_plainte','RgPlainteController')->middleware('auth');
Route::resource('accuse', 'AccuseController')->middleware('auth');
Route::resource('doc_plainte','DocPlainteController')->middleware('auth');
Route::post('/casier_judiciaire/par_mois/','CasierJudiciareController@casier_par_mois')->name('casier_par_mois')->middleware('auth');
Route::post('/casier_judiciaire/par_jour/','CasierJudiciareController@casier_par_jour')->name('casier_par_jour')->middleware('auth');

/**
 * Gestion du registre d'arrivée
 */
Route::resource('rg_arrive','RgArriveController');
/**
 * Gestion du registre d'instruction
 */
Route::resource('rg_instruction','RgInstructionController');
Route::resource('inculpe','InculpeController');
Route::resource('fait_inculpe','FaitInculpeController');
Route::resource('acte_inculpe','ActeInculpeController');
Route::resource('doc_instruction','DocRgInstructionController');

/**
 * Gestion des documents d'un certificats
 */
Route::resource('doc_certificat','DocCertificatController');

/**
 * Gestion des comptes utilisateurs
 */

Route::resource('compte_user','CompteUserController')->middleware(['auth','role:Administrateur']);
Route::resource('privilege','PrivilegeController')->middleware(['auth','role:Administrateur']);

/**
 * Gestion des statisque des actes casier
 */
Route::get('default_casier_user_jour','CasierJudiciareController@default_casier_user_jour')->name('default_casier_user_jour')->middleware(['auth','role_or_permission:Administrateur|Statistique Casier']);
Route::post('show_casier_user_jour','CasierJudiciareController@show_casier_user_jour')->name('show_casier_user_jour')->middleware(['auth','role_or_permission:Administrateur|Statistique Casier']);
Route::get('default_casier_user_mois','CasierJudiciareController@default_casier_user_mois')->name('default_casier_user_mois')->middleware(['auth','role_or_permission:Administrateur|Statistique Casier']);
Route::post('show_casier_user_mois','CasierJudiciareController@show_casier_user_mois')->name('show_casier_user_mois')->middleware(['auth','role_or_permission:Administrateur|Statistique Casier']);
Route::get('casier_user_interval','CasierJudiciareController@casier_user_interval')->name('casier_user_interval')->middleware(['auth','role_or_permission:Administrateur|Statistique Casier']);
Route::post('renouvellement_casier','CasierJudiciareController@renouvellement_casier')->name('renouvellement_casier')->middleware('auth');
/**
 * Statisques jugement suppletif
 */

Route::get('default_jugement_user_jour','JugementSuppletifController@default_jugement_user_jour')->name('default_jugement_user_jour')->middleware(['auth','role_or_permission:Administrateur|Statistique Jugement']);
Route::post('show_jugement_user_jour','JugementSuppletifController@show_jugement_user_jour')->name('show_jugement_user_jour')->middleware(['auth','role_or_permission:Administrateur|Statistique Jugement']);
Route::post('show_jugement_user_mois','JugementSuppletifController@show_jugement_user_mois')->name('show_jugement_user_mois')->middleware(['auth','role_or_permission:Administrateur|Statistique Jugement']);


Route::get('/check_num_jugement','JugementSuppletifController@check_num_jugement')->name('check_num_jugement');
/**
 * doublons numéro jugement
 */
Route::get('/jugements-dupliques','JugementSuppletifController@duplique_num')->name('duplique_num_jugement');
Route::get('/jugements-dupliques-anti','JugementSuppletifController@duplique_num_anti')->name('duplique_num_jugement_anti');


/**
 * Statistiques nationalités
 */

Route::get('default_certificat_nationalite_user_jour','CertificatNationaliteController@default_certificat_nationalite_user_jour')->name('default_certificat_nationalite_user_jour')->middleware(['auth','role_or_permission:Administrateur|Statistique Nationalite']);
Route::post('show_certificat_nationalite_user_jour','CertificatNationaliteController@show_certificat_nationalite_user_jour')->name('show_certificat_nationalite_user_jour')->middleware(['auth','role_or_permission:Administrateur|Statistique Nationalite']);
Route::post('show_certificat_nationalite_user_mois','CertificatNationaliteController@show_certificat_nationalite_user_mois')->name('show_certificat_nationalite_user_mois')->middleware(['auth','role_or_permission:Administrateur|Statistique Nationalite']);


/**
 * periode antidate et antidate
 */
Route::resource('periode_antidate','PeriodeAntidateController')->middleware('auth');
Route::resource('periode_normal','PeriodeNormaleController')->middleware('auth');
Route::get('jugement_anti','JugementSuppletifController@jugement_anti')->name('jugement_anti')->middleware('auth');
Route::get('create_jugement_anti','JugementSuppletifController@create_jugement_anti')->name('create_jugement_anti')->middleware('auth');

Auth::routes();

/**
 * Gestion des statistiques
 */

Route::resource('gestion_statistique','GestionStatistiqueController')->middleware('auth');
Route::resource('gestion_signateur','GestionSignateurController')->middleware('auth');

/**
 * Gestion Gest Data
 */

Route::resource('gest_appel','GestAppelController')->middleware('auth');
Route::resource('gest_jugement_suppletif','GestJugementSuppletifController')->middleware('auth');
Route::get('gest_indexation_jugement_suppletif','GestJugementSuppletifController@indexation_jugement')->name('indexation_jugement')->middleware('auth');
Route::resource('gest_nationalite','GestNationaliteController')->middleware('auth');
Route::get('gest_indexation_nationalite','GestNationaliteController@indexation_nationalite')->name('indexation_nationalite')->middleware('auth');
Route::resource('gest_ordonnance','GestOrdonnanceController')->middleware('auth');
Route::resource('gest_plumitif_civil','GestPlumitifCivilController')->middleware('auth');
Route::resource('gest_plumitif_correctionnel','GestPlumitifCorrectionnelController')->middleware('auth');
Route::resource('gest_heredite','GestHerediteController')->middleware('auth');
Route::resource('gest_requette','GestRequetteController')->middleware('auth');

/**
 * Gestion indexation et recherche
 */
Route::resource('appel','AppelController')->middleware('auth');
Route::get('/liste_appel','AppelController@liste_appel')->name('liste_appel')->middleware('auth');
Route::resource('heredite','HerediteController')->middleware('auth');
Route::get('/liste_heredite','HerediteController@liste_heredite')->name('liste_heredite')->middleware('auth');
Route::resource('requette','RequetteController')->middleware('auth');
Route::get('/liste_requette','RequetteController@liste_requette')->name('liste_requette')->middleware('auth');
Route::resource('ordonnance','OrdonnanceController')->middleware('auth');
Route::get('liste_ordonnance','OrdonnanceController@liste_ordonnance')->name('liste_ordonnance')->middleware('auth');
Route::resource('plumitif_civil','PlumitifCivilController')->middleware('auth');
Route::get('/liste_plumitif_civil','PlumitifCivilController@liste_plumitif')->name('liste_plumitif_civil')->middleware('auth');
Route::resource('plumitif_correctionnel','PlumitifCorrectionnelController')->middleware('auth');
Route::get('/liste_plumitif_correctionnel','PlumitifCorrectionnelController@liste_plumitif')->name('liste_plumitif_correctionnel')->middleware('auth');
/**
 * Gestion des années
 */

Route::resource('annee','AnneeController')->middleware(['auth','role:Administrateur']);
Route::get('/annee_active/{id}','AnneeController@annee_active')->name('annee_active')->middleware('auth');

/**
 * Change password
 */

 Route::get('/change_password','ChangePasswordController@create')->name('form_change_password')->middleware('auth');
 Route::post('/change_password','ChangePasswordController@store')->name('update_password')->middleware('auth');

/**
 * Imporation de fichier sql
 */

Route::get('/import_sql','ImportController@index')->name('import_sql');
Route::post('/import_sql','ImportController@store')->name('store_import_sql');

/**
 * Exportation de fichier sql
 */

Route::get('/export_sql','ExportController@index')->name('export_sql');
Route::post('/export_sql','ExportController@store')->name('store_export_sql');

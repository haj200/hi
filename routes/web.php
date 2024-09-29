<?php

use App\Http\Controllers\Admin\EnfantController ;
use App\Http\Controllers\Admin\AuxiliaireController;
use App\Http\Controllers\Admin\ConjointController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EntiteterritorielleController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuxiliaireUserController;
use App\Http\Controllers\ConjointUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnfantUserController;
use App\Http\Controllers\ExportUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/generer-pdf', [PdfController::class, 'generatePDF'])->name('pdf.generate');





Route::group(['prefix' => 'account'], function () {
    // Guest middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('login', [LoginController::class, 'authenticate'])->name('account.authenticate');
        
    }); });
    // Authenticate middleware
    Route::group(['middleware' => 'auth', 'prefix' => 'account'], function () {
    
        // Dashboard Routes
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        
        // Territorial Entity Route
        Route::get('showEntiteTerritorielle', [DashboardController::class, 'showEntiteTerritorielle'])->name('account.showEntiteTerritorielle');
        
        // Auxiliaires CRUD Routes
        Route::group(['prefix' => 'auxiliaires'], function () {
            Route::get('/', [AuxiliaireUserController::class, 'index'])->name('account.auxiliaires.index');
            Route::get('/create', [AuxiliaireUserController::class, 'create'])->name('account.auxiliaires.create');
            Route::post('/', [AuxiliaireUserController::class, 'store'])->name('account.auxiliaires.store');
            Route::get('/{id}', [AuxiliaireUserController::class, 'show'])->name('account.auxiliaires.show');
            Route::get('/{auxiliaire}/edit', [AuxiliaireUserController::class, 'edit'])->name('account.auxiliaires.edit');
            Route::put('/{auxiliaire}', [AuxiliaireUserController::class, 'update'])->name('account.auxiliaires.update');
            Route::delete('/{auxiliaire}', [AuxiliaireUserController::class, 'destroy'])->name('account.auxiliaires.destroy');
       
        });
        
        // Routes for managing conjoints related to the authenticated user


        
    
    });
    Route::group(['middleware' => 'auth','prefix' => 'account'], function () {
        Route::get('enfants', [EnfantUserController::class, 'index'])->name('account.enfants.index');
        Route::get('enfants/create', [EnfantUserController::class, 'create'])->name('account.enfants.create');
        Route::post('enfants', [EnfantUserController::class, 'store'])->name('account.enfants.store');
        Route::get('enfants/{id}', [EnfantUserController::class, 'show'])->name('account.enfants.show');
        Route::get('enfants/{enfant}/edit', [EnfantUserController::class, 'edit'])->name('account.enfants.edit');
        Route::put('enfants/{enfant}', [EnfantUserController::class, 'update'])->name('account.enfants.update');
        Route::delete('enfants/{enfant}', [EnfantUserController::class, 'destroy'])->name('account.enfants.destroy');
    });
    Route::middleware(['auth'])->prefix('account')->name('account.')->group(function () {
        // Index - List all conjoints of the authenticated user
        Route::get('/conjoints', [ConjointUserController::class, 'index'])->name('conjoints.index');
        
        // Create - Show form to create a new conjoint
        Route::get('/conjoints/create', [ConjointUserController::class, 'create'])->name('conjoints.create');
        
        // Store - Store a newly created conjoint in the database
        Route::post('/conjoints', [ConjointUserController::class, 'store'])->name('conjoints.store');
        
        // Show - Show details of a specific conjoint
        Route::get('/conjoints/{id}', [ConjointUserController::class, 'show'])->name('conjoints.show');
        
        // Edit - Show form to edit an existing conjoint
        Route::get('/conjoints/{id}/edit', [ConjointUserController::class, 'edit'])->name('conjoints.edit');
        
        // Update - Update the specified conjoint in the database
        Route::put('/conjoints/{id}', [ConjointUserController::class, 'update'])->name('conjoints.update');
        
        // Destroy - Delete the specified conjoint from the database
        Route::delete('/conjoints/{id}', [ConjointUserController::class, 'destroy'])->name('conjoints.destroy');
        // Display form to create a new enfant for a specific auxiliaire
    Route::get('/enfants/create/{auxiliaire_id}', [EnfantUserController::class, 'createKnownAux'])
    ->name('enfants.createKnownAux');
    
    // Store the new enfant for a specific auxiliaire
    Route::post('/enfants/store/{auxiliaire_id}', [EnfantUserController::class, 'storeKnownAux'])
    ->name('enfants.storeKnownAux');
    Route::get('/conjoints/create/{auxiliaire_id}', [ConjointUserController::class, 'createKnownAux'])
        ->name('conjoints.createKnownAux');
    
    // Store the new conjoint for a specific auxiliaire
    Route::post('/conjoints/store/{auxiliaire_id}', [ConjointUserController::class, 'storeKnownAux'])
        ->name('conjoints.storeKnownAux');
         //exportation
    
    Route::get('/export/auxiliaires', [ExportUserController::class, 'exportAuxiliaires'])->name('auxiliaires.export');
    Route::get('/export/enfants', [ExportUserController::class, 'exportEnfants'])->name('enfants.export');
    Route::get('/export/conjoints', [ExportUserController::class, 'exportConjoints'])->name('conjoints.export');
    Route::get('/export/auxiliaires/global', [ExportUserController::class, 'exportGlobal'])->name('auxiliaires.exportGlob');
    Route::get('search', [SearchController::class, 'searchUser'])->name('search.index');
});
    
    




Route::group(['prefix' => 'admin'], function () {
    // Guest middleware for admin
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('login', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });
    // Authenticate middleware for admin
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        //users
        // Affiche la liste des utilisateurs
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        //voire un utilisateur
        Route::get('/{users}/show', [UserController::class, 'show'])->name('users.show');

        // Affiche le formulaire pour créer un nouvel utilisateur
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

        // Stocke un nouvel utilisateur dans la base de données
        Route::post('/users', [UserController::class, 'store'])->name('users.store');

        // Affiche le formulaire pour modifier un utilisateur existant
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

        // Met à jour un utilisateur existant dans la base de données
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

        

        // Liste des entités territoriales
    Route::get('/entiteterritorielles', [EntiteterritorielleController::class, 'index'])->name('entiteterritorielles.index');

    // Affiche le formulaire pour créer une nouvelle entité territoriale
    Route::get('/entiteterritorielles/create', [EntiteterritorielleController::class, 'create'])->name('entiteterritorielles.create');

    // Stocke une nouvelle entité territoriale dans la base de données
    Route::post('/entiteterritorielles', [EntiteterritorielleController::class, 'store'])->name('entiteterritorielles.store');

    // Affiche les détails d'une entité territoriale spécifique
    Route::get('/entiteterritorielles/{entiteterritorielle}', [EntiteterritorielleController::class, 'show'])->name('entiteterritorielles.show');

    // Affiche le formulaire pour modifier une entité territoriale existante
    Route::get('/entiteterritorielles/{entiteterritorielle}/edit', [EntiteterritorielleController::class, 'edit'])->name('entiteterritorielles.edit');

    // Met à jour une entité territoriale existante dans la base de données
    Route::put('/entiteterritorielles/{entiteterritorielle}', [EntiteterritorielleController::class, 'update'])->name('entiteterritorielles.update');

    // Supprime une entité territoriale de la base de données
    Route::delete('/entiteterritorielles/{entiteterritorielle}', [EntiteterritorielleController::class, 'destroy'])->name('entiteterritorielles.destroy');
    // Affiche la liste des auxiliaires
    Route::get('//auxiliaires', [AuxiliaireController::class, 'index'])->name('auxiliaires.index');

    // Affiche le formulaire pour créer un nouvel auxiliaire
    Route::get('/auxiliaires/create', [AuxiliaireController::class, 'create'])->name('auxiliaires.create');

    // Stocke un nouvel auxiliaire dans la base de données
    Route::post('/auxiliaires', [AuxiliaireController::class, 'store'])->name('auxiliaires.store');

    // Affiche le formulaire pour modifier un auxiliaire existant
    Route::get('/auxiliaires/{auxiliaire}/edit', [AuxiliaireController::class, 'edit'])->name('auxiliaires.edit');
    Route::get('/auxiliaires/{auxiliaire}/show', [AuxiliaireController::class, 'show'])->name('auxiliaires.show');
    Route::get('admin/auxiliaires/{auxiliaire_id}/enfants/create', [EnfantController::class, 'createKnownAux'])->name('enfants.createKnownAux');
    Route::post('admin/auxiliaires/{auxiliaire_id}/enfants/store', [EnfantController::class, 'storeKnownAux'])->name('enfants.storeKnownAux');
    // Met à jour un auxiliaire existant dans la base de données
    // Routes pour l'ajout des conjoints
Route::get('admin/auxiliaires/{auxiliaire_id}/conjoints/create', [ConjointController::class, 'createKnownAux'])->name('conjoints.createKnownAux');
Route::post('admin/auxiliaires/{auxiliaire_id}/conjoints/store', [ConjointController::class, 'storeKnownAux'])->name('conjoints.storeKnownAux');


    Route::put('/auxiliaires/{auxiliaire}', [AuxiliaireController::class, 'update'])->name('auxiliaires.update');

    // Supprime un auxiliaire de la base de données
    Route::delete('/{auxiliaire}', [AuxiliaireController::class, 'destroy'])->name('auxiliaires.destroy');
    // Afficher le formulaire pour créer un auxiliaire avec une entité territoriale connue
Route::get('/admin/auxiliaires/create-known/{entiteId}', [AuxiliaireController::class, 'createKnownEntite'])->name('auxiliaires.createKnownEntite');

// Traiter la soumission du formulaire pour créer un auxiliaire avec une entité territoriale connue
Route::post('/admin/auxiliaires/store-known/{entiteId}', [AuxiliaireController::class, 'storeKnownEntite'])->name('auxiliaires.storeKnownEntite');

    // Display a listing of the Enfants
    Route::get('/enfants', [EnfantController::class, 'index'])->name('enfants.index');
    //show the user 
    
    Route::get('/enfants/create', [EnfantController::class, 'create'])->name('enfants.create');
    
    // Store a newly created Enfant in storage
    Route::post('/enfants', [EnfantController::class, 'store'])->name('enfants.store');
    
    
    // Display the specified Enfant
    Route::get('/enfants/{enfant}', [EnfantController::class, 'show'])->name('enfants.show');
    
    // Show the form for editing the specified Enfant
    Route::get('/enfants/{enfant}/edit', [EnfantController::class, 'edit'])->name('enfants.edit');
    
    // Update the specified Enfant in storage
    Route::put('/enfants/{enfant}', [EnfantController::class, 'update'])->name('enfants.update');
    
    // Remove the specified Enfant from storage
    Route::delete('/enfants/{enfant}', [EnfantController::class, 'destroy'])->name('enfants.destroy');
    Route::get('/conjoints', [ConjointController::class, 'index'])->name('conjoints.index');
    Route::get('/conjoints/create', [ConjointController::class, 'create'])->name('conjoints.create');
    Route::post('/conjoints', [ConjointController::class, 'store'])->name('conjoints.store');
    Route::get('/conjoints/{conjoint}/edit', [ConjointController::class, 'edit'])->name('conjoints.edit');
    Route::put('/conjoints/{conjoint}', [ConjointController::class, 'update'])->name('conjoints.update');
    Route::delete('/conjoints/{conjoint}', [ConjointController::class, 'destroy'])->name('conjoints.destroy');
    Route::get('/conjoints/{conjoint}', [ConjointController::class, 'show'])->name('conjoints.show');
    //exportation
    Route::get('/export/entiteterritorielles', [ExportController::class, 'exportEntiteTerritoriale'])->name('entiteterritorielles.export');
Route::get('/export/users', [ExportController::class, 'exportUsers'])->name('users.export');
Route::get('/export/auxiliaires', [ExportController::class, 'exportAuxiliaires'])->name('auxiliaires.export');
Route::get('/export/auxiliaires/cards', [ExportController::class, 'exportCard'])->name('auxiliaires.exportCard');
Route::get('/export/enfants', [ExportController::class, 'exportEnfants'])->name('enfants.export');
Route::get('/export/conjoints', [ExportController::class, 'exportConjoints'])->name('conjoints.export');
Route::get('/export/auxiliaires/global', [ExportController::class, 'exportGlobal'])->name('auxiliaires.exportGlob');
Route::get('search', [SearchController::class, 'search'])->name('search.index');

    });
    
    
    

    
});

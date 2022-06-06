<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\ContentController;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\LoansController;
Use App\Http\Controllers\LoanRequestsController;
Use App\Http\Livewire\GoodsShow;
Use App\Http\Livewire\UserShow;
Use App\Http\Livewire\WarehousesShow;
Use App\Http\Controllers\DashboardController;



/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    });
    Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout', [AuthController::class, 'logout']);
    });


 /*
|--------------------------------------------------------------------------
| Content Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => ['auth', 'CheckRole:admin']], function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/goods', [ContentController::class,'index']);
    Route::get('/user', [ContentController::class,'showuser']);
    Route::get('/warehouse', [ContentController::class,'warehouse']);
    Route::get('/loanrequests', [LoanRequestsController::class, "index"]);
    Route::get('/loanrequests/{loans:id}/accept', [LoanRequestsController::class, "accept"]);
    Route::get('/loanrequests/{loans:id}/reject', [LoanRequestsController::class, "reject"]);
    Route::get('/loanrequests/{loans:id}/cancel', [LoanRequestsController::class, "cancel"]);
    Route::get('/loanrequests/{loans:id}/done', [LoanRequestsController::class, "done"]);
    Route::get('/loanactivity', [LoanRequestsController::class, "loanactivity"]);
    Route::delete('/deleteloanactivity/{loans}', [LoanRequestsController::class,'deleteloanactivity']);
    Route::get('/reportpdf', [GoodsShow::class, 'reportpdf']);
    Route::get('/reportpdfuser', [UserShow::class, 'reportpdfuser']);
    Route::get('/reportpdfwarehouse', [WarehousesShow::class, 'reportpdfwarehouse']);
    Route::get('/pdfloans',[LoanRequestsController::class, 'downloadpdf']);
});

/*
|--------------------------------------------------------------------------
| Content User Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => ['auth', 'CheckRole:user']], function(){
    Route::get('/home', [DashboardController::class, 'dashboarduser']);
    Route::get('/item', [ContentController::class, 'goodsuser']);
    Route::get('/loans', [LoansController::class,'index']);
    Route::get('/create', [LoansController::class,'create']);
    Route::post('/create', [LoansController::class,'store']);
    Route::delete('/delete/{loans}', [LoansController::class,'delete']);
    Route::get('/loans/{loans:id}/return', [LoansController::class, "return"]);  
    Route::get('/downloadpdfloans',[LoansController::class, 'downloadpdf']);
});



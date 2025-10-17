<?php

use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogGalleryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\GenerationGalleryController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\KesanPesanController;
use App\Http\Controllers\MajorController;
use App\Http\Middleware\isSiswa;
use App\Http\Middleware\jewete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;
use App\Models\Organization;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\OrganizationRoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\SocialProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UnitController;
use App\Http\Middleware\isAuth;
use App\Models\Ekstrakulikuler;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Http\Middleware\Authenticate;
use App\Models\EkstrakulikulerGallery;


Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/login/google/callback', 'loginWithGoogle');
    Route::post('/logout', 'logout');
    Route::get('/me', 'me');
    Route::put('/admin/{id}', 'adminUpdate')->middleware(
        isAdmin::class,
        Authenticate::class
    );
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index');
    Route::get('/blog/{slug}', 'show');
    Route::get('/blog/author/{id}', 'author');
    Route::middleware([isAdmin::class, isSiswa::class, Authenticate::class])->group(function () {
        Route::post('/blog', 'store');
        Route::put('/blog/{id}', 'update');
        Route::delete('/blog/{id}', 'destroy');
    });
});


Route::controller(BlogGalleryController::class)->group(function () {
    Route::get('/bloggallery', 'index');
    Route::get('/bloggallery/{id}', 'show');
    Route::middleware([isSiswa::class, isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/bloggallery', 'store');
        Route::put('/bloggallery/{id}', 'update');
        Route::delete('/bloggallery/{id}', 'destroy');
    });
});


Route::controller(ClassController::class)->group(function () {
    Route::get('/class', 'index');
    Route::get('/class/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/class', 'store');
        Route::put('/class/{id}', 'update');
        Route::delete('/class/{id}', 'destroy');
    });
});

Route::controller(ExpertiseController::class)->group(function () {
    Route::get('/expertise', 'index');
    Route::get('/expertise/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/expertise', 'store');
        Route::put('/expertise/{id}', 'update');
        Route::delete('/expertise/{id}', 'destroy');
    });
});

Route::controller(GenerationController::class)->group(function () {
    Route::get('/generation', 'index');
    Route::get('/generation/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/generation', 'store');
        Route::put('/generation/{id}', 'update');
        Route::delete('/generation/{id}', 'destroy');
    });
});

Route::controller(GenerationGalleryController::class)->group(function () {
    Route::get('/generationgallery', 'index');
    Route::get('/generationgallery/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/generationgallery', 'store');
        Route::put('/generationgallery/{id}', 'update');
        Route::delete('/generationgallery/{id}', 'destroy');
    });
});


Route::controller(GradeController::class)->group(function () {
    Route::get('/grade', 'index');
    Route::get('/grade/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/grade', 'store');
        Route::put('/grade/{id}', 'update');
        Route::delete('/grade/{id}', 'destroy');
    });
});

Route::controller(MajorController::class)->group(function () {
    Route::get('/major', 'index');
    Route::get('/major/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/major', 'store');
        Route::put('/major/{id}', 'update');
        Route::delete('/major/{id}', 'destroy');
    });
});

Route::controller(OrganizationController::class)->group(function () {
    Route::get('/organization', 'index');
    Route::get('/organization/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/organization', 'store');
        Route::put('/organization/{id}', 'update');
        Route::delete('/organization/{id}', 'destroy');
    });
});

Route::controller(OrganizationRoleController::class)->group(function () {
    Route::get('/organizationrole', 'index');
    Route::get('/organizationrole/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/organizationrole', 'store');
        Route::put('/organizationrole/{id}', 'update');
        Route::delete('/organizationrole/{id}', 'destroy');
    });
});

Route::controller(SocialMediaController::class)->group(function () {
    Route::get('/socialmedia', 'index');
    Route::get('/socialmedia/organization/{id}', 'showOrganization');
    Route::get('/socialmedia/user/{id}', 'showUser');
    Route::middleware([isSiswa::class, isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/socialmedia/user', 'storeUser');
        Route::put('/socialmedia/user/{id}', 'updateUser');
        Route::post('/socialmedia/organization', 'storeOrganization');
        Route::put('/socialmedia/organization/{id}', 'updateOrganization');
        Route::delete('/socialmedia/{id}', 'destroy');
    });
});

Route::controller(SocialProfileController::class)->group(function () {
    Route::get('/socialprofile', 'index');
    Route::get('/socialprofile/{id}', 'show');
    Route::middleware([isSiswa::class, isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/socialprofile', 'store');
        Route::put('/socialprofile/{id}', 'update');
        Route::delete('/socialprofile/{id}', 'destroy');
    });
});

Route::controller(UnitController::class)->group(function () {
    Route::get('/unit', 'index');
    Route::get('/unit/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/unit', 'store');
        Route::put('/unit/{id}', 'update');
        Route::delete('/unit/{id}', 'destroy');
    });
});

Route::controller(SubjectController::class)->group(function () {
    Route::get('/subject', 'index');
    Route::get('/subject/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/subject', 'store');
        Route::put('/subject/{id}', 'update');
        Route::delete('/subject/{id}', 'destroy');
    });
});

Route::controller(SettingController::class)->group(function () {
    Route::get('/setting', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::put('/setting', 'update');
    });
});


Route::controller(EkstrakulikulerController::class)->group(function () {
    Route::get('/ekstrakulikuler', 'index');
    Route::get('/ekstrakulikuler/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/ekstrakulikuler', 'store');
        Route::put('/ekstrakulikuler/{id}', 'update');
        Route::delete('/ekstrakulikuler/{id}', 'destroy');
    });
});

Route::controller(EkstrakulikulerGallery::class)->group(function () {
    Route::get('/ekstrakulikulergallery', 'index');
    Route::get('/ekstrakulikulergallery/{id}', 'show');
    Route::middleware([isAdmin::class, Authenticate::class])->group(function () {
        Route::post('/ekstrakulikulergallery', 'store');
        Route::put('/ekstrakulikulergallery/{id}', 'update');
        Route::delete('/ekstrakulikulergallery/{id}', 'destroy');
    });
});


Route::controller(KesanPesanController::class)->group(function () {
    Route::get('/kesanpesan', 'index');
    Route::get('/kesanpesan/{id}', 'show');
    Route::middleware([Authenticate::class])->group(function () {
        Route::post('/kesanpesan', 'store');
        Route::put('/kesanpesan/{id}', 'update');
        Route::delete('/kesanpesan/{id}', 'destroy');
    });
});

Route::controller(AspirasiController::class)->group(function () {
    Route::get('/aspirasi', 'index');
    Route::get('/aspirasi/{id}', 'show');
    Route::post('/aspirasi', 'store');

});

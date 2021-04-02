<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SpinnerController;
use App\Http\Controllers\VideoController;
use App\Http\Livewire\Admin\AdminPortal;
use App\Http\Livewire\Admin\Affiliates\ActiveReferals;
use App\Http\Livewire\Admin\Affiliates\AllReferals;
use App\Http\Livewire\Admin\Affiliates\DormantReferals;
use App\Http\Livewire\Admin\Affiliates\UserAffiliateHistory;
use App\Http\Livewire\Admin\Auth\AdminLogin;
use App\Http\Livewire\Admin\Blogs\ApprovedBlogs;
use App\Http\Livewire\Admin\Blogs\PendingBlogs;
use App\Http\Livewire\Admin\Blogs\RejectedBlogs;
use App\Http\Livewire\Admin\Blogs\UserBlogpayHistory;
use App\Http\Livewire\Admin\Deposits\AllDeposits;
use App\Http\Livewire\Admin\Deposits\ApprovedDeposits;
use App\Http\Livewire\Admin\Deposits\DeclinedDeposits;
use App\Http\Livewire\Admin\Deposits\PendingDeposits;
use App\Http\Livewire\Admin\Deposits\UserDepositHistory;
use App\Http\Livewire\Admin\Forex\ApprovedTradedrawals;
use App\Http\Livewire\Admin\Forex\ClosedTrades;
use App\Http\Livewire\Admin\Forex\DeclinedTradedrawals;
use App\Http\Livewire\Admin\Forex\OpenTrades;
use App\Http\Livewire\Admin\Forex\PendingTradedrawals;
use App\Http\Livewire\Admin\Forex\PendingTrades;
use App\Http\Livewire\Admin\Forex\UserForexHistory;
use App\Http\Livewire\Admin\Spins\AllSpins;
use App\Http\Livewire\Admin\Spins\SpinSegments;
use App\Http\Livewire\Admin\Spins\UserFreeSpinHistory;
use App\Http\Livewire\Admin\Spins\UserLuckySpinHistory;
use App\Http\Livewire\Admin\Users\ActiveUsers;
use App\Http\Livewire\Admin\Users\AllUsers;
use App\Http\Livewire\Admin\Users\DormantUsers;
use App\Http\Livewire\Admin\Users\FreeAgents;
use App\Http\Livewire\Admin\Users\UserDetails;
use App\Http\Livewire\Admin\Users\UserLoginHistory;
use App\Http\Livewire\Admin\Videos\ApprovedVidrawals;
use App\Http\Livewire\Admin\Videos\DeclinedVidrawals;
use App\Http\Livewire\Admin\Videos\PendingVidrawals;
use App\Http\Livewire\Admin\Videos\AllVidrawals;
use App\Http\Livewire\Admin\Videos\UserVidrawalHistory;
use App\Http\Livewire\Admin\Videos\UserWatchHistory;
use App\Http\Livewire\Admin\Videos\VideoSettings;
use App\Http\Livewire\Admin\Withdrawals\AllWithdrawals;
use App\Http\Livewire\Admin\Withdrawals\ApprovedWithdrawals;
use App\Http\Livewire\Admin\Withdrawals\DeclinedWithdrawals;
use App\Http\Livewire\Admin\Withdrawals\PendingWithdrawals;
use App\Http\Livewire\Admin\Withdrawals\UserWithdrawalHistory;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\User\Affiliates\ActivateUser;
use App\Http\Livewire\User\Affiliates\DormantAffiliates;
use App\Http\Livewire\User\Dashboard;
use App\Http\Livewire\User\Affiliates\InvestAffiliates;
use App\Http\Livewire\User\Affiliates\JoinAffiliates;
use App\Http\Livewire\User\Blog\BlogEarnings;
use App\Http\Livewire\User\Deposit\DepositFunds;
use App\Http\Livewire\User\Deposit\DepositHistory;
use App\Http\Livewire\User\Misc\ContactSupport;
use App\Http\Livewire\User\Misc\HowHelp;
use App\Http\Livewire\User\Misc\UserNotifications;
use App\Http\Livewire\User\Settings\AlterProfile;
use App\Http\Livewire\User\Settings\ChangePassword;
use App\Http\Livewire\User\Spin\SpinFree;
use App\Http\Livewire\User\Spin\SpinHistory;
use App\Http\Livewire\User\Spin\SpinLucky;
use App\Http\Livewire\User\Spin\SpinWelcome;
use App\Http\Livewire\User\Trade\ForexOption;
use App\Http\Livewire\User\Trade\InvestTrade;
use App\Http\Livewire\User\Trade\PendingOrders;
use App\Http\Livewire\User\Trade\TradeHistory;
use App\Http\Livewire\User\Trade\TradeWithdrawHistory;
use App\Http\Livewire\User\Trade\WithdrawTrade;
use App\Http\Livewire\User\Vidpay\SubscribeVid;
use App\Http\Livewire\User\Vidpay\VidrawalHistory;
use App\Http\Livewire\User\Vidpay\ViewNow;
use App\Http\Livewire\User\Vidpay\WatchHistory;
use App\Http\Livewire\User\Vidpay\WatchVideos;
use App\Http\Livewire\User\Vidpay\WithdrawVid;
use App\Http\Livewire\User\Withdrawal\WithdrawalHistory;
use App\Http\Livewire\User\Withdrawal\WithdrawFunds;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

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

//Notifications Logic
Route::get('markAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->name('markAsRead');


Route::get('terms_and_conditions', function () {
    //PDF file is stored under project/public/download/info.pdf
    $file = public_path() . "/download/EARNEST VENTURES TERMS AND CONDITIONS.pdf";
    $headers = array(
        'Content-Type: application/pdf',
    );

    return Response::download($file, 'Earnest Ventures Terms.pdf', $headers);
});

Route::name('password.')->group(function () {
    Route::get('/forget-password', [ForgotPasswordController::class, 'getEmail'])->name('request');;
    Route::post('/forget-password', [ForgotPasswordController::class, 'postEmail'])->name('email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('update');
});

Route::name('home.')->group(function () {
    Route::get('/', function () {
        return view('home.index');
    })->name('default');
    // Get all published posts
    Route::get('/blog', [BlogController::class, 'getPosts'])->name('posts');
    // Get posts for a given tag
    Route::get('/blog/tag/{slug}', [BlogController::class, 'getPostsByTag'])->name('tag');
    // Get posts for a given topic
    Route::get('/blog/topic/{slug}', [BlogController::class, 'getPostsByTopic'])->name('topic');
    // Find a single post
    Route::middleware('Canvas\Http\Middleware\Session')->get('/blog/{slug}', [BlogController::class, 'findPostBySlug'])->name('slug');
});

//Mpesa Transactions
Route::prefix('callback')->name('callback.')->group(function () {
    Route::post('/deposit', [DepositController::class, 'depositedFunds'])->name('deposit');
    Route::post('/subscribe', [DepositController::class, 'subscribedPlan'])->name('subscribe');
});
Route::get('/register/{referer?}', Register::class)->name('register');;
Route::prefix('user')->name('user.')->group(function () {   
    Route::get('/login', Login::class)->name('login');
    Route::middleware('auth:web')->group(function () {
        Route::middleware('verify.banned')->group(function () {
            Route::prefix('deposit')->name('deposit.')->group(
                function () {
                    Route::get('funds', DepositFunds::class)->name('funds');
                }
            );
            Route::prefix('misc')->name('misc.')->group(
                function () {
                    Route::get('support', ContactSupport::class)->name('support');
                    Route::get('help', HowHelp::class)->name('help');
                    Route::get('notify', UserNotifications::class)->name('notify');
                }
            );
            Route::middleware('verify.active')->group(function () {
                Route::get('/dashboard', Dashboard::class)->name('dashboard');
                Route::prefix('deposit')->name('deposit.')->group(
                    function () {
                        Route::get('history', DepositHistory::class)->name('history');
                    }
                );
                Route::prefix('withdrawal')->name('withdrawal.')->group(
                    function () {
                        Route::get('history', WithdrawalHistory::class)->name('history');
                        Route::get('funds', WithdrawFunds::class)->name('funds');
                    }
                );
                Route::prefix('spin')->name('spin.')->group(
                    function () {
                        Route::get('history', SpinHistory::class)->name('history');
                        Route::get('lucky', SpinLucky::class)->name('lucky');
                        Route::get('free', SpinFree::class)->name('free');
                        Route::get('welcome', SpinWelcome::class)->name('welcome');
                    }
                );
                Route::post('/spin/now', [SpinnerController::class, 'spinHandler'])->name('spinner');
                Route::post('/vidpay/view/tracker', [VideoController::class, 'videoHandler'])->name('tracker');
                Route::post('/vidpay/view/played', [VideoController::class, 'playHandler'])->name('[played]');

                // Route::prefix('package')->name('package.')->group(
                //     function () {
                //         Route::get('all', SubscribePackage::class)->name('all');
                //         Route::get('history', SubscriptionHistory::class)->name('history');
                //     }
                // );

                Route::prefix('blogs')->name('blogs.')->group(
                    function () {
                        Route::get('earnings', BlogEarnings::class)->name('earnings');
                    }
                );

                Route::prefix('affiliates')->name('affiliates.')->group(
                    function () {
                        Route::get('join', JoinAffiliates::class)->name('join');
                        Route::get('invest', InvestAffiliates::class)->name('invest');
                        Route::get('dormant', DormantAffiliates::class)->name('dormant');
                        Route::get('activate', ActivateUser::class)->name('activate');
                    }
                );
                Route::prefix('settings')->name('settings.')->group(
                    function () {
                        Route::get('password', ChangePassword::class)->name('password');
                        Route::get('profile', AlterProfile::class)->name('profile');
                    }
                );

                Route::prefix('vidpay')->name('vidpay.')->group(
                    function () {
                        Route::get('view/{video}', ViewNow::class)->name('view');
                        Route::get('videos', WatchVideos::class)->name('videos');
                        Route::get('subscribe', SubscribeVid::class)->name('subscribe');
                        Route::get('history', WatchHistory::class)->name('history');
                        Route::get('withdraw', WithdrawVid::class)->name('withdraw');
                        Route::get('withdrawals', VidrawalHistory::class)->name('withdrawals');
                    }
                );
                Route::prefix('trade')->name('trade.')->group(
                    function () {
                        Route::get('forex', ForexOption::class)->name('forex');
                        Route::get('pending-orders', PendingOrders::class)->name('pending-orders');
                        Route::get('history', TradeHistory::class)->name('history');
                        Route::get('invest', InvestTrade::class)->name('invest');
                        Route::get('withdraw', WithdrawTrade::class)->name('withdraw');
                        Route::get('withdrawal/histoy', TradeWithdrawHistory::class)->name('withdrawal.history');
                    }
                );
            });
        });
    });
});

Route::prefix('admin')->name('admin')->group(
    function () {
        Route::get('loginx33', AdminLogin::class)->name('login');
    }
);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('auth:admin')->group(function () {
        //here all your admin routes
        Route::get('dashboard', AdminPortal::class)->name('dashboard');

        Route::prefix('blogs')->name('blogs.')->group(
            function () {
                Route::middleware('admin.blog')->group(function () {
                    Route::get('approved', ApprovedBlogs::class)->name('approved');
                    Route::get('pending', PendingBlogs::class)->name('pending');
                    Route::get('rejected', RejectedBlogs::class)->name('rejected');
                    Route::get('history/{id}', UserBlogpayHistory::class)->name('history');
                });
            }
        );

        Route::prefix('users')->name('users.')->group(
            function () {
                Route::middleware('admin.blog')->group(function () {
                    Route::get('all', AllUsers::class)->name('all');
                    Route::get('active', ActiveUsers::class)->name('active');
                    Route::get('dormant', DormantUsers::class)->name('dormant');
                    Route::get('free_agents', FreeAgents::class)->name('free_agents');
                    Route::get('detail/{user}', UserDetails::class)->name('detail');
                    Route::get('logins/{id}', UserLoginHistory::class)->name('logins');
                });
            }
        );

        Route::prefix('withdrawals')->name('withdrawals.')->group(
            function () {
                Route::middleware('admin.pay')->group(function () {
                    Route::get('all', AllWithdrawals::class)->name('all');
                    Route::get('pending', PendingWithdrawals::class)->name('pending');
                    Route::get('approved', ApprovedWithdrawals::class)->name('approved');
                    Route::get('rejected', DeclinedWithdrawals::class)->name('rejected');
                    Route::get('history/{id}', UserWithdrawalHistory::class)->name('history');
                });
            }
        );

        Route::prefix('deposits')->name('deposits.')->group(
            function () {
                Route::middleware('admin.user')->group(function () {
                    Route::get('all', AllDeposits::class)->name('all');
                    Route::get('pending', PendingDeposits::class)->name('pending');
                    Route::get('approved', ApprovedDeposits::class)->name('approved');
                    Route::get('rejected', DeclinedDeposits::class)->name('rejected');
                });
                Route::get('history/{id}', UserDepositHistory::class)->middleware('admin.pay')->name('history');
            }
        );

        Route::prefix('videos')->name('videos.')->group(
            function () {
                Route::middleware('admin.other')->group(function () {
                    Route::get('settings', VideoSettings::class)->name('settings');
                    Route::get('all', AllVidrawals::class)->name('all');
                    Route::get('pending', PendingVidrawals::class)->name('pending');
                    Route::get('approved', ApprovedVidrawals::class)->name('approved');
                    Route::get('rejected', DeclinedVidrawals::class)->name('rejected');
                });
                Route::get('vidrawal_history/{id}', UserVidrawalHistory::class)->middleware('admin.pay')->name('vidrawal_history');
                Route::get('watch_history/{id}', UserWatchHistory::class)->middleware('admin.pay')->name('watch_history');
            }
        );
        Route::prefix('affiliates')->name('affiliates.')->group(
            function () {
                Route::middleware('admin.other')->group(function () {
                    Route::get('all', AllReferals::class)->name('all');
                    Route::get('active', ActiveReferals::class)->name('active');
                    Route::get('dormant', DormantReferals::class)->name('dormant');
                });
                Route::get('history/{id}', UserAffiliateHistory::class)->middleware('admin.pay')->name('history');
            }
        );

        Route::prefix('forex')->name('forex.')->group(
            function () {
                Route::middleware('admin.super')->group(function () {
                    Route::get('open-trades', OpenTrades::class)->name('open-trades');
                    Route::get('closed-trades', ClosedTrades::class)->name('closed-trades');                    
                    Route::get('pending-trades', PendingTrades::class)->name('pending-trades');
                    Route::get('pending-tradedrawals', PendingTradedrawals::class)->name('pending-tradedrawals');
                    Route::get('approved-tradedrawals', ApprovedTradedrawals::class)->name('approved-tradedrawals');
                    Route::get('declined-tradedrawals', DeclinedTradedrawals::class)->name('declined-tradedrawals');
                });
                Route::get('history/{id}', UserForexHistory::class)->middleware('admin.pay')->name('history');
            }
        );

        Route::prefix('spins')->name('spins.')->group(
            function () {
                Route::middleware('admin.super')->group(function () {
                    Route::get('all', AllSpins::class)->name('all');
                    Route::get('segments', SpinSegments::class)->name('segments');
                });
                Route::get('free_history/{id}', UserFreeSpinHistory::class)->middleware('admin.pay')->name('free_history');
                Route::get('lucky_history/{id}', UserLuckySpinHistory::class)->middleware('admin.pay')->name('lucky_history');
            }
        );
    });
});

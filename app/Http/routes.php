<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'MainController@index');

// Sermons
Route::get('/sermons', ['as' => 'sermons', 'uses' => 'SermonsController@index']);
Route::get('/series/{series}', ['as' => 'series', 'uses' => 'SermonsController@series']);
Route::get('/series/{series}/{series_video}', ['as' => 'seriesVideo', 'uses' => 'SermonsController@video']);

// Events
Route::get('/events', ['as' => 'events', 'uses' => 'EventsController@index']);
Route::get('/events/calendar', ['as' => 'calendar', 'uses' => 'EventsController@calendar']);
Route::get('/events/calendar/{year}/{month}', ['as' => 'calendarMonth', 'uses' => 'EventsController@calendarMonth']);
Route::get('/events/{id}-{slug}', ['as' => 'event', 'uses' => 'EventsController@event']);

// Campuses / Locations
Route::get('/locations', ['as' => 'locations', 'uses' => 'CampusesController@index']);
Route::get('/locations/{campus}', ['as' => 'location', 'uses' => 'CampusesController@detail']);

// Ministries
Route::get('/care', ['as' => 'care', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/family', ['as' => 'family', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/fpkids', ['as' => 'fpKids', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/fpkids/welcome', ['as' => 'fpKidsWelcome', 'uses' => 'MinistriesController@fpKidsWelcome']);
Route::get('/kidsteps', ['as' => 'kidSteps', 'uses' => 'MainController@defaultPage']);
Route::get('/dedications', ['as' => 'dedications', 'uses' => 'MainController@defaultPage']);
Route::get('/fpstudents', ['as' => 'fpStudents', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/prayer', ['as' => 'prayer', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/worship', ['as' => 'worship', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/celebrate', ['as' => 'celebrate', 'uses' => 'MinistriesController@defaultMinistryPage']);

// Groups
Route::get('/groups', ['as' => 'groups', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/groups/new-leader', ['as' => 'newGroupLeader', 'uses' => 'MainController@defaultPage']);
Route::get('/groups/leaders', ['as' => 'groupLeaders', 'uses' => 'MainController@defaultPage']); // TODO: Create this page
Route::get('/men', ['as' => 'men', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/women', ['as' => 'women', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/young-adults', ['as' => 'youngAdults', 'uses' => 'MinistriesController@defaultMinistryPage']);
Route::get('/starting-point', ['as' => 'startingPoint', 'uses' => 'MainController@defaultPage']);

// Missions
Route::get('/missions', ['as' => 'missions', 'uses' => 'MissionsController@index']);
Route::get('/missions/{location_slug}', ['as' => 'missionsLocation', 'uses' => 'MissionsController@location']);
Route::get('/love-local', ['as' => 'loveLocal', 'uses' => 'MissionsController@loveLocal']);
Route::get('/love-local/kids-hope-usa', ['as' => 'kidsHope', 'uses' => 'MissionsController@kidsHope']);
Route::get('/love-local/{organization}', ['as' => 'localOutreachOrganization', 'uses' => 'MissionsController@organization']);

// Staff
Route::get('/staff', ['as' => 'staff', 'uses' => 'StaffController@index']);
Route::get('/staff/directory', ['as' => 'staffDirectory', 'uses' => 'StaffController@directory']);
Route::get('/staff/{staff}', ['as' => 'staffDetail', 'uses' => 'StaffController@detail']);

// Next Steps
Route::get('/core', ['as' => 'core', 'uses' => 'MainController@defaultPage']);
Route::get('/baptism', ['as' => 'baptism', 'uses' => 'MainController@defaultPage']);
Route::get('/give', ['as' => 'give', 'uses' => 'MainController@defaultPage']);
Route::get('/next-steps', ['as' => 'nextSteps', 'uses' => 'MainController@defaultPage']);
Route::get('/salvation', ['as' => 'salvation', 'uses' => 'MainController@defaultPage']);

// General pages
Route::get('/what-to-expect', ['as' => 'whatToExpect', 'uses' => 'MainController@defaultPage']);
Route::get('/beliefs-and-values', ['as' => 'beliefs', 'uses' => 'MainController@defaultPage']);
Route::get('/h4h', ['as' => 'h4h', 'uses' => 'MainController@defaultPage']);
Route::get('/weddings', ['as' => 'weddings', 'uses' => 'MainController@defaultPage']);
Route::get('/stephen', ['as' => 'stephen', 'uses' => 'MainController@defaultPage']);
Route::get('/summit', ['as' => 'summit', 'uses' => 'MainController@defaultPage']);
Route::get('/updates', ['as' => 'updates', 'uses' => 'MainController@defaultPage']);

// Bible plan
Route::get('/bible-plan', ['as' => 'biblePlan', 'uses' => 'BiblePlanController@index']);
Route::get('/bible-plan/{month}-{day}', ['as' => 'biblePlanDay', 'uses' => 'BiblePlanController@day']);

// iCampus
Route::get('/countdown.js', ['as' => 'countdown', 'uses' => 'InternetCampusController@countdown']);

// Sitemap JSON for UNCSS
Route::get('/_sitemap.json', 'SiteMapController@index');

// Redirects
Route::get('/nextsteps', 'RedirectController@nextSteps');
Route::get('/series', 'RedirectController@sermons');
Route::get('/contact', 'RedirectController@locations');
Route::get('/times-and-directions', 'RedirectController@locations');
Route::get('/bibleplan', 'RedirectController@biblePlan');
Route::get('/youngadults', 'RedirectController@youngAdults');
Route::get('/newleader', 'RedirectController@newGroupLeader');
Route::get('/lovelocal', 'RedirectController@loveLocal');
Route::get('/kidshope', 'RedirectController@kidsHope');
Route::get('/kids-hope', 'RedirectController@kidsHope');


Route::get('/migrate', 'MigrateController@index');
Route::get('/migrate/migrate', ['as' => 'migrate', 'uses' => 'MigrateController@migrate']);
<?php
// Routes
$router->get('/', 'Http/controllers/home.php');
$router->get('/learn', 'Http/controllers/learn.php');
$router->get('/about', 'Http/controllers/about.php');

$router->post('/nav', 'model/clear-notifications.php');

$router->get('/account', 'Http/controllers/account/account.php')->only('auth');
$router->post('/account', 'model/account/change.php')->only('auth');

$router->get('/test', 'Http/controllers/account/test.php')->only('auth');
$router->post('/test', 'model/account/test-page.php')->only('auth');
$router->get('/tieOpt', 'Http/controllers/account/test-tieOpt.php')->only('auth');
$router->get('/result', 'Http/controllers/account/test-result.php')->only('auth');
$router->post('/result', 'model/account/test-result.php')->only('auth');
$router->get('/sample-grouping', 'Http/controllers/account/sample-grouping.php')->only('auth');

$router->get('/profile', 'Http/controllers/account/profile.php')->only('auth');

$router->get('/dashboard', 'Http/controllers/rooms/dashboard.php')->only('auth');
$router->post('/dashboard', 'model/rooms/create.php')->only('auth');

$router->get('/room', 'Http/controllers/rooms/show.php')->only('auth');
$router->post('/room', 'model/rooms/request.php');
$router->patch('/room', 'model/rooms/update.php');
$router->delete('/room', 'model/rooms/destroy.php');

$router->get('/groups', 'Http/controllers/rooms/group/results.php')->only('auth');
$router->post('/groups', 'Http/controllers/rooms/group/results.php')->only('auth');
$router->patch('/groups', 'Http/controllers/rooms/group/results.php')->only('auth');
$router->delete('/groups', 'Http/controllers/rooms/group/results.php')->only('auth');

$router->get('/register', 'Http/controllers/session/registration/register.php')->only('guest');
$router->post('/register', 'model/session/registration/store.php')->only('guest');
$router->get('/activate-account', 'Http/controllers/session/registration/success-signup.php')->only('guest');
$router->get('/active-success', '/model/session/registration/success-activation.php')->only('guest');

$router->get('/login', 'Http/controllers/session/login/login.php')->only('guest');
$router->post('/login', 'model/session/login/store.php')->only('guest');
$router->delete('/login', 'model/session/login/destroy.php')->only('auth');

$router->get('/forgot-password', 'Http/controllers/session/login/forgot.php')->only('guest');
$router->post('/forgot-password', 'model/session/login/forgot.php')->only('guest');
$router->get('/reset-password', 'Http/controllers/session/login/reset-password.php')->only('guest');
$router->post('/reset-password', 'model/session/login/process-reset-password.php')->only('guest');

// ADMIN

$router->get('/admin', 'Http/controllers/admin/admin-dashboard.php')->only('auth');
$router->get('/admin-settings', 'Http/controllers/admin/admin-settings.php')->only('auth');
$router->post('/admin-settings', 'model/admin/admin-settings.php')->only('auth');

$router->get('/admin-accounts', 'Http/controllers/admin/accounts/admin-accounts.php')->only('auth');
$router->get('/admin-account-edit', 'Http/controllers/admin/accounts/admin-account-edit.php')->only('auth');
$router->post('/admin-account-edit', 'Http/controllers/admin/accounts/admin-account-edit.php')->only('auth');

$router->get('/admin-rooms', 'Http/controllers/admin/rooms/admin-rooms.php')->only('auth');
$router->get('/admin-room-edit', 'Http/controllers/admin/rooms/admin-room-edit.php')->only('auth');
$router->post('/admin-room-edit', 'model/admin/rooms/admin-room-edit.php')->only('auth');

$router->get('/admin-tickets', 'Http/controllers/admin/tickets/admin-tickets.php')->only('auth');
$router->get('/admin-view-ticket', 'Http/controllers/admin/tickets/admin-view-ticket.php')->only('auth');
$router->post('/admin-view-ticket', 'model/admin/tickets/admin-view-ticket.php')->only('auth');

$router->get('/admin-logs', 'Http/controllers/admin/logs/admin-logs.php')->only('auth');
$router->get('/admin-view-log', 'Http/controllers/admin/logs/admin-view-log.php')->only('auth');

$router->get('/submit-ticket', 'Http/controllers/admin/submit-ticket.php');
$router->post('/submit-ticket', 'model/admin/submit-ticket.php');




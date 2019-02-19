<?php namespace RESTController\extensions\ILIASApp;

require_once("./Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/REST/RESTController/extensions/ilias_app_v1/models/ILIASAppModel.php");
require_once('./Services/Membership/classes/class.ilParticipants.php');
use  RESTController\extensions\ILIASApp\ILIASAppModel;
use \RESTController\libs\RESTAuth as RESTAuth;
use \RESTController\core\auth as Auth;
use \RESTController\libs as Libs;
use RESTController\RESTController;

/** @var $app RESTController */
/**
 * Note: The additional OPTIONS request per route is needed due to CORS. Before sending an actual GET/POST request,
 * the browser is sending an OPTIONS request to check if the origin (e.g. localhost) is allowed to perform
 * cross origin site requests. The OPTIONS request is sent without Authorization headers und thus results in a 401 if
 * the TOKEN middleware is active.
 */
$app->group('/v1/ilias-app', function () use ($app) {

    $app->get('/desktop', RESTAuth::checkAccess(RESTAuth::TOKEN), function() use ($app) {
        $iliasApp = new ILIASAppModel();
        $accessToken = $app->request->getToken();
        $userId = $accessToken->getUserId();
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->body(json_encode($iliasApp->getDesktopData($userId)));
    });

    $app->options('/desktop', function() {});

    $app->get('/objects/:refId', RESTAuth::checkAccess(RESTAuth::TOKEN), function($refId) use ($app) {
        $iliasApp = new ILIASAppModel();
        $accessToken = $app->request->getToken();
        $userId = $accessToken->getUserId();
        $app->response->headers->set('Content-Type', 'application/json');
        $recursive = $app->request->get('recursive');
        $data = ($recursive) ? $iliasApp->getChildrenRecursive($refId, $userId) : $iliasApp->getChildren($refId, $userId);
        $app->response->body(json_encode($data));
    });

    $app->options('/objects/:refId', function() {});

    $app->get('/files/:refId', RESTAuth::checkAccess(RESTAuth::TOKEN), function($refId) use ($app) {
        $iliasApp = new ILIASAppModel();
        $accessToken = $app->request->getToken();
        $userId = $accessToken->getUserId();
        $app->response->headers->set('Content-Type', 'application/json');
        $app->response->body(json_encode($iliasApp->getFileData($refId, $userId)));
    });

    $app->options('/files/:refId', function() {});

});

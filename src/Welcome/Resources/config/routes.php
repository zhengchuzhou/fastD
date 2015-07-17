<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 15/4/30
 * Time: 上午9:53
 * Github: https://www.github.com/janhuang 
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 */

Routes::get('/welcome', 'Welcome\\Events\\Index@welcomeAction');

Routes::get('/view', 'Welcome\\Events\\Index@viewAction');
Routes::get('/di', 'Welcome\\Events\\Index@diAction');
Routes::get('/db', 'Welcome\\Events\\Index@dbAction');
Routes::group('/api', function() {
    Routes::group('/v1', function () {
        Routes::get('/db', 'Welcome\\Events\\Index@dbAction');
    });
    Routes::get('/di', 'Welcome\\Events\\Index@diAction');
});

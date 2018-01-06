<?php
/**
 * Created by PhpStorm.
 * User: Rehman Akbar
 * Date: 1/2/2018
 * Time: 8:13 AM
 */

namespace App\Trskd\Observers;

use \Cache;

abstract class AbstractObserver {

    protected function clearCacheTags($tags) {
        Cache::tags($tags)->flush();
    }

    protected function clearCacheSections($section) {
        Cache::section($section)->flush();
    }

    abstract public function saved($model);

//    abstract public function saving($model);

//    abstract public function deleted($model);

//    abstract public function deleting($model);
}
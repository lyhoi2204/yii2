<?php

namespace app\helpers;

use yii\helpers\ArrayHelper;

class MyDefine {

    const yes = 1;
    const no = 0;
    

    /**
     * Status
     */
    const status_enable = 1;
    const status_disable = 0;
    const status_pending = 2;
    const status_delete = 3;

    public function arrStatus($basic = false) {
        $item = [self::status_enable => 'Enable', self::status_disable => 'Disable', self::status_delete => 'Delete', self::status_pending => 'Pending'];
        if ($basic)
            ArrayHelper::remove($item, self::status_delete);
        return $item;
    }

    public function label_status($code) {
        $_t = $this->arrStatus();
        return (isset($_t[$code]) ? $_t[$code] : null);
    }

    public function arrYn() {
        return [self::yes => 'Yes', self::no => 'No'];
    }

   

}

<?php
namespace App\Controller\Component;

use Cake\Cache\Cache;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Utility\Security;
use Hashids\Hashids;
use Cake\ORM\TableRegistry;

/**
 * Common component
 */
class CommonComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Hashids Settings
     *
     * @var array
     */

    /**
     * Hashids function
     *
     * @return object
     */
    public function hashids()
    {
        $security = Configure::read('security');
        return $hashids = new Hashids(
            $security['salt'],
            $security['min_hash_length'],
            $security['alphabet']
        );
    }

    public function bn_to_en($str = NULL)
    {
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '');
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '');
        $converted = str_replace($bangNumber, $engNumber, $str);
        return $converted;
    }

    public function en_to_bn($str = NULL)
    {
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '');
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '');
        $converted = str_replace($engNumber, $bangNumber, $str);
        return $converted;
    }

    public function landTypes(){
        if(Cache::read("land_types"))
        {
            $data = Cache::read("land_types");
            return $data;
        }
        else {
            $data = TableRegistry::get('LandType')->find('list', ['conditions' => ['status' => 1]])->toArray();
            Cache::write("land_types", $data);
            return $data;
        }
    }

}

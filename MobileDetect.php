<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (�����)
 * @date 30.06.2015
 */
namespace skeeks\yii2\mobiledetect;
use yii\base\Component;

require_once(\Yii::getAlias('@vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php'));

/**
 * @method (bool) isMobile();
 * @method (bool) isTablet();
 *
 * Class MobileDetect
 * @package skeeks\yii2\mobiledetect
 */
class MobileDetect extends Component
{
    protected $mobileDetect;

    public function init()
    {
        parent::init();
        $this->mobileDetect = new \Mobile_Detect();
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->mobileDetect, $name], $arguments);
    }

    /**
     * ���������?
     *
     * @return bool
     */
    public function isDescktop()
    {
        if ($this->isMobile() || $this->isTablet())
        {
            return false;
        }

        return true;
    }
}
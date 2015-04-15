<?php

class ApiController extends Controller
{

    /**
     * Inits the Translate Controller
     * 
     * @param type $action
     * @return type
     */
    public function actionIndex()
    {

        $res = Yii::app()->cache->get("translation_status");
        if ($res === false) {
            $res = array();
            foreach ($this->getModule()->getLanguages() as $lang) {
                $res[] = array($lang, $this->getModule()->getLanguagePercentage($lang));
            }
            Yii::app()->cache->set("translation_status", $res);
        }


        echo CJSON::encode($res);
    }

}

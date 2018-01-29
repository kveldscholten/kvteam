<?php
/**
 * @copyright Kevin Veldscholten
 * @package ilch
 */

namespace Modules\Kvteam\Controllers;

use Modules\Kvteam\Mappers\Team as TeamMapper;
use Modules\User\Mappers\User as UserMapper;

class Index extends \Ilch\Controller\Frontend
{
    public function indexAction()
    {
        $teamMapper = new TeamMapper();
        $userMapper = new UserMapper();

        $this->getLayout()->header()
            ->css('static/css/team.css');
        $this->getLayout()->getTitle()
            ->add($this->getTranslator()->trans('menuTeam'));
        $this->getLayout()->getHmenu()
            ->add($this->getTranslator()->trans('menuTeam'), ['action' => 'index']);

        $this->getView()->set('userMapper', $userMapper)
            ->set('teams', $teamMapper->getTeams());
    }
}

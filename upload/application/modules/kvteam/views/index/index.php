<?php
$userMapper = $this->get('userMapper');
$profileFieldsContentMapper = $this->get('profileFieldsContentMapper');
$profileIconFields = $this->get('profileIconFields');
$profileFieldsTranslation = $this->get('profileFieldsTranslation');
?>

<h1><?=$this->getTrans('menuTeam') ?></h1>
<div class="teams">
    <?php if ($this->get('teams')): ?>
        <div class="row">
            <?php foreach ($this->get('teams') as $teamlist): ?>
                <div class="col-xl-12 team-name">
                    <h3><?=$this->escape($teamlist->getTitle()) ?></h3>
                </div>
                <div class="col-xl-12">
                    <?php $userIds = explode(',', $teamlist->getUserIds()); ?>
                    <?php foreach ($userIds as $userId): ?>
                        <?php $user = $userMapper->getUserById($userId); ?>
                        <?php if ($user AND $user->getConfirmed() == 1): ?>
                            <?php $profileFieldsContent = $profileFieldsContentMapper->getProfileFieldContentByUserId($user->getId()); ?>
                            <div class="col-xl-3">
                                <div class="user-image">
                                    <div class="image">
                                        <img class="img-thumbnail" src="<?=$this->getStaticUrl().'../'.$this->escape($user->getAvatar()) ?>" title="<?=$this->escape($user->getName()) ?>">
                                    </div>
                                    <div class="contact">
                                        <a href="<?=$this->getUrl(['module' => 'user', 'controller' => 'profil', 'action' => 'index', 'user' => $user->getId()]) ?>" class="fa-solid fa-user" title="<?=$this->getTrans('profile') ?>"></a>
                                        <?php if ($this->getUser() AND $this->getUser()->getId() != $this->escape($user->getId())): ?>
                                            <a href="<?=$this->getUrl(['module' => 'user', 'controller' => 'panel', 'action' => 'dialognew', 'id' => $user->getId()]) ?>" class="fa-regular fa-comment" title="<?=$this->getTrans('privateMessage') ?>"></a>
                                        <?php endif; ?>
                                        <?php if ($user->getOptMail() == 1 AND $this->getUser() AND $this->getUser()->getId() != $user->getID()): ?>
                                            <a href="<?=$this->getUrl(['module' => 'user', 'controller' => 'mail', 'action' => 'index', 'user' => $user->getId()]) ?>" class="fa-solid fa-envelope" title="<?=$this->getTrans('email') ?>"></a>
                                        <?php endif; ?>

                                        <?php foreach ($profileIconFields as $profileIconField) {
                                            if ($profileIconField->getShow()) {
                                                foreach ($profileFieldsContent as $profileFieldContent) {
                                                    if ($profileFieldContent->getValue() AND $profileIconField->getId() == $profileFieldContent->getFieldId()) {
                                                        $profileFieldName = $profileIconField->getKey();
                                                        foreach ($profileFieldsTranslation as $profileFieldTrans) {
                                                            if ($profileIconField->getId() == $profileFieldTrans->getFieldId()) {
                                                                $profileFieldName = $profileFieldTrans->getName();
                                                                break;
                                                            }
                                                        }

                                                        echo '<a href="'.$profileIconField->getAddition().$profileFieldContent->getValue().'" target="_blank" class="fa '.$profileIconField->getIcon().'" title="'.$profileFieldName.'"></a>';
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="user-name">
                                    <a href="<?=$this->getUrl(['module' => 'user', 'controller' => 'profil', 'action' => 'index', 'user' => $user->getId()]) ?>" title="<?=$this->escape($user->getName()) ?>s <?=$this->getTrans('profile') ?>">
                                        <?=$this->escape($user->getName()) ?>
                                    </a>
                                </div>
                                <div class="user-place">
                                    <?=$this->escape($user->getCity()) ?>
                                </div>
                                <div class="user-signature">
                                    <?=$this->escape($user->getSignature()) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <?=$this->getTrans('noTeams') ?>
    <?php endif; ?>
</div>

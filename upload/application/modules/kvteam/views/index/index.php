<?php
$userMapper = $this->get('userMapper');
?>

<h1><?=$this->getTrans('menuTeam') ?></h1>
<div class="teams">
    <?php if ($this->get('teams')): ?>
        <div class="row">
            <?php foreach ($this->get('teams') as $teamlist): ?>
                <div class="col-lg-12 team-name">
                    <h3><?=$this->escape($teamlist->getTitle()) ?></h3>
                </div>
                <div class="col-lg-12">
                    <?php $userIds = explode(',', $teamlist->getUserIds()); ?>
                    <?php foreach ($userIds as $userId): ?>
                        <?php $user = $userMapper->getUserById($userId); ?>
                        <?php if ($user AND $user->getConfirmed() == 1): ?>
                            <div class="col-lg-3">
                                <div class="user-image">
                                    <div class="image">
                                        <img class="thumbnail" src="<?=$this->getStaticUrl().'../'.$this->escape($user->getAvatar()) ?>" title="<?=$this->escape($user->getName()) ?>">
                                    </div>
                                    <div class="contact">
                                        <?php if ($this->getUser() AND $this->getUser()->getId() != $this->escape($user->getId())): ?>
                                            <a href="<?=$this->getUrl(['module' => 'user', 'controller' => 'panel', 'action' => 'dialognew', 'id' => $user->getId()]) ?>" class="fa fa-comment" title="<?=$this->getTrans('privateMessage') ?>"></a>
                                        <?php endif; ?>
                                        <?php if ($user->getOptMail() == 1 AND $this->getUser() AND $this->getUser()->getId() != $user->getID()): ?>
                                            <a href="<?=$this->getUrl(['module' => 'user', 'controller' => 'mail', 'action' => 'index', 'user' => $user->getId()]) ?>" class="fa fa-envelope" title="<?=$this->getTrans('email') ?>"></a>
                                        <?php endif; ?>
                                        <?php if ($this->escape($user->getHomepage()) != ''): ?>
                                            <a href="<?=$this->escape($user->getHomepage()); ?>" target="_blank" class="fa fa-globe" title="<?=$this->getTrans('profileHomepage') ?>"></a>
                                        <?php endif; ?>
                                        <?php if ($this->escape($user->getFacebook()) != ''): ?>
                                            <a href="https://www.facebook.com/<?=$this->escape($user->getFacebook()) ?>" target="_blank" class="fa fa-facebook" title="<?=$this->getTrans('profileFacebook') ?>"></a>
                                        <?php endif; ?>
                                        <?php if ($this->escape($user->getTwitter()) != ''): ?>
                                            <a href="https://twitter.com/<?=$this->escape($user->getTwitter()) ?>" target="_blank" class="fa fa-twitter" title="<?=$this->getTrans('profileTwitter') ?>"></a>
                                        <?php endif; ?>
                                        <?php if ($this->escape($user->getGoogle()) != ''): ?>
                                            <a href="https://plus.google.com/<?=$this->escape($user->getGoogle()) ?>" target="_blank" class="fa fa-google-plus" title="<?=$this->getTrans('profileGoogle') ?>"></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="user-name">
                                    <?=$this->escape($user->getName()) ?>
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

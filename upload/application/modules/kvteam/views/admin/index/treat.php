<link href="<?=$this->getModuleUrl('static/css/teams.css') ?>" rel="stylesheet">

<h1><?=($this->get('team') != '') ? $this->getTrans('edit') : $this->getTrans('add') ?></h1>
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
    <?=$this->getTokenField() ?>
    <div class="row mb-3 <?=$this->validation()->hasError('title') ? 'has-error' : '' ?>">
        <label for="title" class="col-xl-2 control-label">
            <?=$this->getTrans('title') ?>
        </label>
        <div class="col-xl-4">
            <input type="text"
                   class="form-control"
                   id="title"
                   name="title"
                   value="<?=($this->get('team') != '') ? $this->escape($this->get('team')->getTitle()) : $this->originalInput('title') ?>" />
        </div>
    </div>
    <div class="row mb-3 <?=$this->validation()->hasError('userIds') ? 'has-error' : '' ?>">
        <label for="userIds" class="col-xl-2 control-label">
            <?=$this->getTrans('members') ?>
        </label>
        <div class="col-xl-4">
            <select class="chosen-select form-control"
                    id="userIds"
                    name="userIds[]"
                    data-placeholder="<?=$this->getTrans('selectMembers') ?>"
                    multiple>
                <?php foreach ($this->get('userList') as $userList): ?>
                    <option value="<?=$userList->getId() ?>"
                        <?php if ($this->get('team') != '') {
                            $userIds = explode(',', $this->get('team')->getUserIds());
                            foreach ($userIds as $userId) {
                                if ($userList->getId() == $userId) {
                                    echo 'selected="selected"';
                                    break;
                                }
                            }
                        }
                        ?>>
                        <?=$this->escape($userList->getName()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <?=($this->get('team') != '') ? $this->getSaveBar('edit') : $this->getSaveBar('add') ?>
</form>

<script>
    $('#userIds').chosen();
</script>

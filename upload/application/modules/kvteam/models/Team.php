<?php
/**
 * @copyright Kevin Veldscholten
 * @package ilch
 */

namespace Modules\Kvteam\Models;

class Team extends \Ilch\Model
{
    /**
     * The Id.
     *
     * @var int
     */
    protected $id;

    /**
     * The Title.
     *
     * @var string
     */
    protected $title;

    /**
     * The User Ids.
     *
     * @var string
     */
    protected $userIds;

    /**
     * The Position.
     *
     * @var int
     */
    protected $position;

    /**
     * Sets the Id.
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = (int)$id;

        return $this;
    }

    /**
     * Gets the Title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the Title.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = (string)$title;

        return $this;
    }

    /**
     * Gets the User Ids.
     *
     * @return string
     */
    public function getUserIds()
    {
        return $this->userIds;
    }

    /**
     * Sets the User Ids.
     *
     * @param string $userIds
     */
    public function setUserIds($userIds)
    {
        $this->userIds = (string)$userIds;
    }

    /**
     * Gets the Position.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the position.
     *
     * @param int $position
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = (int)$position;

        return $this;
    }
}

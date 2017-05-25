<?php

namespace Crmp\Domain\Address;

class Role
{
    const UUID_NS = '48adf30f-76ce-5f31-9353-d8fecb70e22b';

    /**
     * @var string
     */
    protected $title;

    /**
     * @var Role[]
     */
    protected $subordinated = [];

    /**
     * @var string
     */
    protected $uuid;

    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Add subordinate role.
     *
     * Such roles have at most the capability of their supervisor.
     *
     * @param Role $role
     */
    public function addSubordinated(Role $role)
    {
        $this->subordinated[] = $role;
    }

    /**
     * @return Role[]
     */
    public function getSubordinated()
    {
        return $this->subordinated;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getUUid()
    {
        if ($this->uuid) {
            return $this->uuid;
        }

        return $this->uuid = \Ramsey\Uuid\Uuid::uuid5(static::UUID_NS, $this->getTitle());
    }
}

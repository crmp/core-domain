<?php

namespace Crmp\Domain;

/**
 * Soft delete entities.
 *
 * Some entities should not be deleted
 * to keep all data solid.
 * Therefor the entity can be disabled.
 *
 * @package Crmp\Domain
 */
interface SoftDeleteInterface
{
    /**
     * Disable the entity.
     *
     * @return mixed
     */
    public function disable();

    /**
     * Recover the entity.
     *
     * @return mixed
     */
    public function enable();

    /**
     * Check if an entity is disabled.
     *
     * @return mixed
     */
    public function isEnabled();
}

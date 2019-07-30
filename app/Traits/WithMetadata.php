<?php

namespace App\Traits;

use App\Models\Metadata;
use InWeb\Base\Exceptions\ModelIsNotBinded;

/**
 * Trait WithMetadata
 * @property  Metadata metadata
 * @package App\Traits
 */
trait WithMetadata
{
    public function metadata()
    {
        return $this->hasOne(Metadata::class, 'object_id')->where('model', get_class($this));
    }

    /**
     * @param $attributes
     * @return mixed
     * @throws ModelIsNotBinded
     */
    public function setMetadata($attributes)
    {
        if (! ($metadata = $this->metadata)) {
            $metadata = new Metadata();

            $metadata->fill($attributes);
            $metadata->model = get_class($this);
            $metadata->associateWith($this);
        } else {
            $metadata->fill($attributes);
        }

        return $metadata->save();
    }

    public function getMetaTitle()
    {
        return $this->title;
    }
}
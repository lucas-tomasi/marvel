<?php
namespace Model;

class Hero
{
    /**
     * FOVORITES HERO ID's
     */
    const FAVORITES = [1009187, 1009189, 1009368];

    /**
     * The unique ID of the character.
     */
    private $id;

    /**
     * The name of the character.
     */
    private $name;

    /**
     * A short bio or description of the character.
     */
    private $description;

    /**
     * The representative image for this character.
     */
    private $thumbnail;

    public function __construct() { }

    /**
     * Get ID of the character.
     * 
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Name of the character.
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get description of the character.
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get paht image
     * 
     * @return string $path
     */
    public function getLargeImage()
    {
        return $this->thumbnail->path . '/standard_amazing.' . $this->thumbnail->extension;
    }

    /**
     * Get description or 'Sem descrição'
     * 
     * @return string $description
     */
    public function getFullDescription()
    {
        if ($this->description)
        {
            return $this->getDescription();
        }

        return 'Sem descrição';
    }

    /**
     * Get representative image for this character.
     * 
     * @return object info images {path, extension}
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set ID hero
     * 
     * @param int $id ID
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set name hero
     * 
     * @param string $hero Name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set description hero
     * 
     * @param string $description Description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Set description hero
     * 
     * @param object $thumbnail Thumbnail {path, extension}
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }
}
?>
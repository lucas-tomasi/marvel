<?php
namespace Model;

class Storie
{
    /**
     * The unique ID of the story resource.
     */
    private $id;

    /**
     * The story title.
     */
    private $title;

    /**
     * A short description of the story.
     */
    private $description;

    /**
     * The story type e.g. interior story, cover, text story.
     */
    private $type;

    /**
     * The date the resource was most recently modified.
     */
    private $modified;

    /**
     * The representative image for this story.
     */
    private $thumbnail;

    /**
     * A resource list of characters which appear in this story.
     */
    private $characters;

    /**
     * A resource list of creators who worked on this story.
     */
    private $creators;


    public function __construct() { }

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
     * Get ID of the storie.
     * 
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ID storie
     * 
     * @param int $id ID
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get title of the storie.
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title storie
     * 
     * @param string $title Title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get description of the storie.
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description storie
     * 
     * @param string $description Description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get type storie
     * 
     * @return string $type type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type storie
     * 
     * @param string $type type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get thumbnail storie
     * 
     * @param object $thumbnail Thumbnail {path, extension}
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set thumbnail storie
     * 
     * @param object $thumbnail Thumbnail {path, extension}
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }
    
    /**
     * Get de characters of the storie
     * 
     * @return array[string] charcters
     */
    public function getCharacters()
    {
        return $this->characters;
    }

    /**
     * Set de characters of the storie
     * 
     * @param array[string] charcters
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }

    /**
     * Get de creators of the storie
     * 
     * @return array[string] charcters
     */   
    public function getCreators()
    {
        return $this->creators;
    }

    /**
     * Set de creators of the storie
     * 
     * @param array[string] charcters
     */
    public function setCreators($creators)
    {
        $this->creators = $creators;
    }
}
?>

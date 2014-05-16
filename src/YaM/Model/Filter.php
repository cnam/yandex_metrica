<?php


namespace YaM\Model;


use YaM\Core\Model;

class Filter extends Model
{

    const ACTION_EXCLUDE = 'exclude';
    const ACTION_INCLUDE = 'include';

    const ATTR_CLIENT_IP = 'client_id';
    const ATTR_REFERER = 'referer';
    const ATTR_URL = 'url';
    const ATTR_TITLE = 'title';

    const TYPE_CONTAIN = 'contain';
    const TYPE_START = 'start';
    const TYPE_EQUAL = 'equal';
    const TYPE_INTERVAL = 'interval';
    const TYPE_ONLY_MIRRORS = 'only_mirrors';

    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var string
     */
    protected $attr;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $status;

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getAttr()
    {
        return $this->attr;
    }

    /**
     * @param string $attr
     */
    public function setAttr($attr)
    {
        $this->attr = $attr;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


} 
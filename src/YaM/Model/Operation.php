<?php


namespace YaM\Model;


use YaM\Core\Model;

class Operation extends Model
{

    const ACTION_CUT_FRAMENT = 'cut_fragment';
    const ACTION_CUT_PARAMETER = 'cut_parameter';
    const ACTION_MERGE_HTTPS_AND_HTTP = 'merge_https_and_http';
    const ACTION_TO_LOWER = 'to_lower';
    const ACTION_REPLACE_DOMAIN = 'replace_domain';

    const ATTR_REFERER = 'referer';
    const ATTR_URL = 'url';

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
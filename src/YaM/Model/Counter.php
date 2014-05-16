<?php


namespace YaM\Model;


use YaM\Core\Model;

class Counter extends Model
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $site;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var array
     */
    protected $code_options;

    /**
     * @var array
     */
    protected $mirrors;

    /**
     * @var array
     */
    protected $goals;

    /**
     * @var array
     */
    protected $filters;

    /**
     * @var array
     */
    protected $operations;

    /**
     * @var array
     */
    protected $grants;

    /**
     * @var Monitoring
     */
    protected $monitoring;

    /**
     * @var string
     */
    protected $field;

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
     * @return array
     */
    public function getCodeOptions()
    {
        return $this->code_options;
    }

    /**
     * @param array $code_options
     */
    public function setCodeOptions($code_options)
    {
        $this->code_options = $code_options;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param string $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param array $filters
     */
    public function setFilters($filters)
    {
        foreach ($filters as $key => $filter) {
            $this->filters[$key] = new Filter($filter);
        }
    }

    /**
     * @return array
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * @param array $goals
     */
    public function setGoals($goals)
    {
        foreach ($goals as $key => $goal) {
            $this->filters[$key] = new Filter($goal);
        }
    }

    /**
     * @return array
     */
    public function getGrants()
    {
        return $this->grants;
    }

    /**
     * @param array $grants
     */
    public function setGrants($grants)
    {
        foreach ($grants as $key => $grant) {
            $this->filters[$key] = new Filter($grant);
        }
    }

    /**
     * @return array
     */
    public function getMirrors()
    {
        return $this->mirrors;
    }

    /**
     * @param array $mirrors
     */
    public function setMirrors($mirrors)
    {
        $this->mirrors = $mirrors;
    }

    /**
     * @return Monitoring
     */
    public function getMonitoring()
    {
        return $this->monitoring;
    }

    /**
     * @param array $monitoring
     */
    public function setMonitoring($monitoring)
    {
        $this->monitoring = new Monitoring($monitoring);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * @param array $operations
     */
    public function setOperations($operations)
    {
        $this->operations = $operations;
    }

    /**
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param string $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }


} 